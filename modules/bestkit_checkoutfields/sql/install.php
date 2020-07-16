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

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_checkout_field` (
            `id_bestkit_checkout_field` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT,
			`field_type` ENUM ("field", "text", "date", "bool", "multiple", "dropdown", "price", "checkbox") DEFAULT "field",
            `required` TINYINT( 1 ) UNSIGNED,
            `validation` VARCHAR( 32 ) DEFAULT NULL,
            `step` VARCHAR( 32 ) DEFAULT NULL,
            `visible_admin` TINYINT( 1 ) UNSIGNED,
            `visible_customer` TINYINT( 1 ) UNSIGNED,
            `default_value` TEXT DEFAULT NULL,
            `max_length` int(11) unsigned NOT NULL DEFAULT \'0\',
            `min_length` int(11) unsigned NOT NULL DEFAULT \'0\',
            `active` TINYINT( 1 ) UNSIGNED,
            `position` INT( 11 ) unsigned NOT NULL DEFAULT \'0\',
            `date_upd` DATE NOT NULL,
            PRIMARY KEY (`id_bestkit_checkout_field`)
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_checkout_field_lang` (
            `id_bestkit_checkout_field` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT,
            `id_lang` int(11) NOT NULL,
			`name` varchar(255) DEFAULT NULL,
			`description` TEXT DEFAULT NULL,
            PRIMARY KEY (`id_bestkit_checkout_field`, `id_lang`)
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_checkout_field_shop` (
            `id_bestkit_checkout_field` INT(11) unsigned NOT NULL,
            `id_shop` INT(11) unsigned NOT NULL,
            PRIMARY KEY (`id_bestkit_checkout_field`,`id_shop`)
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_checkout_field_option` (
            `id_bestkit_checkout_field_option` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT,
            `id_bestkit_checkout_field` INT( 11 ) UNSIGNED NOT NULL,
            `value` TEXT DEFAULT NULL,
            `date_upd` DATE NOT NULL,
            PRIMARY KEY (`id_bestkit_checkout_field_option`)
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_checkout_value` (
            `id_bestkit_checkout_value` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT,
            `id_bestkit_checkout_field` INT( 11 ) UNSIGNED NOT NULL,
            `value` TEXT DEFAULT NULL,
            `id_cart` int(11) unsigned NOT NULL,
            `id_order` int(11) unsigned NOT NULL,
			`id_address` int(11) unsigned NOT NULL,
            `date_upd` DATE NOT NULL,
            PRIMARY KEY (`id_bestkit_checkout_value`)
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';



$sql[] = '
    CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_customerfields` (
      `id_bestkit_customerfields` int(10) unsigned NOT NULL auto_increment,
      `code` varchar(255) NOT NULL,
      `type` enum("' . implode('", "', BestKitCustomerFields::getTypes()) . '") NOT NULL,
      `is_enabled` int(10) NOT NULL default "0",
      `sort_order` int(10) NOT NULL default "0",
      `display_on` enum("' . implode('", "', BestKitCustomerFields::getDisplayOns()) . '") NOT NULL,
      `required` int(1) NOT NULL default "0",
      `readonly` int(1) NOT NULL default "0",
	  `default_value` TEXT DEFAULT NULL,
      `validation` varchar(255) NOT NULL,
      `values` text NOT NULL,
      `groups` text NOT NULL,
      `max_text_length` int(10) NOT NULL,
      `file_size` int(10) NOT NULL,
      `file_extensions` text NOT NULL,
      `date_add` datetime NOT NULL,
      `date_upd` datetime NOT NULL,
      PRIMARY KEY  (`id_bestkit_customerfields`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = '
    CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_customerfields_lang` (
      `id_bestkit_customerfields` int(10) unsigned NOT NULL,
      `id_lang` int(10) unsigned NOT NULL,
      `name` varchar(255) NOT NULL,
      PRIMARY KEY (`id_bestkit_customerfields`,`id_lang`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = '
    CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_customerfields_shop` (
      `id_bestkit_customerfields` int(10) unsigned NOT NULL,
      `id_shop` int(10) unsigned NOT NULL,
      PRIMARY KEY (`id_bestkit_customerfields`, `id_shop`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = '
    CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'bestkit_customerfields_customer` (
      `id_bestkit_customerfields` int(10) unsigned NOT NULL,
      `id_customer` int(10) unsigned NOT NULL,
      `value` text NOT NULL,
      PRIMARY KEY (`id_bestkit_customerfields`, `id_customer`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
		