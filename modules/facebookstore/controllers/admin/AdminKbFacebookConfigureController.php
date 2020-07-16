<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * @author    knowband.com <support@knowband.com>
 * @copyright 2017 knowband
 * @license   see file: LICENSE.txt
 * @category  PrestaShop Module
 */

class AdminKbFacebookConfigureController extends ModuleAdminController
{

    public function __construct()
    {
        $this->bootstrap = true;
        $this->name = 'configure';
        $this->context      = Context::getContext();
        
        parent::__construct();
    }
    
    public function initContent()
    {
        parent::initContent();
    }
    
    public function init()
    {
        if (Tools::isSubmit('submitAddconfiguration')) {
            $fb_app_id = Tools::getValue('fb_app_id');
            Configuration::updateValue('FB_STORE_APP_ID', $fb_app_id);
            $this->context->cookie->__set('fb_redirect_success', $this->l('App ID updated successfully.'));
            $cehckProfileExistSQL = 'SELECT id_kb_facebook_profiles from '._DB_PREFIX_.'kb_facebook_profiles ORDER BY id_kb_facebook_profiles ASC limit 1';
            $profileId = Db::getInstance()->executeS($cehckProfileExistSQL);
            if (Tools::isEmpty($profileId[0]['id_kb_facebook_profiles'])) {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminKbFacebookProfiles').'&addkb_facebook_profiles');
            } else {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminKbFacebookProfiles').'&updatekb_facebook_profiles&id_kb_facebook_profiles='.(int)$profileId[0]['id_kb_facebook_profiles']);
            }
        }
        parent::init();
    }
    
    
    public function renderForm()
    {
        $output = $this->content;
            $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->module->l('Facebook Settings', 'AdminKbFacebookConfigureController'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Facebook App Id', 'AdminKbFacebookConfigureController'),
                        'desc' => $this->module->l('APP ID required to setup connection with Facebook', 'AdminKbFacebookConfigureController'),
                        'name' => 'fb_app_id',
                        'required' => true
                    ),
                ),
                'buttons' => array(
                    array(
                            'class' => 'btn btn-default pull-right fb_connect_button',
                            'name' => 'submit_gs_btn',
                            'id' => 'submit_gs_btn',
                            'title' => $this->l('Next'),
                            'icon' => 'process-icon-next'
                        )
                    )
            )
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->default_form_language = $this->context->language->id;
        $this->available_tabs = array('config');
        if (Configuration::get('FB_STORE_APP_ID')) {
            $fb_app_id = Configuration::get('FB_STORE_APP_ID');
        } else {
            $fb_app_id = '';
        }
        $helper->fields_value['fb_app_id'] = $fb_app_id;
        $this->context->smarty->assign('fb_app_id', $fb_app_id);
         $form = $helper->generateForm(array($fields_form));
         $this->context->smarty->assign('firstCall', false);
        $this->context->smarty->assign('mod_dir', _PS_BASE_URL_ . _MODULE_DIR_);
        $this->context->smarty->assign('form', $form);
        $this->context->smarty->assign('action_config_reset', $this->context->link->getAdminLink('AdminKbFacebookConfigure'));
        //global $cookie;
        $tab = 'AdminModules';
        $token = Tools::getAdminTokenLite('AdminModules');
        $url = 'index.php?controller=AdminModules&token=' . $token.'&configure=facebookstore&tab_module=front_office_features&module_name=facebookstore';
        $this->context->smarty->assign('action_config', $url);
        return $output = $output . $form;
        
    }
    
    public function renderList()
    {
        $form = $this->renderForm();

        $this->context->smarty->assign('form', $form);
        $tpl = 'Form_config_reset.tpl';
        return $this->context->smarty->fetch(_PS_MODULE_DIR_ . "facebookstore/views/templates/admin/_configure/helpers/form/".$tpl);

    }
    public function getPath()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $custom_ssl_var = 1;
        } else {
            $custom_ssl_var = 0;
        }
        if ((bool) Configuration::get('PS_SSL_ENABLED') && $custom_ssl_var == 1) {
            $module_dir = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ ;
        } else {
            $module_dir = _PS_BASE_URL_ . __PS_BASE_URI__;
        }
        
        return $module_dir;
    }
    
     // function to create form using helper
    public function getform($field_form, $languages, $field_value, $id, $action)
    {
        $helper = new HelperForm();
        $helper->module = $this;
        $helper->fields_value = $field_value;
        $helper->name_controller = 'adminkbfacebookconfigure';
        $helper->languages = $languages;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->default_form_language = $this->context->language->id;
        $helper->token = Tools::getAdminTokenLite('AdminKbConfigure');
        $helper->currentIndex = self::$currentIndex;
        ;
        $helper->show_toolbar = true;
        $helper->toolbar_scroll = true;
        $helper->show_cancel_button = false;
        return $helper->generateForm(array('form' => $field_form));
    }

    //Set JS and CSS
    public function setMedia($isNewTheme = false)
    {
        parent::setMedia();
        $this->addJs(_MODULE_DIR_ . 'facebookstore/views/js/velovalidation.js');
        $this->addCSS(_MODULE_DIR_.'facebookstore/views/css/admin/facebookstore.css');
        $this->addJs(_MODULE_DIR_ . 'facebookstore/views/js/admin/script_fb.js');
    }
    // Get module directory url
    private function getModuleDirUrl()
    {
        $module_dir = '';
        if ($this->checkSecureUrl()) {
            $module_dir = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . str_replace(_PS_ROOT_DIR_ . '/', '', _PS_MODULE_DIR_);
        } else {
            $module_dir = _PS_BASE_URL_ . __PS_BASE_URI__ . str_replace(_PS_ROOT_DIR_ . '/', '', _PS_MODULE_DIR_);
        }
        return $module_dir;
    }
    
    //Get Root directory URL
    private function getRootDirUrl()
    {
        $root_dir = '';
        if ($this->checkSecureUrl()) {
            $root_dir = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ ;
        } else {
            $root_dir = _PS_BASE_URL_ . __PS_BASE_URI__ ;
        }
        return $root_dir;
    }
    //Get Secured URL
    private function checkSecureUrl()
    {
        $custom_ssl_var = 0;
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $custom_ssl_var = 1;
        }
        if ((bool) Configuration::get('PS_SSL_ENABLED') && $custom_ssl_var == 1) {
            return true;
        } else {
            return false;
        }
    }
}
