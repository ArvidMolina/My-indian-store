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

class FacebookstoreFbCategoryModuleFrontController extends ModuleFrontController
{
    protected $table_content            = array();
    protected $table_enable_multiaction = false;
    protected $table_row_actions        = array();

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
        $query_get_profile = 'SELECT * FROM ' . _DB_PREFIX_ . 'kb_facebook_profiles ec ORDER BY id_kb_facebook_profiles ASC limit 1';
        $profile = Db::getInstance()->executeS($query_get_profile);
        $menu_items = explode(',', $profile[0]['menu_items']);
        $menus = array();
        foreach ($menu_items as $menu_item) {
            $menu = explode(':', $menu_item);
            $menus[$menu[0]] = $menu[1];
        }
        $this->context->smarty->assign('menus', $menus);
        $this->context->smarty->assign('profile', $profile);
        $this->context->smarty->assign('root_url', $this->getRootDirUrl());
        if (Tools::getvalue('category')) {
            $products_ids = array();
            $category = new Category(Tools::getvalue('category'));
            $this->context->smarty->assign('cat_name', $category->name[$this->context->language->id]);
            
            $this->context->smarty->assign('cat_id', $category->id);

                //$products = $category->getProductsWs();
                /* chnagesd by rishabh on 13th july as initially disabled products were also being shown on page*/
            $products = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
            SELECT cp.`id_product` as id
            FROM `' . _DB_PREFIX_ . 'category_product` cp ,' . _DB_PREFIX_ . 'product as p
            WHERE  cp.id_product = p.id_product and cp.`id_category` = ' . (int) Tools::getvalue('category') . ' and p.active = 1
            ORDER BY `position` ASC');

            //Pagination
            $this->context->smarty->assign('total_pages', count($products));
            $nb_products = count($products);
            $nb_per_page = 12;
            $page = 1;
            if (Tools::getValue('page') != '') {
                $page = (int)Tools::getValue('page');
            }
            $nb_pages = ceil($nb_products / $nb_per_page);

            $start = 0;
            $end = 0;
            if ($page > 1) {
                $start = ($page-1)*$nb_per_page;
                if ($page == $nb_pages) {
                    $end = $nb_products;
                } else {
                    $end = $start + $nb_per_page;
                }
            } else {
                $start = 0;
                $end = $nb_per_page;
            }
            $this->context->smarty->assign('page_no', $page);
            $this->context->smarty->assign('nb_pages', $nb_pages);
            $this->context->smarty->assign('start', $start+1);
            $this->context->smarty->assign('end', $end);
                /* Edited array slice line as initially wrong no of product were fetched from aaray */
                // $products_data = array_slice($products, $start, $end);
            $products_data = array_slice($products, $start, $nb_per_page);
            if (is_array($products_data)) {
                foreach ($products_data as $product) {
                    $products_ids[] = $product['id'];
                }
            }
        }
        $products_array = array();
        foreach ($products_ids as $product_id) {
            $product = new Product($product_id, false, $this->context->language->id, $profile[0]['id_shop']);
            $all_products = array();
                /* added line to show price with tax */
                $price = Tools::ps_round(Product::getPriceStatic($product->id, true, null, 2), 2);
                $all_products['price'] = Tools::displayPrice($price);
                $all_products['name'] = $product->name;
            $all_products['link'] = $this->getProductLinkKb($product->id);
            $image = Image::getCover($product->id);
            $link = new Link;
            if ($profile[0]['product_image_size'] == 'small') {
                $all_products['image'] = $image ? 'http://'.$link->getImageLink($product->link_rewrite, $image['id_image'], ImageType::getFormattedName('small')) : false;
            } else {
                $all_products['image'] = $image ? 'http://'.$link->getImageLink($product->link_rewrite, $image['id_image'], ImageType::getFormattedName('home')) : false;
            }
            $products_array[] = $all_products;
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
        $this->setTemplate("module:facebookstore/views/templates/front/category.tpl");
        
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