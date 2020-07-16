<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.fHome Page Content
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * @author    knowband.com <support@knowband.com>
 * @copyright 2017 knowband
 * @license   see file: LICENSE.txt
 * @category  PrestaShop Module
 */

class AdminKbFacebookProfilesController extends ModuleAdminController
{

    public $kb_smarty;

    /*
     * Pattern for matching config values
     */
    protected $pattern = '/^([A-Z_]*)[0-9]+/';

    public function __construct()
    {
        parent::__construct();
        $this->custom_smarty = new Smarty();
		
		$this->custom_smarty->setCompileDir(_PS_CACHE_DIR_ . 'smarty/compile');
        $this->custom_smarty->setCacheDir(_PS_CACHE_DIR_ . 'smarty/cache');
        $this->custom_smarty->use_sub_dirs = true;
        $this->custom_smarty->setConfigDir(_PS_SMARTY_DIR_ . 'configs');
        $this->custom_smarty->caching = false;
        

        $this->custom_smarty->setTemplateDir(_PS_MODULE_DIR_ . 'facebookstore/views/templates/admin/_configure/helpers/list');
        $this->custom_smarty->registerPlugin('function', 'l', 'smartyTranslate');
        $this->bootstrap = true;
        $this->name = 'facebookstore';
        $this->table = 'kb_facebook_profiles';
        $this->identifier = 'id_kb_facebook_profiles';

        $this->_select = 'a.*';
        $this->actions = array(
            'Edit');

        $this->fields_list = array(
            'id_kb_facebook_profiles' => array(
                'title' => $this->module->l('Id', 'AdminKbFacebookProfilesController'),
                'align' => 'center',
                'search' => false
            ),
            'profile_name' => array(
                'title' => $this->module->l('Profile Name', 'AdminKbFacebookProfilesController'),
                'align' => 'center',
            ),
            'max_no_categories' => array(
                'title' => $this->module->l('Max No of featured Categories', 'AdminKbFacebookProfilesController'),
                'align' => 'center',
            ),
            'max_no_products' => array(
                'title' => $this->module->l('Max No of featured Products', 'AdminKbFacebookProfilesController'),
                'align' => 'center',
            ),
            'facebook_page_id' => array(
                'title' => $this->module->l('View Link', 'AdminKbFacebookProfilesController'),
                'align' => 'left',
                'callback' => 'viewCustomLink'
            ),
        );
        $this->_orderBy = 'id_kb_facebook_profiles';
        $this->_orderWay = 'ASC';
        // parent::__construct();
    }

    public function initToolbar()
    {
        parent::initToolbar();
        $query_get_profile = 'SELECT count(*) as total FROM ' . _DB_PREFIX_ . 'kb_facebook_profiles';
        $totalProfile = Db::getInstance()->getValue($query_get_profile);
        if ($totalProfile >= 1) {
            parent::initToolbar();
            unset($this->toolbar_btn['new']);
        }
    }

    public function initContent()
    {
        if (isset($this->context->cookie->fb_redirect_error)) {
            $this->errors[] = $this->context->cookie->fb_redirect_error;
            unset($this->context->cookie->fb_redirect_error);
        }
        if (isset($this->context->cookie->fb_redirect_success)) {
            $this->confirmations[] = $this->context->cookie->fb_redirect_success;
            unset($this->context->cookie->fb_redirect_success);
        }
        $tpl = $this->custom_smarty->createTemplate('list.tpl');
        $front_module_url_link = Context::getContext()->link->getModuleLink('facebookstore', 'fbHome');
        $app_id = Configuration::get('FB_STORE_APP_ID');
        $fbpage_tab_url = "https://www.facebook.com/dialog/pagetab?app_id=" . $app_id . "&next=" . $front_module_url_link;
        $usermanual_link = $this->getModuleDirUrl() . "facebookstore/views/img/admin/uploads/usermanual.pdf";
        $tpl->assign('config_link', $this->context->link->getAdminLink('AdminKbFacebookConfigure'));
        $tpl->assign('usermanual_link', $usermanual_link);
        $tpl->assign('front_module_url_link', $front_module_url_link);
        $tpl->assign('fbpage_tab_url', $fbpage_tab_url);
        $this->content .= $tpl->fetch();

        parent::initContent();
    }

    // Show Facebook Page name
    public function viewCustomLink($id_row, $row_data)
    {
        $front_module_url = Context::getContext()->link->getModuleLink('facebookstore', 'fbHome');
        $usermanual = $this->getModuleDirUrl() . "facebookstore/views/img/admin/uploads/usermanual.pdf";
        $output = '';
        if (!empty(Configuration::get('FB_STORE_APP_ID'))) {
            $app_id = Configuration::get('FB_STORE_APP_ID');

            $output = '	<td class="pointer center">
                        <a target="_blank" href="' . $usermanual . '">' . $this->module->l('Click here to see user manual', 'AdminKbFacebookProfilesController') . '</a>
                        <br/>                        
                        <a target="_blank" href="' . $front_module_url . '">' . $this->module->l('Click here to see your Facebook page', 'AdminKbFacebookProfilesController') . '</a>
                        <br/>
                        <a target="_blank" href="https://www.facebook.com/dialog/pagetab?app_id=' . $app_id . '&next=' . $front_module_url . '">' . $this->module->l('Click to add tab in your Facebook page', 'AdminKbFacebookProfilesController') . '</a>
                        </td>';
        }
        return $output;
    }

