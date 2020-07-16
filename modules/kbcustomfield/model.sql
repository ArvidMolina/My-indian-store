CREATE TABLE IF NOT EXISTS `_PREFIX_kb_custom_fields` (
    `id_field` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `id_section` INT(11) UNSIGNED NOT NULL DEFAULT '0',
    `field_name` VARCHAR(255) NULL,
    `type` VARCHAR(255) NOT NULL,
    `validation` VARCHAR(255) NULL,
    `register_for_newsletter` INT(2) NULL DEFAULT '0',
    `html_id` VARCHAR(255) NULL,
    `html_class` VARCHAR(255) NULL,
    `max_length` INT(11) UNSIGNED NOT NULL DEFAULT '0',
    `min_length` INT(11) UNSIGNED NOT NULL DEFAULT '0',
    `multiselect` INT(2) UNSIGNED NOT NULL DEFAULT '0',
    `file_extension` TEXT NULL ,
    `allow_multifile` INT(2) UNSIGNED NOT NULL DEFAULT '0',
    `required` INT(2) UNSIGNED NOT NULL DEFAULT '0',    
    `editable` INT(2) UNSIGNED NOT NULL DEFAULT '1',
    `show_on_invoice` INT(2) UNSIGNED NOT NULL DEFAULT '1',
    `active`  TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' ,
    `position` INT(11) UNSIGNED NOT NULL DEFAULT '0',
    `date_add` DATETIME NOT NULL ,
    `date_upd` DATETIME NULL ,
    PRIMARY KEY (`id_field`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `_PREFIX_kb_custom_fields_lang` (
    `id_field` INT(11) UNSIGNED NOT NULL ,
    `id_lang` INT(11) UNSIGNED NOT NULL,
    `id_shop` INT (11) UNSIGNED NOT NULL,
    `label` VARCHAR(255) NULL ,
    `description` text NULL,
    `value` TEXT NULL,
    `default_value` TEXT NULL,
    `placeholder` VARCHAR(255) NULL,
    `error_msg` VARCHAR(255) NULL ,    
  
    PRIMARY KEY (`id_field`, `id_lang`, `id_shop`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `_PREFIX_kb_custom_field_section` (
    `id_section` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `placement` VARCHAR(255) NULL,
    `active` INT(2) UNSIGNED NOT NULL DEFAULT '0',
    `position` INT(11) UNSIGNED NOT NULL DEFAULT '0',
    `date_add` DATETIME NOT NULL ,
    `date_upd` DATETIME NULL ,
    PRIMARY KEY (`id_section`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `_PREFIX_kb_custom_field_section_lang` (
    `id_section` INT(11) UNSIGNED NOT NULL ,
    `id_lang` INT(11) UNSIGNED NOT NULL,
    `label` VARCHAR(255) NULL ,
  
    PRIMARY KEY (`id_section`, `id_lang`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `_PREFIX_kb_custom_field_customer_mapping` (
    `id_mapping` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `id_customer` INT(11) UNSIGNED NOT NULL DEFAULT '0',
    `id_employee` INT(11) UNSIGNED NOT NULL DEFAULT '0',
    `id_field` INT(11) UNSIGNED NOT NULL DEFAULT '0',
    `value` TEXT NULL,
    `date_add` DATETIME NOT NULL ,
    `date_upd` DATETIME NULL ,
    PRIMARY KEY (`id_mapping`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;