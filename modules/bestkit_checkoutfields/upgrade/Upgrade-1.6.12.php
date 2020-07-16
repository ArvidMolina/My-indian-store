<?php

/*
* File: /upgrade/Upgrade-1.6.12.php
*/
function upgrade_module_1_6_12() {
    return Db::getInstance()->execute('
        alter table `'._DB_PREFIX_.'bestkit_checkout_field`
        add column `max_length` int(11) unsigned NOT NULL DEFAULT \'0\' after `default_value`,
        add column `min_length` int(11) unsigned NOT NULL DEFAULT \'0\' after `default_value`
    ');
}