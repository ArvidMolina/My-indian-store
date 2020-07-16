<?php
/**
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * We are experts and professionals in PrestaShop
 *
 * @author    PresTeamShop.com <support@presteamshop.com>
 * @copyright 2011-2019 PresTeamShop
 * @license   see file: LICENSE.txt
 * @category  PrestaShop
 * @category  Module
 */
class AuthController extends AuthControllerCore
{
    /*
    * module: onepagecheckoutps
    * date: 2020-04-01 11:52:46
    * version: 4.0.5
    */
    public $onepagecheckoutps;
    /*
    * module: onepagecheckoutps
    * date: 2020-04-01 11:52:46
    * version: 4.0.5
    */
    public function init()
    {
        parent::init();
        if (Module::isInstalled('onepagecheckoutps')) {
            $opc = Module::getInstanceByName('onepagecheckoutps');
            if (Validate::isLoadedObject($opc) && $opc->active) {
                if ($opc->core->isVisible() && Tools::getIsset('create_account')) {
                    if ($opc->config_vars['OPC_REPLACE_AUTH_CONTROLLER']) {
                        $this->onepagecheckoutps = $opc;
                    }
                }
            }
        }
    }
    /*
    * module: onepagecheckoutps
    * date: 2020-04-01 11:52:46
    * version: 4.0.5
    */
    public function initContent()
    {
        if (Validate::isLoadedObject($this->onepagecheckoutps)) {
            parent::initContent();
            $this->onepagecheckoutps->initContentRegisterControllerOPC($this, '');
        } else if (Tools::isSubmit('submitCreate')) {
            Hook::exec('actionContactFormSubmitCaptcha');
            if (!sizeof($this->context->controller->errors)) {
                parent::initContent();
            } else {
                $register_form = $this
                ->makeCustomerForm()
                ->setGuestAllowed(false)
                ->fillWith(Tools::getAllValues());
                FrontController::initContent();
                $this->context->smarty->assign(array(
                    'register_form' => $register_form->getProxy(),
                    'hook_create_account_top' => Hook::exec('displayCustomerAccountFormTop')
                ));
                $this->setTemplate('customer/registration');
            }
        } else {
            parent::initContent();
        }
    }
    /*
    * module: onepagecheckoutps
    * date: 2020-04-01 11:52:46
    * version: 4.0.5
    */
    public function setMedia()
    {
        parent::setMedia();
        if (Validate::isLoadedObject($this->onepagecheckoutps)) {
            $this->onepagecheckoutps->getMediaFront();
        }
    }
}