    public function init()
    {
        $this->context->smarty->assign('config_link', $this->context->link->getAdminLink('AdminKbFacebookConfigure'));

        //Save profile data
        if (Tools::getValue('profile')) {
            $config_data = Tools::getValue('profile');
            if (isset($config_data["fb_page_color"])) {
                $query_get_profile = 'SELECT * FROM ' . _DB_PREFIX_ . 'kb_facebook_profiles ec ORDER BY id_kb_facebook_profiles ASC limit 1';
                $profile = Db::getInstance()->executeS($query_get_profile);
                if (is_array($profile) && !empty($profile)) {
                    $logo_path = $profile[0]['shop_logo'];
                    $banner_path = $profile[0]['banner_path'];
                    //code to save Logo
                    if ($_FILES['thumbnail']['name'] != "") {
                        if ($_FILES['thumbnail']['size'] == 0) {
                            $error = $this->module->l("Logo image is not correct", 'AdminKbFacebookProfilesController');
                        } else {
                            $allowed_exts = array(
                                'gif',
                                'jpeg',
                                'jpg',
                                'png',
                                'JPG',
                                'PNG',
                                'GIF',
                                'JPEG');
                            $extension = explode('.', $_FILES['thumbnail']['name']);
                            $extension = end($extension);
                            $extension = trim($extension);
                            if ((($_FILES['thumbnail']['type'] == 'image/jpg') || ($_FILES['thumbnail']['type'] == 'image/jpeg') || ($_FILES['thumbnail']['type'] == 'image/gif') || ($_FILES['thumbnail']['type'] == 'image/png')) && ($_FILES['thumbnail']['size'] < 2097152) && in_array($extension, $allowed_exts)) {
                                $allowedTypes = array(
                                    IMAGETYPE_PNG,
                                    IMAGETYPE_JPEG,
                                    IMAGETYPE_GIF);
                                $detectedType = exif_imagetype($_FILES['thumbnail']['tmp_name']);
                                if (in_array($detectedType, $allowedTypes) === false) {
                                    $error = $this->module->l(" Logo image is not correct", 'AdminKbFacebookProfilesController');
                                } else if ($_FILES['thumbnail']['error'] > 0) {
                                    $error = $this->module->l("Logo image is not correct", 'AdminKbFacebookProfilesController');
                                } else {
                                    $mask = _PS_MODULE_DIR_ . 'facebookstore/views/img/admin/logo/logo_' . time() . '.*';
                                    $matches = glob($mask);
                                    if (count($matches) > 0) {
                                        array_map('unlink', $matches);
                                    }
                                    move_uploaded_file($_FILES['thumbnail']['tmp_name'], _PS_MODULE_DIR_ . 'facebookstore/views/img/admin/logo/logo_' . time() . '.'. $extension);
                                    $thumbnail = trim('logo_' . time() . '.' . $extension);
                                    $logo_path = $this->getModuleDirUrl() . "facebookstore/views/img/admin/logo/" . $thumbnail;
                                }
                            } else {
                                $error = $this->module->l("Logo image is not correct", 'AdminKbFacebookProfilesController');
                            }
                        }
                    }
                    //code to save Banner
                    if ($_FILES['file1']['name'] != "") {
                        if ($_FILES['file1']['size'] == 0) {
                            $error = $this->module->l("Banner image is not correct", 'AdminKbFacebookProfilesController');
                        } else {
                            $allowed_exts = array(
                                'gif',
                                'jpeg',
                                'jpg',
                                'png',
                                'JPG',
                                'PNG',
                                'GIF',
                                'JPEG');
                            $extension = explode('.', $_FILES['file1']['name']);
                            $extension = end($extension);
                            $extension = trim($extension);
                            if ((($_FILES['file1']['type'] == 'image/jpg') || ($_FILES['file1']['type'] == 'image/jpeg') || ($_FILES['file1']['type'] == 'image/gif') || ($_FILES['file1']['type'] == 'image/png')) && ($_FILES['file1']['size'] < 2097152) && in_array($extension, $allowed_exts)) {
                                $allowedTypes = array(
                                    IMAGETYPE_PNG,
                                    IMAGETYPE_JPEG,
                                    IMAGETYPE_GIF);
                                $detectedType = exif_imagetype($_FILES['file1']['tmp_name']);
                                if (in_array($detectedType, $allowedTypes) === false) {
                                    $error = $this->module->l(" Banner image is not correct", 'AdminKbFacebookProfilesController');
                                } else if ($_FILES['file1']['error'] > 0) {
                                    $error = $this->module->l("Banner image is not correct", 'AdminKbFacebookProfilesController');
                                } else {
                                    $mask = _PS_MODULE_DIR_ . 'facebookstore/views/img/admin/uploads/banner_' . time() . '.*';
                                    $matches = glob($mask);
                                    if (count($matches) > 0) {
                                        array_map('unlink', $matches);
                                    }
                                    move_uploaded_file($_FILES['file1']['tmp_name'], _PS_MODULE_DIR_ . 'facebookstore/views/img/admin/uploads/banner_' . time() . '.'. $extension);
                                    $file1 = trim('banner_' . time() . '.' . $extension);
                                    $banner_path = $this->getModuleDirUrl() . "facebookstore/views/img/admin/uploads/" . $file1;
                                }
                            } else {
                                $error = $this->module->l("Banner image is not correct", 'AdminKbFacebookProfilesController');
                            }
                        }
                    }

                    //To reset logo
                    if (Tools::getValue('previous_value1') == '1') {
                        $logo_path = $this->getRootDirUrl() . "img/logo.jpg";
                    }
                    //To reset Banner
                    if (Tools::getValue('previous_value2') == '1') {
                        $banner_path = $this->getModuleDirUrl() . "facebookstore/views/img/admin/uploads/banner1.jpg";
                    }
                    //To save home page content
                    $language = Language::getLanguages(false);
                    $footer_content = array();
                    $home_content = array();
                    $presta_cat = '';
                    $product_ids = '';
                    $ser_home_content = '';
                    $foot_home_content = '';

                    $sql = 'UPDATE `'
                        . _DB_PREFIX_ . 'kb_facebook_profiles` '
                        . 'SET  home_page_content = ' . "'" . pSQL($ser_home_content, true) . "'" . ',
                            banner_path = "' . pSQL($banner_path) . '",
                            shop_logo = "' . pSQL($logo_path) . '",
                            menu_items = "' . pSQL(Tools::getValue('menu_item')) . '",
                            fb_page_color = "#48649f",
                            featured_categories = "' . pSQL($presta_cat) . '",
                            max_no_categories = "0",
                            product_type_to_show = "1",
                            featured_product_ids = "' . $product_ids . '",
                            max_no_products = "' . (int) $config_data['max_no_products'] . '",
                            product_image_size = "' . pSQL($config_data['product_image_size']) . '",
                            footer_content = ' . "'" . pSQL($foot_home_content, true) . "'" . ' where id_kb_facebook_profiles=' . (int) $profile[0]['id_kb_facebook_profiles'];
                    $update_data = Db::getInstance()->Execute($sql);
                    if ($update_data) {
                        $this->context->cookie->__set('fb_redirect_success', $this->l('Profile setting updated successfully.'));
                        $cehckProfileExistSQL = 'SELECT id_kb_facebook_profiles from ' . _DB_PREFIX_ . 'kb_facebook_profiles ORDER BY id_kb_facebook_profiles ASC limit 1';
                        $profileId = Db::getInstance()->executeS($cehckProfileExistSQL);
                        Tools::redirectAdmin($this->context->link->getAdminLink('AdminKbFacebookProfiles') . '&updatekb_facebook_profiles&id_kb_facebook_profiles=' . (int) $profileId[0]['id_kb_facebook_profiles']);
                    }
                } else {
                    $this->context->cookie->__set('fb_redirect_error', $this->module->l('Profile does not exist', 'AdminKbFacebookProfilesController'));
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminKbFacebookProfiles'));
                }
            }
        }

        if (Tools::getvalue('ajax')) {
            $config_data = Tools::getvalue('profile');
            if ($config_data['profile_id'] != '') {
                $sql = 'UPDATE `'
                    . _DB_PREFIX_ . 'kb_facebook_profiles` '
                    . 'SET  profile_name = "' . pSQL($config_data["name"]) . '",
                           facebook_page_id = "",
                           facebook_tab_name = "",
                           id_shop = "",
                           status = "' . $config_data['enable']
                    . '" where id_kb_facebook_profiles=' . (int) $config_data['profile_id'];
                $profile_data = Db::getInstance()->Execute($sql);
                echo $config_data['profile_id'];
            } else {
                $query_get_profile = 'SELECT * FROM ' . _DB_PREFIX_ . 'kb_facebook_profiles ec ORDER BY id_kb_facebook_profiles ASC limit 1';
                $profile = Db::getInstance()->executeS($query_get_profile);
                if(empty($profile)) {
                $content_values = $this->getDefaultContent();
                $insertData = array(
                    'profile_name' => pSQL($config_data['name']),
                    'facebook_page_id' => '',
                    'facebook_tab_name' => '',
                    'id_shop' => '',
                    'status' => $config_data['enable'],
                    'shop_logo' => pSQL($content_values['logo']),
                    'banner_path' => pSQL($content_values['banner']),
                    'home_page_content' => pSQL($content_values['home_page_content'], true),
                    'menu_items' => pSQL($content_values['menu_item']),
                    'fb_page_color' => pSQL('#48649f'),
                    'featured_categories' => pSQL($content_values['featured_categories']),
                    'max_no_categories' => pSQL($content_values['max_no_categories']),
                    'max_no_products' => pSQL($content_values['max_no_products']),
                    'product_type_to_show' => pSQL($content_values['featured_product_type']),
                    'featured_product_ids' => pSQL($content_values['featured_products']),
                    'product_image_size' => pSQL($content_values['product_image_size']),
                    'fb_user_id' => '',
                    'footer_content' => pSQL($content_values['footer_content'], true)
                );
                //Insert Category
                Db::getInstance()->insert("kb_facebook_profiles", $insertData);
                $insert_id = Db::getInstance()->Insert_ID();
                
                echo $insert_id;
            } }
            die;
        }
        parent::init();
    }

