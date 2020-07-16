<?php

/*
* File: /upgrade/Upgrade-1.6.13.php
*/
function upgrade_module_1_6_13() {
    return Db::getInstance()->execute('
        alter table `'._DB_PREFIX_.'bestkit_checkout_field`
        MODIFY COLUMN `field_type` ENUM ("field", "text", "date", "bool", "multiple", "dropdown", "price", "checkbox") DEFAULT "field"
    ');
}