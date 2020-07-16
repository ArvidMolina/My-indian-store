<?php
/**
 * 2015 DMConcept
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * @author    Dmconcept <support@dmconcept.fr>
 * @copyright 2015 DMConcept
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

//use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once(dirname(__FILE__).'/classes/dmconcept/DmVersion.php');

class Proaccount extends Module /*implements WidgetInterface*/ // Comment "implements WidgetInterface" if PS_VERSION is 1.6
{
    const TAB_PROACCOUNT_TRANSLATION = 1;
    protected $file_attachment;
    protected $addressForm;
    private $configurationKeys = array(
        'PROACCOUNT_CUSTOMER_GROUP_LIST',
        'PROACCOUNT_PAGE_CMS_ID',
        'PROACCOUNT_REQUIRED_COMPANY',
        'PROACCOUNT_REQUIRED_SIRET',
        'PROACCOUNT_REQUIRED_APE',
        'PROACCOUNT_REQUIRED_WEBSITE',
        'PROACCOUNT_FILE',
        'PROACCOUNT_AUTO_AFFECT_GROUP',
        'PROACCOUNT_DEFAULT_GROUP_ID',
        'PROACCOUNT_REQUIRED_ADDRESS',
        'PROACCOUNT_REGISTER_WITH_ADDRESS',
        'PROACCOUNT_REGISTER_ADDRESS_NORMAL',
        'PROACCOUNT_REGISTER_ADDRESS_PRO',
    );

    // Custom form (1.7)
    private $hooks = array(
        '1.6' => array(
            'header',
            'displayNav',
            'actionObjectAddressDeleteBefore',
            'displayCustomerAccountForm',
            'displayCustomerAccountFormTop',
            'actionCustomerAccountAdd',
        ),
        '1.7' => array(
            'header',
            'displayNav2',
            'actionObjectAddressDeleteBefore',
            'actionCustomerAccountAdd',
            'additionalCustomerFormFields',
            'validateCustomerFormFields',
        ),
    );
    private $meta_pages = array(
        'module-proaccount-default',
        'module-proaccount-authentication',
    );

    public function __construct()
    {
        $this->name = 'proaccount';
        $this->tab = 'front_office_features';
        $this->version = '1.3.2';
        $this->module_key = 'b5bda852cbd4dfb3d58ae2566b8a858a';
        $this->author_address = '0x4a332EE4dA460D7e34C03a7D7bD9335f72338f35';
        $this->author = 'DMConcept';
        $this->need_instance = 1;

        $this->bootstrap = true;

        parent::__construct();


        // List of CMS tabs
        $this->cms_tab = array(
            0 => array(
                'id' => 0,
                'name' => $this->l('None'),
            ),
        );
        foreach (CMS::listCms($this->context->language->id) as $cms_file) {
            $this->cms_tab[] = array('id' => $cms_file['id_cms'], 'name' => $cms_file['meta_title']);
        }

        $this->displayName = $this->l('Pro account');
        $this->description = $this->l('Be alerted when a customer want to register as professional account.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall this module ?');

        if (!Configuration::get('PS_B2B_ENABLE')) {
            $this->warning = $this->l('B2B mode is needed. Please activate it in "Preferences > Customers"');
        }
    }

    public function reset()
    {
        if ($this->uninstall(true)) {
            return $this->install(true);
        }

        return false;
    }

    public function uninstall($keep = false)
    {

        /**
         * Delete all the configuration settings
         */
        foreach ($this->configurationKeys as $key) {
            Configuration::deleteByName($key);
        }

        if (!$keep) {
            include(dirname(__FILE__).'/sql/uninstall.php');
        }

        return parent::uninstall() && $this->uninstallMeta();
    }

    private function uninstallMeta()
    {
        $metas = Meta::getMetas();
        $result = true;
        foreach ($metas as $meta) {
            foreach ($this->meta_pages as $page) {
                if ($meta['page'] === $page) {
                    $m = new Meta((int)$meta['id_meta']);

                    $result &= $m->delete();
                }
            }
        }

        return $result;
    }

