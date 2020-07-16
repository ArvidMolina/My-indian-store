<?php
/**
 * 2015 DMConcept
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * @author    Dmconcept <support@dmconcept.fr>
 * @copyright 2015 DMConcept
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Function used to update your module from previous versions to the version 1.1,
 * Don't forget to create one file per version.
 */
function upgrade_module_1_3_0($module)
{
    Configuration::updateValue('PROACCOUNT_REQUIRED_ADDRESS', 0);
    Configuration::updateValue('PROACCOUNT_REGISTER_WITH_ADDRESS', 0);
    Configuration::updateValue('PROACCOUNT_REGISTER_ADDRESS_NORMAL', 0);
    Configuration::updateValue('PROACCOUNT_REGISTER_ADDRESS_PRO', 0);

    if (DmVersion::isVersion17()) {
        $module->registerHook(array(
            'additionalCustomerFormFields',
            'actionObjectAddressDeleteBefore',
            'validateCustomerFormFields',
            'displayNav2',
        ));
    }

    return $module;
}
