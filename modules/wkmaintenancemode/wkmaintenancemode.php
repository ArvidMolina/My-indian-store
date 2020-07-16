<?php
/**
* 2010-2019 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2019 Webkul IN
*  @license   https://store.webkul.com/license.html
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once(dirname(__FILE__).'/classes/WkMaintenanceModeInstall.php');
require_once(dirname(__FILE__).'/classes/MaintenanceMode.php');

class Wkmaintenancemode extends Module
{
    public function __construct()
    {
        $this->name = 'wkmaintenancemode';
        $this->tab = 'front_office_features';
        $this->version = '5.0.1';
        $this->module_key = '8c6b41b57e769374973ca639b57932cf';
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->author = 'Webkul';
        $this->bootstrap = true;
        $this->need_instance = 1;
        parent::__construct();
        $this->imageDir = _PS_MODULE_DIR_.$this->name.'/views/img/';
        $this->displayName = $this->l('Maintenance Mode');
        $this->description = $this->l('Customize your shop maintenance mode layout.');
        $this->confirmUninstall = $this->l('Are you sure to uninstall this module? Please confirm');
    }

    public function install()
    {
        $objInstall = new WkMaintenanceModeInstall();
        if (!parent::install()
            || !$this->registerHook('displayBackOfficeHeader')
            || !$this->registerHook('actionEmailSubscribe')
            || !$objInstall->createTables()
            || !$this->insertDefaultData()
        ) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall()
            || !$this->deleteTable()
            || !$this->deleteBackground()
        ) {
            return false;
        }
        return true;
    }

    public function insertDefaultData()
    {
        $maintenance = new MaintenanceMode();
        foreach (Language::getLanguages() as $language) {
            $maintenance->headline[$language['id_lang']]  = $this->getElementExtraHtml('headline_text');
            $maintenance->description[$language['id_lang']] = $this->getElementExtraHtml('description_text');
            $maintenance->footer_text[$language['id_lang']] = $this->getElementExtraHtml(
                'footer_text',
                array('link' => Tools::getHttpHost(true).__PS_BASE_URI__, 'year' => date('Y'))
            );
        }

        $maintenance->image = '';
        $maintenance->text_color = pSQL('#FFFFFF');
        $maintenance->email_subscribe = 1;
        $maintenance->timer = 0;
        $maintenance->timer_date = date('Y-m-d H:i:s');
        $maintenance->timelapse_display = 0;
        $maintenance->timer_layout = pSQL('timer1');
        $maintenance->facebook_link = '';
        $maintenance->twitter_link = '';
        $maintenance->googleplus_link = '';
        $maintenance->instagram_link = '';
        $maintenance->page_layout = pSQL('layout1');
        $maintenance->active = 0;
        $maintenance->save();
        return true;
    }

    protected function deleteTable()
    {
        return MaintenanceMode::deleteTable();
    }

    public function hookActionEmailSubscribe($params)
    {
        if (Tools::isSubmit('submit')) {
            $email = Tools::getValue('email');
            if (!$email || !Validate::isEmail($email)) {
                $params['response'] = array(
                    'status' => false,
                    'message' => $this->l('Invalid email address.')
                );
                return;
            }
            $shop = $this->context->shop;
            if (MaintenanceMode::isRegistered($email, (int)$shop->id)) {
                $params['response'] = array(
                    'status' => false,
                    'message' => $this->l('This email address is already registered.')
                );
                return;
            }

            MaintenanceMode::subscribe($email, (int)$shop->id, (int)$shop->id_shop_group);
            $params['response'] = array(
                'status' => true,
                'message' => $this->l('You have successfully subscribed our newsletter.')
            );
        }
    }

    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('controller') == 'AdminModules' && Tools::getValue('configure') == 'wkmaintenancemode') {
            return $this->display($this->name, 'maintenance.tpl');
        }
    }

    public function getFieldsValues()
    {
        $fieldValues = array();

        $maintenances = MaintenanceMode::getValues();
        foreach ($maintenances as $maintenance) {
            $fieldValues['headline'][$maintenance['id_lang']] = $maintenance['headline'];
            $fieldValues['description'][$maintenance['id_lang']] = $maintenance['description'];
            $fieldValues['footer_text'][$maintenance['id_lang']] = urldecode($maintenance['footer_text']);
        }
        if ($maintenance = array_shift($maintenances)) {
            $fieldValues['email_subscribe'] = $maintenance['email_subscribe'];
            $fieldValues['timer'] = $maintenance['timer'];
            $fieldValues['timer_date'] = $maintenance['timer_date'];
            $fieldValues['timelapse_display'] = $maintenance['timelapse_display'];
            $fieldValues['timer_layout'] = $maintenance['timer_layout'];
            $fieldValues['facebook_link'] = $maintenance['facebook_link'];
            $fieldValues['twitter_link'] = $maintenance['twitter_link'];
            $fieldValues['googleplus_link'] = $maintenance['googleplus_link'];
            $fieldValues['instagram_link'] = $maintenance['instagram_link'];
            $fieldValues['page_layout'] = $maintenance['page_layout'];
            $fieldValues['text_color'] = $maintenance['text_color'];
            $fieldValues['active'] = $maintenance['active'];
        }

        foreach (Language::getLanguages() as $language) {
            $fieldValues['headline'][$language['id_lang']]  =
            Tools::getValue(
                'headline_'.$language['id_lang'],
                isset($fieldValues['headline'][$language['id_lang']]) ?
                $fieldValues['headline'][$language['id_lang']] :
                ''
            );
            $fieldValues['description'][$language['id_lang']] =
            Tools::getValue(
                'description_'.$language['id_lang'],
                isset($fieldValues['description'][$language['id_lang']]) ?
                $fieldValues['description'][$language['id_lang']] :
                ''
            );
            $fieldValues['footer_text'][$language['id_lang']] =
            Tools::getValue(
                'footer_text_'.$language['id_lang'],
                isset($fieldValues['footer_text'][$language['id_lang']]) ?
                $fieldValues['footer_text'][$language['id_lang']] :
                ''
            );
        }
        $fieldValues['email_subscribe'] = Tools::getValue(
            'email_subscribe',
            isset($fieldValues['email_subscribe']) ?
            $fieldValues['email_subscribe'] :
            ''
        );
        $fieldValues['timer'] = Tools::getValue(
            'timer',
            isset($fieldValues['timer']) ?
            $fieldValues['timer'] :
            ''
        );
        $fieldValues['timer_date'] = Tools::getValue(
            'timer_date',
            isset($fieldValues['timer_date']) ?
            $fieldValues['timer_date'] :
            ''
        );
        $fieldValues['timelapse_display'] = Tools::getValue(
            'timelapse_display',
            isset($fieldValues['timelapse_display']) ?
            $fieldValues['timelapse_display'] :
            ''
        );
        $fieldValues['timer_layout'] = Tools::getValue(
            'timer_layout',
            isset($fieldValues['timer_layout']) ?
            $fieldValues['timer_layout'] :
            ''
        );
        $fieldValues['facebook_link'] = Tools::getValue(
            'facebook_link',
            isset($fieldValues['facebook_link']) ?
            $fieldValues['facebook_link'] :
            ''
        );
        $fieldValues['twitter_link'] = Tools::getValue(
            'twitter_link',
            isset($fieldValues['twitter_link']) ?
            $fieldValues['twitter_link'] :
            ''
        );
        $fieldValues['googleplus_link'] = Tools::getValue(
            'googleplus_link',
            isset($fieldValues['googleplus_link']) ?
            $fieldValues['googleplus_link'] :
            ''
        );
        $fieldValues['instagram_link'] = Tools::getValue(
            'instagram_link',
            isset($fieldValues['instagram_link']) ?
            $fieldValues['instagram_link'] :
            ''
        );
        $fieldValues['page_layout'] = Tools::getValue(
            'page_layout',
            isset($fieldValues['page_layout']) ?
            $fieldValues['page_layout'] :
            ''
        );
        $fieldValues['text_color'] = Tools::getValue(
            'text_color',
            isset($fieldValues['text_color']) ?
            $fieldValues['text_color'] :
            ''
        );
        $fieldValues['active'] = Tools::getValue(
            'active',
            isset($fieldValues['active']) ?
            $fieldValues['active'] :
            ''
        );
        $fieldValues['image'] = '';
        $fieldValues['current_tab'] = Tools::getValue('current_tab', '#general');

        return $fieldValues;
    }

    public function renderForm()
    {
        $iamgePath = _PS_BASE_URL_ . $this->_path;
        $layouts = array(
            array(
                'id' => 'layout1',
                'value' => 'layout1',
                'label' => $this->getElementExtraHtml(
                    'layout',
                    array('imagelink' => $iamgePath.'views/img/layout1.png')
                )
            ),
            array(
                'id' => 'layout2',
                'value' => 'layout2',
                'label' => $this->getElementExtraHtml(
                    'layout',
                    array('imagelink' => $iamgePath.'views/img/layout2.png')
                )
            ),
            array(
                'id' => 'layout3',
                'value' => 'layout3',
                'label' => $this->getElementExtraHtml(
                    'layout',
                    array('imagelink' => $iamgePath.'views/img/layout3.png')
                )
            ),
        );
        $timers = array(
            array(
                'id' => 'timer1',
                'value' => 'timer1',
                'label' => $this->getElementExtraHtml(
                    'timer',
                    array('imagelink' => $iamgePath.'views/img/timer1.png')
                )
            ),
            array(
                'id' => 'timer2',
                'value' => 'timer2',
                'label' => $this->getElementExtraHtml(
                    'timer',
                    array('imagelink' => $iamgePath.'views/img/timer2.png')
                )
            ),
            array(
                'id' => 'timer3',
                'value' => 'timer3',
                'label' => $this->getElementExtraHtml(
                    'timer',
                    array('imagelink' => $iamgePath.'views/img/timer3.png')
                )
            ),
            array(
                'id' => 'timer4',
                'value' => 'timer4',
                'label' => $this->getElementExtraHtml(
                    'timer',
                    array('imagelink' => $iamgePath.'views/img/timer4.png')
                )
            ),
        );
        $fieldsForm = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Configuration'),
                    'icon' => 'icon-cog'
                ),
                'tabs' => array(
                    'general' => $this->l('General Settings'),
                    'layout' => $this->l('Layout'),
                    'timer' => $this->l('CountDown Timer'),
                    'social' => $this->l('Social')
                ),
                'description' => $this->getElementExtraHtml(
                    'alert',
                    array('link' => $this->context->link->getAdminLink('AdminMaintenance'))
                ),
                'input' => array(
                    array(
                        'type' => 'hidden',
                        'name' => 'current_tab'
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('Maintenance headline'),
                        'name' => 'headline',
                        'lang' => true,
                        'autoload_rte' => true,
                        'required' => true,
                        'desc' => $this->l('Text to be displayed as headline on maintenance page when the shop is deactivated.'),
                        'tab' => 'general'
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('Maintenance text'),
                        'name' => 'description',
                        'lang' => true,
                        'autoload_rte' => true,
                        'desc' => $this->l('Text to be displayed on maintenance page when the shop is deactivated.'),
                        'tab' => 'general'
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('Footer text'),
                        'name' => 'footer_text',
                        'lang' => true,
                        'desc' => $this->l('Text to be displayed in footer. You can also use html tags and variable keywords [url], [name], [email], [address1], [address2], [postcode], [city], [state], [country], [phone]).'),
                        'tab' => 'general'
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Newsletter subscription'),
                        'name' => 'email_subscribe',
                        'values' => array(
                            array(
                                'id' => 'type_switch_on',
                                'value' => 1
                            ),
                            array(
                                'id' => 'type_switch_off',
                                'value' => 0
                            )
                        ),
                        'tab' => 'general'
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Enabled'),
                        'name' => 'active',
                        'values' => array(
                            array(
                                'id' => 'type_switch_on',
                                'value' => 1
                            ),
                            array(
                                'id' => 'type_switch_off',
                                'value' => 0
                            )
                        ),
                        'tab' => 'general'
                    ),
                    array(
                        'type' => 'file',
                        'label' => $this->l('Background image'),
                        'name' => 'image',
                        'value' => true,
                        'image' => $this->getImage(),
                        'delete_url' => $this->context->link->getAdminLink('AdminModules', false).
                        '&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').
                        '&deleteBackground=1',
                        'desc' => $this->l('Add custom background image on maintenance page. Allowed formates are (.png, .jpg, .jpeg) only. Use 1024x768 dimension image for better view.'),
                        'tab' => 'layout'
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Text color'),
                        'name' => 'text_color',
                        'class' => 'col-lg-2',
                        'desc' => $this->getElementExtraHtml(
                            'element_desc',
                            array('text' => $this->l('Choose specific text color for maintenance page.'))
                        ),
                        'tab' => 'layout'
                    ),
                    array(
                        'type' => 'radio',
                        'label' => $this->l('Page layout'),
                        'name' => 'page_layout',
                        'class' => 'col-lg-2',
                        'values' => $layouts,
                        'required' => true,
                        'desc' => $this->getElementExtraHtml(
                            'element_desc',
                            array('text' => $this->l('Choose specific page layout for maintenance page.'))
                        ),
                        'tab' => 'layout'
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Enable Countdown timer'),
                        'name' => 'timer',
                        'values' => array(
                            array(
                                'id' => 'type_switch_on',
                                'value' => 1
                            ),
                            array(
                                'id' => 'type_switch_off',
                                'value' => 0
                            )
                        ),
                        'desc' => $this->l('Set yes to use countdown timer on maintenance page when shop is deactivated'),
                        'tab' => 'timer'
                    ),
                    array(
                        'type' => 'datetime',
                        'label' => $this->l('Remaining time'),
                        'name' => 'timer_date',
                        'class' => 'datetime-picker',
                        'form_group_class' => 'active-timer hide',
                        'desc' => $this->l('Date and time when shop will be enabled.'),
                        'tab' => 'timer'
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Display countdown timer on time-lapse'),
                        'name' => 'timelapse_display',
                        'values' => array(
                            array(
                                'id' => 'type_switch_on',
                                'value' => 1
                            ),
                            array(
                                'id' => 'type_switch_off',
                                'value' => 0
                            )
                        ),
                        'form_group_class' => 'active-timer hide',
                        'desc' => $this->l('Display countdown timer as 0 if time is lapsed.'),
                        'tab' => 'timer'
                    ),
                    array(
                        'type' => 'radio',
                        'label' => $this->l('Countdown timer layout'),
                        'name' => 'timer_layout',
                        'class' => 'col-lg-2',
                        'values' => $timers,
                        'form_group_class' => 'active-timer hide',
                        'desc' => $this->getElementExtraHtml(
                            'element_desc',
                            array('text' => $this->l('Choose specific countdown timer layout for maintenance page.'))
                        ),
                        'tab' => 'timer'
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Facebook URL'),
                        'name' => 'facebook_link',
                        'tab' => 'social',
                        'desc' => $this->l('Enter your facebook page url, eg: https://facebook.com/your_page_name.'),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Twitter URL'),
                        'name' => 'twitter_link',
                        'tab' => 'social',
                        'desc' => $this->l('Enter your twitter page url, eg: https://twitter.com/your_page_name.'),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Google+ URL'),
                        'name' => 'googleplus_link',
                        'tab' => 'social',
                        'desc' => $this->l('Enter your google plus page url, eg: https://plus.google.com/+your_page_name.'),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Instagram URL'),
                        'name' => 'instagram_link',
                        'tab' => 'social',
                        'desc' => $this->l('Enter your instagram page url, eg: https://www.instagram.com/your_page_name.'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            )
        );
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int) Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = (int)$lang->id;
        $this->fields_form = array();
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'btnSubmit';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => (int)$this->context->language->id,
        );

        return $helper->generateForm(array($fieldsForm));
    }

    protected function postProcess()
    {
        $errors = array();
        $idLang = (int) Configuration::get('PS_LANG_DEFAULT');
        if (!Tools::getValue('headline_'.$idLang)
            || !Validate::isCleanHtml(Tools::getValue('headline_'.$idLang))
            || Tools::strlen(strip_tags(Tools::getValue('headline_'.$idLang))) > 100
        ) {
            $errors[] = $this->l('Invalid headline text, headline should be clean html not more than 100 characters long.');
        }
        if (Tools::getValue('footer_text') && !Validate::isCleanHtml(Tools::getValue('footer_text'))) {
            $errors[] = $this->l('Invalid footer text, text should be clean html.');
        }
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            if ($error = ImageManager::validateUpload($_FILES['image'], Tools::getMaxUploadSize())) {
                $errors[] = $error;
            } elseif (!move_uploaded_file($_FILES['image']['tmp_name'], $this->imageDir.'background.jpg')) {
                $errors[] = $this->l('Background image not uploaded.');
            }
        }
        if (!Tools::getValue('text_color') && !Validate::isColor(Tools::getValue('text_color'))) {
            $errors[] = $this->l('Invalid text color, please enter valid color code.');
        }
        if (!Tools::getValue('page_layout')) {
            $errors[] = $this->l('Invalid page layout, please select page layout.');
        }
        if (Tools::getValue('active') && Tools::getValue('timer') && (!Tools::getValue('timer_date')
            || !Validate::isDateFormat(Tools::getValue('timer_date'))
            || strtotime(Tools::getValue('timer_date')) < time())
        ) {
            $errors[] = $this->l('Invalid timer date. It should be future date.');
        }
        if (Tools::getValue('timer') && !Tools::getValue('timer_layout')) {
            $errors[] = $this->l('Invalid timer layout, please select timer layout.');
        }
        if (Tools::getValue('facebook_link')
            && (filter_var(Tools::getValue('facebook_link'), FILTER_VALIDATE_URL) === false
            || Tools::substr(Tools::getValue('facebook_link'), 0, 4) !== "http")
        ) {
            $errors[] = $this->l('Invalid facebook link. It should be valid facebook page url.');
        }
        if (Tools::getValue('twitter_link')
            && (filter_var(Tools::getValue('twitter_link'), FILTER_VALIDATE_URL) === false
            || Tools::substr(Tools::getValue('twitter_link'), 0, 4) !== "http")
        ) {
            $errors[] = $this->l('Invalid twitter link. It should be valid twitter page url.');
        }
        if (Tools::getValue('googleplus_link')
            && (filter_var(Tools::getValue('googleplus_link'), FILTER_VALIDATE_URL) === false
            || Tools::substr(Tools::getValue('googleplus_link'), 0, 4) !== "http")
        ) {
            $errors[] = $this->l('Invalid google plus link. It should be valid google plus page url.');
        }
        if (Tools::getValue('instagram_link')
            && (filter_var(Tools::getValue('instagram_link'), FILTER_VALIDATE_URL) === false
            || Tools::substr(Tools::getValue('instagram_link'), 0, 4) !== "http")
        ) {
            $errors[] = $this->l('Invalid instagram link. It should be valid instagram page url.');
        }

        if ($errors) {
            return $this->displayError($errors);
        }

        MaintenanceMode::deleteOldData();
        $maintenance = new MaintenanceMode();
        foreach (Language::getLanguages() as $language) {
            $maintenance->headline[$language['id_lang']]  = Tools::getValue('headline_'.$language['id_lang']);
            $maintenance->description[$language['id_lang']] = Tools::getValue('description_'.$language['id_lang']);
            $maintenance->footer_text[$language['id_lang']] = Tools::getValue('footer_text_'.$language['id_lang']);
        }

        $maintenance->image = pSQL(Tools::getValue('image'));
        $maintenance->text_color = pSQL(Tools::getValue('text_color'));
        $maintenance->email_subscribe = (int)Tools::getValue('email_subscribe');
        $maintenance->timer = (int)Tools::getValue('timer');
        $maintenance->timer_date = pSQL(Tools::getValue('timer_date'));
        $maintenance->timelapse_display = (int)Tools::getValue('timelapse_display');
        $maintenance->timer_layout = pSQL(Tools::getValue('timer_layout'));
        $maintenance->facebook_link = pSQL(Tools::getValue('facebook_link'));
        $maintenance->twitter_link = pSQL(Tools::getValue('twitter_link'));
        $maintenance->googleplus_link = pSQL(Tools::getValue('googleplus_link'));
        $maintenance->instagram_link = pSQL(Tools::getValue('instagram_link'));
        $maintenance->page_layout = pSQL(Tools::getValue('page_layout'));
        $maintenance->active = (int)Tools::getValue('active');
        $maintenance->date_add = date('Y-m-d H:i:s');
        $maintenance->save();
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', false).
        '&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&conf=4');
    }

    public function getImage()
    {
        $image = $this->imageDir.'background.jpg';
        if (file_exists($image)) {
            return ImageManager::thumbnail($image, $this->name.'_thumb_background.jpg', 100, 'jpg', true, true);
        }
        return false;
    }

    public function deleteBackground()
    {
        $image = $this->imageDir.'background.jpg';
        if (file_exists($image)) {
            unlink($image);
        }
        return true;
    }

    public function getContent()
    {
        $html = '';
        if (Tools::isSubmit('btnSubmit')) {
            $html .= $this->postProcess();
        }
        if (Tools::getValue('deleteBackground')) {
            $this->deleteBackground();
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', false).
            '&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&conf=7');
        }
        return $html.$this->renderForm();
    }

    public function getElementExtraHtml($type, $data = array())
    {
        $this->context->smarty->assign(array(
            'element_type' => $type,
            'data' => $data
        ));
        return $this->context->smarty->fetch(
            _PS_MODULE_DIR_.$this->name.
            '/views/templates/admin/form_element.tpl'
        );
    }
}
