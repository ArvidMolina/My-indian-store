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

class MaintenanceMode extends ObjectModel
{
    public $id_wk_maintenance;
    public $image;
    public $text_color;
    public $headline;
    public $description;
    public $footer_text;
    public $page_layout;
    public $facebook_link;
    public $twitter_link;
    public $googleplus_link;
    public $instagram_link;
    public $timer;
    public $timer_layout;
    public $timer_date;
    public $timelapse_display;
    public $email_subscribe;
    public $active;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' =>  'wk_maintenance',
        'primary'   =>  'id_wk_maintenance',
        'multilang' =>  true,
        'fields'    =>  array(
            'headline' =>  array('type' => self::TYPE_HTML, 'validate' => 'isCleanHtml', 'required' => true,
            'lang' => true),
            'description' =>  array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
            'footer_text' =>  array('type' => self::TYPE_HTML, 'lang' => true),
            'page_layout'  =>  array('type' => self::TYPE_STRING, 'required' => false),
            'image'  =>  array('type' => self::TYPE_STRING, ),
            'text_color'  =>  array('type' => self::TYPE_STRING, ),
            'facebook_link'  =>  array('type' => self::TYPE_STRING, 'required' => false),
            'twitter_link'  =>  array('type' => self::TYPE_STRING, 'required' => false),
            'googleplus_link'  =>  array('type' => self::TYPE_STRING, 'required' => false),
            'instagram_link'  =>  array('type' => self::TYPE_STRING, 'required' => false),
            'timer'  =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'timer_layout'  =>  array('type' => self::TYPE_STRING, 'required' => false),
            'timer_date' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'required' => false),
            'timelapse_display' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'email_subscribe' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'required' => false),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'required' => false),
        )
    );

    public static function getValues($idLang = null)
    {
        return Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.self::$definition['table'].' a
            INNER JOIN '._DB_PREFIX_.self::$definition['table'].'_lang b
            ON(a.id_wk_maintenance = b.id_wk_maintenance)
            WHERE 1'. ((int)$idLang ? ' AND b.id_lang='.(int)$idLang : ''));
    }

    public static function getRow($idLang)
    {
        return Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.self::$definition['table'].' a
            INNER JOIN '._DB_PREFIX_.self::$definition['table'].'_lang b
            ON(a.id_wk_maintenance = b.id_wk_maintenance)
            WHERE a.active = 1 AND b.id_lang='.(int)$idLang);
    }

    public static function deleteOldData()
    {
        return Db::getInstance()->execute('DELETE a, b FROM '._DB_PREFIX_.self::$definition['table'].' a
            LEFT JOIN '._DB_PREFIX_.self::$definition['table'].'_lang b
            ON(a.id_wk_maintenance = b.id_wk_maintenance)');
    }

    public static function deleteTable()
    {
        return Db::getInstance()->execute('
            DROP TABLE IF EXISTS
            `'._DB_PREFIX_.'wk_maintenance`,
            `'._DB_PREFIX_.'wk_maintenance_lang`');
    }

    public static function isRegistered($email, $shopId)
    {
        return Db::getInstance()->getValue('SELECT `email`
                FROM '._DB_PREFIX_.'emailsubscription
                WHERE `email` = \''.pSQL($email).'\'
                AND id_shop = '.(int)$shopId);
    }

    public static function subscribe($email, $shopId, $idShopGroup)
    {
        $sql = 'INSERT INTO '._DB_PREFIX_.'emailsubscription (id_shop, id_shop_group, email,
        newsletter_date_add, ip_registration_newsletter, http_referer, active)
                VALUES
                ('.(int)$shopId.',
                '.(int)$idShopGroup.',
                \''.pSQL($email).'\',
                NOW(),
                \''.pSQL(Tools::getRemoteAddr()).'\',
                \''.pSQL(Tools::getShopDomain()).'\',
                1
                )';

        return Db::getInstance()->execute($sql);
    }

    public static function getMaintenance()
    {
        return Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'wk_maintenance a
            INNER JOIN '._DB_PREFIX_.'wk_maintenance_lang b
            ON(a.id_wk_maintenance = b.id_wk_maintenance)
            WHERE a.active = 1 AND b.id_lang='.(int) Context::getContext()->language->id);
    }

    public static function assignTplVars($maintenanceMode, $shop, $stylesheets, $javascripts)
    {
        $backgroundImage = 'wkmaintenancemode/views/img/background.jpg';
        if (file_exists(_PS_MODULE_DIR_.$backgroundImage)) {
            $backgroundImage = Context::getContext()->link->getBaseLink().'modules/'.$backgroundImage;
        } else {
            $backgroundImage = null;
        }

        $subscribe = array();
        Hook::exec('actionEmailSubscribe', array(
            'response' => &$subscribe
        ));

        $formates  = array(
            '[url]' => Context::getContext()->link->getPageLink('index', true),
            '[name]' => $shop['name'],
            '[email]' => $shop['email'],
            '[address1]' => $shop['address']['address1'],
            '[address2]' => $shop['address']['address2'],
            '[postcode]' => $shop['address']['postcode'],
            '[city]' => $shop['address']['city'],
            '[state]' => $shop['address']['state'],
            '[country]' => $shop['address']['country'],
            '[phone]' => $shop['phone'],
        );

        if (strtotime($maintenanceMode['timer_date']) - time() <= 0
            && !$maintenanceMode['timelapse_display']) {
            $maintenanceMode['timer'] = false;
        }

        Context::getContext()->smarty->assign(
            array(
                'baseurl' => Context::getContext()->link->getBaseLink(),
                'shop' => $shop,
                'current_time' => date('Y-m-d H:i:s'),
                'maintenance' =>$maintenanceMode,
                'background_image' => $backgroundImage,
                'stylesheets' => $stylesheets,
                'javascripts' => $javascripts,
                'subscribe' => $subscribe,
                'footer_text' => str_replace(
                    array_keys($formates),
                    array_values($formates),
                    urldecode($maintenanceMode['footer_text'])
                )
            )
        );
    }
}
