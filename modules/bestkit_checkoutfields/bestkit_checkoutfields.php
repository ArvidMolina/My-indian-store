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
*
*  @author     BEST-KIT.COM (contact@best-kit.com)
*  @copyright  http://best-kit.com
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once _PS_MODULE_DIR_ . 'bestkit_checkoutfields/includer.php';

class bestkit_checkoutfields extends Module
{
    const PREFIX = 'bestkit_cfields_';

    protected $_hooks = array(
        //'header',
        'displayPaymentTop',
        'displayBeforeCarrier',
        'displayShoppingCartFooter',
        'actionValidateOrder',
        'displayOrderDetail',
        'displayAdminOrderTabOrder', //https://github.com/PrestaShop/PrestaShop/commit/56033c43cd99184b271638825164431d2f4333a0#diff-19e7e805ab0f167ae7676631fa3d7172
        'displayAdminOrderContentOrder', //https://github.com/PrestaShop/PrestaShop/commit/56033c43cd99184b271638825164431d2f4333a0#diff-19e7e805ab0f167ae7676631fa3d7172
        'displayAdminOrder', //for old versions
        'displayPDFInvoice',
        'actionEmailAddAfterContent',

        'displayHeader',
        'displayCustomerAccountFormTop',
        'actionCustomerAccountAdd',
        'displayAdminCustomers',
        'displayCustomerAccount',
        'actionObjectCustomerDeleteAfter',
		
		'displayAddress', //since 1.6.9
		'submitAddress', //since 1.6.9
		'actionObjectAddressAddAfter', //since 1.6.9
		'actionObjectAddressUpdateAfter', //since 1.6.9
		'actionObjectAddressDeleteAfter', //since 1.6.9
		'actionAdminAddressesFormModifier', //since 1.6.9
		'actionAdminAddressesControllerSaveAfter', //since 1.6.9

		'orderConfirmation', //since 1.6.11
    );

    protected $_moduleParams = array();
    protected $_moduleParamsLang = array();

    protected $_tabs = array(
        array(
            'class_name' => 'AdminBestkitCustomFields',
            'parent' => false,
            'name' => 'BestKit Custom Fields'
        ),
        array(
            'class_name' => 'AdminBestkitCheckoutFields',
            'parent' => 'AdminBestkitCustomFields',
            'name' => 'Checkout Fields'
        ),
        array(
	        'class_name' => 'AdminBestkitCustomerFields',
	        'parent' => 'AdminBestkitCustomFields',
	        'name' => 'Customer Fields'
        )
    );

    public function __construct()
    {
        $this->name = 'bestkit_checkoutfields';
        $this->tab = 'front_office_features';
        $this->version = '1.7.0';
        $this->author = 'best-kit';
        $this->need_instance = 0;
        $this->module_key = 'e551072c7f4e1060adea45d434cda079';
        $this->bootstrap = TRUE;

        parent::__construct();
		
        $this->displayName = $this->l('Checkout and Customer Fields manager');
        $this->description = $this->l('Easy manager for CRUD actions with customer and checkout fields. Package for PrestaShop v.1.7.x');
    }

    public function getDir($file = '')
    {
        return _PS_MODULE_DIR_ . $this->name . DIRECTORY_SEPARATOR . $file;
    }

	public function isWriteable()
	{
		return is_writable($this->getDir());
	}

