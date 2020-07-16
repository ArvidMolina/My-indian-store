<?php
class AddressController extends AddressControllerCore
{
    public function initContent()
    {
        parent::initContent();
		
		$addressObj = new Address(Tools::getValue('id_address'));
		$this->context->smarty->assign('displayAddressHook', Hook::exec(
				'displayAddress',
				array(
					'address' => $addressObj,
					'errors' => &$this->errors,
				)
			)
		);
	}
	
    public function postProcess()
    {
		$parent_process = parent::postProcess();
		if (Tools::isSubmit('submitAddress')) {
			$addressObj = new Address(Tools::getValue('id_address'));
			Hook::exec(
				'submitAddress',
				array(
					'address' => $addressObj,
					'errors' => &$this->errors,
				)
			);
			if (!empty($this->errors))
				unset($this->should_redirect);
		}
			
        return $parent_process;
	}
}
