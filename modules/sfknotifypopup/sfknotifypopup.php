<?php
/**
* SFK Notification Popup Text on Home Page
*
* NOTICE OF LICENSE
* 
* Each copy of the software must be used for only one production website, it may be used on additional
* test servers. You are not permitted to make copies of the software without first purchasing the
* appropriate additional licenses. This license does not grant any reseller privileges.
* 
* @author    Shahab
* @copyright 2007-2019 Shahab-FK Enterprises
* @license   Prestashop Commercial Module License
*/

if (!defined('_PS_VERSION_'))
   exit;
header('X-Frame-Options: GOFORIT'); 

if (_PS_VERSION_ >= '1.7') {
   require_once _PS_MODULE_DIR_.'/sfknotifypopup/classes/Sfknotifypopup.php';
}

include_once(_PS_ROOT_DIR_.'/config/config.inc.php');
include_once(_PS_ROOT_DIR_.'/init.php');
            
class Sfknotifypopup extends Module 
{
    public function __construct()
    {
        $this->bootstrap  = true;
        $this->name       = 'sfknotifypopup';
        $this->tab        = 'front_office_features';
        $this->version    = '1.0.0';
        $this->author     = 'Shahab';
        $this->module_key = '9b4c24bed12407a92e57927b9467dabe';
        $this->author_address = '0xfd95542428628BB79Df5B6ACa966fbF3c7FdD948';
        parent::__construct();
        $this->displayName      = $this->l('SFK Notification Popup Text on Home Page.');
        $this->description      = $this->l('The module helps to show notification text about products,offer,promotions,sales,store information on home page.');
        $this->confirmUninstall = $this->l('Are you sure you want to remove this module?');
    }
    
    public function install()
    {
        // New Tab
        if (_PS_VERSION_ >= '1.7') {
            $parentTabID = Tab::getIdFromClassName('AdminAdmin');
            $tab = new Tab();
            $tab->active = 1;
            $tab->id_parent = $parentTabID;
        } else {
           // $parentTabID = Tab::getIdFromClassName('AdminAdmin');
            $tab = new Tab();
            $tab->active = 1;
            $tab->id_parent = 0;
        }
        $tab->class_name = "AdminSfknotifypopup"; 
        $tab->name = array();
        
        foreach (Language::getLanguages() as $lang){
          $tab->name[$lang['id_lang']] = "Notifications Popup Text ";
        }
        
        if (_PS_VERSION_ < '1.6') {
            $tab->id_parent  = (int)Tab::getIdFromClassName('AdminAdmin');
        }
        
        $tab->module = 'sfknotifypopup';
        $tab->add();
        if (Validate::isLoadedObject($tab))
                    Configuration::updateValue('PS_SFKNOTIFYPOPUP_MODULE_IDTAB', (int)$tab->id);
                else
        return $this->_abortInstall($this->l('Unable to load the "AdminSfknotifypopup" tab'));

        Db::getInstance()->Execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'sfknotifypopup` (
                    `id_sfknotifypopup` int(11) NOT NULL AUTO_INCREMENT,
                    `sfk_text` varchar(2000) DEFAULT NULL,
                    `sfk_text_css` varchar(200) DEFAULT NULL,
                    `sfk_dates` date DEFAULT NULL,
                    `sfk_status` int(11) DEFAULT 0,
                    `created_date` date DEFAULT NULL,
                    `active` int(11) DEFAULT 0,
                    `type` int(11) DEFAULT 0,
                    PRIMARY KEY (`id_sfknotifypopup`)
        ) ENGINE='._MYSQL_ENGINE_.' default CHARSET=utf8');
        
        Db::getInstance()->Execute('
                CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'sfknotifypopup_lang` (
                    `id_sfknotifypopup` int(10) unsigned NOT NULL,
                    `id_lang` int(10) unsigned NOT NULL,
                    PRIMARY KEY (`id_sfknotifypopup`,`id_lang`),
                    KEY `id_sfknotifypopup` (`id_sfknotifypopup`)
        ) ENGINE='._MYSQL_ENGINE_.' default CHARSET=utf8');
        
