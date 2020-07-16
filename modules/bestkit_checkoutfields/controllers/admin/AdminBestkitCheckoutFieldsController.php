<?php
/**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *         DISCLAIMER   *
 * *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
* versions in the future.
* ****************************************************
*/

require_once _PS_MODULE_DIR_ . 'bestkit_checkoutfields/includer.php';

class AdminBestkitCheckoutFieldsController extends ModuleAdminController
{
    public function __construct()
    {
        $this->table = 'bestkit_checkout_field';
        $this->className = 'BestkitCheckoutField';
        $this->identifier = 'id_bestkit_checkout_field';
        $this->_defaultOrderBy = 'id_bestkit_checkout_field';
        $this->lang = TRUE;
        $this->module_instance = new bestkit_checkoutfields();
        $this->context = Context::getContext();
        $this->bootstrap = TRUE;
		
        parent::__construct();

        $this->addRowAction('add');
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'confirm' => $this->l('Delete selected items?')
            ),
        );
        Shop::addTableAssociation($this->table, array('type' => 'shop'));

        /*$this->_select = 'cl.`name` as `category_name`, count(s.id_bestkit_slider) as cntr_slides';
        $this->_join = 'LEFT JOIN ' . _DB_PREFIX_ . 'category_lang cl ON (cl.id_category = a.id_category)
		    LEFT JOIN ' . _DB_PREFIX_ . 'bestkit_slide s ON (s.id_bestkit_slider = a.id_bestkit_slider)';
        $this->_group = 'GROUP BY a.`id_bestkit_slider`';*/

        $this->fields_list = array(
            'id_bestkit_checkout_field' => array('title' => $this->l('ID'), 'align' => 'center', 'width' => 25),
            'name' => array('title' => $this->l('Name'), 'width' => 200),
            'description' => array('title' => $this->l('Description')),
            'field_type' => array('title' => $this->l('Type')),
            'step' => array('title' => $this->l('Step')),
            'visible_admin' => array('title' => $this->l('Visible for admin'), 'width' => 25, 'align' => 'center', 'active' => 'status', 'type' => 'bool', 'orderby' => FALSE),
            'visible_customer' => array('title' => $this->l('Visible for customer'), 'width' => 25, 'align' => 'center', 'active' => 'status', 'type' => 'bool', 'orderby' => FALSE),
            'required' => array('title' => $this->l('Required'), 'width' => 25, 'align' => 'center', 'active' => 'status', 'type' => 'bool', 'orderby' => FALSE),
            'active' => array('title' => $this->l('Active'), 'width' => 25, 'align' => 'center', 'active' => 'status', 'type' => 'bool', 'orderby' => FALSE),
            'position' => array('title' => $this->l('Position'), 'filter_key' => 'position', 'align' => 'center', 'position' => 'position'),
        );

        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'icon' => 'icon-trash',
                'confirm' => $this->l('Delete selected items?')
            )
        );