    public function install($keep = false)
    {
        Configuration::updateValue('PS_B2B_ENABLE', 1);
        Configuration::updateValue(
            'PROACCOUNT_CUSTOMER_GROUP_LIST',
            serialize(array(Configuration::get('PS_CUSTOMER_GROUP')))
        );
        Configuration::updateValue('PROACCOUNT_PAGE_CMS_ID', 0);
        Configuration::updateValue('PROACCOUNT_REQUIRED_COMPANY', 0);
        Configuration::updateValue('PROACCOUNT_REQUIRED_SIRET', 0);
        Configuration::updateValue('PROACCOUNT_REQUIRED_APE', 0);
        Configuration::updateValue('PROACCOUNT_REQUIRED_WEBSITE', 0);
        Configuration::updateValue('PROACCOUNT_FILE', 0);
        Configuration::updateValue('PROACCOUNT_AUTO_AFFECT_GROUP', 0);
        Configuration::updateValue('PROACCOUNT_DEFAULT_GROUP_ID', (int)Configuration::get('PS_CUSTOMER_GROUP'));
        Configuration::updateValue('PROACCOUNT_REQUIRED_ADDRESS', 0);
        Configuration::updateValue('PROACCOUNT_REGISTER_WITH_ADDRESS', 0);
        Configuration::updateValue('PROACCOUNT_REGISTER_ADDRESS_NORMAL', 0);
        Configuration::updateValue('PROACCOUNT_REGISTER_ADDRESS_PRO', 0);
        include(dirname(__FILE__).'/sql/install.php');
        if (!$keep) {
            include(dirname(__FILE__).'/sql/install_additional.php');
        }
        $parentInstall = parent::install();
        $successHook = true;

        foreach ($this->hooks as $key => $hook) {
            if (Tools::substr(_PS_VERSION_, 0, 3) === $key) {
                foreach ($hook as $aHook) {
                    $successHook &= $this->registerHook($aHook);
                }
            }
        }

        if (DmVersion::isVersion17()) {
            $this->setModuleFirstOnHooks();
        }

        return $successHook
            && $parentInstall
            && $this->installMeta();
    }

    private function setModuleFirstOnHooks()
    {
        $hooks = array(
            'displayNav2',
            'additionalCustomerFormFields',
        );

        foreach ($hooks as $hook) {
            $id_hook = Hook::getIdByName($hook);
            $modules = count(Hook::getModulesFromHook($id_hook));
            $way = 0;
            if (Validate::isLoadedObject($this)) {
                while ($this->updatePosition($id_hook, $way) && $modules > 0) {
                    $modules--;
                }
            }
        }
    }

