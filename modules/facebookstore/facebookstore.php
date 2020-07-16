<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * @author    knowband.com <support@knowband.com>
 * @copyright 2017 Knowband
 * @license   see file: LICENSE.txt
 * @category  PrestaShop Module
 *
 * Description
 *
 * Admin can change text color,translations,font style
 */

class Facebookstore extends Module
{
    const TAB_CLASS_NAME = 'AdminKbFacebookProfiles';
    const TAB_CLASS_NAME_CONFIG = 'AdminKbFacebookConfigure';
    public function __construct()
    {
        $this->name = 'facebookstore';
        $this->tab = 'front_office_features';
        $this->version = '1.0.1';
        $this->author = 'Knowband';
        $this->module_key = '353e1b0b6029194b190e52cdfb76b541';
        $this->author_address = '0x2C366b113bd378672D4Ee91B75dC727E857A54A6';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('FB Store free Version');
        $this->description = $this->l('Sell Products by connecting your PrestaShop store to Facebook page');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        if (!parent::install()) {
            return false;
        }
        //Create SQL Table
        $createTableSQL = "CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."kb_facebook_profiles` (
                            `id_kb_facebook_profiles` int(11) NOT NULL AUTO_INCREMENT,
                            `profile_name` varchar(255) NOT NULL,
                            `facebook_page_id` varchar(100) NOT NULL,
                            `facebook_tab_name` varchar(255) NOT NULL,
                            `id_shop` int(11) NOT NULL,
                            `shop_logo` varchar(255) NOT NULL,
                            `banner_path` varchar(255) NOT NULL,
                            `home_page_content` text,
                            `menu_items` varchar(255) NOT NULL,
                            `fb_page_color` varchar(7) NOT NULL,
                            `featured_categories` varchar(255) NOT NULL,
                            `max_no_categories` int(11) NOT NULL,
                            `max_no_products` int(11) NOT NULL,
                            `product_type_to_show` enum('1','2') NOT NULL DEFAULT '1',
                            `featured_product_ids` varchar(100) NOT NULL,
                            `product_image_size` enum('small','big') NOT NULL DEFAULT 'small',
                            `footer_content` text NOT NULL,
                            `status` varchar(20) NOT NULL,
                            `fb_user_id` varchar(50) NOT NULL,
                            `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                            `date_modified` datetime DEFAULT NULL,
                            PRIMARY KEY (`id_kb_facebook_profiles`)
                           )ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

