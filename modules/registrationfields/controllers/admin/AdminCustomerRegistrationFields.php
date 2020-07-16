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
*  @copyright 2018 fmemodules All right reserved
*  @license   FMM Modules
*  @package   Registration
*/

require_once(_PS_MODULE_DIR_.'registrationfields/models/Fields.php');
class AdminCustomerRegistrationFieldsController extends ModuleAdminController
{
    public $fieldLabels = array();
    public $option_fields = array();
    public function __construct()
    {
        $this->lang = false;
        $this->bootstrap = true;
        $this->identifier = 'id_customer';
        $this->table = 'customer';
        $this->className = 'Customer';
        $this->required_database = false;
        $this->allow_export = false;
        $this->list_simple_header = false;
        $this->list_no_link = true;

        parent::__construct();
        $this->context = Context::getContext();
        $this->option_fields = array('multiselect', 'checkbox', 'radio');

        $customFields = array();
        $this->fieldLabels = Fields::getFieldsOnly('active = 1', $this->context->language->id, 'a.position');

        if (isset($this->fieldLabels) && $this->fieldLabels) {
            foreach ($this->fieldLabels as $key => $label) {
                $customFields['field_value_'.$label['id_custom_field']] = array(
                    'title' => $label['field_name'],
                    'field_type' => $label['field_type'],
                    'orderby'   => false,
                    'search'   => false,
                );
                if ($label['field_type'] == 'boolean') {
                    $customFields['field_value_'.$label['id_custom_field']]['align'] = 'center';
                }
                if ($label['field_type'] == 'image') {
                    $customFields['field_value_'.$label['id_custom_field']]['callback'] = 'displayImage';
                }
                if ($label['field_type'] == 'attachment') {
                    $customFields['field_value_'.$label['id_custom_field']]['callback'] = 'downloadFile';
                }
            }
        }
        $fields_list = array(
            'id_customer' => array(
                'title' => '#',
                'orderby'   => false,
                'search'   => false,
                'width' => 25
            ),
            'firstname' => array(
                'title' => $this->l('First Name'),
                'orderby'   => false,
                'search'   => false,
            ),
            'lastname' => array(
                'title' => $this->l('Last Name'),
                'orderby'   => false,
                'search'   => false,
            ),
            'email' => array(
                'title' => $this->l('Email'),
                'orderby'   => false,
                'search'   => false,
            ),
        );
        $this->fields_list = array_merge($fields_list, $customFields);
    }

    public function initToolbar()
    {
        parent::initToolbar();
        unset($this->toolbar_btn['new']);
    }

    public function renderList()
    {
        $this->_filter = false;
        $this->addRowAction('edit');
        $this->tpl_list_vars['REQUEST_URI'] = $_SERVER['REQUEST_URI'];
        $this->tpl_list_vars['fieldLabels'] = $this->fieldLabels;
        return parent::renderList();
    }

    public function getList($id_lang, $order_by = null, $order_way = null, $start = 0, $limit = null, $id_lang_shop = false)
    {
        if (!$id_lang) {
            $id_lang = $this->context->language->id;
        }
        $this->filterFields();
        parent::getList($id_lang);
        $customerFields = Fields::getAllFields();
        if (isset($customerFields) && $customerFields) {
            foreach ($this->_list as &$list) {
                if (isset($customerFields) && $customerFields) {
                    foreach ($customerFields as $field) {
                        if (isset($field) && isset($field['id_customer']) && $field['id_customer'] == $list['id_customer']) {
                            if ((isset($field['value']) && $field['value']) || (isset($field['field_value']) && $field['field_value'])) {
                                if ($field['field_type'] == 'message') {
                                    $list['field_value_'.$field['id_custom_field']] = (isset($field['value']) && $field['value'])? $field['value'] : (isset($field['field_value']) && $field['field_value'])? $field['field_value'] : $field['field_value_id'];
                                } elseif (in_array($field['field_type'],  array('multiselect', 'checkbox'))) {
                                    $options = Fields::getOptionValue($field['field_value_id']);
                                    if (isset($field['field_value_id']) && $field['field_value_id'] && isset($options) && $options) {
                                        $list['field_value_'.$field['id_custom_field']] = $options;
                                    } else {
                                        $list['field_value_'.$field['id_custom_field']] = '';
                                    }
                                } else {
                                    $list['field_value_'.$field['id_custom_field']] = (isset($field['value']) && $field['value'])? $field['value'] : $field['field_value'];
                                }
                            } else {
                                $list['field_value_'.$field['id_custom_field']] = '';
                            }
                        }
                    }
                }
            }
        }
    }

