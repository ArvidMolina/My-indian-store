<?php
/**
* Registration Fields
*
* NOTICE OF LICENSE
*
* You are not authorized to modify, copy or redistribute this file.
* Permissions are reserved by FME Modules.
*
*  @author    FME Modules
*  @copyright 2018 FME Modules All right reserved
*  @license   FMM Modules
*  @package   Registration Fields
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once(_PS_MODULE_DIR_.'registrationfields/models/Fields.php');
class RegistrationFields extends Module
{
    private $tabParentClass = null;
    private $tabClass       = 'AdminRegistration';
    private $tabModule      = 'registrationfields';
    private $tabName        = 'Registration Fields';
    public $trans           = array();
    protected $id_shop      = null;
    protected $id_shop_group = null;
    public function __construct()
    {
        $this->name         = 'registrationfields';
        $this->tab          = 'front_office_features';
        $this->version      = '1.6.0';
        $this->author       = 'FMM Modules';
        $this->module_key   = '188a2720a62a6c8135ba9487eeac1755';
        $this->author_address = '0xcC5e76A6182fa47eD831E43d80Cd0985a14BB095';

        parent::__construct();

        $this->bootstrap = true;
        
        $this->displayName  = $this->l('Registration Fields');
        $this->description  = $this->l('This module allows you to add custom fields in customer registration form.');
        $this->trans = array(
            'invalid' => $this->l('is invalid.'),
            'required' => $this->l('is required.'),
            'type' => $this->l('invalid file type.'),
            'size' => $this->l('size exceeds the limit.'),
            'upload_error' => $this->l('An error occurred while attempting to upload the file.'),
            'update_success' => $this->l('Registration fields updated successfully.')
        );
        $this->file_errors = array(
            'UPLOAD_ERR_INI_SIZE' => $this->l('The uploaded file exceeds the upload_max_filesize directive in php.ini'),
            'UPLOAD_ERR_FORM_SIZE' => $this->l('The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form'),
            'UPLOAD_ERR_PARTIAL' => $this->l('The uploaded file was only partially uploaded.'),
            'UPLOAD_ERR_NO_FILE' => $this->l('No file was uploaded.'),
            'UPLOAD_ERR_NO_TMP_DIR' => $this->l('Missing a temporary folder.'),
            'UPLOAD_ERR_CANT_WRITE' => $this->l('Failed to write file to disk.'),
            'UPLOAD_ERR_EXTENSION' => $this->l('A PHP extension stopped the file upload.')
        );

        if ($this->id_shop === null || !Shop::isFeatureActive()) {
            $this->id_shop = Shop::getContextShopID();
        } else {
            $this->id_shop = $this->context->shop->id;
        }
        if ($this->id_shop_group === null || !Shop::isFeatureActive()) {
            $this->id_shop_group = Shop::getContextShopGroupID();
        } else {
            $this->id_shop_group = $this->context->shop->id_shop_group;
        }
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        
        mkdir(_PS_UPLOAD_DIR_.$this->name, 0777, true);
        if (!$this->existsTab($this->tabClass)) {
            if (!$this->addTab($this->tabClass, 0)) {
                return false;
            }
        }
        
        Configuration::updateValue('REGISTRATION_FIELDS_BOCUST', 1);
        Configuration::updateValue('REGISTRATION_FIELDS_BOORDER', 1);
        Configuration::updateValue('REGISTRATION_FIELDS_BOINV', 1);
        Configuration::updateValue('REGISTRATION_FIELDS_FOSEC', 1);
        Configuration::updateValue('REGISTRATION_FIELDS_FOINFO', 1);

        Configuration::updateValue('REGISTRATION_FIELDS_HEADING', array($this->context->language->id => $this->l('Registration Fields')));
        if (Tools::version_compare(_PS_VERSION_, '1.6.0.0', '<')) {
            copy(_PS_MODULE_DIR_.$this->name.'/views/img/AdminRegistration.gif', _PS_MODULE_DIR_.$this->name.'/AdminRegistration.gif');
        }
        
        include dirname(__FILE__).'/sql/install.php';
        if (!parent::install()
            || !$this->registerHook('footer')
            || !$this->registerHook('header')
            || !$this->registerHook('ModuleRoutes')
            || !$this->registerHook('createAccountForm')
            || !$this->registerHook('displayAdminOrder')
            || !$this->registerHook('displayPDFInvoice')
            || !$this->registerHook('displayCustomerAccount')
            || !$this->registerHook('displayBackOfficeHeader')
            || !$this->registerHook('displayCustomerAccountForm')
            || !$this->registerHook('actionCustomerAccountAdd')
            || !$this->registerHook('actionCustomerAccountUpdate')
            || !$this->registerHook('actionBeforeSubmitAccount')
            || !$this->registerHook('actionObjectDeleteAfter')
            || !$this->registerHook('registerGDPRConsent')
            || !$this->registerHook('actionDeleteGDPRCustomer')
            || !$this->registerHook('actionExportGDPRData')) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        rename(_PS_UPLOAD_DIR_.$this->name, _PS_UPLOAD_DIR_.$this->name.'_'.time());
        if (!$this->removeTab($this->tabClass)) {
            return false;
        }

        include dirname(__FILE__).'/sql/uninstall.php';

        $this->unregisterHook('footer');
        $this->unregisterHook('header');
        $this->unregisterHook('ModuleRoutes');
        $this->unregisterHook('createAccountForm');
        $this->unregisterHook('displayAdminOrder');
        $this->unregisterHook('displayPDFInvoice');
        $this->unregisterHook('displayCustomerAccount');
        $this->unregisterHook('displayBackOfficeHeader');
        $this->unregisterHook('displayCustomerAccountForm');
        $this->unregisterHook('actionCustomerAccountAdd');
        $this->unregisterHook('actionCustomerAccountUpdate');
        $this->unregisterHook('actionBeforeSubmitAccount');
        $this->unregisterHook('actionObjectDeleteAfter');
        $this->unregisterHook('registerGDPRConsent');
        $this->unregisterHook('actionDeleteGDPRCustomer');
        $this->unregisterHook('actionExportGDPRData');
        Configuration::deleteByName('REGISTRATION_FIELDS_HEADING');
        Configuration::deleteByName('REGISTRATION_FIELDS_BOCUST');
        Configuration::deleteByName('REGISTRATION_FIELDS_BOORDER');
        Configuration::deleteByName('REGISTRATION_FIELDS_BOINV');
        Configuration::deleteByName('REGISTRATION_FIELDS_FOSEC');
        Configuration::deleteByName('REGISTRATION_FIELDS_FOINFO');

        parent::uninstall();
        if (Tools::version_compare(_PS_VERSION_, '1.6.0.0', '<')) {
            unlink(_PS_MODULE_DIR_.$this->name.'/AdminRegistration.gif');
        }
        return true;
    }

    private function addTab($tabClass, $id_parent)
    {
        $tab = new Tab();
        $tab->class_name = $tabClass;
        $tab->id_parent = $id_parent;
        $tab->module = $this->tabModule;
        $tab->name[(int)(Configuration::get('PS_LANG_DEFAULT'))] = $this->l('Registration Fields');
        $tab->add();

        $subtab = new Tab();
        $subtab->class_name = 'AdminRegistrationFields';
        $subtab->id_parent = Tab::getIdFromClassName($tabClass);
        $subtab->module = $this->tabModule;
        $subtab->name[(int)(Configuration::get('PS_LANG_DEFAULT'))] = $this->l('Manage Registration Fields');
        $subtab->add();

        $subtab1 = new Tab();
        $subtab1->class_name = 'AdminCustomerRegistrationFields';
        $subtab1->id_parent = Tab::getInstanceFromClassName('AdminCustomers')->id_parent;
        $subtab1->module = $this->tabModule;
        $subtab1->name[(int)Configuration::get('PS_LANG_DEFAULT')] = $this->l('Registration Fields');
        $subtab1->add();

        return true;
    }

    private function removeTab($tabClass)
    {
        $idTab = Tab::getIdFromClassName($tabClass);
        if ($idTab != 0) {
            $tab = new Tab($idTab);
            $tab->delete();
        }

        $idTab1 = Tab::getIdFromClassName('AdminRegistrationFields');
        if ($idTab1 != 0) {
            $tab = new Tab($idTab1);
            $tab->delete();
        }

        $idTab2 = Tab::getIdFromClassName('AdminCustomerRegistrationFields');
        if ($idTab2 != 0) {
            $tab = new Tab($idTab2);
            $tab->delete();
        }
        
        return true;
    }

    private function existsTab($tabClass)
    {
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('SELECT id_tab AS id FROM `'._DB_PREFIX_.'tab` t
            WHERE LOWER(t.`class_name`) = \''.pSQL($tabClass).'\'');

        if (count($result) == 0) {
            return false;
        }
        return true;
    }

    public function getContent()
    {
        $output = '';
        if (Tools::isSubmit('submitConfiguration')) {
            $message_trads = array();
            foreach ($_POST as $key => $value) {
                if (preg_match('/REGISTRATION_FIELDS_HEADING_/i', $key)) {
                    $id_lang = preg_split('/REGISTRATION_FIELDS_HEADING_/i', $key);
                    $message_trads[(int)$id_lang[1]] = $value;
                }
            }
            Configuration::updateValue('REGISTRATION_FIELDS_HEADING', $message_trads, true);
            Configuration::updateValue('REGISTRATION_FIELDS_BOCUST', Tools::getValue('REGISTRATION_FIELDS_BOCUST'));
            Configuration::updateValue('REGISTRATION_FIELDS_BOORDER', Tools::getValue('REGISTRATION_FIELDS_BOORDER'));
            Configuration::updateValue('REGISTRATION_FIELDS_BOINV', Tools::getValue('REGISTRATION_FIELDS_BOINV'));
            Configuration::updateValue('REGISTRATION_FIELDS_FOSEC', Tools::getValue('REGISTRATION_FIELDS_FOSEC'));
            Configuration::updateValue('REGISTRATION_FIELDS_FOINFO', Tools::getValue('REGISTRATION_FIELDS_FOINFO'));
            $output .= $this->displayConfirmation($this->l('Configuration updated'));
        }
        return $output.$this->renderForm();
    }

    public function renderForm()
    {
        $radio = (Tools::version_compare(_PS_VERSION_, '1.6', '>='))? 'switch' : 'radio';
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Configuration'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type'  => 'text',
                        'lang'  => true,
                        'label' => $this->l('Registration Fields Heading:'),
                        'name'  => 'REGISTRATION_FIELDS_HEADING',
                        'col' => 6
                    ),
                    array(
                        'type' => $radio,
                        'label' => $this->l('Show Fields on Admin Customer Detail Page'),
                        'desc' => $this->l('Display registration fields in admin customer detail page.'),
                        'name' => 'REGISTRATION_FIELDS_BOCUST',
                        'values' => array(
                            array(
                                'id' => 'REGISTRATION_FIELDS_BOCUST_on',
                                'value' => 1,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'REGISTRATION_FIELDS_BOCUST_off',
                                'value' => 0,
                                'label' => $this->l('No')
                            )
                        )
                    ),
                    array(
                        'type' => $radio,
                        'label' => $this->l('Show Fields on Admin Order Detail Page'),
                        'desc' => $this->l('Display registration fields in admin order detail page.'),
                        'name' => 'REGISTRATION_FIELDS_BOORDER',
                        'values' => array(
                            array(
                                'id' => 'REGISTRATION_FIELDS_BOORDER_on',
                                'value' => 1,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'REGISTRATION_FIELDS_BOORDER_off',
                                'value' => 0,
                                'label' => $this->l('No')
                            )
                        )
                    ),
                    array(
                        'type' => $radio,
                        'label' => $this->l('Show Fields on Invoice Page'),
                        'desc' => $this->l('Display registration fields in invoice.'),
                        'name' => 'REGISTRATION_FIELDS_BOINV',
                        'values' => array(
                            array(
                                'id' => 'REGISTRATION_FIELDS_BOINV_on',
                                'value' => 1,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'REGISTRATION_FIELDS_BOINV_off',
                                'value' => 0,
                                'label' => $this->l('No')
                            )
                        )
                    ),
                    array(
                        'type' => $radio,
                        'label' => $this->l('Show Fields on My Account'),
                        'desc' => $this->l('Display separate section for registration fields in My account section'),
                        'name' => 'REGISTRATION_FIELDS_FOSEC',
                        'values' => array(
                            array(
                                'id' => 'REGISTRATION_FIELDS_FOSEC_on',
                                'value' => 1,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'REGISTRATION_FIELDS_FOSEC_off',
                                'value' => 0,
                                'label' => $this->l('No')
                            )
                        )
                    ),
                    array(
                        'type' => $radio,
                        'label' => $this->l('Show Fields on Information/Registration'),
                        'desc' => $this->l('Display registration fields in My Information under My account section or during new customer registration.'),
                        'name' => 'REGISTRATION_FIELDS_FOINFO',
                        'values' => array(
                            array(
                                'id' => 'REGISTRATION_FIELDS_FOINFO_on',
                                'value' => 1,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'REGISTRATION_FIELDS_FOINFO_off',
                                'value' => 0,
                                'label' => $this->l('No')
                            )
                        )
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitConfiguration';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );
        return $helper->generateForm(array($fields_form));
    }

    public function getConfigFieldsValues()
    {
        $return = array(
            'REGISTRATION_FIELDS_BOCUST' => Configuration::get('REGISTRATION_FIELDS_BOCUST', null, $this->id_shop_group, $this->id_shop),
            'REGISTRATION_FIELDS_BOORDER' => Configuration::get('REGISTRATION_FIELDS_BOORDER', null, $this->id_shop_group, $this->id_shop),
            'REGISTRATION_FIELDS_BOINV' => Configuration::get('REGISTRATION_FIELDS_BOINV', null, $this->id_shop_group, $this->id_shop),
            'REGISTRATION_FIELDS_FOSEC' => Configuration::get('REGISTRATION_FIELDS_FOSEC', null, $this->id_shop_group, $this->id_shop),
            'REGISTRATION_FIELDS_FOINFO' => Configuration::get('REGISTRATION_FIELDS_FOINFO', null, $this->id_shop_group, $this->id_shop),
        );
        foreach (Language::getLanguages(false) as $lang) {
            $return['REGISTRATION_FIELDS_HEADING'][(int)$lang['id_lang']] = Tools::getValue('REGISTRATION_FIELDS_HEADING_'.(int)$lang['id_lang'], Configuration::get('REGISTRATION_FIELDS_HEADING', (int)$lang['id_lang']));
        }
        return $return;
    }

    public function hookBackOfficeHeader()
    {
        $this->context->controller->addCSS(($this->_path).'views/css/admin.css');
        $id_customer = Tools::getValue('id_customer');
        if ($this->context->controller->controller_name == 'AdminCustomers' && !empty($id_customer) && Configuration::get('REGISTRATION_FIELDS_BOCUST', null, $this->id_shop_group, $this->id_shop) == 1) {
            $html_data_file = $this->showCustomerFields($id_customer);
            $custom_fields = preg_replace('/^\s+|\n|\r|\s+$/m', '', addslashes($html_data_file));
            $script = '<script type=\'text/javascript\'>$(function(){';
            $script .= 'addRegistrationFields("'.$custom_fields.'");';
            $script .= '});</script>';
            return $script;
        }
    }

    public function hookHeader()
    {
        if (Configuration::get('REGISTRATION_FIELDS_FOSEC', null, $this->context->shop->id_shop_group, $this->context->shop->id) == 1 || Configuration::get('REGISTRATION_FIELDS_FOINFO', null, $this->context->shop->id_shop_group, $this->context->shop->id) == 1) {
            $this->context->smarty->assign(array('ps_version' => _PS_VERSION_));
            $this->context->controller->addjQueryPlugin(array('date'));
            $this->context->controller->addJqueryUI(array('ui.slider', 'ui.datepicker'));
            $this->context->controller->addCSS($this->_path.'views/css/registrationfields.css', 'all');
            $this->context->controller->addJS($this->_path.'views/js/registrationfields.js');
            Media::addJsDef(array('is_required_label' => ' '. $this->l('is required')));
            if ($this->context->controller->php_self == 'order'
                || $this->context->controller->php_self == 'identity'
                || $this->context->controller->php_self == 'authentication') {
                Media::addJsDef(array(
                    'action_url' => $this->context->link->getModuleLink(
                        $this->name,
                        'ajax',
                        array('action' => 'CheckFields', 'ajax' => true),
                        true
                    ),
                    'pv' => (string)_PS_VERSION_,
                    'cc' => $this->context->controller->php_self
                ));
                $this->context->controller->addJS($this->_path.'views/js/registrationfields_order.js');
            }

            if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') == true) {
                $this->context->controller->registerStylesheet('jquery-ui-timepicker-addon', '/js/jquery/plugins/timepicker/jquery-ui-timepicker-addon.css', array('media' => 'all', 'priority' => 500));
                $this->context->controller->registerStylesheet('custom_design', 'modules/'.$this->name.'/views/css/customfields.css', array('media' => 'all', 'priority' => 600));

                $this->context->controller->registerJavascript('jquery-ui-timepicker-addon', '/js/jquery/plugins/timepicker/jquery-ui-timepicker-addon.js', array('position' => 'top', 'priority' => 500));
                $this->context->controller->registerJavascript('validate_registration_fields', 'modules/'.$this->name.'/views/js/validate_registration_fields.js', array('position' => 'bottom', 'priority' => 501));

                
            } else {
                $this->context->controller->addCSS(array(_PS_JS_DIR_.'jquery/plugins/timepicker/jquery-ui-timepicker-addon.css'));
                $this->context->controller->addCSS(($this->_path).'views/css/customfields.css', 'all');
                $this->context->controller->addJS(array(_PS_JS_DIR_.'jquery/plugins/timepicker/jquery-ui-timepicker-addon.js'));
                $this->context->controller->addJS(($this->_path).'views/js/validate_registration_fields.js');
            }
        }
    }

    public function hookModuleRoutes()
    {
        return array(
            'module-'.$this->name.'-myinfo' => array(
                'controller' => 'myinfo',
                'rule' => 'extra-fields',
                'keywords' => array(),
                'params' => array(
                    'fc' => 'module',
                    'module' => $this->name,
                ),
            ),
            'module-'.$this->name.'-ajax' => array(
                'controller' => 'ajax',
                'rule' => 'ajax-fields',
                'keywords' => array(),
                'params' => array(
                    'fc' => 'module',
                    'module' => $this->name,
                ),
            )
        );
    }

    public function hookActionCustomerAccountAdd($params)
    {
        if (Configuration::get('REGISTRATION_FIELDS_FOINFO', null, $this->context->shop->id_shop_group, $this->context->shop->id) == 1) {
            $id_customer = (isset($params) && isset($params['newCustomer']))? $params['newCustomer']->id : ((isset($params) && isset($params['customer']))? $params['customer']->id : null);
            if (Tools::getValue('fields')) {
                $objModel = new Fields();
                $id_guest = Fields::getGuestId($id_customer);
                if ($id_guest) {
                    $objModel->updateGuestFields($id_guest, $id_customer);
                }
                $result = $objModel->saveFieldValues(Tools::getValue('fields'), $id_customer);
                if (isset($result)) {
                    if ($result['result'] == false && isset($result['errors'])) {
                        foreach ($result['errors'] as $error) {
                            $this->context->controller->errors[] = $error;
                        }
                        $this->context->controller->errors;
                    } elseif ($result['result'] == true) {
                        if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
                            $this->context->controller->success[] = $this->l('Registration fields updated successfully.');
                        } else {
                            $this->context->controller->confirmations[] = $this->l('Registration fields updated successfully.');
                        }
                    }
                }
            }
        }
    }

    public function hookActionCustomerAccountUpdate($params)
    {
        return $this->hookActionCustomerAccountAdd($params);
    }

    public function hookDisplayCustomerAccount()
    {
        if (Configuration::get('REGISTRATION_FIELDS_FOSEC', null, $this->context->shop->id_shop_group, $this->context->shop->id) == 1) {
            $fields = Fields::getCustomFields($this->context->language->id, $this->context->shop->id);
            $ps_17 = (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') == true) ? 1 : 0;
            $this->context->smarty->assign('ps_17', (int)$ps_17);
            if ($fields) {
                return $this->display(__FILE__, 'my-account.tpl');
            }
        }
    }
    
    public function hookActionBeforeSubmitAccount()
    {
        if (Configuration::get('REGISTRATION_FIELDS_FOINFO', null, $this->context->shop->id_shop_group, $this->context->shop->id) == 1) {
            if (Tools::getValue('fields') || isset($_FILES)) {
                $objModel = new Fields();
                $result = $objModel->fieldValidate(Tools::getValue('fields'), $this->context->customer->id);
                if (isset($result) && count($result) > 0) {
                    foreach ($result as $item) {
                        $this->context->controller->errors[] = $item;
                    }

                    if ($this->context->controller->errors) {
                        return false;
                    }
                } else {
                    return true;
                }
            }
        }
    }

    public function hookActionSubmitAccountBefore()
    {
        return $this->hookActionBeforeSubmitAccount();
    }

    public function hookCreateAccountForm()
    {
        if (Configuration::get('REGISTRATION_FIELDS_FOINFO', null, $this->context->shop->id_shop_group, $this->context->shop->id) == 1) {
            if (Tools::version_compare(_PS_VERSION_, '1.6.0.0', '<') == true) {
                return $this->hookDisplayCustomerAccountForm();
            }
        }
    }

    public function hookDisplayCustomerIdentityForm()
    {
        return $this->hookDisplayCustomerAccountForm();
    }

    public function hookDisplayCustomerAccountForm()
    {
        if (Configuration::get('REGISTRATION_FIELDS_FOINFO', null, $this->context->shop->id_shop_group, $this->context->shop->id) == 1) {
            $id_lang = $this->context->language->id;
            $objModel = new Fields();
            $registration_fields = $objModel->getCustomFields($id_lang);
            $id_customer = (isset($this->context->customer->id))?$this->context->customer->id : $this->context->cookie->id_customer;
            $id_guest = (!$id_customer)? $this->context->cookie->id_guest : 0;
            $field = new Fields();
            $fields = array();
            if ($id_customer || $id_guest) {
                $fields = $field->getAllFields(
                    (($id_customer)? 'val.id_customer = '.(int)$id_customer : 'val.id_guest = '.(int)$id_guest),
                    $id_lang,
                    'a.position'
                );
                if (isset($fields) && $fields) {
                    foreach ($fields as &$field) {

                        if (($field['field_type'] == 'multiselect' && $field['field_value_id'])
                            || ($field['field_type'] == 'radio' && $field['field_value_id'])
                            || ($field['field_type'] == 'checkbox' && $field['field_value_id'])
                            ) {

                            $field['field_value'] = explode(',', $field['field_value_id']);

                        } elseif (($field['field_type'] == 'message' && $field['field_value_id'])
                            || ($field['field_type'] == 'select' && $field['field_value_id'])
                            ) {

                            $field['field_value'] = $field['field_value_id'];
                        }
                    }
                }
            }

            $registration_fields_options = array();
            foreach ($registration_fields as $sf) {
                $registration_fields_options[$sf['id_custom_field']] = $objModel->getCustomFieldsValues($sf['id_custom_field']);
            }

            if ($registration_fields_options) {
                $this->context->smarty->assign('version', _PS_VERSION_);
                $this->context->smarty->assign('id_guest', $id_guest);
                $this->context->smarty->assign('id_customer', $id_customer);
                $this->context->smarty->assign('id_lang', $this->context->cookie->id_lang);
                $this->context->smarty->assign('summary_fields_values', $registration_fields_options);
                $this->context->smarty->assign('summary_fields', $registration_fields);
                $this->context->smarty->assign('value_reg_fields', $fields);
                $this->context->smarty->assign('REGISTRATION_FIELDS_HEADING', Configuration::get('REGISTRATION_FIELDS_HEADING', $this->context->language->id, $this->context->shop->id_shop_group, $this->context->shop->id));
                $this->context->smarty->assign('actionLink', $this->context->link->getModuleLink($this->name, 'ajax', array('action' => 'download', 'me' => base64_encode($id_customer)), true));
                $ps_17 = (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') == true) ? 1 : 0;
                $this->context->smarty->assign('ps_17', (int)$ps_17);
                if ($ps_17 > 0) {
                    $this->context->smarty->assign('base_dir', _PS_BASE_URL_.__PS_BASE_URI__);
                }

                $this->context->smarty->assign('id_module', $this->id);
                if (Tools::version_compare(_PS_VERSION_, '1.6.0.0', '<') == true) {
                    return $this->display(__FILE__, 'summary_15.tpl');
                } else {
                    return $this->display(__FILE__, 'summary.tpl');
                }
            }
        }
    }

    public function hookDisplayAdminOrder($params)
    {
        if (Configuration::get('REGISTRATION_FIELDS_BOORDER', null, $this->context->shop->id_shop_group, $this->context->shop->id) == 1 && $params['id_order'] && Validate::isLoadedObject($order = new Order((int)$params['id_order']))) {
            return $this->showCustomerFields($order->id_customer);
        }
    }

    public function hookDisplayPDFInvoice($params)
    {
        $orderInvoice = $params['object'];
        if (Configuration::get('REGISTRATION_FIELDS_BOINV', null, $this->context->shop->id_shop_group, $this->context->shop->id) == 1 && isset($orderInvoice) && isset($orderInvoice->id_order) && Validate::isLoadedObject($order = new Order($orderInvoice->id_order))) {
            $this->context->smarty->assign('downloadLink', $this->context->link->getAdminLink('AdminCustomerRegistrationFields'));
            $this->context->smarty->assign('pv', _PS_VERSION_);
            
            $template = dirname(__FILE__).'/views/templates/admin/pdf/pdf_registration.tpl';
            return $this->showCustomerFields($order->id_customer, $template);
        }
    }

    private function showCustomerFields($id_customer, $template = null)
    {
        if (!$id_customer) {
            return '';
        } else {
            $field = new Fields();
            $this->context->controller->addJS(($this->_path).'views/js/registrationfields_admin.js');
            $fields = Fields::getAllFields('val.id_customer = '.(int)$id_customer, null, 'a.position');

            if (!count($fields)) {
                return '';
            }

            $groupedFields = array();
            foreach ($fields as $field) {
                $groupedFields[] = $field;
            }
            $this->context->smarty->assign(array(
                'field' => $field,
                'obj'   => $this,
                'version' => _PS_VERSION_,
                'groupedFields' => $groupedFields,
                'downloadLink' => $this->context->link->getAdminLink('AdminCustomerRegistrationFields'),
                'REGISTRATION_FIELDS_HEADING' => Configuration::get('REGISTRATION_FIELDS_HEADING', $this->context->language->id, $this->context->shop->id_shop_group, $this->context->shop->id),
            ));

            if (!$template) {
                $template = dirname(__FILE__).'/views/templates/admin/admin_customer.tpl';
            }
            return $this->context->smarty->fetch($template);
        }
    }

    public function hookActionObjectDeleteAfter($params)
    {
        $customerObject = (isset($params) && isset($params['object'])? $params['object'] : null);
        if (isset($customerObject) && $customerObject instanceof Customer) {
            Fields::deleteCustomerData($customerObject->id);
        }
    }

     /**
     * GDPR Compliance Hooks
     */
   public function hookActionDeleteGDPRCustomer($customer)
   {
       if (!empty($customer['email']) && Validate::isEmail($customer['email'])) {
           if ($customer['id']) {
                return json_decode(Fields::deleteByCustomer($customer['id']));
            }
           return json_encode($this->l('Registration Fields : Unable to delete customer data.'));
       }
   }

   public function hookActionExportGDPRData($customer)
   {
        if (!empty($customer['email']) && Validate::isEmail($customer['email'])) {
            $customeFieldsData = array();
            $exportData = array();
            $id_lang = $this->context->customer->id_lang;
            $customeFieldsData = Fields::getAllFields('a.active = 1 AND val.id_customer = '.(int)$customer['id'], $id_lang, 'a.position');
           if (isset($customeFieldsData) && $customeFieldsData) {
                foreach ($customeFieldsData as $index => $data) {
                    if (isset($data) && $data) {
                        if ($data['field_type'] == 'image') {
                            $value = __PS_BASE_URI__.str_replace(_PS_ROOT_DIR_.'/', '', $data['value']);
                            $exportData[$index][$data['field_name']] = '<img src="'.$value.'">';
                        } elseif ($data['field_type'] == 'attachment') {
                            $value = Tools::getShopDomain().DIRECTORY_SEPARATOR.__PS_BASE_URI__.str_replace(_PS_ROOT_DIR_.'/', '', $data['value']);
                            $exportData[$index][$data['field_name']] = $value;
                        } elseif (in_array($data['field_type'], array('select', 'multiselect', 'radio', 'checkbox'))) {
                            $value = ($data['field_value_id'])? Fields::getOptionValue($data['field_value_id']) : '';
                            $exportData[$index][$data['field_name']] = $value;
                        } else {
                            $exportData[$index][$data['field_name']] = Fields::getFormatedValue($data);
                        }
                    }
                }
            }

            if (isset($exportData) && $exportData) {
                return json_encode($exportData);
            }
            return json_encode($this->l('registration Fields : There is no data to export.'));
        }
        return json_encode($this->l('registration Fields : Unable to export customer data.'));
   }
}
