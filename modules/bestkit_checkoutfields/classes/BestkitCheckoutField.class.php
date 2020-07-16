<?php
/**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *         DISCLAIMER   *
 * *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
* versions in the future.
* ****************************************************
*
*  @author     BEST-KIT.COM (contact@best-kit.com)
*  @copyright  http://best-kit.com
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

require_once _PS_MODULE_DIR_ . 'bestkit_checkoutfields/includer.php';

class BestkitCheckoutField extends ObjectModel
{
    public $id;
    public $id_bestkit_checkout_field;
    public $name;
    public $description;
    public $field_type;
    public $required;
    public $validation;
    public $step;
    public $visible_admin;
    public $visible_customer;
    public $default_value;
    public $max_length;
    public $min_length;
    public $active;
    public $position;
    public $date_upd;

    public static $definition = array(
        'table' => 'bestkit_checkout_field',
        'primary' => 'id_bestkit_checkout_field',
        'multilang' => TRUE,
        'fields' => array(
            'field_type' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'validation' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'default_value' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'max_length' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'min_length' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'step' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'visible_admin' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'visible_customer' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'required' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'position' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
			/* Lang fields */
			'name' =>	array('type' => self::TYPE_STRING, 'lang' => TRUE, 'required' => TRUE, 'validate' => 'isGenericName', 'size' => 255),
			'description' =>	array('type' => self::TYPE_HTML, 'lang' => TRUE, 'validate' => 'isCleanHtml'),
        ),
    );

    public static function getFieldsByStep($step, $id_lang, $front = TRUE) {
        $sql = 'SELECT *
            FROM `' . _DB_PREFIX_ . self::$definition['table'] . '` a
            JOIN `' . _DB_PREFIX_ . self::$definition['table'] . '_lang` b ON (b.`id_bestkit_checkout_field` = a.`id_bestkit_checkout_field` AND b.`id_lang` = '.(int)$id_lang.')
            WHERE a.`active` = 1 AND a.`step` = "' . pSql($step) . '"'. ($front ? ' AND a.`visible_customer` = 1' : '') .
			' ORDER BY a.position';
		//'.(Context::getContext()->shop->id ? ' JOIN `'._DB_PREFIX_.'bestkit_checkout_field_shop` s ON (s.`id_bestkit_checkout_field`=a.`id_bestkit_checkout_field` AND s.id_shop='.(int)Context::getContext()->shop->id.')' : '').'
        return Db::getInstance()->ExecuteS($sql);
    }
}