<?php

/*
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
* *****************************************************
*/

require_once _PS_MODULE_DIR_ . 'bestkit_checkoutfields/includer.php';

class AdminBestkitCustomerFieldsController extends AdminController
{
    protected $position_identifier = 'id_bestkit_customerfields';

    protected $_module = NULL;
    
    protected $_js = '<script type="text/javascript" src="../modules/bestkit_checkoutfields/views/js/admin/customerfields.js"></script>';

    public function getModule()
    {
        if (is_NULL($this->_module)) {
            $this->_module = new bestkit_checkoutfields;
        }

        return $this->_module;
    }

    public function __construct()
    {
    	$this->bootstrap = TRUE;
        $this->table = 'bestkit_customerfields';
        $this->identifier = 'id_bestkit_customerfields';
        $this->className = 'BestKitCustomerFields';
        $this->lang = TRUE;
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->context = Context::getContext();
		
        parent::__construct();

        $this->fields_list = array(
            'id_bestkit_customerfields' => array(
                'title' => $this->l('ID'),
                'align' => 'center',
                'width' => 30),
            'name' => array('title' => $this->l('Name'), 'width' => 70),
            'code' => array('title' => $this->l('Code'), 'width' => 70),
            'type' => array('title' => $this->l('Type'), 'width' => 70),
            'date_add' => array('title' => $this->l('Date Add'), 'width' => 70),
            'date_upd' => array('title' => $this->l('Date Last Update'), 'width' => 50),
            'is_enabled' => array(
                'title' => $this->l('Enabled'),
                'width' => 25,
                'align' => 'center',
                'active' => 'status',
                'type' => 'bool',
                'orderby' => FALSE,
                ));

        /*if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_ALL) {
            $this->_where .= ' AND a.' . $this->identifier . ' IN (
                SELECT sa.' . $this->identifier . '
                FROM `' . _DB_PREFIX_ . $this->table . '_shop` sa
                WHERE sa.id_shop IN (' . implode(', ', Shop::
                getContextListShopID()) . ')
            )';
        }*/
		
        Shop::addTableAssociation($this->table, array('type' => 'shop'));
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

        $this->identifiersDnd = array('id_bestkit_customerfields' => 'id_sslide_to_move');
    }

	public function renderList()
	{
		if (!$this->getModule()->isWriteable()) {
			return '<div class="alert alert-danger">
				' . $this->l('Directory "modules/bestkit_checkoutfields" is not writeable! Please set 777 rights for this folder.') . '
			</div>';
		}

		return parent::renderList();
	}