    protected function filterFields()
    {
        $_where = '';
        $isWhere = false;
        $where = array();
        $filteredFields = array();
        if (Tools::isSubmit('submitFilterFields')) {
            $queryFilters = array();
            $_where = 'AND a.id_customer = NULL';
            $fields = Tools::getValue('fields');
            $customerFilters = array(
                'firstname' => Tools::getValue('firstname'),
                'lastname' => Tools::getValue('lastname'),
                'email' => Tools::getValue('email'),
            );

            if (Tools::getIsset('cancel')) {
                Tools::redirectAdmin(self::$currentIndex.'&token='.$this->token);
            }

            if (isset($customerFilters) && $customerFilters && ($customerFilters['firstname'] || $customerFilters['lastname'] || $customerFilters['email'])) {
                $_where = '';
                foreach($customerFilters as $key => $value) {
                    if (isset($value) && $value) {
                        $isWhere = true;
                        $_POST[$key] = $value;
                        $_where .= ' AND a.'.$key.' = "'.pSQL($value).'"'; 
                    }
                }
            }

            $emptyFields = 0;
            if (isset($fields) && $fields) {
                foreach($fields as $key => $value) {
                    if (isset($value) && $value) {
                        $_POST['fields'][$key] = $value;
                        $where[$key] = pSQL($value);
                    } else {
                        $emptyFields++;
                    }
                }
            }

            if (!$customerFilters['firstname'] && !$customerFilters['lastname'] && !$customerFilters['email'] && count($fields) == $emptyFields) {
                $_where = '';
            }

            $filteredFields = Fields::getFilterFields($where, $this->context->language->id, 'a.position');
            $this->tpl_list_vars['POST'] = $_POST;

            if (isset($filteredFields) && $filteredFields) {
                $filteredFields = implode(',', $filteredFields);
                if ($isWhere) {
                    $_where .= ' AND a.id_customer IN('.$filteredFields.')'; 
                } else {
                    $_where = ' AND a.id_customer IN('.$filteredFields.')'; 
                }
            }
        }
        $this->_where .= $_where;
    }

    public function displayImage($value, $row)
    {
        if (!empty($value)) {
            $this->context->smarty->assign(array(
                'type' => 'image',
                'value' => $value
            ));
            return $this->context->smarty->fetch(_PS_MODULE_DIR_.'registrationfields/views/templates/admin/list_actions.tpl');
        } else {
            return '';
        }
    }

    public function downloadFile($value, $row)
    {
        if (!empty($value)) {
            $this->context->smarty->assign(array(
                'type' => 'attachment',
                'value' => $value
            ));
            return $this->context->smarty->fetch(_PS_MODULE_DIR_.'registrationfields/views/templates/admin/list_actions.tpl');
        } else {
            return '';
        }
    }