/*
        if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_ALL) {
            $this->_where .= ' AND a.' . $this->identifier . ' IN (
                SELECT sa.' . $this->identifier . '
                FROM `' . _DB_PREFIX_ . $this->table . '_shop` sa
                WHERE sa.id_shop IN (' . implode(', ', Shop::
                getContextListShopID()) . ')
            )';
        }
*/

		if ($this->context->cookie->shopContext) {
			$shop_context = explode('s-', $this->context->cookie->shopContext);
			$id_store = 0;
			$id_shop_group = explode('g-', $this->context->cookie->shopContext);
			if (isset($id_shop_group[1])) {
				$id_shop_group = $id_shop_group[1];
			} elseif (isset($shop_context[1])) {
				$id_store = $shop_context[1];
			} else {
				$id_store = implode(', ', Shop::getContextListShopID());
			}
			
			if ($id_shop_group)
				$this->_where .= ' AND a.' . $this->identifier . ' IN (
					SELECT sa.' . $this->identifier . '
					FROM `' . _DB_PREFIX_ . $this->table . '_shop` sa
					JOIN `' . _DB_PREFIX_ . 'shop` s ON (s.id_shop = sa.id_shop)
					WHERE s.id_shop_group = ' . (int)$id_shop_group . '
				)';
			else
				$this->_where .= ' AND a.' . $this->identifier . ' IN (
					SELECT sa.' . $this->identifier . '
					FROM `' . _DB_PREFIX_ . $this->table . '_shop` sa
					WHERE sa.id_shop IN (' . pSQL($id_store) . ')
				)';
		//WHERE sa.id_shop IN (' . implode(', ', Shop::getContextListShopID()) . ')
		}
    }

    protected function returnOnOffValues($name)
    {
        return array(
            array(
                'id' => $name . '_on',
                'value' => 1,
                'label' => $this->l('Yes')
            ),
            array(
                'id' => $name . '_off',
                'value' => 0,
                'label' => $this->l('No')
            )
        );
    }

    public function renderForm()
    {
        $this->display = 'edit';
        $this->initToolbar();

        $field_types = array();
        foreach (bestkit_checkoutfields::getFieldTypes() as $field_type => $name) {
            $field_types[] = array('name' => $name, 'field_type' => $field_type);
        }

        $steps = array();
        foreach (bestkit_checkoutfields::getPossibleSteps() as $step => $name) {
            $steps[] = array('name' => $name, 'step' => $step);
        }

        $validation_types = array();
		$validation_types_stop_list = array('isValuesList', 'isModuleUrl', 'isIp2Long');
        foreach (get_class_methods('Validate') as $type) {
			if (in_array($type, $validation_types_stop_list)) {
				continue;
			}
			
            $validation_types[] = array('name' => $type, 'validation' => $type);
        }

        $this->fields_form = array(
            'tinymce' => TRUE,
            'legend' => array('title' => $this->l('BestKit Checkout Fields')),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Name:'),
                    'name' => 'name',
                    'id' => 'name',
                    'lang' => TRUE,
                    'required' => TRUE,
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description'),
                    'name' => 'description',
                    'autoload_rte' => TRUE,
                    'lang' => TRUE,
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Field type:'),
                    'name' => 'field_type',
                    'id' => 'field_type',
                    //'multiple' => true,
                    //'size' => 10,
                    'options' => array(
                        'query' => $field_types,
                        'id' => 'name',
                        'name' => 'field_type',
                    ),
                ),
                array(
                    'type' => 'categories_select',
                    'label' => $this->l('Options:'),
                    'category_tree' => $this->renderCheckoutOptions(),
                    'name' => '__options',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Step:'),
                    'name' => 'step',
                    'id' => 'step',
                    'options' => array(
                        'query' => $steps,
                        'id' => 'name',
                        'name' => 'step',
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Validation type:'),
                    'name' => 'validation',
                    'id' => 'validation',
                    'options' => array(
                        'query' => $validation_types,
                        'id' => 'name',
                        'name' => 'validation',
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Max length:'),
                    'desc' => $this->l('Use 0 for no limit'),
                    'name' => 'max_length',
                    'id' => 'max_length',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Min length:'),
                    'desc' => $this->l('Use 0 for no limit'),
                    'name' => 'min_length',
                    'id' => 'min_length',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Active:'),
                    'name' => 'active',
                    'required' => FALSE,
                    'class' => 't',
                    'is_bool' => FALSE,
                    'values' => $this->returnOnOffValues('active'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Required:'),
                    'name' => 'required',
                    'required' => FALSE,
                    'class' => 't',
                    'is_bool' => FALSE,
                    'values' => $this->returnOnOffValues('required'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Visible admin:'),
                    'name' => 'visible_admin',
                    'required' => FALSE,
                    'class' => 't',
                    'is_bool' => FALSE,
                    'values' => $this->returnOnOffValues('visible_admin'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Visible customer:'),
                    'name' => 'visible_customer',
                    'required' => FALSE,
                    'class' => 't',
                    'is_bool' => FALSE,
                    'values' => $this->returnOnOffValues('visible_customer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Default value:'),
                    'name' => 'default_value',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Position:'),
                    'name' => 'position',
                ),
            ),
            'submit' => array('title' => $this->l('   Save   ')),
            'buttons' => array(
				'save-and-stay' => array(
					'title' => $this->l('Save and Stay'),
					'name' => 'submitAdd'.$this->table.'AndStay',
					'type' => 'submit',
					'class' => 'btn btn-default pull-right',
					'icon' => 'process-icon-save',
				),
			),
		);

        //$this->fields_value['pages[]'] = $this->object->useDataAsArray('pages');
/**/
        if (Shop::isFeatureActive()) {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->l('Shop association:'),
                'name' => 'checkBoxShopAsso',
            );
        }

        $js = '<script type="text/javascript" src="./themes/default/js/tree.js"></script>';
        return parent::renderForm() . $js;
    }

    protected function returnObject()
    {
        $id = (int)Tools::getValue($this->identifier);
        return new $this->className($id);
    }

    public function postProcess()
    {
        $return = parent::postProcess();
        $object = $this->returnObject();
        if (Tools::isSubmit('submitAddbestkit_checkout_field')) {
            //BestkitCheckoutOption::deleteAllById($object->id);
//print_r($_POST);
//print_r($object); die('new logic for prevent delete all options');
            $exists = array();
            foreach (Tools::getValue('mytext') as $user_option) {
                if (!$user_option) {
                    continue;
                }

                if ($id_bestkit_checkout_value = BestkitCheckoutOption::isIsset($object->id, $user_option)) {
                    $checkoutValue = new BestkitCheckoutOption($id_bestkit_checkout_value);
                    $checkoutValue->value = $user_option;
                    $checkoutValue->id_bestkit_checkout_field = $object->id;
                    $checkoutValue->update();

                    $exists[] = $checkoutValue->id;
                } else {
                    $checkoutValue = new BestkitCheckoutOption();
                    $checkoutValue->value = $user_option;
                    $checkoutValue->id_bestkit_checkout_field = $object->id;
                    $checkoutValue->add();

                    $exists[] = $checkoutValue->id;
                }
            }

            BestkitCheckoutOption::deleteAllByIdSmart($object->id, $exists);
        }

        return $return;
    }

    public function renderCheckoutOptions()
    {
        $object = $this->returnObject();
        $this->context->smarty->assign(array(
            'options' => BestkitCheckoutOption::getValuesById($object->id),
        ));

        $file = _PS_MODULE_DIR_ . 'bestkit_checkoutfields/bestkit_checkoutfields.php';
        $html = $this->module->display($file, 'views/templates/admin/options.tpl');
        return $html;
    }




    protected function updateAssoShop($id_object)
    {
        if (!Shop::isFeatureActive()) {
            return;
        }

        $assos_data = $this->getSelectedAssoShop($this->table, $id_object);

        $exclude_ids = $assos_data;
        foreach (Db::getInstance()->executeS('SELECT id_shop FROM ' . _DB_PREFIX_ .
            'shop') as $row) {
            if (!$this->context->employee->hasAuthOnShop($row['id_shop'])) {
                $exclude_ids[] = $row['id_shop'];
            }
        }

        Db::getInstance()->delete($this->table . '_shop', '`' . $this->identifier .
            '` = ' . (int)$id_object . ($exclude_ids ? ' AND id_shop NOT IN (' . implode(', ',
                    $exclude_ids) . ')' : ''));

        $insert = array();
        foreach ($assos_data as $id_shop) {
            $insert[] = array(
                $this->identifier => $id_object,
                'id_shop' => (int)$id_shop,
            );
        }

        return Db::getInstance()->insert($this->table . '_shop', $insert, FALSE, TRUE,
            Db::INSERT_IGNORE);
    }

    protected function getSelectedAssoShop($table)
    {
        if (!Shop::isFeatureActive()) {
            return array();
        }

        $shops = Shop::getShops(TRUE, NULL, TRUE);
        if (count($shops) == 1 && isset($shops[0])) {
            return array($shops[0], 'shop');
        }

        $assos = array();
        if (Tools::isSubmit('checkBoxShopAsso_' . $table)) {
            foreach (array_keys(Tools::getValue('checkBoxShopAsso_' . $table)) as $id_shop) {
                $assos[] = (int)$id_shop;
            }
        } else {
            if (Shop::getTotalShops(FALSE) == 1) {
                // if we do not have the checkBox multishop, we can have an admin with only one shop and being in multishop
                $assos[] = (int)Shop::getContextShopID();
            }
        }

        return $assos;
    }
}