    private function installMeta()
    {
        $context_language = Context::getContext()->language;
        $languages = Language::getLanguages();
        $result = true;

        foreach ($this->meta_pages as $page) {
            $meta = new Meta();
            $meta->page = $page;
            foreach ($languages as $language) {
                Context::getContext()->language = new Language((int)$language['id_lang']);
                // Needed for urlrewriting pre-translation
                switch ($page) {
                    case 'module-proaccount-default':
                        $meta->title[(int)$language['id_lang']] = $this->l('Pro account');
                        $meta->url_rewrite[(int)$language['id_lang']] = $this->l('professional-account');
                        break;
                    case 'module-proaccount-authentication':
                        $meta->title[(int)$language['id_lang']] = $this->l('Authentication');
                        $meta->url_rewrite[(int)$language['id_lang']] = $this->l('professional-authentication');
                        break;
                }
            }
            $result = $result && $meta->save();
        }
        Context::getContext()->language = $context_language;

        return $result;
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        $this->postProcess();

        return (empty($this->errors) ? '' : $this->displayError($this->errors)).$this->renderForm();
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        if (Tools::isSubmit('submitConfiguratorModule')) {
            //var_dump($_POST);die();
            Configuration::updateValue(
                'PROACCOUNT_AUTO_AFFECT_GROUP',
                Tools::getValue('PROACCOUNT_AUTO_AFFECT_GROUP', 0)
            );
            Configuration::updateValue(
                'PROACCOUNT_DEFAULT_GROUP_ID',
                Tools::getValue('PROACCOUNT_DEFAULT_GROUP_ID', 0)
            );
            Configuration::updateValue(
                'PROACCOUNT_PAGE_CMS_ID',
                Tools::getValue('PROACCOUNT_PAGE_CMS_ID', 0)
            );
            Configuration::updateValue(
                'PROACCOUNT_REQUIRED_COMPANY',
                Tools::getValue('PROACCOUNT_REQUIRED_COMPANY', 0)
            );
            Configuration::updateValue(
                'PROACCOUNT_REQUIRED_SIRET',
                Tools::getValue('PROACCOUNT_REQUIRED_SIRET', 0)
            );
            Configuration::updateValue(
                'PROACCOUNT_REQUIRED_APE',
                Tools::getValue('PROACCOUNT_REQUIRED_APE', 0)
            );
            Configuration::updateValue(
                'PROACCOUNT_REQUIRED_WEBSITE',
                Tools::getValue('PROACCOUNT_REQUIRED_WEBSITE', 0)
            );
            Configuration::updateValue(
                'PROACCOUNT_FILE',
                Tools::getValue('PROACCOUNT_FILE', 0)
            );
            Configuration::updateValue(
                'PROACCOUNT_REGISTER_WITH_ADDRESS',
                Tools::getValue('PROACCOUNT_REGISTER_WITH_ADDRESS', 0)
                && (Tools::getValue('PROACCOUNT_REGISTER_ADDRESS_NORMAL', 0)
                    || Tools::getValue('PROACCOUNT_REGISTER_ADDRESS_PRO', 0))
            );
            Configuration::updateValue(
                'PROACCOUNT_REGISTER_ADDRESS_NORMAL',
                Tools::getValue('PROACCOUNT_REGISTER_ADDRESS_NORMAL', 0)
            );
            Configuration::updateValue(
                'PROACCOUNT_REGISTER_ADDRESS_PRO',
                Tools::getValue('PROACCOUNT_REGISTER_ADDRESS_PRO', 0)
            );
            Configuration::updateValue(
                'PROACCOUNT_REQUIRED_ADDRESS',
                Tools::getValue('PROACCOUNT_REQUIRED_ADDRESS', 0)
            );

            if (!is_array(Tools::getValue('groupBox'))) {
                $this->errors[] = $this->l('At least one group must be selected.');
            } elseif (Configuration::get('PROACCOUNT_AUTO_AFFECT_GROUP')
                && !in_array(Configuration::get('PROACCOUNT_DEFAULT_GROUP_ID'), Tools::getValue('groupBox'))) {
                $this->errors[] = $this->l('A default customer group must be selected in group box.');
                $groups = Tools::getValue('groupBox');
                $groups[] = Configuration::get('PROACCOUNT_DEFAULT_GROUP_ID');
                Configuration::updateValue('PROACCOUNT_CUSTOMER_GROUP_LIST', serialize($groups));
            } else {
                Configuration::updateValue('PROACCOUNT_CUSTOMER_GROUP_LIST', serialize(Tools::getValue('groupBox')));

                $redirect_after = $this->context->link->getAdminLink('AdminModules').
                    '&conf=4'.
                    '&configure='.$this->name.
                    '&module_name='.$this->name;

                Tools::redirectAdmin($redirect_after);
            }
        }
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        Media::addJsDef(array(
            'is_version_17' => DmVersion::isVersion17(),
        ));

        $this->context->controller->addCSS($this->_path.'/views/css/proaccount-admin.css');
        $this->context->controller->addJS($this->_path.'/views/js/admin/adminProaccount'.'.js');

        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitConfiguratorModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        //var_dump($helper->generateForm(array($this->getConfigForm())));die;

        return $helper->generateForm($this->getConfigForm());
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        $return = array();
        $list_groups = Group::getGroups(Context::getContext()->language->id);

        foreach ($list_groups as $key => $group) {
            if ($group['id_group'] === Configuration::get('PS_GUEST_GROUP')
                || $group['id_group'] === Configuration::get('PS_UNIDENTIFIED_GROUP')) {
                unset($list_groups[$key]);
            }
        }

        foreach ($this->configurationKeys as $key) {
            $return[$key] = Configuration::get($key);
        }

        // Added values of PROACCOUNT_CUSTOMER_GROUP_LIST
        $customer_groups = unserialize(Configuration::get('PROACCOUNT_CUSTOMER_GROUP_LIST'));

        // if empty $customer_groups we set the default groups
        if (empty($customer_groups)) {
            $preselected = array(
                Configuration::get('PS_UNIDENTIFIED_GROUP'),
                Configuration::get('PS_GUEST_GROUP'),
                Configuration::get('PS_CUSTOMER_GROUP'),
            );
            $customer_groups = array_merge($customer_groups, $preselected);
        }

        foreach ($list_groups as $key => $group) {
            $return['groupBox_'.$group['id_group']] =
                Tools::getValue('groupBox_'.$group['id_group'], in_array($group['id_group'], $customer_groups));
        }

        return $return;
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        $list_groups = Group::getGroups(Context::getContext()->language->id);

        foreach ($list_groups as $key => $group) {
            if ($group['id_group'] === Configuration::get('PS_GUEST_GROUP')
                || $group['id_group'] === Configuration::get('PS_UNIDENTIFIED_GROUP')) {
                unset($list_groups[$key]);
            }
        }

        //pour les champs radio
        $listRadio = array();
        foreach ($list_groups as $key => $group) {
            if ($group['id_group'] !== Configuration::get('PS_GUEST_GROUP')
                && $group['id_group'] !== Configuration::get('PS_UNIDENTIFIED_GROUP')) {
                $listRadio[] = array(
                    'id' => $key,
                    'value' => $group['id_group'],
                    'label' => $group['name'],
                );
            }
        }

        $form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'tabs' => array(
                    'proaccount' => '<span class="icon-briefcase"></span> '.$this->l('Professional account fields'),
                    'groups' => '<span class="icon-group"></span> '.$this->l('Customer groups fields'),
                    'address' => '<span class="icon-home"></span> '.$this->l('Address fields'),
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Require the customer to keep at least one address'),
                        'name' => 'PROACCOUNT_REQUIRED_ADDRESS',
                        'hint' =>
                            $this->l('If you choose to require the customer to keep at least one address').
                            ', '.
                            $this->l('he will not be able to delete his address if there is only one address'),
                        'tab' => 'address',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Request the customer\'s address when registering'),
                        'name' => 'PROACCOUNT_REGISTER_WITH_ADDRESS',
                        'hint' => $this->l('You have the possibility to add address fields when a customer registers'),
                        'tab' => 'address',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' =>
                            $this->l('Request address information for the creation of a non-professional account'),
                        'name' => 'PROACCOUNT_REGISTER_ADDRESS_NORMAL',
                        'hint' =>
                            $this->l('Show fields to request address information for the creation of a non-professional account'),
                        'tab' => 'address',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Request address information for the creation of a professional account'),
                        'name' => 'PROACCOUNT_REGISTER_ADDRESS_PRO',
                        'hint' =>
                            $this->l('Show fields to request address information for the creation of a professional account'),
                        'tab' => 'address',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Auto affect group'),
                        'name' => 'PROACCOUNT_AUTO_AFFECT_GROUP',
                        'hint' =>
                            $this->l('You have the possibility to define a default customer group for pro accounts'),
                        'tab' => 'groups',
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'radio',
                        'label' => $this->l('Default customer group for auto affectation'),
                        'name' => 'PROACCOUNT_DEFAULT_GROUP_ID',
                        'hint' => $this->l('Define your default customer group'),
                        'tab' => 'groups',
                        'values' => $listRadio,
                    ),
                    array(
                        'type' => 'group',
                        'label' => $this->l('Groups considered as professional accounts'),
                        'name' => 'groupBox',
                        'hint' =>
                            $this->l('Select all the groups that are considered as professional accounts'),
                        'tab' => 'groups',
                        'values' => $list_groups,
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('CMS page for the Pro account presentation'),
                        'name' => 'PROACCOUNT_PAGE_CMS_ID',
                        'hint' => $this->l('Choose the CMS page which contains your pro account\'s page.'),
                        'tab' => 'proaccount',
                        'options' => array(
                            'query' => $this->cms_tab,
                            'id' => 'id',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Make company required'),
                        'name' => 'PROACCOUNT_REQUIRED_COMPANY',
                        'hint' => $this->l('Make company required or not'),
                        'tab' => 'proaccount',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Make SIRET required'),
                        'name' => 'PROACCOUNT_REQUIRED_SIRET',
                        'hint' => $this->l('Make SIRET required or not'),
                        'tab' => 'proaccount',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Make APE number required'),
                        'name' => 'PROACCOUNT_REQUIRED_APE',
                        'hint' => $this->l('Make APE number required or not'),
                        'tab' => 'proaccount',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Make website required'),
                        'name' => 'PROACCOUNT_REQUIRED_WEBSITE',
                        'hint' => $this->l('Make website required or not'),
                        'tab' => 'proaccount',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Add file upload field'),
                        'name' => 'PROACCOUNT_FILE',
                        'hint' => $this->l('Allows your customers to send you a file upon registration'),
                        'tab' => 'proaccount',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );


        return array($form);
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $cssToAdd = DmVersion::isVersion17() ? '/views/css/proaccount-17.css' : '/views/css/proaccount.css';

        $this->context->controller->addCSS($this->_path.$cssToAdd, 'all');
        if (DmVersion::isVersion17()) {
            $this->context->controller->addJS($this->_path.'/views/js/proaccount.js');
        } else {
            if ($this->context->controller->php_self === 'addresses') {
                $this->context->controller->addJS($this->_path.'/views/js/proaccount-addresses.js');
            }

            if ($this->context->controller->php_self === 'authentication') {
                $this->context->controller->addJS($this->_path.'/views/js/proaccount-auth.js');
            }
            return $this->display(__FILE__, 'header.tpl');
        }
    }

