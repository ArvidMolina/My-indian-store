<?php
/**
* Registration Fields
*
* NOTICE OF LICENSE
*
* You are not authorized to modify, copy or redistribute this file.
* Permissions are reserved by FME Modules.
*
*  @author    FME Modules
*  @copyright 2018 FME Modules All right reserved
*  @license   FMM Modules
*  @package   Registration Fields
*/

$sql = array();
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'fmm_registration_fields(
        `id_custom_field`       int(11) unsigned NOT NULL auto_increment,
        `field_type`            enum(\'text\',\'textarea\',\'date\',\'boolean\',\'multiselect\',\'select\',\'checkbox\',\'radio\',\'message\',\'image\',\'attachment\') default \'text\',
        `field_validation`      varchar(255) default NULL,
        `position`              tinyint(4) default 0,
        `assoc_shops`           varchar(255) default '.(string)Context::getContext()->shop->id.',
        `value_required`        tinyint(1) default NULL,
        `editable`              tinyint(1) default 1,
        `extensions`            varchar(128) DEFAULT \'jpg\',
        `attachment_size`       DECIMAL(10,2) NOT NULL DEFAULT \'2.0\',
        `alert_type`            varchar(30) default NULL,
        `show_customer`         tinyint(1) default NULL,
        `show_email`            tinyint(1) default NULL,
        `show_admin`            tinyint(1) default NULL,
        `active`                tinyint(1) default NULL,
        `created_time`          datetime default NULL,
        `update_time`           datetime default NULL,
        PRIMARY KEY             (`id_custom_field`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8';

// Table fmm_registration_fields_lang
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'fmm_registration_fields_lang(
        `id_custom_field`       int(11) NOT NULL auto_increment,
        `id_lang`               int(11) NOT NULL,
        `field_name`            varchar(255) default NULL,
        `default_value`         varchar(255) default NULL,
        PRIMARY KEY             (`id_custom_field`,`id_lang`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8';

// Table fmm_registration_fields_values
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'fmm_registration_fields_values(
        `field_value_id`        int(11) NOT NULL auto_increment,
        `id_custom_field`       int(11) NOT NULL,
        PRIMARY KEY             (`field_value_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

//Table fmm_registration_option_values_lang
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'fmm_registration_fields_values_lang(
        `field_value_id`        int(11) NOT NULL,
        `id_lang`               int(11) NOT NULL DEFAULT '.(int)Configuration::get('PS_LANG_DEFAULT').',
        `field_value`           text,
        PRIMARY KEY             (`field_value_id`, `id_lang`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

// Table fmm_registration_userdata
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'fmm_registration_userdata(
        `value_id`              int(10) unsigned NOT NULL auto_increment,
        `id_custom_field`       int(10) unsigned default NULL,
        `id_customer`           int(10) unsigned default NULL,
        `id_guest`              int(10) unsigned default 0,
        `field_value_id`        mediumtext,
        `value`                 mediumtext,
        PRIMARY KEY             (`value_id`),
        UNIQUE KEY `uniq`       (`id_custom_field`,`id_customer`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8';

// Table fmm_registration_fields_shop
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'fmm_registration_fields_shop(
        `id_custom_field`   int(11) NOT NULL,
        `id_shop`           int(11) NOT NULL,
        PRIMARY KEY         (`id_custom_field`,`id_shop`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
