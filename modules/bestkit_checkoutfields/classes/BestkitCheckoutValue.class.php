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

class BestkitCheckoutValue extends ObjectModel
{
    public $id;
    public $id_bestkit_checkout_value;
    public $id_bestkit_checkout_field;
    public $value;
    public $id_cart;
    public $id_order;
    public $id_address; //since 1.6.9
    public $date_upd;

    public static $definition = array(
        'table' => 'bestkit_checkout_value',
        'primary' => 'id_bestkit_checkout_value',
        'multilang' => FALSE,
        'fields' => array(
            'id_bestkit_checkout_field' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => TRUE),
            'value' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'id_cart' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'id_order' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'id_address' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'), //since 1.6.9
			'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
        ),
    );

    public static function returnValueByIds($id_bestkit_checkout_field, $id_cart) {
        $sql = 'SELECT value
            FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`
            WHERE id_bestkit_checkout_field = ' . (int)$id_bestkit_checkout_field . '
            AND id_cart = ' . (int)$id_cart;
        $id_bestkit_checkout_field = Db::getInstance()->getValue($sql);

        return $id_bestkit_checkout_field;
    }

    public static function loadByIds($id_bestkit_checkout_field, $id_cart) {
        $sql = 'SELECT id_bestkit_checkout_value
            FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`
            WHERE id_bestkit_checkout_field = ' . (int)$id_bestkit_checkout_field . '
            AND id_cart = ' . (int)$id_cart;

        $id_bestkit_checkout_field = Db::getInstance()->getValue($sql);
        return new self($id_bestkit_checkout_field);
    }

	//since 1.6.9
    public static function returnValuesByAddressId($id_address) {
        $sql = 'SELECT *
            FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`
            WHERE id_address = ' . (int)$id_address;
			
        return Db::getInstance()->executeS($sql);
    }

	//since 1.6.9
    public static function returnValueByAddressIds($id_bestkit_checkout_field, $id_address) {
        $sql = 'SELECT value
            FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`
            WHERE id_bestkit_checkout_field = ' . (int)$id_bestkit_checkout_field . '
				AND id_address = ' . (int)$id_address;
        $id_bestkit_checkout_field = Db::getInstance()->getValue($sql);

        return $id_bestkit_checkout_field;
    }
	
	//since 1.6.9
    public static function loadByAddressId($id_bestkit_checkout_field, $id_address) {
        $sql = 'SELECT id_bestkit_checkout_value
            FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`
            WHERE id_bestkit_checkout_field = ' . (int)$id_bestkit_checkout_field . '
				AND id_address = ' . (int)$id_address;

        $id_bestkit_checkout_field = Db::getInstance()->getValue($sql);
        return new self($id_bestkit_checkout_field);
    }
	
	public static function setOrderForCart($id_cart, $id_order) {
		return Db::getInstance()->Execute('
			UPDATE `' . _DB_PREFIX_ . self::$definition['table'] . '`
			SET `id_order` = ' . (int)$id_order . '
			WHERE `id_cart` = ' . (int)$id_cart . ' AND `id_order` = 0
		');
	}

    public static function getOrderFields($id_order, $id_lang, $is_front = 0, $is_admin = 0, $count = false) {
		if (!$id_order) {
			return array();
		}
		
        $sql = 'SELECT v.*, f.*, fl.*
            FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`v
            LEFT JOIN `' . _DB_PREFIX_ . 'orders` o ON (o.`id_cart` = v.`id_cart`)
            LEFT JOIN `' . _DB_PREFIX_ . 'bestkit_checkout_field` f ON (v.`id_bestkit_checkout_field` = f.`id_bestkit_checkout_field`)
            LEFT JOIN `' . _DB_PREFIX_ . 'bestkit_checkout_field_lang` fl ON (f.`id_bestkit_checkout_field` = fl.`id_bestkit_checkout_field` AND fl.`id_lang` = ' . (int)$id_lang . ')
            WHERE o.`id_order` = ' . (int)$id_order . ' AND f.`active` = 1 ' .
            ($is_front ? ' AND f.`visible_customer` = 1' : '') . 
            ($is_admin ? ' AND f.`visible_admin` = 1' : '') . '
            GROUP BY v.`id_bestkit_checkout_field`
            ORDER BY f.position';

        $order_fields = Db::getInstance()->ExecuteS($sql);
		
		foreach ($order_fields as &$order_field) {
			$tmp_unserialize = @unserialize($order_field['value']);
			if ($order_field['value'] === 'b:0;' || $tmp_unserialize !== false) {
				$order_field['value'] = implode(', ', $tmp_unserialize);
			}
		}
		
		if ($count) {
			return count($order_fields);
		}
		
		return $order_fields;
    }

	//since 1.6.8
    public static function getOrderFieldsByCartId($id_cart, $id_lang, $is_front = 0, $is_admin = 0, $count = false) {
		if (!$id_cart) {
			return array();
		}
		
        $sql = 'SELECT v.*, f.*, fl.*
            FROM `' . _DB_PREFIX_ . self::$definition['table'] . '`v
            LEFT JOIN `' . _DB_PREFIX_ . 'bestkit_checkout_field` f ON (v.`id_bestkit_checkout_field` = f.`id_bestkit_checkout_field`)
            LEFT JOIN `' . _DB_PREFIX_ . 'bestkit_checkout_field_lang` fl ON (f.`id_bestkit_checkout_field` = fl.`id_bestkit_checkout_field` AND fl.`id_lang` = ' . (int)$id_lang . ')
            WHERE v.`id_cart` = ' . (int)$id_cart . ' AND f.`active` = 1 ' .
            ($is_front ? ' AND f.`visible_customer` = 1' : '') . 
            ($is_admin ? ' AND f.`visible_admin` = 1' : '') . '
            GROUP BY v.`id_bestkit_checkout_field`
            ORDER BY f.position';

        $order_fields = Db::getInstance()->ExecuteS($sql);
		
		foreach ($order_fields as &$order_field) {
			$tmp_unserialize = @unserialize($order_field['value']);
			if ($order_field['value'] === 'b:0;' || $tmp_unserialize !== false) {
				$order_field['value'] = implode(', ', $tmp_unserialize);
			}
		}
		
		if ($count) {
			return count($order_fields);
		}
		
		return $order_fields;
    }
}