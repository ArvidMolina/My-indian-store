<?php
/**
 * 2007-2015 PrestaShop
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

class BestkitCheckoutOption extends ObjectModel
{
    public static $TYPES = array('dropdown', 'multiple');

    public $id;
    public $id_bestkit_checkout_field_option;
    public $id_bestkit_checkout_field;
    public $value;
    public $date_upd;

    public static $definition = array(
        'table' => 'bestkit_checkout_field_option',
        'primary' => 'id_bestkit_checkout_field_option',
        'multilang' => FALSE,
        'fields' => array(
            'id_bestkit_checkout_field' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => TRUE),
            'value' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
        ),
    );

    public static function getValuesById($id_bestkit_checkout_field)
    {
        $sql = 'SELECT *
            FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`
            WHERE id_bestkit_checkout_field = ' . (int)$id_bestkit_checkout_field;
        $options = Db::getInstance()->ExecuteS($sql);
//print_r($options); die;
        return $options;
    }

    public static function deleteAllById($id_bestkit_checkout_field)
    {
        $sql = 'DELETE FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`
            WHERE id_bestkit_checkout_field = ' . (int)$id_bestkit_checkout_field;
        return Db::getInstance()->Execute($sql);
    }

    public static function deleteAllByIdSmart($id_bestkit_checkout_field, $exists)
    {
		if (!$exists) {
			return FALSE;
		}
		
        $sql = 'DELETE FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`
            WHERE id_bestkit_checkout_field = ' . (int)$id_bestkit_checkout_field . '
            AND id_bestkit_checkout_field_option NOT IN (' . implode(', ', $exists) . ')';

        return Db::getInstance()->Execute($sql);
    }

    public static function isIsset($id_bestkit_checkout_field, $value)
    {
        $sql = 'SELECT id_bestkit_checkout_field_option
            FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`
            WHERE id_bestkit_checkout_field = ' . (int)$id_bestkit_checkout_field . '
            AND value = "' . $value . '"';
        return Db::getInstance()->getValue($sql);
    }
}