    public function hookDisplayCustomerAccountFormTop()
    {
        $this->smarty->assign(array(
            'isPro_authentication' => (
                get_class($this->context->controller) === 'ProaccountAuthenticationModuleFrontController'),
            'register_with_address' =>
                ((int)Configuration::get('PS_REGISTRATION_PROCESS_TYPE') === PS_REGISTRATION_PROCESS_AIO),
            'required_fields' => array(
                'company' => Configuration::get('PROACCOUNT_REQUIRED_COMPANY'),
                'siret' => Configuration::get('PROACCOUNT_REQUIRED_SIRET'),
                'ape' => Configuration::get('PROACCOUNT_REQUIRED_APE'),
                'website' => Configuration::get('PROACCOUNT_REQUIRED_WEBSITE'),
            ),
        ));

        return $this->display(__FILE__, 'displayCustomerAccount.tpl');
    }

    public function hookDisplayCustomerAccountForm()
    {
        $this->smarty->assign(array(
            'isPro_authentication' => (
                get_class($this->context->controller) === 'ProaccountAuthenticationModuleFrontController'),
            'use_fileupload_field' => Configuration::get('PROACCOUNT_FILE'),
            'register_with_address' =>
                ((int)Configuration::get('PS_REGISTRATION_PROCESS_TYPE') === PS_REGISTRATION_PROCESS_AIO),
            'max_upload_size' => (int)Tools::getMaxUploadSize(),
        ));

        return $this->display(__FILE__, 'displayCustomerAccountForm.tpl');
    }

