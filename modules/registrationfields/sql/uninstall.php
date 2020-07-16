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
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'fmm_registration_userdata';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'fmm_registration_fields_values';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'fmm_registration_fields_values_lang';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'fmm_registration_fields_lang';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'fmm_registration_fields';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'fmm_registration_fields_shop';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
