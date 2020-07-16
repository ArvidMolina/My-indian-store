<?php

class bestkit_checkoutfieldsmyaccountModuleFrontController extends ModuleFrontController 
{
    public $auth = TRUE;

    protected $_module = NULL;

    public function __construct()
    {
        parent::__construct();

        $this->context = Context::getContext();
    }

    public function getModule()
    {
        if (is_NULL($this->_module)) {
            $this->_module = new bestkit_checkoutfields;
        }

        return $this->_module;
    }

	public function setMedia()
	{
		parent::setMedia();
		$this->addCSS(_THEME_CSS_DIR_ . 'authentication.css');
	}

    public function init()
    {
        parent::init();
        require_once ($this->module->getLocalPath() . 'includer.php');
        $this->display_column_left = FALSE;
    }

    public function initContent()
    {
        parent::initContent();
		$_customer = $this->context->customer;
		$attributes = BestKitCustomerFields::getCollection($_customer->getGroups(), 'myaccount');

		$this->context->smarty->assign(array(
			'bestkit_customer_id' => (int)$_customer->id,
			'bestkit_attributes' => $attributes,
		));

        $this->setTemplate('module:bestkit_checkoutfields/views/templates/front/myaccount.tpl');
    }

    public function postProcess()
    {
		if (Tools::getIsset('bestkit_customerfields')) {
			//$postState = 'success';
			$errors = BestKitCustomerFields::saveAttributes('myaccount', $this->context->customer->id);
			$this->context->cookie->bestkit_errors = FALSE;
			if (is_array($errors)) {
				$this->context->cookie->bestkit_errors = implode('<br/>', $errors);
			}

			Tools::redirect($this->context->link->getModuleLink('bestkit_checkoutfields', 'myaccount'));
		}
    }
}