    public function hookDisplayNav()
    {
        if (Configuration::get('PS_B2B_ENABLE')) {
            $this->smarty->assign($this->getWidgetVariables('displayNav'));

            return $this->display(__FILE__, 'nav.tpl');
        }
    }

    public function getWidgetVariables($hookName = null, array $configuration = array())
    {
        return array(
            'display_page_link' => Configuration::get('PROACCOUNT_PAGE_CMS_ID'),
        );
    }

    public function hookDisplayNav2($params)
    {
        return $this->renderWidget('displayNav2', $params);
    }

    public function renderWidget($hookName, array $configuration)
    {
        if (Configuration::get('PS_B2B_ENABLE')) {
            $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

            return $this->fetch('module:'.$this->name.'/views/templates/hook/nav2.tpl');
        }
    }

    /**
     * Verify number of addresses before deleting address.
     *
     * @param type $params
     * @return boolean
     */
    public function hookActionObjectAddressDeleteBefore($params)
    {
        if (Configuration::get('PROACCOUNT_REQUIRED_ADDRESS')) {
            $addresses = $this->getAddressesIdByCustomerId($this->context->customer->id);
            $result = count($addresses) > 1;

            if (!$result) {
                if (DmVersion::isVersion17()) {
                    $this->context->controller->errors[] =
                        $this->l('You must have more than one address to be able to delete it.');
                    $this->context->controller->redirectWithNotifications(
                        $this->context->link->getPageLink('addresses')
                    );
                }
            }

            return $result;
        }

        return true;
    }