    public function install()
    {
    	if (!$this->isWriteable()) {
			$this->_errors[] = $this->l('Please set 777 rights for "') . $this->getLocalPath() . $this->l('" folder!');
			return FALSE;
		}

        if (parent::install()) {
            $sql = array();
            include ($this->getDir('sql/install.php'));
            foreach ($sql as $_sql) {
                Db::getInstance()->Execute($_sql);
            }

            foreach ($this->_hooks as $hook) {
                if (!$this->registerHook($hook)) {
                    return FALSE;
                }
            }

            $languages = Language::getLanguages();
            foreach ($this->_tabs as $tab) {
                $_tab = new Tab();
                $_tab->class_name = $tab['class_name'];
                $_tab->id_parent = ($tab['parent'] != false ? Tab::getIdFromClassName($tab['parent']) : 0);
                if (empty($_tab->id_parent)) {
                    $_tab->id_parent = 0;
                }

                $_tab->module = $this->name;
                foreach ($languages as $language) {
                    $_tab->name[$language['id_lang']] = $this->l($tab['name']);
                }

                $_tab->add();
            }

            if (!$this->installConfiguration()) {
                return FALSE;
            }

            return TRUE;
        }

        return FALSE;
    }

    public function uninstall()
    {
        if (parent::uninstall()) {
            $sql = array();
            include ($this->getDir('sql/uninstall.php'));
            foreach ($sql as $_sql) {
                Db::getInstance()->Execute($_sql);
            }

            foreach ($this->_tabs as $tab) {
                $_tab_id = Tab::getIdFromClassName($tab['class_name']);
                $_tab = new Tab($_tab_id);
                $_tab->delete();
            }
        }

        return TRUE;
    }

    public function installConfiguration()
    {
        foreach ($this->_moduleParams as $param => $value) {
            if (!$this->setConfig($param, $value)) {
                return FALSE;
            }
        }

        foreach ($this->_moduleParamsLang as $param => $value) {
            $values = array();
            foreach (Language::getLanguages(FALSE) as $lang) {
                $values[$lang['id_lang']] = $value;
            }

            if (!$this->setConfig($param, $values)) {
                return FALSE;
            }
        }

        return TRUE;
    }

    public function getConfig($name)
    {
        if (array_key_exists($name, $this->_moduleParamsLang)) {
            $values = array();
            foreach (Language::getLanguages(FALSE) as $lang) {
                $values[$lang['id_lang']] = Configuration::get(self::PREFIX . $name, $lang['id_lang']);
            }

            return $values;
        } else {
            return Configuration::get(self::PREFIX . $name);
        }
    }

    public function setConfig($name, $value)
    {
        return Configuration::updateValue(self::PREFIX . $name, $value, TRUE);
    }

    public function getContent() {
        $redirect = $this->context->link->getAdminLink('AdminBestkitCheckoutFields');
        Tools::redirectAdmin($redirect);
    }

    public static function getFieldTypes() {
        $module = new self();
        return array(
            $module->l('Field') => 'field',
            $module->l('Text') => 'text',
            $module->l('Date') => 'date',
            $module->l('Bool') => 'bool',
            $module->l('Multiple') => 'multiple',
            $module->l('Dropdown') => 'dropdown',
            $module->l('Checkbox') => 'checkbox',
            //$module->l('Price') => 'price'
        );
    }

    public static function getPossibleSteps() {
        $module = new self();
        return array(
            $module->l('Summary') => 'summary',
            //$module->l('Sign in') => 'sign in',
            $module->l('Address') => 'address',
            $module->l('Shipping') => 'shipping',
            $module->l('Payment') => 'payment'
        );
    }
	
	public function isSecure() {
	  return
		(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
		|| $_SERVER['SERVER_PORT'] == 443;
	}

    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS(($this->_path) . 'views/css/front/front.css', 'all');
        $this->context->controller->addJs(($this->_path) . 'views/js/front/front.js');
		$this->context->controller->addJqueryUI('ui.datepicker');
        //sweetalert plugin
        $this->context->controller->addJS(($this->_path) . 'views/js/front/sweet-alert.min.js');
        $this->context->controller->addCSS(($this->_path) . 'views/css/front/sweet-alert.css', 'all');

        $this->context->controller->addCss($this->_path . 'views/css/front/customerfields.css', 'all');
        $this->context->controller->addJqueryUI('ui.datepicker');

        $this->context->smarty->assign('checkout_fields_controller', $this->context->link->getModuleLink('bestkit_checkoutfields', 'ajax', array(), $this->isSecure()));
        return $this->display(__FILE__, 'header.tpl');
    }
	