        if (parent::install())
        {
            
            //$this->registerHook('displayHeader');
            $this->registerHook('displayHome');
            
            Db::getInstance()->Execute('UPDATE `'._DB_PREFIX_.'tab` SET module=NULL WHERE class_name="AdminSfknotifypopup" ');
            
            if (_PS_VERSION_ < '1.6') {
                
                copy(dirname(__FILE__).DIRECTORY_SEPARATOR.'/controllers/admin/AdminSfknotifypopupController.php', _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'controllers'.
                DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'AdminSfknotifypopupController.php');
                copy(dirname(__FILE__).DIRECTORY_SEPARATOR.'/classes/Sfknotifypopup.php', _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'classes'.
                DIRECTORY_SEPARATOR.'Sfknotifypopup.php');
                // Copy Images
                copy(dirname(__FILE__).DIRECTORY_SEPARATOR.'/views/img/admin/tab-sfknotifypopup.gif', _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'img'.
                DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'tab-sfknotifypopup.gif');
                copy(dirname(__FILE__).DIRECTORY_SEPARATOR.'/views/img/admin/AdminSfknotifypopup.gif', _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'img'.
                DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'AdminSfknotifypopup.gif');

            } else {
                
                Tools::copy(dirname(__FILE__).DIRECTORY_SEPARATOR.'/controllers/admin/AdminSfknotifypopupController.php', _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'controllers'.
                DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'AdminSfknotifypopupController.php');
                Tools::copy(dirname(__FILE__).DIRECTORY_SEPARATOR.'/classes/Sfknotifypopup.php', _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'classes'.
                DIRECTORY_SEPARATOR.'Sfknotifypopup.php');
                // Copy Images
                Tools::copy(dirname(__FILE__).DIRECTORY_SEPARATOR.'/views/img/admin/tab-sfknotifypopup.gif', _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'img'.
                DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'tab-sfknotifypopup.gif');
                Tools::copy(dirname(__FILE__).DIRECTORY_SEPARATOR.'/views/img/admin/AdminSfknotifypopup.gif', _PS_ROOT_DIR_.DIRECTORY_SEPARATOR.'img'.
                DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'AdminSfknotifypopup.gif');

                // Clear cache
                include_once(_PS_ROOT_DIR_.'/config/config.inc.php');
                include_once(_PS_ROOT_DIR_.'/init.php');
                Tools::clearSmartyCache();
                Tools::clearXMLCache();
                Media::clearCache();
                Tools::generateIndex();
            }
            
            return true;
        }
        else
            return false;
    }
    
    public function uninstall()
    {
        if ($id_tab = Tab::getIdFromClassName('AdminSfknotifypopup'))
        {
            $tab = new Tab((int)$id_tab);
            $tab->delete();
        }
        
        Db::getInstance()->Execute(' DROP TABLE IF EXISTS `'._DB_PREFIX_.'sfknotifypopup`, `'._DB_PREFIX_.'sfknotifypopup_lang`; ');
        return parent::uninstall();
        
    }
    
    public function hookDisplayHome()
    {
        $sfk_text = NULL; 
        $sfk_text_css = NULL;

        $result = Db::getInstance()->ExecuteS(" SELECT * FROM "._DB_PREFIX_."sfknotifypopup WHERE sfk_status=1  ");		
        
        foreach ($result as $row)
        {
            $sfk_text = $row['sfk_text'];
            $sfk_text_css = $row['sfk_text_css'];
        }	

        $get_url = Db::getInstance()->ExecuteS('SELECT domain,physical_uri FROM '._DB_PREFIX_.'shop_url ');
        $protocol = (isset($_SERVER['HTTPS']) ? "https" : "http") ;
        $site_url = "$protocol://".$get_url[0]['domain'].'/'.$get_url[0]['physical_uri']."/";
        $this->context->smarty->assign('SITEURL',$site_url);
        
        $this->context->smarty->assign('SFK_TEXT',$sfk_text);
        $this->context->smarty->assign('SFK_TEXT_CSS',$sfk_text_css);
        
        if (_PS_VERSION_ >= '1.7') {
            $this->context->smarty->assign('PS_FLAG',"PS17");
        } 
        if (_PS_VERSION_ > '1.5' && _PS_VERSION_ < '1.7') {
            $this->context->smarty->assign('PS_FLAG',"PS16");
        }
        if (_PS_VERSION_ < '1.6') {
            $this->context->smarty->assign('PS_FLAG',"PS15");
        }

        if(!empty($sfk_text))
        {
            return $this->display(__FILE__, './views/templates/front/sfknotifypopup.tpl');
        }
    }
	
    /**
    * Surcharge de la fonction de traduction sur PS 1.7 et supérieur.
    * La fonction globale ne fonctionne pas
    * @param type $string
    * @param type $class
    * @param type $addslashes
    * @param type $htmlentities
    * @return type
    */
    public function l($string, $class = null, $addslashes = false, $htmlentities = true)
    {
        if (_PS_VERSION_ >= '1.7') {
            return Context::getContext()->getTranslator()->trans($string);
        } else {
            return parent::l($string, $class, $addslashes, $htmlentities);
        }
    }
    
    
}


?>