    public function getAddressesIdByCustomerId($id_customer, $active = true)
    {
        $results = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            'SELECT `id_address`'.
            'FROM `'._DB_PREFIX_.'address`'.
            'WHERE `id_customer` = '.(int)$id_customer.' AND `deleted` = 0'.($active ? ' AND `active` = 1' : '')
        );

        return $results;
    }

    public function hookActionCustomerAccountAdd($params)
    {
        if (Tools::getValue('module') === $this->name) {
            /* @var $customer CustomerCore */
            $customer = $params['newCustomer'];
            if (Validate::isLoadedObject($customer)) {
                if (DmVersion::isVersion17()) {
                    $customer->company = Tools::getValue($this->name.'_company');
                    $customer->siret = Tools::getValue($this->name.'_siret');
                    $customer->ape = Tools::getValue($this->name.'_ape');
                    $customer->website = Tools::getValue($this->name.'_website');
                    $customer->save();

                    $this->addressForm = $this->makeAddressForm(
                        $this->makeAddressPersister($this->addressForm->getValue('token'))
                    )->fillWith(Tools::getAllValues());

                    $this->addressForm->submit();
                }

                // Si groupe automatisé alors changer le groupe
                if ((int)Configuration::get('PROACCOUNT_AUTO_AFFECT_GROUP') === 1) {
                    $customer->id_default_group = (int)Configuration::get('PROACCOUNT_DEFAULT_GROUP_ID');

                    $customer->save();

                    //On affecte le bon numéro de groupe au client que nous venons de créer
                    $customer->addGroups(array((int)Configuration::get('PROACCOUNT_DEFAULT_GROUP_ID')));
                }

                $customer_group_list = unserialize(Configuration::get('PROACCOUNT_CUSTOMER_GROUP_LIST'));
                if (is_array($customer_group_list)) {
                    $customer->addGroups($customer_group_list);
                }
            }
        }
    }

    /**
     * See same function in FrontController
     *
     * @param CustomerAddressPersister|null $persister
     * @return CustomerAddressForm
     */
    protected function makeAddressForm(CustomerAddressPersister $persister = null)
    {
        if (Configuration::get('PS_RESTRICT_DELIVERED_COUNTRIES')) {
            $availableCountries = Carrier::getDeliveredCountries($this->context->language->id, true, true);
        } else {
            $availableCountries = Country::getCountries($this->context->language->id, true);
        }

        $form = new CustomerAddressForm(
            $this->context->smarty,
            $this->context->language,
            $this->context->getTranslator(),
            $persister !== null ? $persister :
                $this->makeAddressPersister(),
            new CustomerAddressFormatter(
                $this->context->country,
                $this->context->getTranslator(),
                $availableCountries
            )
        );

        $form->setAction(Tools::getCurrentUrlProtocolPrefix().$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

        return $form;
    }

    /**
     * See same function in FrontController
     *
     * @param type $token
     * @return CustomerAddressPersister
     */
    protected function makeAddressPersister($token = null)
    {
        return new CustomerAddressPersister(
            $this->context->customer,
            $this->context->cart,
            $token !== null ? $token : Tools::getToken(true, $this->context)
        );
    }

    public function hookActionCustomerAccountUpdate($params)
    {
        /* @var $customer CustomerCore */
        $customer = $params['newCustomer'];
        if (Validate::isLoadedObject($customer)) {
            $customer->company = Tools::getValue($this->name.'_company');
            $customer->siret = Tools::getValue($this->name.'_siret');
            $customer->ape = Tools::getValue($this->name.'_ape');
            $customer->website = Tools::getValue($this->name.'_website');
            $customer->save();
        }

        $this->addressForm->fillWith(Tools::getAllValues());

        $this->addressForm->submit();
    }

    /**
     * Validate added FormField. (Add custom errors in each of your FormField)
     *
     * @param $params
     * @return array
     */
    public function hookValidateCustomerFormFields($params)
    {
        $validate = array();
        $this->addressForm->fillWith(Tools::getAllValues());
        $this->addressForm->validate();

        $address_fields = $this->addressForm->getTemplateVariables()['formFields'];

        foreach ($params['fields'] as $key => $values) {
            $validate[$key] = $values;
            if ($values->getName() === $this->name.'_fileUpload') {
                $validate[$key]->setErrors(
                    $this->checkFileAttachment(
                        Tools::fileAttachment($this->name.'_fileUpload')
                    )
                );
            } elseif (isset($address_fields[$values->getName()])) {
                $validate[$key]->setErrors($address_fields[$values->getName()]['errors']);
            }
        }

        return $validate;
    }

    /**
     * Function used to check if a file has been submitted
     * and if its extension corresponds to one of those we are waiting for
     *
     * @param $file_attachment
     * @return array of errors encountered
     */
    protected function checkFileAttachment($file_attachment)
    {
        $errors = array();
        if (!empty($file_attachment['name']) && $file_attachment['error'] != 0) {
            $errors[] = $this->l('An error occurred during the file-upload process.');
        } elseif (!empty($file_attachment['name'])
            && !in_array(
                Tools::strtolower(
                    Tools::substr($file_attachment['name'], -4)
                ),
                ProaccountAuthenticationModuleFrontController::$extension
            )
            && !in_array(
                Tools::strtolower(
                    Tools::substr($file_attachment['name'], -5)
                ),
                ProaccountAuthenticationModuleFrontController::$extension
            )
        ) {
            $errors[] = $this->l('Bad file extension');
        } elseif ($file_attachment['size'] > (int)Tools::getMaxUploadSize(2000000)) {
            $errors[] = $this->l('The file is too big');
        }

        if (empty($errors)) {
            $this->file_attachment = $file_attachment;
        }

        return $errors;
    }

    /**
     * Add an extra FormField.
     *
     * @param $params
     *
     * @return array
     */
    public function hookAdditionalCustomerFormFields($params)
    {
        $this->addressForm = $this->makeAddressForm();

        $proForm = array(
            'company' => array(
                'name' => $this->name.'_company',
                'label' => $this->l('Company'),
                'config' => 'PROACCOUNT_REQUIRED_COMPANY',
                'type' => 'text',
                'constraints' => array(
                    'isGenericName',
                ),
            ),
            'siret' => array(
                'name' => $this->name.'_siret',
                'label' => $this->l('SIRET'),
                'config' => 'PROACCOUNT_REQUIRED_SIRET',
                'type' => 'text',
                'constraints' => array(
                    'isSiret',
                ),
            ),
            'ape' => array(
                'name' => $this->name.'_ape',
                'label' => $this->l('APE'),
                'config' => 'PROACCOUNT_REQUIRED_APE',
                'type' => 'text',
                'constraints' => array(
                    'isApe',
                ),
            ),
            'website' => array(
                'name' => $this->name.'_website',
                'label' => $this->l('Website'),
                'config' => 'PROACCOUNT_REQUIRED_WEBSITE',
                'type' => 'text',
                'constraints' => array(
                    'isUrlOrEmpty',
                ),
            ),
            'fileUpload' => array(
                'name' => $this->name.'_fileUpload',
                'label' => $this->l('Attach File'),
                'config' => 'PROACCOUNT_FILE',
                'type' => 'file',
                'constraints' => array(),
            ),
        );

        if (Tools::getIsset('id_country')) {
            $this->addressForm->fillWith(array('id_country' => Tools::getValue('id_country')));
        }

        $isProAuthentication =
            get_class($this->context->controller) === 'ProaccountAuthenticationModuleFrontController';
        $isAuthentication = get_class($this->context->controller) === 'AuthController';

        Media::addJsDef(array(
            'isPro_authentication' => $isProAuthentication,
            'auth_url' => $this->context->link->getModuleLink($this->name, 'authentication'),
        ));

        $this->context->controller->registerJavascript(
            'proaccount-customer',
            'modules/'.$this->name.'/views/js/proaccount-customer.js'
        );

        $proFormField = array();
        $addressFormField = array();

        foreach ($proForm as $key => $values) {
            // If it's a file it must be added in back office and we have to check that it is an authentication
            if ($key !== 'fileUpload' || Configuration::get($values['config']) && $isProAuthentication) {
                $proFormField[] = (new FormField())
                    ->setName($values['name'])
                    ->setType($values['type'])
                    ->setLabel($values['label'])
                    ->setRequired($key !== 'fileUpload' && Configuration::get($values['config']))
                    ->setConstraints($values['constraints']);

                $property = str_replace($this->name.'_', '', $values['name']);
                if (property_exists($this->context->customer, $property)) {
                    end($proFormField)->setValue($this->context->customer->{$property});
                }
            }
        }

        $uselessAddressFields = array(
            'alias',
            'firstname',
            'lastname',
        );

        foreach ($this->addressForm->getTemplateVariables()['formFields'] as $field) {
            if (!in_array($field['name'], $uselessAddressFields)) {
                $addressFormField[] = (new FormField())
                    ->setName($field['name'])
                    ->setType($field['type'])
                    ->setRequired($field['required'])
                    ->setLabel($field['label'])
                    ->setValue($field['value'])
                    ->setAvailableValues($field['availableValues'])
                    ->setMaxLength($field['maxLength'])
                    ->setErrors($field['errors']);
            }
        }
        $isProCustomer = $this->context->customer->isLogged();
        $customerGroups = $this->context->customer->getGroups();
        $proGroups = unserialize(Configuration::get('PROACCOUNT_CUSTOMER_GROUP_LIST'));

        foreach ($proGroups as $proGroup) {
            if (in_array($proGroup, $customerGroups)) {
                $isProCustomer &= true;
                break;
            }

            if ($proGroup === end($proGroups)) {
                $isProCustomer = false;
            }
        }

        if (!$isProAuthentication && !$isProCustomer) {
            $proFormField = array();
        }

        if (!Configuration::get('PROACCOUNT_REGISTER_WITH_ADDRESS')
            || ($isAuthentication
                && !Configuration::get('PROACCOUNT_REGISTER_ADDRESS_NORMAL'))
            || ($isProAuthentication
                && !Configuration::get('PROACCOUNT_REGISTER_ADDRESS_PRO'))
            || (!$isProAuthentication
                && !$isAuthentication)) {
            $addressFormField = array();
        }

        $form = array_merge($proFormField, $addressFormField);

        // Return array of FormField
        return $form;
    }

    /**
     * Function used to send an email to inform the owner of the shop
     * that a new pro account has been created
     *
     * @param Customer $customer
     */
    protected function sendConfirmationEmail(Customer $customer)
    {
        $context = Context::getContext();
        $id_lang = (int)$context->language->id;
        $iso = Language::getIsoById($id_lang);
        $id_shop = (int)$context->shop->id;
        $address_text = '';
        if ((int)Configuration::get('PROACCOUNT_REGISTER_WITH_ADDRESS')
            && (int)Configuration::get('PROACCOUNT_REGISTER_ADDRESS_PRO')) {
            $addresses = $customer->getAddresses($id_lang);
            $address = new Address($addresses[0]['id_address']);
            $address_text = AddressFormat::generateAddress($address);
        }
        if (file_exists(dirname(__FILE__).'/mails/'.$iso.'/pro_account.txt')
            && file_exists(dirname(__FILE__).'/mails/'.$iso.'/pro_account.html')) {
            $file_attachment = !empty($this->file_attachment['name']) ?
                $this->file_attachment : null;
            Mail::Send(
                $id_lang,
                'pro_account',
                $this->l('Professional account register'),
                array(
                    '{firstname}' => $customer->firstname,
                    '{lastname}' => $customer->lastname,
                    '{email}' => $customer->email,
                    '{company}' => $customer->company,
                    '{siret}' => $customer->siret,
                    '{address}' => $address_text,
                ),
                Configuration::get('PS_SHOP_EMAIL'),
                null,
                (string)Configuration::get('PS_SHOP_EMAIL'),
                (string)Configuration::get('PS_SHOP_NAME'),
                $file_attachment,
                null,
                dirname(__FILE__).'/mails/',
                null,
                (int)$id_shop
            );
        }
    }
}