	public function getStepHtml($step)
	{
		$html = '';
        $fields = BestkitCheckoutField::getFieldsByStep($step, $this->context->language->id);

        foreach ($fields as &$field) {
            if (in_array($field['field_type'], BestkitCheckoutOption::$TYPES)) {
                $field['options'] = BestkitCheckoutOption::getValuesById($field['id_bestkit_checkout_field']);
            }

			if ($step == 'address') {
				//since 1.6.9
				$field['selected_value'] = BestkitCheckoutValue::returnValueByAddressIds($field['id_bestkit_checkout_field'], Tools::getValue('id_address'));
			} else {
				$field['selected_value'] = BestkitCheckoutValue::returnValueByIds($field['id_bestkit_checkout_field'], $this->context->cart->id);
			}
			
			$tmp_unserialize = @unserialize($field['selected_value']);
			if ($field['selected_value'] === 'b:0;' || $tmp_unserialize !== false) {
				$field['selected_value'] = $tmp_unserialize;
			}

            if (empty($field['selected_value']))
                $field['selected_value'] = $field['default_value'];

//print_r($field);die;
			$this->context->smarty->assign(array(
				'checkout_field' => $field,
				'yes_lang' => $this->l('Yes'),
				'no_lang' => $this->l('No'),
				'checkout_field_step' => $step, //since 1.6.9
			));
			
			$html .= $this->display(__FILE__, 'checkout_' . $field['field_type'] . '.tpl');
		}

        return $html;
	}

    public function hookDisplayShoppingCartFooter()
    {
		$this->context->smarty->assign(array(
			'step_html' => $this->getStepHtml('summary'),
			'step' => 'summary',
		));

		return $this->display(__FILE__, 'checkout_fields_wrapper.tpl');
    }
	
	public function hookDisplayBeforeCarrier()
	{
		$this->context->smarty->assign(array(
			'step_html' => $this->getStepHtml('shipping'),
			'step' => 'shipping',
		));
		
		return $this->display(__FILE__, 'checkout_fields_wrapper.tpl');
	}
	
	public function hookDisplayPaymentTop()
	{
		$this->context->smarty->assign(array(
			'step_html' => $this->getStepHtml('payment'),
			'step' => 'payment',
		));
		
		return $this->display(__FILE__, 'checkout_fields_wrapper.tpl');
	}
	
	public function hookActionValidateOrder($params)
	{
		BestkitCheckoutValue::setOrderForCart($params['cart']->id, $params['order']->id);

		//since 1.6.15 [free orders don't execute orderConfirmation hook]
		$this->hookOrderConfirmation(array('objOrder' => $params['order']));
	}
	
	public function getFieldsWithSteps($id_order, $is_front = 1, $is_admin = 0)
	{
        $checkout_fields = BestkitCheckoutValue::getOrderFields($id_order, $this->context->language->id, $is_front, $is_admin);
		if (is_array($checkout_fields)) {
			$fields = array();
			foreach ($checkout_fields as $checkout_field) {
				$fields[$checkout_field['step']][] = $checkout_field;
			}
			
			return $fields;
		}
		
		return FALSE;
	}
	
	public function countFields($id_order, $is_front = 1, $is_admin = 0)
	{
        return BestkitCheckoutValue::getOrderFields($id_order, $this->context->language->id, $is_front, $is_admin, TRUE);
	}

    public function hookDisplayOrderDetail($params)
    {
        $checkout_fields = $this->getFieldsWithSteps($params['order']->id, TRUE);
        if ($checkout_fields) {
            $this->context->smarty->assign(array(
                'checkout_fields' => $checkout_fields,
            ));
			
            return $this->display(__file__, 'order_history.tpl');
        }
    }
	