    public function renderForm()
    {
        $type = 'radio';
        $this->submit_action = 'submitRegistrationFields';
        if (Tools::version_compare(_PS_VERSION_, '1.6.0.0', '>=')) {
            $type = 'switch';
        }

        $fieldValues = array();
        $customerFields = Fields::getAllFields('val.id_customer = '.(int)Tools::getValue('id_customer'));
        if (isset($customerFields) && $customerFields) {
            foreach ($customerFields as $value) {
                $input_name = (in_array($value['field_type'], $this->option_fields))? 'fields['.$value['id_custom_field'].'][]' : 'fields['.$value['id_custom_field'].']';
                $value = (in_array($value['field_type'], array('checkbox', 'multiselect')))? explode(',', $value['field_value_id']) : ((isset($value['value']) && $value['value'])? $value['value'] : $value['field_value_id']);
                $fieldValues[$input_name] = $value;
            }
        }
        
        $temp_fields = array();
        $fields_value = array();
        $this->fields_form = array(
            'legend' => array(
                'title' => $this->l('Customer Registration Fields'),
                'icon' => 'icon-user'
            ),
            'input' => array(
                 array(
                    'type'      => 'hidden',
                    'name'      => 'id_customer',
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
            )
        );

        if (isset($this->fieldLabels) && $this->fieldLabels) {
            foreach ($this->fieldLabels as $field) {
                $input = array();
                $options = array();
                if (Fields::getOptions($field['id_custom_field'])) {
                    $options = Fields::getOptions($field['id_custom_field']);
                }
                $input['type'] = $field['field_type'];
                $input['required'] = (bool)$field['value_required'];
                $input['name'] = (in_array($field['field_type'], $this->option_fields))? 'fields['.$field['id_custom_field'].'][]' : 'fields['.$field['id_custom_field'].']';
                $input['label'] = (isset($field['field_name']) && $field['field_name'])? $field['field_name'] : sprintf($this->l('Field %d'), $field['id_custom_field']);

                if (!isset($input['name']) && !isset($fieldValues[$input['name']]) && !$fieldValues[$input['name']]) {
                    $this->fields_value[$input['name']] = (isset($field['default_value']) && $field['default_value'])? $field['default_value'] : '';
                }
                switch($field['field_type']) {
                    case 'message':
                        $input['type'] = 'free';
                        $fieldValues[$input['name']] = (isset($field['default_value']) && $field['default_value'])? '<label class="form-control-static">'.$field['default_value'].'</label>' : '';
                        break;
                    case 'boolean':
                        $input['type'] = 'radio';
                        $input['values'] = array(
                            array(
                                'id' => $input['name'].'_on',
                                'value' => 'Yes',
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => $input['name'].'_off',
                                'value' => 'No',
                                'label' => $this->l('No')
                            )
                        );
                        break;
                    case 'radio':
                        if (isset($options) && $options) {
                            foreach ($options as $val) {
                                $input['values'][] = array(
                                    'id' => 'field_value_id_'.$val['field_value_id'],
                                    'value' => $val['field_value_id'],
                                    'label' => $val['field_value']
                                );
                            }
                        } else {
                            $input['values'][] = array(
                                'id' => 'field_value_id',
                                'value' => null,
                                'label' => ''
                            );
                        }
                        break;
                    case 'checkbox':
                        if (!isset($input['name']) && !isset($fieldValues[$input['name']]) && !$fieldValues[$input['name']]) {
                            $this->fields_value[$input['name']] = array();
                        }
                        $input['values'] = array(
                            'query' => $options,
                            'id' => 'field_value_id',
                            'name' => 'field_value'
                        );
                        break;
                    case 'select':
                        $input['options'] = array(
                            'query' => $options,
                            'id' => 'field_value_id',
                            'name' => 'field_value'
                        );
                        break;
                    case 'multiselect':
                        $input['type'] = 'swap';
                        $input['multiple'] = true;
                        if (!isset($input['name']) && !isset($fieldValues[$input['name']]) && !$fieldValues[$input['name']]) {
                            $this->fields_value[$input['name']] = array();
                        }
                        $input['options'] = array(
                            'query' => $options,
                            'id' => 'field_value_id',
                            'name' => 'field_value'
                        );
                        break;
                    case 'image':
                    case 'attachment':
                        $name = (isset($fieldValues[$input['name']]) && $fieldValues[$input['name']])? $fieldValues[$input['name']] : false;
                        $thumb_size = ($name && file_exists($name)) ? filesize($name) / 1000 : false;
                        
                        if ($field['field_type'] == 'image') {
                            $input['display_image'] = true;
                            $input['image'] = $name ? '<img src="'.__PS_BASE_URI__.Tools::str_replace_once(_PS_ROOT_DIR_.'/', '', $name).'?time='.time().'" alt="" class="imgm img-thumbnail" width="50%"/>' : false;
                        } else {
                            if (isset($name) && file_exists($name) && $field['id_custom_field']) {
                                $link = $this->context->link->getAdminLink('AdminCustomerRegistrationFields').'&downloadAttachment&id_custom_field='.$field['id_custom_field'].'&'.$this->identifier.'='.Tools::getValue($this->identifier);
                                if (Configuration::get('PS_REWRITING_SETTINGS')) {
                                    $link = Tools::strReplaceFirst('&', '?', $link);
                                }
                                $input['file'] = isset($link) ? $link : null;
                            }
                        }
                        $input['type'] = 'file';
                        $input['size'] = $thumb_size;
                        $input['id'] = 'file_'.$field['id_custom_field'];
                        $input['delete_url'] = self::$currentIndex.'&'.$this->identifier.'='.Tools::getValue($this->identifier).'&token='.$this->token.'&deleteImage&id_custom_field='.$field['id_custom_field'];
                        break;
                }
                $temp_fields[] = $input;
            }
        } else {
            $temp_fields[] = array(
                'type' => 'html',
                'name' => 'none',
                'html_content' => '<div class="col-lg-12 alert alert-warning warning">'.$this->l('No registration fields added yet.').'</div>',
            );
        }
        array_splice($this->fields_form['input'], 3, 0, $temp_fields);
        $this->fields_value = $fieldValues;
        return parent::renderForm();
    }

    public function postProcess()
    {
        parent::postProcess();
        if (Tools::isSubmit('submitRegistrationFields')) {
            $id_customer = (int)Tools::getValue('id_customer');
            $fields = Tools::getValue('fields');
            $objModel = new Fields();

            $result = $objModel->saveFieldValues($fields, $id_customer);
            if (isset($result)) {
                if ($result['result'] == false && isset($result['errors'])) {
                    foreach ($result['errors'] as $error) {
                        $this->errors[] = $error;
                    }
                    return $this->errors;
                } elseif ($result['result'] == true) {
                    return $this->confirmations[] = $this->l('Registration fields updated successfully.');
                }
            }
        } elseif (Tools::isSubmit('downloadAttachment') && Tools::getValue('id_custom_field') && Tools::getValue('id_customer')) {
            Fields::downloadAttachment(Tools::getValue('id_custom_field'), Tools::getValue('id_customer'));
        } elseif (Tools::isSubmit('downloadFile')) {
            $link = base64_decode(Tools::getValue('l'));
            Fields::actionDownload($link);
        }
    }

    public function processDeleteImage()
    {
        if (Tools::getValue('id_custom_field') && Tools::getValue('id_customer')) {
            $filePath = Fields::getFieldValue(Tools::getValue('id_custom_field'), Tools::getValue('id_customer'));
            if (file_exists($filePath)) {
                if (!Fields::updateUserValueByFieldId(Tools::getValue('id_custom_field'), Tools::getValue('id_customer')) ||
                !@unlink($filePath)) {
                    return $this->errors[] = $this->l('An error occurred while attempting to delete the image.');
                } else {
                    return $this->confirmations[] = $this->l('Image deleted successfully.');
                }
            } else {
                return $this->errors[] = $this->l('File not found on physical media.');
            }
        }
        return $this->errors[] = $this->l('cannot load field.');
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->context->controller->addJqueryUI('ui.datepicker');
    }
}
