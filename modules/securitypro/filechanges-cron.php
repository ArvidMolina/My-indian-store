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

include __DIR__ . '/../../config/config.inc.php';

include __DIR__ . '/../../init.php';

if (!Tools::isPHPCLI()) {
    if (Tools::substr(Tools::encrypt('filechanges/cron'), 0, 10) != Tools::getValue('token') || !Module::isInstalled('securitypro')) {
        die('Bad token');
    } else {
        echo 'success';
    }
}

$securitypro = Module::getInstanceByName('securitypro');

if ($securitypro->active) {
    $securitypro->cron = 1;
    $securitypro->checkDiff();
}