	public function hookDisplayAdminOrder($params)
    {
        $checkout_fields = $this->getFieldsWithSteps($params['id_order'], FALSE, TRUE);
		if ($checkout_fields) {
			$orderObj = new Order($params['id_order']);
			return '<div class="hookDisplayAdminOrder panel"><div class="panel-heading">'.$this->l('Checkout fields').'</div>' . $this->hookDisplayAdminOrderContentOrder(array('order' => $orderObj)) . '</div>';
		}
	}
	
	//TODO: add validation to backend part
	public function getStepsAdminHtml($id_order)
	{
		$html = '';
        $fields = $this->getFieldsWithSteps($id_order, FALSE, TRUE);
		$orderObj = new Order($id_order);

        foreach ($fields as $step_fields) {
			foreach ($step_fields as $field) {
				if (in_array($field['field_type'], BestkitCheckoutOption::$TYPES)) {
					$field['options'] = BestkitCheckoutOption::getValuesById($field['id_bestkit_checkout_field']);
				}
				
				$field['selected_value'] = BestkitCheckoutValue::returnValueByIds($field['id_bestkit_checkout_field'], $orderObj->id_cart);
				
				$tmp_unserialize = @unserialize($field['selected_value']);
				if ($field['selected_value'] === 'b:0;' || $tmp_unserialize !== false) {
					$field['selected_value'] = $tmp_unserialize;
				}

				$this->context->smarty->assign(array(
					'checkout_field' => $field,
					'yes_lang' => $this->l('Yes'),
					'no_lang' => $this->l('No'),
				));
				
				$html .= $this->display(__FILE__, 'checkout_' . $field['field_type'] . '.tpl');
			}
		}

        return $html;
	}
	
