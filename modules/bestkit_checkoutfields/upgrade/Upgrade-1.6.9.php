<?php

/*
* File: /upgrade/Upgrade-1.6.9.php
*/
function upgrade_module_1_6_9() {
	return Db::getInstance()->execute('
		ALTER TABLE `'._DB_PREFIX_.'bestkit_checkout_value`
		ADD COLUMN `id_address` int(11) unsigned NOT NULL
    ');
}