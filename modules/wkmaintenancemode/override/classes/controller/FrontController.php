<?php
/**
* 2010-2019 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2019 Webkul IN
*  @license   https://store.webkul.com/license.html
*/

class FrontController extends FrontControllerCore
{
    protected function displayMaintenancePage()
    {
        if ($this->maintenance == true || !(int) Configuration::get('PS_SHOP_ENABLE')) {
            $this->maintenance = true;
            if (!in_array(Tools::getRemoteAddr(), explode(',', Configuration::get('PS_MAINTENANCE_IP')))) {
                header('HTTP/1.1 503 Service Unavailable');
                header('Retry-After: 3600');
                if (Module::isEnabled('wkmaintenancemode')) {
                    require_once(_PS_MODULE_DIR_.'wkmaintenancemode/classes/MaintenanceMode.php');
                    if ($maintenanceMode = MaintenanceMode::getMaintenance()) {
                        $this->registerStylesheet(
                            'bootstrap',
                            'modules/wkmaintenancemode/views/css/bootstrap.min.css',
                            array('media' => 'all', 'priority' => 50)
                        );
                        $this->registerStylesheet(
                            'theme-layout',
                            'modules/wkmaintenancemode/views/css/'.$maintenanceMode['page_layout'].'.css',
                            array('media' => 'all', 'priority' => 50)
                        );
                        if ($maintenanceMode['timer']) {
                            $this->registerJavascript(
                                'theme-jquery',
                                'js/jquery/jquery-1.11.0.min.js',
                                array('media' => 'all', 'priority' => 50)
                            );
                            $this->registerJavascript(
                                'theme-timer',
                                'modules/wkmaintenancemode/views/js/'.$maintenanceMode['timer_layout'].'.js',
                                array('media' => 'all', 'priority' => 50)
                            );
                        }
                        MaintenanceMode::assignTplVars(
                            $maintenanceMode,
                            $this->getTemplateVarShop(),
                            $this->getStylesheets(),
                            $this->getJavascript()
                        );
                        $this->smartyOutputContent(_PS_MODULE_DIR_.'wkmaintenancemode/views/templates/front/'.
                        $maintenanceMode['page_layout'].'.tpl');
                        exit;
                    }
                }
                $this->registerStylesheet(
                    'theme-error',
                    '/assets/css/error.css',
                    array('media' => 'all', 'priority' => 50)
                );
                $this->context->smarty->assign(array(
                    'urls' => $this->getTemplateVarUrls(),
                    'shop' => $this->getTemplateVarShop(),
                    'HOOK_MAINTENANCE' => Hook::exec('displayMaintenance', array()),
                    'maintenance_text' => Configuration::get(
                        'PS_MAINTENANCE_TEXT',
                        (int) $this->context->language->id
                    ),
                    'stylesheets' => $this->getStylesheets(),
                    ));
                $this->smartyOutputContent('errors/maintenance.tpl');
                exit;
            }
        }
    }
}
