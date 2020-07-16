<?php

/*
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *         DISCLAIMER   *
 * *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
 * versions in the future.
 * ****************************************************
 *
 *  @author     BEST-KIT.COM (contact@best-kit.com)
 *  @copyright  http://best-kit.com
 *  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

class Bestkit_CheckoutFieldsAjaxModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $action = Tools::getValue('action');
        if (!empty($action) && method_exists($this, 'ajaxProcess' . Tools::ucfirst(Tools::
                    toCamelCase($action)))) {
            return $this->{'ajaxProcess' . Tools::toCamelCase($action)}();
        } elseif (!empty($action) && method_exists($this, 'process' . Tools::ucfirst(Tools::
                    toCamelCase($action)))) {
            return $this->{'process' . Tools::toCamelCase($action)}();
        }
    }
	
	protected function checkRequiredValue($value) {
		if (trim($value) === '') {
			die(Tools::jsonEncode(array(
				'error' => Tools::displayError('This is mandatory field, please enter correct value.'),
			)));
		}
		
		return TRUE;
	}
	
    protected function ajaxProcessSaveValue()
    {
        $id = (int)Tools::getValue('id');
        $value = Tools::getValue('value');

		if (is_array($value)) {
			array_walk($value, 'pSql');
			foreach ($value as $v) {
				$this->checkRequiredValue($v);
			}
			unset($v);
		} else {
			$value = pSql($value);
			$this->checkRequiredValue($value);
		}

		$checkoutFieldObj = new BestkitCheckoutField($id);
		$validation = $checkoutFieldObj->validation;
		if (!Validate::$validation($value)) {
			die(Tools::jsonEncode(array(
				'error' => Tools::displayError('You value is incorrect, please enter correct value.'),
			)));
		}

		//from 1.6.12
		if ($checkoutFieldObj->max_length && Tools::strlen($value) > $checkoutFieldObj->max_length) {
			die(Tools::jsonEncode(array(
				'error' => sprintf(Tools::displayError('You value is incorrect, max length is %s, but your value has length %s.'), $checkoutFieldObj->max_length, Tools::strlen($value)),
			)));
		}

		//from 1.6.12
		if ($checkoutFieldObj->min_length && Tools::strlen($value) < $checkoutFieldObj->min_length) {
			die(Tools::jsonEncode(array(
				'error' => sprintf(Tools::displayError('You value is incorrect, min length should be %s, but your value has length %s.'), $checkoutFieldObj->max_length, Tools::strlen($value)),
			)));
		}

		$checkoutValueObj = BestkitCheckoutValue::loadByIds($id, $this->context->cart->id);
        if ($id && $value) {
            $checkoutValueObj->id_cart = $this->context->cart->id;
            $checkoutValueObj->id_order = 0;
            $checkoutValueObj->value = is_array($value) ? serialize($value) : $value;
            $checkoutValueObj->id_bestkit_checkout_field = $id;
            $checkoutValueObj->save();
        } else {
			$checkoutValueObj->delete();
			unset($checkoutValueObj);
		}

        die(Tools::jsonEncode(array(
            'id' => isset($checkoutValueObj->id) ? (int)$checkoutValueObj->id : null,
        )));
    }
}