    public function renderForm()
    {
        $this->display = 'edit';
        $this->initToolbar();
        if (!$obj = $this->loadObject(TRUE)) {
            return;
        }

        $types = array();
        foreach ($obj->getTypes() as $type) {
	        $types[] = array(
                'id' => 'active_' . $type,
                'value' => $type,
                'class' => 'attribute_type',
                'label' => Tools::ucfirst($type)
           );
        }
        
        $display_on = array();
        foreach ($obj->getDisplayOns() as $type) {
	        $display_on[] = array(
                'id' => 'active_' . $type,
                'value' => $type,
                'label' => Tools::ucfirst($type)
           );
        }
        
        $validation = array(array(
                'id' => 'active_none',
                'value' => '',
                'label' => 'None'
           ));

        foreach ($obj->getValidations() as $method => $type) {
	        $validation[] = array(
                'id' => 'active_' . $method,
                'value' => $method,
                'label' => Tools::ucfirst($type)
           );
        }
        
        $groups = Group::getGroups(Context::getContext()->language->id);

        $this->fields_form = array(
            'tinymce' => TRUE,
            'legend' => array('title' => $this->l('Customer Attribute')),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Name:'),
                    'name' => 'name',
                    'id' => 'name',
                    'required' => TRUE,
                    'size' => 50,
                    'maxlength' => 50,
                    'lang' => TRUE,
                    ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Code:'),
                    'name' => 'code',
                    'id' => 'code',
                    'required' => TRUE,
                    'size' => 50,
                    'maxlength' => 50,
                    ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Status:'),
                    'name' => 'is_enabled',
                    'required' => FALSE,
                    'class' => 't',
                    'is_bool' => TRUE,
                    'values' => array(array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')), array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled'))),
                    ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Sort Order:'),
                    'name' => 'sort_order',
                    'id' => 'sort_order',
                    'required' => TRUE,
                    'size' => 50,
                    'maxlength' => 50,
                    ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display On Pages:'),
                    'name' => 'display_on',
                    'required' => FALSE,
                    'class' => 't',
                    'values' => $display_on,
                    ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Required:'),
                    'name' => 'required',
                    'required' => FALSE,
                    'class' => 't',
                    'is_bool' => TRUE,
                    'values' => array(array(
                            'id' => 'required_on',
                            'value' => 1,
                            'label' => $this->l('Yes')), array(
                            'id' => 'required_off',
                            'value' => 0,
                            'label' => $this->l('No'))),
                    ),
                array( //since 1.7
                    'type' => 'text',
                    'label' => $this->l('Default value:'),
                    'name' => 'default_value',
                ),
                array( //since 1.7
                    'type' => 'radio',
                    'label' => $this->l('Readonly:'),
                    'name' => 'readonly',
                    'required' => FALSE,
                    'is_bool' => TRUE,
                    'values' => array(array(
                            'id' => 'readonly_on',
                            'value' => 1,
                            'label' => $this->l('Yes')), array(
                            'id' => 'readonly_off',
                            'value' => 0,
                            'label' => $this->l('No'))),
                    ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Type:'),
                    'name' => 'type',
                    'required' => FALSE,
                    'class' => 't',
                    'values' => $types,
                    ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Validation:'),
                    'name' => 'validation',
                    'required' => FALSE,
                    'class' => 't',
                    'values' => $validation,
                    ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Values:'),
                    'name' => 'values',
                    'id' => 'values',
                    'required' => TRUE,
                    'size' => 50,
                    'maxlength' => 50,
                    'desc' => $this->l('Semicolon as delimiter. For example: value1;value2;value3')
                    ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Max Text Length:'),
                    'name' => 'max_text_length',
                    'id' => 'max_text_length',
                    'required' => TRUE,
                    'size' => 50,
                    'maxlength' => 50,
                    ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Max File Size (in KB):'),
                    'name' => 'file_size',
                    'id' => 'file_size',
                    'required' => TRUE,
                    'size' => 50,
                    'maxlength' => 50,
                    ),
                array(
                    'type' => 'text',
                    'label' => $this->l('File Extensions:'),
                    'name' => 'file_extensions',
                    'id' => 'file_extensions',
                    'required' => TRUE,
                    'size' => 50,
                    'maxlength' => 50,
                    'desc' => $this->l('Semicolon as delimiter. For example: zip;doc;xls')
                    ),
                array(
                    'type' => 'group',
                    'label' => $this->l('Customer Groups:'),
                    'name' => 'type',
                    'required' => FALSE,
                    'class' => 't',
                    'values' => $groups,
                    ),
            ),
            'submit' => array('title' => $this->l('   Save   ')));

        if (Shop::isFeatureActive()) {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->l('Shop association:'),
                'name' => 'checkBoxShopAsso',
                );
        }
        
		foreach ($groups as $group) {
			$this->fields_value['groupBox_' . $group['id_group']] = in_array($group['id_group'], $obj->getGroups());
		}
		
		$additional_js = '<script>
			var hidedFields = ' . Tools::jsonEncode($obj->getFieldsRelations()) . ';
			var shower = ' . Tools::jsonEncode($obj->getTypeFieldsHider()) . ';
		</script>';

        return parent::renderForm() . $additional_js . $this->_js;
    }
    
    public function processSave()
    {
    	if (Tools::getIsset('groupBox')) {
	        if (!$obj = $this->loadObject(TRUE)) {
	            return;
	        }

	    	$obj->groups = implode(';', Tools::getValue('groupBox'));
	    	$_POST['groups'] = $obj->groups;
    	}

    	return parent::processSave();
    }

    public function validateRules($class_name = FALSE)
    {
        foreach ($_POST as &$post) {
            if (!is_array($post)) {
                $post = trim($post);
            }
        }

        return parent::validateRules($class_name);
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