    public function hookDisplayAdminOrderContentOrder($params)
    {
		if (Tools::isSubmit('submitUpdCheckoutFieldsValues')) {
			$post_checkout_fields = Tools::getValue('checkout_fields');
			foreach ($post_checkout_fields as $id_bestkit_checkout_value => $checkout_field) {
				Db::getInstance()->Execute('
					update `' . _DB_PREFIX_ . 'bestkit_checkout_value`
					set value = "'.pSQL($checkout_field).'"
					where id_bestkit_checkout_value = '.(int)$id_bestkit_checkout_value.'
				');
			}
			unset($checkout_field);
			unset($id_bestkit_checkout_value);
		}

        $checkout_fields = $this->getFieldsWithSteps($params['order']->id, FALSE, TRUE);

		if ($checkout_fields) {
            $this->context->smarty->assign(array(
                'id_order' => $params['order']->id,
                'checkout_fields' => $checkout_fields,
                //'checkout_fields_html' => $this->getStepsAdminHtml($params['order']->id),
            ));

			return $this->display(__file__, 'order_content.tpl');
		}
    }

    public function hookDisplayAdminOrderTabOrder($params)
    {
        $checkout_fields_count = $this->countFields($params['order']->id, FALSE, TRUE, TRUE);
		if ($checkout_fields_count) {
            $this->context->smarty->assign(array(
                'checkout_fields_count' => $checkout_fields_count,
            ));
			
			return $this->display(__file__, 'order_tab.tpl');
		}
    }

    public function hookDisplayPDFInvoice($params)
    {
        $checkout_fields = $this->getFieldsWithSteps($params['object']->id_order, FALSE, TRUE);

        if ($checkout_fields) {
            $this->context->smarty->assign(array(
                'checkout_fields' => $checkout_fields,
                'link' => $this->context->link,
            ));

            return $this->display(__file__, 'admin_invoice.tpl');
        }
    }
	
	public function hookActionEmailAddAfterContent($params)
    {
        if ($params['template'] == 'order_conf') {
			$content = '';
			$checkout_fields = BestkitCheckoutValue::getOrderFieldsByCartId($this->context->cart->id, $this->context->language->id, TRUE);
			
			if ($checkout_fields) {
				foreach ($checkout_fields as $checkout_field) {
					$content .= '<tr class="conf_body" id="gift_container">
								<td bgcolor="#f8f8f8" colspan="1" style="border:1px solid #D6D4D4;color:#333;padding:7px 0">
									<table class="table" style="width:100%;border-collapse:collapse">
										<tr>
											<td width="10" style="color:#333;padding:0"></td>
											<td align="center" style="color:#333;padding:0">
												<font size="2" face="Open-sans, sans-serif" color="#555454">
													<strong>'.$checkout_field['name'].'</strong>
												</font>
											</td>
											<td width="10" style="color:#333;padding:0"></td>
										</tr>
									</table>
								</td>
								<td bgcolor="#f8f8f8" colspan="7" style="border:1px solid #D6D4D4;color:#333;padding:7px 0">
									<table class="table" style="width:100%;border-collapse:collapse">
										<tr>
											<td width="10" style="color:#333;padding:0"></td>
											<td style="color:#333;padding:0">
												<font size="2" face="Open-sans, sans-serif" color="#555454">
													'.$checkout_field['value'].'
												</font>
											</td>
											<td width="10" style="color:#333;padding:0"></td>
										</tr>
									</table>
								</td>
							</tr>';
				}
			}

            $params['template_html'] = str_replace("{products}", "{products}" . $content, $params['template_html']);
        }
    }
	
	
	//since 1.6.9
	public function validateAddressFields(&$errors)
	{
		$checkout_fields = Tools::getValue('checkout_field');
		if (Tools::isSubmit('submitAddress') && is_array($checkout_fields)) {
			foreach ($checkout_fields as $id_checkout_field => $value) {
				$checkoutFieldObj = new BestkitCheckoutField($id_checkout_field, $this->context->language->id);
				
				//required
				if ($checkoutFieldObj->required) {
					if (is_array($value)) {
						array_walk($value, 'pSql');
						foreach ($value as $v) {
							if (trim($value) === '')
								$errors[] = sprintf($this->l('The `%s` is mandatory field, please enter correct value.'), $checkoutFieldObj->name);
						}
						unset($v);
					} else {
						$value = pSql($value);
						if (trim($value) === '')
							$errors[] = sprintf($this->l('The `%s` is mandatory field, please enter correct value.'), $checkoutFieldObj->name);
					}
				}
					
				//validation
				$validation = $checkoutFieldObj->validation;
				if (!Validate::$validation($value)) {
					$errors[] = sprintf($this->module->l('You value for `%s` is incorrect, please enter correct value.', $checkoutFieldObj->name));
				}
			}
			unset($id_checkout_field);
			unset($value);
			
			return $errors;
		}
	}
	
	//since 1.6.9
	public function hookSubmitAddress($params)
	{
		if (Tools::isSubmit('submitAddress'))
			$this->validateAddressFields($params['errors']);
	}
	
	//since 1.6.9
	public function hookDisplayAddress($params)
	{
		return $this->getStepHtml('address');
	}
	
	//since 1.6.9
	public function hookActionAdminAddressesControllerSaveAfter($params)
	{
		if ($params['return'] instanceof Address) {
			$bestkit_checkout_fields = Tools::getValue('bestkit_checkout_field');
			foreach ($bestkit_checkout_fields as $key => $value) {
				$this->saveAddressValue($key, $value, Tools::getValue('id_address'));
			}
			unset($key);
			unset($value);
		}
	}
	
	//since 1.6.9
	public function hookActionAdminAddressesFormModifier($params)
	{
        $fields = BestkitCheckoutField::getFieldsByStep('address', $this->context->language->id);

		/*if (!count($fields)) 
			return;*/
		
		$inputs = array();
        foreach ($fields as &$field) {
			$inputs[] = array(
				'type' => 'text',
				'label' => $field['name'],
				'name' => 'bestkit_checkout_field[' . $field['id_bestkit_checkout_field'] . ']',
			);
		}
	
		//$id_address = (int)Tools::getValue('id_address');
		$params['fields'][] = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Additional address fields'),
					'icon' => 'icon-pencil',
				),
				'input' => $inputs,
				'submit' => array(
					'title' => $this->l('Save'),
				),
			)
		);
		
		foreach ($fields as &$field) {
			$params['fields_value']['bestkit_checkout_field[' . $field['id_bestkit_checkout_field'] . ']'] = BestkitCheckoutValue::returnValueByAddressIds($field['id_bestkit_checkout_field'], Tools::getValue('id_address'));
		}
	}
	
	public function saveAddressValue($id_checkout_field, $value, $id_address) {
		$checkoutValueObj = BestkitCheckoutValue::loadByAddressId($id_checkout_field, $id_address);
		$checkoutValueObj->id_cart = 0;
		$checkoutValueObj->id_order = 0;
		$checkoutValueObj->id_address = $id_address;
		$checkoutValueObj->value = is_array($value) ? serialize($value) : $value;
		$checkoutValueObj->id_bestkit_checkout_field = $id_checkout_field;
		
		return $checkoutValueObj->save();
	}
	
	public function hookActionObjectAddressAddAfter($params) {
		$errors = array();
		$this->validateAddressFields($errors);
		
		if (!count($errors)) {
			$checkout_fields = Tools::getValue('checkout_field');
			if (is_array($checkout_fields)) {
				foreach ($checkout_fields as $id_checkout_field => $value) {
					$this->saveAddressValue($id_checkout_field ,$value, $params['object']->id);
				}
				unset($id_checkout_field);
				unset($value);
			}
		}
	}
	
	public function hookActionObjectAddressUpdateAfter($params) {
		$errors = array();
		$this->validateAddressFields($errors);

		if (!count($errors)) {
			$checkout_fields = Tools::getValue('checkout_field');
			foreach ($checkout_fields as $id_checkout_field => $value) {
				$this->saveAddressValue($id_checkout_field ,$value, $params['object']->id);
			}
			unset($id_checkout_field);
			unset($value);
		}
	}
	
	public function hookActionObjectAddressDeleteAfter($params) {
		foreach (BestkitCheckoutValue::returnValuesByAddressId($params['object']->id) as $row) {
			$checkoutValueObj = new BestkitCheckoutValue($row['id_bestkit_checkout_value']);
			$checkoutValueObj->delete();
		}
	}

    public function hookOrderConfirmation($params)
    {
		if (!isset($params['objOrder']))
			$params['objOrder'] = $params['order'];
	
        //insert values for fields visible for admin, but don't visible for customers
        $sql = 'SELECT f.*, fl.*
            FROM `' . _DB_PREFIX_ . 'bestkit_checkout_field` f
			LEFT JOIN `' . _DB_PREFIX_ . 'bestkit_checkout_field_lang` fl ON (f.`id_bestkit_checkout_field` = fl.`id_bestkit_checkout_field` AND fl.`id_lang` = ' . (int)$this->context->language->id . ')
            WHERE `step` != "address"
				AND f.`active` = 1
            GROUP BY f.`id_bestkit_checkout_field`
            ORDER BY f.position';
        $hidden_fields = Db::getInstance()->ExecuteS($sql);

        foreach ($hidden_fields as $hidden_field) {
            $value = Db::getInstance()->getValue('
                select id_bestkit_checkout_value
                from `' . _DB_PREFIX_ . 'bestkit_checkout_value`
                where 1
                    AND `id_cart` = '.(int)$params['objOrder']->id_cart.'
                    AND `id_bestkit_checkout_field` = '.(int)$hidden_field['id_bestkit_checkout_field'].'
            ');
            if (!$value) {
                $checkoutValueObj = BestkitCheckoutValue::loadByIds($hidden_field['id_bestkit_checkout_field'], $params['objOrder']->id_cart);
                $checkoutValueObj->id_cart = $params['objOrder']->id_cart;
                $checkoutValueObj->id_order = $params['objOrder']->id;
                $checkoutValueObj->value = $hidden_field['default_value']; //default value
                $checkoutValueObj->id_bestkit_checkout_field = $hidden_field['id_bestkit_checkout_field'];
                $checkoutValueObj->save();
            }
        }
        unset($hidden_field);
    }
/*	
	public function function checkRequiredValue($value) {
		if (trim($value) === '') {
			die(Tools::jsonEncode(array(
				'error' => $this->module->l('This is mandatory field, please enter correct value.'),
			)));
		}
		
		return TRUE;
	}
*/
//Denis:

	public function hookActionObjectCustomerDeleteAfter($params)
	{
		$id_customer = (int)$params['object']->id;
		if ($id_customer) {
			@self::deleteUserFiles($this->getLocalPath() . BestKitCustomerFields::FILES_DIR . '/' . $id_customer);
			Db::getInstance()->Execute('
				DELETE FROM `' . _DB_PREFIX_ . 'bestkit_customerfields_customer`
				WHERE `id_customer` = ' . $id_customer . ';
			');
		}
	}

	public function hookActionCustomerAccountAdd($params)
	{
		$result = BestKitCustomerFields::saveAttributes('create', $params['newCustomer']->id);
		$this->context->cookie->bestkit_errors = FALSE;
		if (is_array($result)) {
			$this->context->cookie->bestkit_errors = implode('<br/>', $result);
			Tools::redirect($this->context->link->getModuleLink('bestkit_checkoutfields', 'myaccount'));
		}
	}

	public function hookDisplayCustomerAccount($params)
	{
		$groups = Customer::getGroupsStatic($params['cookie']->id_customer);
		$attributes = BestKitCustomerFields::getCollection($groups, 'myaccount');
		if (count($attributes)) {
			$this->context->smarty->assign('customerattributes_path', $this->_path);
			return $this->display(__FILE__, 'my-account.tpl');
		}

		return NULL;
	}
	
	public function hookDisplayCustomerAccountFormTop($params)
	{
		$page = 'create'; 
		if ($this->context->controller->php_self == 'my-account') {
			$page = 'myaccount';
		}

		$_customer = $this->context->customer;
		$attributes = BestKitCustomerFields::getCollection($_customer->getGroups(), $page);

		if (count($attributes)) {
			$this->context->smarty->assign(array(
				'bestkit_customer_id' => (int)$_customer->id,
				'bestkit_attributes' => $attributes,
				'set_enctype' => TRUE,
				'page_name' => $page
			));

			return $this->display(__FILE__, 'createaccount.tpl');
		}

		return NULL;
	}

    public function hookDisplayAdminCustomers($params)
    {
        $id_customer = (int)$params['id_customer'];
        $page = 'both';
		$attributes = BestKitCustomerFields::getCollection(Customer::getGroupsStatic($id_customer), $page);
		if (count($attributes)) {
			if (Tools::getIsset('bestkit_customerfields')) {
				$errors = BestKitCustomerFields::saveAttributes($page);
				$postState = 'alert-success';
				if (is_array($errors)) {
					$postState = 'alert-danger';
					$this->context->smarty->assign('errors', implode('<br/>', $errors));
				}

				$this->context->smarty->assign('postState', $postState);
			}

			$this->context->smarty->assign(array(
				'authCSS' => _THEME_CSS_DIR_ . 'authentication.css',
				'modCSS' => $this->_path . '/views/css/admin/customerfields.css',
				'bestkit_customer_id' => $id_customer,
				'bestkit_attributes' => $attributes,
			));
	
			return $this->display(__FILE__, 'admincustomer.tpl');
		}
		
		return NULL;
    }

	public function getPath()
	{
		return $this->_path;
	}

	public function getLocalPath()
	{
		return $this->local_path;
	}

//End
}
