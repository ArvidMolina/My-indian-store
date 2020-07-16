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
 */

class FacebookstoreFbHomeModuleFrontController extends ModuleFrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function setMedia()
    {
        parent::setMedia();
    }

    public function initContent()
    {
        $this->context->smarty->assign('app_id', Configuration::get('FB_STORE_APP_ID'));
        if (!empty(Configuration::get('FB_STORE_APP_ID'))) {
            $query_get_profile = 'SELECT * FROM ' . _DB_PREFIX_ . 'kb_facebook_profiles ec ORDER BY id_kb_facebook_profiles ASC limit 1';
            $profile = Db::getInstance()->executeS($query_get_profile);
            if (is_array($profile) && !empty($profile)) {
                $menu_items = explode(',', $profile[0]['menu_items']);
                $menus = array();
                foreach ($menu_items as $menu_item) {
                    $menu = explode(':', $menu_item);
                    $menus[$menu[0]] = $menu[1];
                }
                $this->context->smarty->assign('menus', $menus);
                $this->context->smarty->assign('profile', $profile);
                $this->context->smarty->assign('root_url', $this->getRootDirUrl());
                //Get Products
                $category = new Category((int)Configuration::get('HOME_FEATURED_CAT'), (int)Context::getContext()->language->id);
                $nb = (int)$profile[0]['max_no_products'];
                if (Configuration::get('HOME_FEATURED_RANDOMIZE')) {
                    $products = $category->getProducts((int)Context::getContext()->language->id, 1, ($nb ? $nb : 8), null, null, false, true, true, ($nb ? $nb : 8));
                } else {
                    $products = $category->getProducts((int)Context::getContext()->language->id, 1, ($nb ? $nb : 8), 'position');
                }
                $products_array = array();
                $products = array_splice($products, 0, $profile[0]['max_no_products']);
                foreach ($products as $product_id) {
                    if (is_array($product_id) && count($product_id) > 0) {
                        if ((int)$product_id['active'] == 1) {
                            $all_products = array();
                            $price = Tools::ps_round(Product::getPriceStatic($product_id['id_product'], true, null, 2), 2);
                            $all_products['price'] = Tools::displayPrice($price);
                            $all_products['name'] = $product_id['name'];
                            $all_products['link'] = $this->getProductLinkKb($product_id['id_product']);
                            $image = Image::getCover($product_id['id_product']);
                            $link = new Link;
                            if ($profile[0]['product_image_size'] == 'small') {
                                $all_products['image'] = $image ? 'http://'.$link->getImageLink($product_id['link_rewrite'], $image['id_image'], ImageType::getFormattedName('small')) : false;
                            } else {
                                $all_products['image'] = $image ? 'http://'.$link->getImageLink($product_id['link_rewrite'], $image['id_image'], ImageType::getFormattedName('home')) : false;
                            }
                            $products_array[] = $all_products;
                        }
                    }
                }
                $friendy_url_active = Configuration::get('PS_REWRITING_SETTINGS');
                $best_link = Context::getContext()->link->getModuleLink('facebookstore', 'fbBest');
                $new_link = Context::getContext()->link->getModuleLink('facebookstore', 'fbNew');
                $home_link = Context::getContext()->link->getModuleLink('facebookstore', 'fbHome');
                $category_url_link = Context::getContext()->link->getModuleLink('facebookstore', 'fbCategory');
                if ((int)$friendy_url_active == 0) {
                    $category_url_link .='&category=';
                } else {
                    $category_url_link .='?category=';
                }
                $this->context->smarty->assign('home_link', $home_link);
                $this->context->smarty->assign('category_url_link', $category_url_link);
                $this->context->smarty->assign('products', $products_array);
                $this->context->smarty->assign('lang', $this->context->language->id);
                $this->display_header = false;
                $this->display_footer = false;
                $this->display_column_left = false;
                $this->display_column_right = false;
                $this->setTemplate("module:facebookstore/views/templates/front/home.tpl");
            } else {
                echo $this->module->l('No Facebook Profile found');
                die;
            }
        } else {
            echo $this->module->l('Facebook App ID not configured with profile');
            die;
        }
        parent::initContent();
    }
    

    private function getProductLinkKb($pid)
    {
        $pro_obj = new Product((int) $pid);
        $def_attr = 0;
        if (isset($pro_obj->cache_default_attribute)) {
            $def_attr = $pro_obj->cache_default_attribute;
        } else {
            $def_attr = Product::getDefaultAttribute($pid);
        }
        $link_rewrite = null;
        if (isset($pro_obj->link_rewrite[$this->context->language->id])) {
            $link_rewrite = $pro_obj->link_rewrite[$this->context->language->id];
        }
        $product_url = $this->context->link->getProductLink(
            $pro_obj->id,
            $link_rewrite,
            $pro_obj->category,
            null,
            null,
            $pro_obj->id_shop_default,
            $def_attr,
            false,
            false,
            true
        );
        unset($pro_obj);
        unset($link_rewrite);
        unset($def_attr);
        return $product_url;
    }
    
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