        if (!Db::getInstance()->execute($createTableSQL)) {
            $this->custom_errors[] = $this->l('Error while installing database.');
            return false;
        }
        $this->installTabs();
        return true;
    }

    public function uninstall()
    {
        $this->uninstallTabs();
        if (!parent::uninstall()) {
            return false;
        }
        return true;
    }
    private function installTabs()
    {
        $parentTab = new Tab();
        $parentTab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $parentTab->name[$lang['id_lang']] = $this->l('Facebook Store Profiles');
        }

        $parentTab->class_name = self::TAB_CLASS_NAME;
        $parentTab->module = $this->name;
        $parentTab->active = 0;
        $parentTab->id_parent = 0;
        $parentTab->add();

        $parentTab = new Tab();
        $parentTab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $parentTab->name[$lang['id_lang']] = $this->l('Facebook Store Configuration');
        }

        $parentTab->class_name = self::TAB_CLASS_NAME_CONFIG;
        $parentTab->module = $this->name;
        $parentTab->active = 0;
        $parentTab->id_parent = 0;
        $parentTab->add();
    }
    private function uninstallTabs()
    {
        $parentTab = new Tab(Tab::getIdFromClassName(self::TAB_CLASS_NAME));
        $parentTab->delete();

        $parentTab = new Tab(Tab::getIdFromClassName(self::TAB_CLASS_NAME_CONFIG));
        $parentTab->delete();

        return true;
    }
    public function getContent()
    {
        $action= AdminController::$currentIndex . '&token=' . Tools::getAdminTokenLite('AdminModules');
        $add_profile_action = $this->context->link->getAdminLink('AdminKbFacebookProfiles');
        $this->context->smarty->assign(array(
            'action' => $action,
            'add_profile_action' => $add_profile_action,
            'auth_action' => $this->context->link->getModuleLink('facebookstore', 'authenticate')
        ));
        if (Tools::isSubmit('submitAddconfiguration')) {
            $fb_app_id = Tools::getValue('fb_app_id');
            Configuration::updateValue('FB_STORE_APP_ID', $fb_app_id);
            $this->context->cookie->__set('fb_redirect_success', $this->l('App ID updated successfully.'));
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminKbFacebookProfiles').'&addkb_facebook_profiles');
        }

        if (Configuration::get('FB_STORE_APP_ID')) {
            //Check any profile exist or not, If exist then pick first profile only and redirect on edit page.
            $cehckProfileExistSQL = 'SELECT id_kb_facebook_profiles from '._DB_PREFIX_.'kb_facebook_profiles ORDER BY id_kb_facebook_profiles ASC limit 1';
            $profileId = Db::getInstance()->executeS($cehckProfileExistSQL);
            if (Tools::isEmpty($profileId[0]['id_kb_facebook_profiles'])) {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminKbFacebookProfiles').'&addkb_facebook_profiles');
            } else {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminKbFacebookProfiles').'&updatekb_facebook_profiles&id_kb_facebook_profiles='.(int)$profileId[0]['id_kb_facebook_profiles']);
            }
        } else {
            $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Facebook Settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Facebook App Id'),
                        'desc' => $this->l('APP ID required to setup connection with Facebook'),
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
            $output = null;
            $helper = new HelperForm();
            $helper->show_toolbar = false;
            $helper->default_form_language = $this->context->language->id;

            if (Configuration::get('FB_STORE_APP_ID')) {
                $fb_app_id = Configuration::get('FB_STORE_APP_ID');
            } else {
                $fb_app_id = '';
            }
            $this->context->smarty->assign('fb_app_id', $fb_app_id);
            $helper->fields_value['fb_app_id'] = $fb_app_id;
            $form = $helper->generateForm(array($fields_form));
            $this->context->smarty->assign('firstCall', false);
            $this->context->smarty->assign('mod_dir', _PS_BASE_URL_ . _MODULE_DIR_);
            $this->context->smarty->assign('form', $form);
            $tpl = 'Form_config.tpl';
            $helper = new Helper();
            $helper->submit_action = 'submit' . $this->name;
            ;
            $helper->module = $this;
            $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
            $helper->override_folder = 'helpers/';
            $helper->base_folder = 'form/';
            $html = $this->context->smarty->fetch(_PS_MODULE_DIR_ . "facebookstore/views/templates/admin/_configure/helpers/form/".$tpl);
            $helper->setTpl($html);
            //$html = $helper->generate();
            $output = $output . $html;
            $this->context->controller->addCSS($this->_path . 'views/css/admin/facebookstore.css');
            $this->context->controller->addjs($this->_path . 'views/js/velovalidation.js');
            $this->context->controller->addjs($this->_path . 'views/js/admin/script_fb.js');
            return $output;
            //echo $this->context->smarty->fetch(_PS_MODULE_DIR_ . "facebookstore/views/templates/admin/_configure/helpers/view/facebook_connect.tpl");die;
        }
    }

    public function getPath()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $custom_ssl_var = 1;
        } else {
            $custom_ssl_var = 0;
        }
        if ((bool) Configuration::get('PS_SSL_ENABLED') && $custom_ssl_var == 1) {
            $module_dir = _PS_BASE_URL_SSL_ . __PS_BASE_URI__;
        } else {
            $module_dir = _PS_BASE_URL_ . __PS_BASE_URI__;
        }
        return $module_dir;
    }
}
