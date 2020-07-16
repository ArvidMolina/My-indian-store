<?php
/**
* Registration
*
* NOTICE OF LICENSE
*
* You are not authorized to modify, copy or redistribute this file.
* Permissions are reserved by FME Modules.
*
*  @author    FME Modules
*  @copyright 2017 fmemodules All right reserved
*  @license   FMM Modules
*  @package   Registration
*/

class RegistrationFieldsMyInfoModuleFrontController extends ModuleFrontController
{
    public function __construct()
    {
        parent::__construct();
        $this->context = Context::getContext();
    }

    public function init()
    {
        parent::init();
        if (!($this->context->customer->logged) || Configuration::get('REGISTRATION_FIELDS_FOSEC', null, $this->context->shop->id_shop_group, $this->context->shop->id) == 0) {
            Tools::redirect($this->context->link->getPageLink('my-account'));
        }
    }

    public function initContent()
    {
        parent::initContent();
        $id_lang = $this->context->cookie->id_lang;
        $objModel = new Fields();
        $registration_fields = $objModel->getCustomFields($id_lang);
        $id_customer = (isset($this->context->customer->id))? $this->context->customer->id : $this->context->cookie->id_customer;
        $id_guest = (!$id_customer)? $this->context->cookie->id_guest : 0;
        $this->updateFields($id_customer);

        $field = new Fields();
        $fields = $field->getAllFields('val.id_customer = '.(int)$id_customer.' ', $id_lang);
        foreach ($fields as &$field) {
            if (($field['field_type'] == 'multiselect' && $field['field_value_id'])
                || ($field['field_type'] == 'radio' && $field['field_value_id'])
                || ($field['field_type'] == 'checkbox' && $field['field_value_id'])
                ) {
                $field['field_value'] = explode(',', $field['field_value_id']);
            } elseif (($field['field_type'] == 'message' && $field['field_value_id'])
                || ($field['field_type'] == 'select' && $field['field_value_id'])
                ) {
                $field['field_value'] = $field['field_value_id'];
            }
        }

        if ($registration_fields) {
            $fields_options = array();
            foreach ($registration_fields as $sf) {
                $fields_options[$sf['id_custom_field']] = $objModel->getCustomFieldsOptions($sf['id_custom_field'], $this->context->cookie->id_lang);
            }

            $this->context->smarty->assign('version', _PS_VERSION_);
            $this->context->smarty->assign('id_guest', $id_guest);
            $this->context->smarty->assign('id_customer', $id_customer);
            $this->context->smarty->assign('id_lang', $this->context->cookie->id_lang);
            $this->context->smarty->assign('summary_fields_values', $fields_options);
            $this->context->smarty->assign('summary_fields', $registration_fields);
            $this->context->smarty->assign('value_reg_fields', $fields);
            $this->context->smarty->assign('conf', Tools::getValue('conf'));
            $this->context->controller->errors = Tools::getValue('errors');
            $this->context->smarty->assign('actionLink', $this->context->link->getModuleLink($this->module->name, 'ajax', array('action' => 'download', 'me' => base64_encode($id_customer)), true));
            $this->context->smarty->assign('REGISTRATION_FIELDS_HEADING', Configuration::get('REGISTRATION_FIELDS_HEADING', $this->context->language->id, $this->context->shop->id_shop_group, $this->context->shop->id));

            $this->context->smarty->assign('id_module', $this->module->id);
            if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') == true) {
                $this->setTemplate('module:registrationfields/views/templates/front/summary_data_17.tpl');
            } else {
                $this->setTemplate('summary_data.tpl');
            }
        }
    }

    public function updateFields($id_customer)
    {
        if (Tools::isSubmit('updateFields')) {
            $objModel = new Fields();
            $return = $objModel->saveFieldValues(Tools::getValue('fields'), $id_customer, $this->context->cookie->id_lang);
            if (isset($return) && $return['result'] == true) {
                if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
                    return $this->context->controller->success[] = $this->module->trans['update_success'];
                } else {
                    return $this->context->controller->confirmations[] = $this->module->trans['update_success'];
                }
            } else {
                return $this->context->controller->errors[] = $return['errors'];
            }
        }
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $meta_title = Meta::getMetaByPage('my-account', $this->context->language->id);
        $meta_title = $meta_title['title'];
        $breadcrumb['links'][] = array(
            'title' => $meta_title,
            'url' => $this->context->link->getPageLink('my-account'),
        );
        return $breadcrumb;
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->addJS(_PS_MODULE_DIR_.$this->module->name.'/views/js/registrationfields.js');
    }
}
