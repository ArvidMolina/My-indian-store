<?php
/**
 * 2020 Mathias R.
 *
 * NOTICE OF LICENSE
 *
 * This file is licensed under the Software License Agreement
 * With the purchase or the installation of the software in your application
 * you accept the license agreement.
 *
 * @author    Mathias R.
 * @copyright Mathias R.
 * @license   Commercial license (You can not resell or redistribute this software.)
 */

$sql = [];

    $sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'securitypro` (
        `id_securitypro` int(11) NOT NULL,
        `email` varchar(64) NOT NULL,
        `access_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `ip` varchar(64) NOT NULL,
        `banned` int(1) NOT NULL
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;
        ALTER TABLE `' . _DB_PREFIX_ . 'securitypro`
          ADD PRIMARY KEY (`id_securitypro`);
        ALTER TABLE `' . _DB_PREFIX_ . 'securitypro`
          MODIFY `id_securitypro` int(11) NOT NULL AUTO_INCREMENT;';

foreach ($sql as $query) {
    if (false == Db::getInstance()->execute($query)) {
        return false;
    }
}