    public function renderForm()
    {
        $this->context->smarty->assign('fb_app_id', Configuration::get('FB_STORE_APP_ID'));
        $this->context->smarty->assign('id_kb_facebook_profiles', Tools::getValue('id_kb_facebook_profiles'));
        $action_profile_general = AdminController::$currentIndex . '&token=' . Tools::getAdminTokenLite('AdminKbFacebookProfiles');
        $this->context->smarty->assign('action_profile_general', $action_profile_general);
        $this->available_tabs_lang = array(
            'General' => $this->module->l('General Settings', 'AdminKbFacebookProfilesController'),
            'Content' => $this->module->l('Content Settings', 'AdminKbFacebookProfilesController')
        );
        $this->available_tabs = array(
            'General',
            'Content'
        );
        $output = null;

        $this->tab_display = 'General';
        $profile_tabs = array();
        foreach ($this->available_tabs as $profile_tab) {
            $profile_tabs[$profile_tab] = array(
                'id' => $profile_tab,
                'selected' => (Tools::strtolower($profile_tab) == Tools::strtolower($this->tab_display) || (isset($this->tab_display_module) && 'module' .
                $this->tab_display_module == Tools::strtolower($profile_tab))),
                'name' => $this->available_tabs_lang[$profile_tab],
                'href' => AdminController::$currentIndex . '&token=' . Tools::getAdminTokenLite('AdminKbFacebookProfiles'),
            );
        }
        $this->fields_form = array(
            'form' => array(
                'id_form' => 'general_form',
                'legend' => array(
                    'title' => $this->module->l('General Settings', 'AdminKbFacebookProfilesController'),
                ),
                'input' => array(
                    array(
                        'type' => 'hidden',
                        'name' => 'profile[profile_id]'
                    ),
                    array(
                        'type' => 'hidden',
                        'name' => 'profile[id_kb_facebook_profiles]'
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->module->l('Enable/Disable', 'AdminKbFacebookProfilesController'),
                        'name' => 'profile[enable]',
                        'hint' => $this->module->l('Activate Module', 'AdminKbFacebookProfilesController'),
                        'class' => 'general_tab',
                        'values' => array(
                            array(
                                'value' => 1,
                            ),
                            array(
                                'value' => 0,
                            ),
                        ),
                    ),
                    array(
                        'label' => $this->module->l('Profile Name', 'AdminKbFacebookProfilesController'),
                        'type' => 'text',
                        'class' => 'general_tab',
                        'name' => 'profile[name]',
                        'required' => true,
                        'hint' => $this->module->l('Profile Name', 'AdminKbFacebookProfilesController')
                    ),
                    
                ),
                'buttons' => array(
                    array(
                        'class' => 'btn btn-default pull-right form_general',
                        'name' => 'submit' . $this->name,
                        'title' => $this->module->l('Save and Next', 'AdminKbFacebookProfilesController'),
                        'icon' => 'process-icon-save'
                    )
                )
            ),
        );

        if (Tools::getValue('id_kb_facebook_profiles')) {
            $id_profile = Tools::getValue('id_kb_facebook_profiles');
            $query_get_profile = 'SELECT * FROM ' . _DB_PREFIX_ . 'kb_facebook_profiles ec WHERE id_kb_facebook_profiles =' . (int) Tools::getValue('id_kb_facebook_profiles');
            $profile = Db::getInstance()->executeS($query_get_profile);
            $image1 = $profile[0]['banner_path'];
            $default_logo = $profile[0]['shop_logo'];
            $profile[0]['featured_categories'] = str_replace('"', '', $profile[0]['featured_categories']);
            $selected_store_cat = explode(',', $profile[0]['featured_categories']);
            $selected_menu = explode(',', $profile[0]['menu_items']);
        } else {
            $shops = Shop::getContextListShopID();
            $conf = null;

            if (is_array($shops) && count($shops) > 1) {
                foreach ($shops as $key => $shop_id) {
                    $shop_group_id = Shop::getGroupFromShop($shop_id);
                    $conf .= (string) ($key > 1 ? ',' : '') . Configuration::get('MOD_BLOCKTOPMENU_ITEMS', null, $shop_group_id, $shop_id);
                }
            } else {
                $shop_id = (int) $shops[0];
                $shop_group_id = Shop::getGroupFromShop($shop_id);
                $conf = Configuration::get('MOD_BLOCKTOPMENU_ITEMS', null, $shop_group_id, $shop_id);
            }
            if (Tools::strlen($conf)) {
                $conf = explode(',', $conf);
            }
            $selected_store_cat = array();
            if (is_array($conf)) {
                foreach ($conf as $item) {
                    preg_match($this->pattern, $item, $values);
                    $selected_store_cat[] = (int) Tools::substr($item, Tools::strlen($values[1]), Tools::strlen($item));
                }
            }
            $default_logo = $this->getRootDirUrl() . "img/logo.jpg";
            $default_content = $this->getDefaultContent();
            $image1 = $default_content['banner'];
            $selected_menu = explode(',', 'home:Home');
        }
        $noimage = $this->getRootDirUrl() . "img/logo.jpg";
        $nobanner = $this->getModuleDirUrl() . "facebookstore/views/img/admin/uploads/banner1.jpg";
        $this->context->smarty->assign('banner', $image1);
        $this->context->smarty->assign('thumbnail', $default_logo);
        $this->context->smarty->assign('noimagelogo', $noimage);
        $this->context->smarty->assign('noimagebanner', $nobanner);

        $selected_data = $this->getSelelctedHtml($selected_menu);
        //Get menu items
        $menu_items = array();
        $id_lang = (int) $this->context->language->id;
        $categories = Category::getSimpleCategories($id_lang);
        foreach ($categories as $category) {
            $menu_items[$category['id_category']] = $category['name'];
        }

        $others = array(
            'home' => 'Home');
        $selected_array_key = array();
        if (is_array($selected_menu)) {
            foreach ($selected_menu as $value) {
                $option = explode(':', $value);
                $selected_array_key[] = $option[0];
            }
        }
        $categories = $this->generateMenu(Category::getNestedCategories(Configuration::get('PS_HOME_CATEGORY'), $id_lang, false), $selected_array_key);
        $other_menus = $this->generateOtherMenu($selected_array_key, $others);

        $this->context->smarty->assign('allmenuitems', $categories);
        $this->context->smarty->assign('othermenuitems', $other_menus);
         $this->context->smarty->assign('selectedmenuitems', $selected_data);

        $logo_url = $this->context->smarty->fetch(
            _PS_MODULE_DIR_ . 'facebookstore/views/templates/admin/controllers/image.tpl'
        );
        $this->context->smarty->assign('image_path', $this->getPath());


        $image_url1 = "<img id='bannerimage1' src='" . $image1 . "'width='100%;'>";

        //Get Store root category
        $root = Category::getRootCategory();

        //Generating the tree for the first column
        $tree = new HelperTreeCategories('prestashop_category'); //The string in param is the ID used by the generated tree
        $tree->setUseCheckBox(true)
            ->setAttribute('is_category_filter', $root->id)
            ->setRootCategory($root->id)
            ->setSelectedCategories($selected_store_cat)
            ->setInputName('profile[prestashop_category]')
            ->setFullTree(true); //Set the name of input. The option "name" of $fields_form doesn't seem to work with "categories_select" type

        $categoryTreePresta = $tree->render();

        $sql8 = 'SELECT l.name,l.id_product,p.reference FROM `'
            . _DB_PREFIX_ . 'product_lang` as l inner join `' . _DB_PREFIX_ . 'product` as p' .
            ' on l.id_product = p.id_product group by l.id_product';

        $product_options = Db::getInstance()->ExecuteS($sql8);

        $i = 0;
        $option1 = array();
        foreach ($product_options as $product_options) {
            $option1[$i]['id_module'] = $product_options['id_product'];
            $option1[$i]['name'] = $product_options['name'] . ' : ' . $product_options['reference'];
            $i++;
        }

        $this->fields_formcontent = array(
            'form' => array(
                'id_form' => 'content_form',
                'legend' => array(
                    'title' => $this->module->l('Content Settings', 'AdminKbFacebookProfilesController'),
                ),
                'input' => array(
                    array(
                        'type' => 'hidden',
                        'name' => 'profile[id_kb_facebook_profiles]'
                    ),
                    array(
                        'type' => 'file',
                        'label' => $this->module->l('Upload New Logo', 'AdminKbFacebookProfilesController'),
                        'name' => 'thumbnail',
                        'image' => $logo_url,
                        'required' => true,
                        //                            'size' => $logo_size,
                        'lang' => false,
                        'display_image' => true,
                        'col' => '9',
                        'hint' => $this->module->l('Upload the logo for Facebook Store', 'AdminKbFacebookProfilesController'),
                        'desc' => $this->module->l('Upload the logo of PNG, JPG or JPEG format only', 'AdminKbFacebookProfilesController'),
                    ),
                    array(
                        'type' => 'file',
                        'label' => $this->module->l('Home page Image', 'AdminKbFacebookProfilesController'),
                        'name' => 'file1',
                        'required' => true,
                        'image' => $image_url1 ? $image_url1 : false,
                        'lang' => false,
                        'display_image' => true,
                        'col' => '9',
                        'hint' => $this->module->l('Upload image for the banner of the Home page(max-width:810px;', 'AdminKbFacebookProfilesController')
                    ),
                    array(
                        'class' => 'free-disabled',
                        'type' => 'text',
                        'label' => $this->module->l('Home Page Content', 'AdminKbFacebookProfilesController'),
                        'name' => 'home_page_content',
                        'lang' => true,
                        'disabled' => true,
                        'desc' => $this->module->l('It will be displayed as content of Home Page.', 'AdminKbFacebookProfilesController'),
                        'hint' => $this->module->l('Home Page Content', 'AdminKbFacebookProfilesController'),
                    ),
                    array(
                        'label' => $this->module->l('Menu item', 'AdminKbFacebookProfilesController'),
                        'type' => 'text',
                        'name' => 'menu_item',
                        'required' => true,
                        'hint' => $this->module->l('Selelct menu item for home page', 'AdminKbFacebookProfilesController')
                    ),
                    array(
                        'class' => 'free-disabled',
                        'type' => 'color',
                        'label' => $this->module->l('Facebook page color', 'AdminKbFacebookProfilesController'),
                        'name' => 'profile[fb_page_color]',
                        'value' => '#48649f',
                        'disabled' => true,
                        'hint' => $this->module->l('Theme Color of Facebook Store Page', 'AdminKbFacebookProfilesController'),
                        ),
                    array(
                        'class' => 'free-disabled',
                        'label' => $this->module->l('Max No of featured Categories', 'AdminKbFacebookProfilesController'),
                        'type' => 'text',
                        'name' => 'profile[max_no_categories]',
                        'hint' => $this->module->l('If categories selected Re more than max no then random set of categories will be shown from selelcted ones.', 'AdminKbFacebookProfilesController'),
                        'class' => 'size-field',
                        'required' => true,
                        'disabled' => true,
                        'desc' => $this->module->l('Max no of featured categories to be shown on Home Page', 'AdminKbFacebookProfilesController')
                    ),
                    array(
                        'class' => 'free-disabled',
                        'type' => 'categories_select',
                        'label' => $this->module->l('Featured categories on Home', 'AdminKbFacebookProfilesController'),
                        'hint' => $this->module->l('Select prestashop category', 'AdminKbFacebookProfilesController'),
                        'name' => 'profile[prestashop_category]',
                        'required' => true,
                        'category_tree' => $categoryTreePresta,
                        'disabled' => true//This is the category_tree called in form.tpl
                        
                    ),
                    array(
                        'label' => $this->module->l('Max No of featured Products', 'AdminKbFacebookProfilesController'),
                        'type' => 'text',
                        'name' => 'profile[max_no_products]',
                        'hint' => $this->module->l('If products selected are more than max no then random set of products will be shown from selelcted ones.', 'AdminKbFacebookProfilesController'),
                        'class' => 'size-field',
                        'required' => true,
                        'desc' => $this->module->l('Max no of featured products to be shown on Home Page', 'AdminKbFacebookProfilesController')
                    ),
                    array(
                        'label' => $this->module->l('Products To be Shown', 'AdminKbFacebookProfilesController'),
                        'type' => 'select',
                        'name' => 'profile[product_type]',
                        'hint' => $this->module->l('products to be shown on Facebook StoreHome Page', 'AdminKbFacebookProfilesController'),
                        'required' => true,
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_type' => '1',
                                    'name' => $this->module->l('As Shown on Main Website', 'AdminKbFacebookProfilesController')),
                                ),
                            'id' => 'id_type',
                            'name' => 'name'
                        )
                    ),
                    array(
                        'class' => 'free-disabled',
                        'type' => 'select',
                        'label' => $this->module->l('Search Product', 'AdminKbFacebookProfilesController'),
                        'name' => 'profile[product_ids][]',
                        'multiple' => 'multiple',
                        'hint' => $this->module->l('Select Products', 'AdminKbFacebookProfilesController'),
                        'is_bool' => true,
                        'id' => 'multiple-select',
                        'required' => true,
                        'options' => array(
                            'query' => $option1,
                            'id' => 'id_module',
                            'name' => 'name'
                        ),
                        'disabled' => true
                    ),
                    array(
                        'label' => $this->module->l('Product Image Size', 'AdminKbFacebookProfilesController'),
                        'type' => 'select',
                        'name' => 'profile[product_image_size]',
                        'hint' => $this->module->l('Size of image to shown on Facebook Store', 'AdminKbFacebookProfilesController'),
                        'class' => 'size-field',
                        'required' => true,
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_size' => 'small',
                                    'name' => $this->module->l('Small', 'AdminKbFacebookProfilesController')),
                                array(
                                    'id_size' => 'big',
                                    'name' => $this->module->l('Big', 'AdminKbFacebookProfilesController'))
                            ),
                            'id' => 'id_size',
                            'name' => 'name'
                        )
                    //'desc' => $this->module->l('In Pixels')
                    ),
                    array(
                        'class' => 'free-disabled',
                        'type' => 'text',
                        'label' => $this->module->l('Footer Content', 'AdminKbFacebookProfilesController'),
                        'name' => 'footer_content',
                        'lang' => true,
                        'disabled' => true,
                        'desc' => $this->module->l('It will be displayed as footer content of Home Page.', 'AdminKbFacebookProfilesController'),
                        'hint' => $this->module->l('Home Page Footer Content', 'AdminKbFacebookProfilesController'),
                    ),
                    array(
                        'label' => '',
                        'type' => 'hidden',
                        'name' => 'previous_value1',
                    ),
                    array(
                        'label' => '',
                        'type' => 'hidden',
                        'name' => 'previous_value2',
                    ),
                ),
                'buttons' => array(
                    array(
                        'class' => 'btn btn-default pull-right form_content',
                        'name' => 'submit' . $this->name,
                        'title' => $this->module->l('Save Profile', 'AdminKbFacebookProfilesController'),
                        'icon' => 'process-icon-save'
                    )
                )
            )
        );
        $action = AdminController::$currentIndex . '&token=' . Tools::getAdminTokenLite('AdminKbFacebookProfiles');
        $languages = Language::getLanguages(false);
        $field_value = array();
        foreach ($languages as $k => $language) {
            $languages[$k]['is_default'] = ((int) ($language['id_lang'] == $this->context->language->id));
            $field_value['home_page_content'][$k] = "";
            $languages[$k]['is_default'] = ((int) ($language['id_lang'] == $this->context->language->id));
            $field_value['profile[footer_content]'][$k] = "";
        }


        if (Tools::getValue('id_kb_facebook_profiles')) {
            $id_profile = Tools::getValue('id_kb_facebook_profiles');
            //$this->context->smarty->assign('id_kb_facebook_profiles', $id_profile);
            $query_get_profile = 'SELECT * FROM ' . _DB_PREFIX_ . 'kb_facebook_profiles ec WHERE id_kb_facebook_profiles =' . (int) Tools::getValue('id_kb_facebook_profiles');
            $profile = Db::getInstance()->executeS($query_get_profile);
            //d($profile);
            $field_value = array(
                'profile[profile_id]' => $profile[0]['id_kb_facebook_profiles'],
                'profile[id_kb_facebook_profiles]' => $profile[0]['id_kb_facebook_profiles'],
                'profile[enable]' => $profile[0]['status'],
                'profile[name]' => $profile[0]['profile_name'],
                'profile[fb_page]' => $profile[0]['facebook_page_id'],
                'profile[fb_tab_name]' => $profile[0]['facebook_tab_name'],
                'profile[ps_store]' => $profile[0]['id_shop'],
                'profile[product_image_size]' => $profile[0]['product_image_size'],
                'menu_item' => $profile[0]['menu_items'],
                'profile[max_no_categories]' => '0',
                'profile[product_ids][]' => explode(',', $profile[0]['featured_product_ids']),
                'profile[max_no_products]' => $profile[0]['max_no_products'],
                'profile[product_type]' => 1,
                'profile[fb_page_color]' => '#48649f',
                'previous_value1' => '',
                'previous_value2' => ''
            );
            $footer_content = Tools::unSerialize($profile[0]['footer_content']);
            foreach ($languages as $lang2) {
                $field_value['home_page_content'][$lang2['id_lang']] = '';
                $field_value['footer_content'][$lang2['id_lang']] = '';
            }
        } else {
            $field_value = array(
                'profile[profile_id]' => '',
                'profile[id_kb_facebook_profiles]' => '',
                'profile[enable]' => '',
                'profile[name]' => '',
                'profile[fb_page]' => 0,
                'profile[fb_tab_name]' => '',
                'profile[ps_store]' => '',
                'profile[product_image_size]' => 'big',
                'menu_item' => '',
                'profile[max_no_categories]' => '0',
                'profile[product_ids][]' => array(),
                'profile[max_no_products]' => '3',
                'profile[product_type]' => '1',
                'profile[fb_page_color]' => '#48649f',
                'previous_value1' => '',
                'previous_value2' => ''
            );
            foreach ($languages as $lang2) {
                $field_value['home_page_content'][$lang2['id_lang']] = '';
                $field_value['footer_content'][$lang2['id_lang']] = '';
            }
        }

        $form = $this->getform($this->fields_form, $languages, $field_value, 'general_form', $action);
        $form1 = $this->getform($this->fields_formcontent, $languages, $field_value, 'content_form', $action);
        $this->context->smarty->assign('profile_tabs', $profile_tabs);
        $this->context->smarty->assign('firstCall', false);
        $this->context->smarty->assign('mod_dir', _PS_BASE_URL_ . _MODULE_DIR_);
        $this->context->smarty->assign('form', $form);
        $this->context->smarty->assign('form1', $form1);
        $this->context->smarty->assign('action', $action);
        $this->context->smarty->assign('logo', $default_logo);
        $tpl = 'Form_custom.tpl';
        $helper = new Helper();
        $helper->submit_action = 'submit' . $this->name;
        ;
        $helper->module = $this;
        $this->addJs(_MODULE_DIR_ . 'facebookstore/views/js/admin/script.js');
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->override_folder = 'helpers/';
        $helper->base_folder = 'form/';
        $html = $this->context->smarty->fetch(_PS_MODULE_DIR_ . "facebookstore/views/templates/admin/_configure/helpers/form/" . $tpl);
        //$helper->setTpl($html);
        //$html = $helper->generate();
        $output = $output . $html;
        return $output;
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

    // function to create form using helper
    public function getform($field_form, $languages, $field_value, $id, $action)
    {
        $helper = new HelperForm();
        $helper->module = $this;
        $helper->fields_value = $field_value;
        $helper->name_controller = 'adminkbfacebookprofiles';
        $helper->languages = $languages;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->default_form_language = $this->context->language->id;
        $helper->token = Tools::getAdminTokenLite('AdminKbProfiles');
        $helper->currentIndex = self::$currentIndex;
        ;
        $helper->show_toolbar = true;
        $helper->toolbar_scroll = true;
        $helper->show_cancel_button = false;
        return $helper->generateForm(array(
                'form' => $field_form));
    }

    //Set JS and CSS
    public function setMedia($isNewTheme = false)
    {
        parent::setMedia();
        $this->addJs(_MODULE_DIR_ . 'facebookstore/views/js/velovalidation.js');
        $this->addJs(_MODULE_DIR_ . 'facebookstore/views/js/admin/script_list.js');
        $this->addCSS(_MODULE_DIR_ . 'facebookstore/views/css/admin/facebookstore.css');
        $this->addJs(_MODULE_DIR_ . 'facebookstore/views/js/admin/select2.min.js');
        $this->addJs(_MODULE_DIR_ . 'facebookstore/views/js/admin/select2.js');
        $this->addCSS(_MODULE_DIR_ . 'facebookstore/views/css/admin/select2.css');
    }

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

    private function getRootDirUrl()
    {
        $root_dir = '';
        if ($this->checkSecureUrl()) {
            $root_dir = _PS_BASE_URL_SSL_ . __PS_BASE_URI__;
        } else {
            $root_dir = _PS_BASE_URL_ . __PS_BASE_URI__;
        }
        return $root_dir;
    }

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

    //Get Default values
    public function getDefaultContent()
    {
        $default_content = array();
        $default_logo = $this->getRootDirUrl() . "img/logo.jpg";
        $default_banner = $this->getModuleDirUrl() . "facebookstore/views/img/admin/uploads/banner1.jpg";
        $noimage = $this->getModuleDirUrl() . "facebookstore/views/img/admin/uploads/default.jpg";
        $default_content['logo'] = $default_logo;
        $default_content['noimage'] = $noimage;
        $default_content['banner'] = $default_banner;
        $default_content['home_page_content'] = '';
        $default_content['menu_item'] = 'home:Home';
        $default_content['fb_page_color'] = '#48649f';
        $default_content['max_no_categories'] = '0';
        $default_content['featured_categories'] = '';
        $default_content['max_no_products'] = '3';
        $default_content['featured_product_type'] = '1';
        $default_content['footer_content'] = '';
        $default_content['featured_products'] = '';
        $default_content['product_image_size'] = 'big';

        return $default_content;
    }

    //Generate menu
    public function generateMenu($categories, $selected_array_key, $is_children = 0)
    {
        $html = '';

        foreach ($categories as $key => $category) {
            /* Whenever a category is not active we shouldnt display it to customer */
            if ((bool) $category['active'] === false) {
                continue;
            }
            if ($category['id_category'] != Configuration::get('PS_HOME_CATEGORY')) {
                if (!in_array($category['id_category'], $selected_array_key)) {
                    $html .= '<option value="' . $category['id_category'] . '">';
                    $html .= $category['name'];
                    $html .= '</option>';
                }
            }

            if (isset($category['children']) && !empty($category['children'])) {
                $html .= $this->generateMenu($category['children'], $selected_array_key, 1);
            }
        }
        return $html;
    }

    //Get other menus other than categories
    public function generateOtherMenu($selected_array_key, $others = array())
    {
        $html = '';
        if (!empty($others)) {
            if (is_array($others)) {
                foreach ($others as $key => $other) {
                    if (!in_array($key, $selected_array_key)) {
                        $html .= '<option value="' . $key . '">';
                        $html .= $other;
                        $html .= '</option>';
                    }
                }
            }
        }
        return $html;
    }

    public function getSelelctedHtml($data)
    {
        $html = '';
        if (is_array($data)) {
            foreach ($data as $value) {
                $option = explode(':', $value);
                $html .= '<option value="' . $option[0] . '">';
                $html .= $option[1];
                $html .= '</option>';
            }
        }
        return $html;
    }
}
