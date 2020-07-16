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

class SfknotifypopupCore extends ObjectModel
{
    public $sfk_text;
    public $sfk_dates;
    public $sfk_status;
    public $sfk_text_css;

    /**
    * @see ObjectModel::$definition
    */
    public static $definition = array('table'=>'sfknotifypopup','primary' =>'id_sfknotifypopup','multilang'=>false,'fields'=>array(
    'sfk_text' =>array('type' => self::TYPE_HTML, 'lang' => false, 'validate' => 'isString', 'required' => true,'size' => 2000),    
    'sfk_text_css' =>array('type' => self::TYPE_HTML, 'lang' => false, 'validate' => 'isString', 'required' => true,'size' => 200),            
    'sfk_status' =>array('type' => self::TYPE_BOOL, 'lang' => false, 'validate' => 'isInt', 'required' => true),
    'sfk_dates' =>array('type' => self::TYPE_DATE, 'lang' => false, 'validate' => 'isDateFormat', 'copy_post' => false)));

    public static function getSfknotifypopup($id_lang = null)
    {
        if (is_null($id_lang))
            $id_lang = Context::getContext()->language->id;
        $sfknotifypopup = new Collection('Sfknotifypopup', $id_lang);
        return $sfknotifypopup;
    }
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        parent::__construct($id, $id_lang, $id_shop);
        $this->image_dir = _PS_STORE_IMG_DIR_;
    }
	
}
