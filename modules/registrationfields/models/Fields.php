<?php
/**
* Registration Fields
*
* NOTICE OF LICENSE
*
* You are not authorized to modify, copy or redistribute this file.
* Permissions are reserved by FMM Modules.
*
*  @author    FMM Modules
*  @copyright 2018 FMM Module All right reserved
*  @license   FMM Modules
*  @package   Registration Fields
*/

class Fields extends ObjectModel
{
    public $id_custom_field;

    public $field_type;

    public $field_validation;

    public $position;

    public $default_value;

    public $value_required;

    public $editable = 1;

    public $active;

    public $alert_type = 'info';

    public $extensions = 'jpg';

    public $attachment_size = 2;

    public $created_time;

    public $update_time;

    public $field_name;

    public $assoc_shops;

    const KB = 1024;

    const MB = 1048576;

    public static $definition = array(
        'table' => 'fmm_registration_fields',
        'primary' => 'id_custom_field',
        'multilang' => true,
        'fields' => array(
            'active'            => array('type' => self::TYPE_BOOL),
            'created_time'      => array('type' => self::TYPE_DATE),
            'update_time'       => array('type' => self::TYPE_DATE),
            'value_required'    => array('type' => self::TYPE_BOOL),
            'editable'          => array('type' => self::TYPE_BOOL),
            'alert_type'        => array('type' => self::TYPE_STRING),
            'position'          => array('type' => self::TYPE_INT),
            'field_validation'  => array('type' => self::TYPE_STRING),
            'extensions'        => array('type' => self::TYPE_STRING),
            'attachment_size'   => array('type' => self::TYPE_FLOAT),
            'field_type'        => array('type' => self::TYPE_NOTHING),
            'field_name'        => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString'),
            'default_value'     => array('type' => self::TYPE_STRING, 'lang' => true),
            'assoc_shops'       => array('type' => self::TYPE_STRING)
        ),
    );

    public function __construct($id = null, $id_lang = null)
    {
        parent::__construct($id, $id_lang);
    }

    public function delete()
    {
        $res = Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'fmm_registration_fields
            WHERE id_custom_field = '.(int)$this->id_custom_field);

        $res &= parent::delete();
        return $res;
    }

    public function deleteSelection($selection)
    {
        if (!is_array($selection)) {
            die(Tools::displayError());
        }

        $result = true;
        foreach ($selection as $id) {
            $this->id_custom_field = (int)$id;
            $result = $result && $this->delete();
        }
        return $result;
    }

    public static function deleteCustomerData($id_customer)
    {
        if (!$id_customer) {
            return false;
        } else {
            $imgTypes = self::getFieldIdByType('image');
            $attachmentTypes = self::getFieldIdByType('attachment');
            $fileType = array_merge($imgTypes, $attachmentTypes);
            if (isset($fileType) && $fileType) {
                foreach ($fileType as $id_custom_field) {
                    $filePath = self::getFileValues($id_custom_field, 'id_customer = '.(int)$id_customer);
                    if (isset($filePath) && file_exists($filePath)) {
                        self::deleteDir(dirname($filePath));
                    }
                }
            }
            return (bool)Db::getInstance()->delete('fmm_registration_userdata', 'id_customer = '.(int)$id_customer);
        }
    }

    public static function getCustomFieldValues($id)
    {
        return DB::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('SELECT * FROM '._DB_PREFIX_.'fmm_registration_fields_values
            WHERE id_custom_field = '.(int)$id);
    }

    public static function getOptions($id_custom_field, $id_lang = null)
    {
        if (!$id_custom_field) {
            return array();
        }

        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        return DB::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('SELECT val.*, fvl.*, val.`field_value_id` as val
            FROM '._DB_PREFIX_.'fmm_registration_fields_values val
            LEFT JOIN '._DB_PREFIX_.'fmm_registration_fields_values_lang fvl
                ON (val.field_value_id = fvl.field_value_id AND fvl.id_lang = '.(int)$id_lang.')
            WHERE val.id_custom_field = '.(int)$id_custom_field);
    }

    public static function getAllFields($where = null, $id_lang = null, $order_by = null, $way = 'ASC')
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        $sql = 'SELECT a.*, b.`field_name`, b.`default_value`, val.`field_value_id`,val.`value`, fvl.`field_value`, val.`id_customer`
            FROM '._DB_PREFIX_.'fmm_registration_fields a
            INNER JOIN '._DB_PREFIX_.'fmm_registration_fields_lang b
                ON (a.id_custom_field = b.id_custom_field AND b.id_lang = '.(int)$id_lang.')
            INNER JOIN '._DB_PREFIX_.'fmm_registration_userdata val
                ON (a.id_custom_field = val.id_custom_field)
            LEFT JOIN '._DB_PREFIX_.'fmm_registration_fields_values_lang fvl
                ON (val.field_value_id = fvl.field_value_id AND fvl.id_lang = '.(int)$id_lang.')
            WHERE a.active = 1 '.(($where)? ' AND '.($where) : '').(($order_by)? ' ORDER BY '.$order_by.(($way)? ' '.$way : '') : '');
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);
    }

    public static function getListFields($where, $id_lang = null)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        $sql = 'SELECT a.*, b.`field_name`, val.`field_value_id`,val.`value`, fvl.`field_value`, c.`id_customer`
            FROM '._DB_PREFIX_.'fmm_registration_fields a
            INNER JOIN '._DB_PREFIX_.'fmm_registration_fields_lang b
                ON (a.id_custom_field = b.id_custom_field AND b.id_lang = '.(int)$id_lang.')
            INNER JOIN '._DB_PREFIX_.'fmm_registration_userdata val
                ON (a.id_custom_field = val.id_custom_field)
            LEFT JOIN '._DB_PREFIX_.'fmm_registration_fields_values_lang fvl
                ON (val.field_value_id = fvl.field_value_id AND fvl.id_lang = '.(int)$id_lang.')
            WHERE a.active = 1
            AND val.`id_customer` IN (SELECT id_customer FROM `'._DB_PREFIX_.'customer`)
            AND '.pSQL($where);
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);
    }

    public static function getFieldsOnly($where, $id_lang = null, $order_by = null, $way = 'ASC')
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }

        $sql = 'SELECT a.*, b.`field_name`, b.`default_value`
            FROM '._DB_PREFIX_.'fmm_registration_fields a
            LEFT JOIN '._DB_PREFIX_.'fmm_registration_fields_lang b
                ON (a.id_custom_field = b.id_custom_field and b.id_lang = '.(int)$id_lang.')
            WHERE a.active = 1 AND '.($where).(($order_by)? ' ORDER BY '.$order_by.(($way)? ' '.$way : '') : '');
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);
    }

    public static function fieldValidate($fields, $id_customer = null)
    {
        $fieldObj = new Fields();
        $errors = array();
        $allfields = $fieldObj->getCustomFields(Context::getContext()->cookie->id_lang);

        foreach ($allfields as $f) {
            if (!isset($fields[$f['id_custom_field']])) {
                if ($f['field_type'] == 'image' || $f['field_type'] == 'attachment') {
                    $fields[$f['id_custom_field']] = null;
                } else {
                    continue;
                }
            }
            $user_field_value = $fields[$f['id_custom_field']];
            if ($f['field_type'] == 'image' || $f['field_type'] == 'attachment') {
                $file_value = self::getFieldValue($f['id_custom_field'], $id_customer);
                if ($f['value_required'] == 1 && empty($file_value) && (!isset($_FILES['fields']) || !isset($_FILES['fields']['name'][$f['id_custom_field']]) || empty($_FILES['fields']['name'][$f['id_custom_field']]))) {
                    $errors[] = $f['field_name'].' ' .Module::getInstanceByName('registrationfields')->trans['required'];
                } elseif (isset($_FILES) && isset($_FILES['fields']['name'][$f['id_custom_field']])) {
                    $ext = pathinfo($_FILES['fields']['name'][$f['id_custom_field']], PATHINFO_EXTENSION);
                    $size = Tools::ps_round($_FILES['fields']['size'][$f['id_custom_field']] / Fields::MB, 2, PS_ROUND_UP);
                    if ($ext && isset($f['extensions']) && $f['extensions'] && !in_array($ext, explode(',', $f['extensions']))) {
                        $errors[] = $f['field_name'].' ' .Module::getInstanceByName('registrationfields')->trans['type'];
                    }
                    if ($size && isset($f['attachment_size']) && $f['attachment_size'] && $size > $f['attachment_size']) {
                        $errors[] = $f['field_name'].' ' .Module::getInstanceByName('registrationfields')->trans['size'];
                    }
                }
            } else {
                if ($f['value_required'] == 1 && empty($user_field_value)) {
                    $errors[] = $f['field_name'].' ' .Module::getInstanceByName('registrationfields')->trans['required'];
                }
            }

            if (array_key_exists($f['id_custom_field'], $fields) && $f['field_validation'] != '') {
                if (!call_user_func('Validate::'.$f['field_validation'], $user_field_value)) {
                    $errors[] = $f['field_name'].' ' .Module::getInstanceByName('registrationfields')->trans['invalid'];
                }
            }
        }
        return $errors;
    }

    public function saveFieldValues($fields, $id_customer, $id_lang = null, $type = 'customer')
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }

        $errors = 0;
        $errors_count = array();
        $errors_count = self::fieldValidate($fields, $id_customer);

        if (!count($errors_count) && isset($fields)) {
            foreach ($fields as $id => $field) {
                if (is_array($field)) {
                    $field = implode(',', $field);
                }

                $field_type = self::getFieldType($id);
                $predefinedFields = array('text', 'textarea', 'date', 'boolean');

                if (isset($field_type) && in_array($field_type, $predefinedFields)) {
                    if ($type == 'guest') {
                        $sql_fields_vals = '('.(int)$id.', 0, '.(int)$id_customer.', 0, "'.pSQL($field).'")';
                        $sql_upd = 'id_custom_field = '.(int)$id.', id_customer = 0, id_guest = '.(int)$id_customer.', value = "'.pSQL($field).'"';
                    } else {
                        $sql_fields_vals = '('.(int)$id.','.(int)$id_customer.', 0, 0, "'.pSQL($field).'")';
                        $sql_upd = 'id_custom_field = '.(int)$id.', id_customer = '.(int)$id_customer.', id_guest = 0, value = "'.pSQL($field).'"';
                    }
                } else {
                    if ($type == 'guest') {
                        $sql_fields_vals = '('.(int)$id.', 0, '.(int)$id_customer.', "'.pSQL($field).'", "")';
                        $sql_upd = 'id_custom_field = '.(int)$id.', id_customer = 0, id_guest = '.(int)$id_customer.', field_value_id = "'.pSQL($field).'"';
                    } else {
                        $sql_fields_vals = '('.(int)$id.','.(int)$id_customer.', 0, "'.pSQL($field).'", "")';
                        $sql_upd = 'id_custom_field = '.(int)$id.', id_customer = '.(int)$id_customer.', id_guest = 0, field_value_id = "'.pSQL($field).'"';
                    }
                }

                $sql = 'INSERT INTO '._DB_PREFIX_.'fmm_registration_userdata (id_custom_field, id_customer, id_guest, field_value_id, value)
                    VALUES '.(string)$sql_fields_vals.' ON DUPLICATE KEY UPDATE '.(string)$sql_upd;

                if (!Db::getInstance(_PS_USE_SQL_SLAVE_)->Execute($sql)) {
                    $errors++;
                }
            }

            if (isset($_FILES) && isset($_FILES['fields']) && isset($_FILES['fields']['name']) && count($_FILES['fields']['name']) > 0) {
                $files = $_FILES['fields'];
                foreach ($files['name'] as $key => $file) {
                    if ($files['error'][$key] && isset(Module::getInstanceByName('registrationfields')->file_errors[$files['error'][$key]])) {
                        $errors++;
                    } else {
                        $ext = Tools::substr($files['name'][$key], strrpos($files['name'][$key], '.') + 1);
                        $file_name = 'field_'.$key.'.'.$ext;
                        
                        $index_file = _PS_MODULE_DIR_.Module::getInstanceByName('registrationfields')->name.DIRECTORY_SEPARATOR.'index.php';
                        $file_path = _PS_UPLOAD_DIR_.Module::getInstanceByName('registrationfields')->name.DIRECTORY_SEPARATOR.$id_customer;
                        if (!file_exists($file_path)) {
                            @mkdir($file_path, 0777, true);
                            @copy($index_file, $file_path.DIRECTORY_SEPARATOR.'index.php');
                        }

                        $file_path .= DIRECTORY_SEPARATOR.$key;
                        if (!file_exists($file_path)) {
                            @mkdir($file_path, 0777, true);
                            @copy($index_file, $file_path.DIRECTORY_SEPARATOR.'index.php');
                        }

                        //remove old file
                        if (file_exists($file_path.DIRECTORY_SEPARATOR.$file_name)) {
                            @unlink($file_path.DIRECTORY_SEPARATOR.$file_name);
                        }

                        if (!move_uploaded_file($files['tmp_name'][$key], $file_path.DIRECTORY_SEPARATOR.$file_name)) {
                            $errors++;
                        } else {
                            $field_value = $file_path.DIRECTORY_SEPARATOR.$file_name;
                            if ($type == 'guest') {
                               $sql_fields_vals = '('.(int)$key.', 0, '.(int)$id_customer.', "", "'.pSQL($field_value).'")';
                                $sql_upd = 'id_custom_field = '.(int)$key.', id_guest = '.(int)$id_customer.', value = "'.pSQL($field_value).'"';
                            } else {
                                $sql_fields_vals = '('.(int)$key.','.(int)$id_customer.', 0, "", "'.pSQL($field_value).'")';
                                $sql_upd = 'id_custom_field = '.(int)$key.', id_customer = '.(int)$id_customer.', value = "'.pSQL($field_value).'"';
                            }

                            $sql = 'INSERT INTO '._DB_PREFIX_.'fmm_registration_userdata (id_custom_field, id_customer, id_guest, field_value_id, value) VALUES '.(string)$sql_fields_vals.' ON DUPLICATE KEY UPDATE '.(string)$sql_upd;

                            if (!Db::getInstance(_PS_USE_SQL_SLAVE_)->Execute($sql)) {
                                $errors++;
                            }
                        }
                    }
                }
            }
        }

        $result = array('result' => true);
        if ($errors > 0 || count($errors_count) > 0) {
            $result = array('result' => false, 'errors' => $errors_count);
        }
        return $result;
    }

    public static function getCustomFields($id_lang, $id_shop = null)
    {
        if (!$id_shop) {
            $id_shop = (int)Context::getContext()->shop->id;
        }

        $sql = 'SELECT t.*,tl.`field_name`, tl.`default_value`
            FROM '._DB_PREFIX_.'fmm_registration_fields t
            LEFT JOIN '._DB_PREFIX_.'fmm_registration_fields_lang tl
                ON (t.id_custom_field = tl.id_custom_field AND id_lang = '.(int)($id_lang).')
            WHERE t.active = 1
            ORDER BY t.position';

        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);
        $final = array();
        if (isset($result)) {
            foreach ($result as &$res) {
                if ($res['assoc_shops'] && $id_shop) {
                    if (in_array($id_shop, explode(',', $res['assoc_shops']))) {
                        $final[] = $res;
                    }
                }
            }
        }
        return $final;
    }

    public function getCustomFieldsValues($id_custom_field, $id_lang = null)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        return DB::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('SELECT fv.*, fvl.*
            FROM '._DB_PREFIX_.'fmm_registration_fields_values fv
            JOIN '._DB_PREFIX_.'fmm_registration_fields_values_lang fvl
                ON(fv.field_value_id = fvl.field_value_id AND fvl.id_lang = '.(int)$id_lang.')
            WHERE id_custom_field = '.(int)$id_custom_field);
    }

    public function getCustomFieldsOptions($id_custom_field, $id_lang = null)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        $sql = 'SELECT fv.*, fvl.*
            FROM '._DB_PREFIX_.'fmm_registration_fields_values fv
            JOIN '._DB_PREFIX_.'fmm_registration_fields_values_lang fvl
                ON(fv.field_value_id = fvl.field_value_id)
            WHERE fv.id_custom_field = '.(int)$id_custom_field.' AND fvl.id_lang = '.(int)$id_lang;

        return DB::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);
    }

    public static function getUserLang($id_customer)
    {
        return (int)Db::getInstance()->getValue('SELECT DISTINCT(`id_lang`) FROM `'._DB_PREFIX_.'fmm_registration_userdata`
            WHERE id_customer = '.(int)$id_customer);
    }

    public static function addOption($id_custom_field)
    {
        $sql = 'INSERT INTO `'._DB_PREFIX_.'fmm_registration_fields_values` (id_custom_field) VALUES ('.pSQL($id_custom_field).')';
        if (Db::getInstance()->execute($sql)) {
            return Db::getInstance()->Insert_ID();
        }
        return false;
    }

    public static function addOptionValue($id_option, $id_lang, $value)
    {
        return Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'fmm_registration_fields_values_lang`
            (field_value_id, id_lang, field_value) VALUES ('.(int)$id_option.', '.(int)$id_lang.', "'.pSQl($value).'")');
    }

    public static function getFormatedValue($field, $id_lang = null, $id_customer = null, $id_guest = null)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }

        $where = null;
        if ($id_customer) {
            $where = 'id_customer = '.(int)$id_customer;
        }
        if ($id_guest) {
            $where = 'id_guest = '.(int)$id_guest;
        }

        if (in_array($field['field_type'], array('multiselect', 'radio', 'checkbox', 'select'))) {
            $options = self::getFileValues($field['id_custom_field'], $where, 'field_value_id');
            if ($field['field_type'] == 'select') {
                return $options;
            }

            if (isset($options) && $options) {
                $options = explode(',', $options);
            }
            return ((isset($options) && $options)? $options : array());
        } elseif (in_array($field['field_type'], array('image', 'attachment'))) {
            $value = (self::getFileValues($field['id_custom_field'], $where))? self::getFileValues($field['id_custom_field'], $where) : $field['default_value'];
            if ($value) {
                $value = __PS_BASE_URI__.str_replace(_PS_ROOT_DIR_.'/', '', $value);
            }
            return $value;
        } else {
            $value = self::getFileValues($field['id_custom_field'], $where)? self::getFileValues($field['id_custom_field'], $where) : $field['default_value'];
            return $value;
        }
    }

    public static function getOptionValue($options, $id_lang = null)
    {
        if (!$id_lang) {
            $id_lang = (int)Context::getContext()->language->id;
        }

        $result = Db::getInstance()->executeS('SELECT `field_value`
            FROM `'._DB_PREFIX_.'fmm_registration_fields_values_lang`
            WHERE `field_value_id` IN('.$options.')
            AND `id_lang` = '.(int)$id_lang);

        if (isset($result)) {
            foreach ($result as &$res) {
                if (is_array($res)) {
                    $res = array_shift($res);
                }
            }
            $result = implode(',', $result);
        }
        return $result;
    }

    public static function removeOptionById($id_custom_field)
    {
        $res = Db::getInstance()->Execute('DELETE fv.*, fvl.*
            FROM `'._DB_PREFIX_.'fmm_registration_fields_values` fv
            JOIN `'._DB_PREFIX_.'fmm_registration_fields_values_lang` fvl
                ON (fv.field_value_id = fvl.field_value_id)
            WHERE fv.id_custom_field = '.(int)$id_custom_field);
        if ($res) {
            return Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.'fmm_registration_userdata`
                WHERE id_custom_field = '.(int)$id_custom_field);
        }
    }

    public static function getOptionsById($id_custom_field)
    {
        $sql = 'SELECT fv.`field_value_id`, fv.`id_custom_field`, fvl.`id_lang`, fvl.`field_value`
        FROM `'._DB_PREFIX_.'fmm_registration_fields_values` fv
        RIGHT JOIN `'._DB_PREFIX_.'fmm_registration_fields_values_lang` fvl
            ON (fv.field_value_id = fvl.field_value_id)
        WHERE fv.id_custom_field = '.(int)$id_custom_field;

        $result = Db::getInstance()->ExecuteS($sql);
        $final = array();
        if ($result) {
            foreach ($result as $value) {
                $final[$value['field_value_id']][$value['id_lang']] = $value['field_value'];
            }
        }
        return $final;
    }

    public static function updateStatus($field, $id_custom_field)
    {
        return (bool)Db::getInstance()->Execute('UPDATE `'._DB_PREFIX_.'fmm_registration_fields`
            SET `'.pSQL($field).'` = !'.pSQL($field).' WHERE id_custom_field = '.(int)$id_custom_field);
    }

    public static function getFieldType($id_custom_field)
    {
        if (!$id_custom_field) {
            return false;
        } else {
            return (string)Db::getInstance()->getValue('SELECT `field_type` FROM `'._DB_PREFIX_.'fmm_registration_fields`
                WHERE id_custom_field = '.(int)$id_custom_field);
        }
    }

    public function updatePosition($way, $position)
    {
        if (!$res = Db::getInstance()->executeS(
            'SELECT `id_custom_field`, `position`
            FROM `'._DB_PREFIX_.'fmm_registration_fields`
            WHERE id_custom_field = '.(int)Tools::getValue('id').'
            ORDER BY `position` ASC'
        )) {
            return false;
        }

        foreach ($res as $field) {
            if ((int) $field['id_custom_field'] == (int) $this->id) {
                $moved_field = $field;
            }
        }

        if (!isset($moved_field) || !isset($position)) {
            return false;
        }

        // < and > statements rather than BETWEEN operator
        // since BETWEEN is treated differently according to databases
        return Db::getInstance()->execute('
            UPDATE `'._DB_PREFIX_.'fmm_registration_fields`
            SET `position`= `position` '.($way? '- 1' : '+ 1').'
            WHERE `position`
            '.($way
                ? '> '.(int)$moved_field['position'].' AND `position` <= '.(int)$position
                : '< '.(int)$moved_field['position'].' AND `position` >= '.(int)$position))
        && Db::getInstance()->execute('
            UPDATE `'._DB_PREFIX_.'fmm_registration_fields`
            SET `position` = '.(int)$position.'
            WHERE `id_custom_field` = '.(int)$moved_field['id_custom_field']);
    }

    public static function getHigherPosition()
    {
        $sql = 'SELECT MAX(`position`) FROM `'._DB_PREFIX_.'fmm_registration_fields`';
        $position = DB::getInstance()->getValue($sql);
        return (is_numeric($position)) ? $position : -1;
    }

    public static function positionOccupied($position)
    {
        if (!$position) {
            return false;
        }

        $sql = 'SELECT * FROM `'._DB_PREFIX_.'fmm_registration_fields` WHERE position = '.(int)$position;
        return (bool)DB::getInstance()->getRow($sql);
    }

    public static function getFieldValue($id_custom_field, $id_customer = 0)
    {
        if (!$id_custom_field) {
            return false;
        }

        $and = '';
        if ($id_customer) {
            $and = ' AND id_customer = '.(int)$id_customer;
        }
        return (string)Db::getInstance()->getValue('SELECT `value`
            FROM `'._DB_PREFIX_.'fmm_registration_userdata`
            WHERE id_custom_field = '.(int)$id_custom_field.'
            AND id_customer = '.(int)$id_customer);
    }

    public static function updateUserValueByFieldId($id_custom_field, $id_customer, $value = '')
    {
        if (!$id_custom_field || !$id_customer) {
            return false;
        }
        return (bool)Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'fmm_registration_userdata`
            SET `value` = "'.pSQL($value).'",
                `field_value_id` = "'.pSQL($value).'"
            WHERE id_custom_field = '.(int)$id_custom_field.'
            AND id_customer = '.(int)$id_customer);
    }

    public static function filterCustomers($filters = array())
    {
        if (!isset($filters) || !$filters) {
            return false;
        } else {
            $sql = new DbQuery();
            $sql->select('*');
            $sql->from('customer');
            foreach($filters as $key => $value) {
                if (isset($value) && $value) {
                    $sql->where('`'.pSQL($key).'` = "'.pSQL($value).'"');
                }
            }
            return Db::getInstance()->executeS($sql);
        }
    }

    public static function getfilterFields($filters = array())
    {
        $result = array();
        if (!isset($filters) || !$filters) {
            return false;
        } else {
            $sql = new DbQuery();
            $sql->select('id_customer');
            $sql->from('fmm_registration_userdata');
            foreach($filters as $key => $value) {
                if (isset($value) && $value) {
                    $sql->where('id_custom_field = '.(int)$key);
                    $sql->where('value = "'.pSQL($value).'"');
                }
            }
            $res = Db::getInstance()->executeS($sql);
            if (isset($res) && $res) {
                foreach ($res as $r) {
                    $result[$r['id_customer']] = $r['id_customer'];
                }
            }
            return $result;
        }
    }

    public static function filterFields($where = null, $id_lang = null, $order_by = null, $way = 'ASC')
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        $sql = 'SELECT a.*, b.`field_name`, val.`field_value_id`,val.`value`, fvl.`field_value`, val.`id_customer`, c.*
            FROM '._DB_PREFIX_.'customer c
            RIGHT JOIN '._DB_PREFIX_.'fmm_registration_userdata val
                ON (c.id_customer = val.id_customer)
            RIGHT JOIN '._DB_PREFIX_.'fmm_registration_fields_values_lang fvl
                ON (val.field_value_id = fvl.field_value_id AND fvl.id_lang = '.(int)$id_lang.')
            RIGHT JOIN '._DB_PREFIX_.'fmm_registration_fields a
                ON (a.id_custom_field = val.id_custom_field)
            RIGHT JOIN '._DB_PREFIX_.'fmm_registration_fields_lang b
                ON (a.id_custom_field = b.id_custom_field AND b.id_lang = '.(int)$id_lang.')
            WHERE a.active = 1 '.(($where)? ' AND '.($where) : '').(($order_by)? ' ORDER BY '.$order_by.(($way)? ' '.$way : '') : '');

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);
    }

    public static function downloadAttachment($id_file, $id_customer = null)
    {
        $full_path = self::getFieldValue($id_file, $id_customer);
        self::actionDownload($full_path);
    }

    public static function actionDownload($full_path)
    {
        if (headers_sent()) {
            die(Tools::displayError('Headers Sent'));
        }
        if (ini_get('zlib.output_compression')) {
            ini_set('zlib.output_compression', 'Off');
        }

        if (file_exists($full_path)) {
            $fsize = filesize($full_path);
            $path_parts = pathinfo($full_path);
            $ext = Tools::strtolower($path_parts['extension']);
            switch ($ext) {
                case 'pdf':
                    $content_type = 'application/pdf';
                    break;
                case 'exe':
                    $content_type = 'application/octet-stream';
                    break;
                case 'zip':
                    $content_type = 'application/zip';
                    break;
                case 'doc':
                    $content_type = 'application/msword';
                    break;
                case 'xls':
                    $content_type = 'application/vnd.ms-excel';
                    break;
                case 'ppt':
                    $content_type = 'application/vnd.ms-powerpoint';
                    break;
                case 'gif':
                    $content_type = 'image/gif';
                    break;
                case 'png':
                    $content_type = 'image/png';
                    break;
                case 'jpeg':
                case 'jpg':
                    $content_type = 'image/jpg';
                    break;
                default:
                    $content_type = mime_content_type($full_path);
            }

            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: '.$content_type);
            header('Content-Disposition: attachment; filename="'.basename($full_path).'";' );
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: '.$fsize);
            ob_clean();
            flush();
            readfile($full_path);
        } else {
            die(Tools::displayError('File Not Found'));
        }
    }

    public static function getGuestId($idCustomer)
    {
        if (!Validate::isUnsignedId($idCustomer)) {
            return false;
        }

        return (int)Db::getInstance()->getValue('SELECT `id_guest`
        FROM `'._DB_PREFIX_.'guest` WHERE `id_customer` = '.(int)$idCustomer);
    }

    public function updateGuestFields($id_guest, $id_customer)
    {
        if (!$id_guest || !$id_customer) {
            return false;
        }

        $sql = 'UPDATE `'._DB_PREFIX_.'fmm_registration_userdata`
                SET `id_customer` = '.(int)$id_customer.'
                WHERE id_guest = '.(int)$id_guest;
        if (Db::getInstance()->execute($sql)) {
            $imgTypes = self::getFieldIdByType('image');
            $attachmentTypes = self::getFieldIdByType('attachment');
            $fileType = array_merge($imgTypes, $attachmentTypes);
            if (isset($fileType) && $fileType) {
                foreach ($fileType as $id_custom_field) {
                    $oldPath = self::getFileValues($id_custom_field, 'id_guest = '.(int)$id_guest);
                    if (isset($oldPath) && file_exists($oldPath)) {
                        $newName = _PS_UPLOAD_DIR_.Module::getInstanceByName('registrationfields')->name.DIRECTORY_SEPARATOR.$id_customer;
                        $newValue = $newName.DIRECTORY_SEPARATOR.$id_custom_field.DIRECTORY_SEPARATOR.pathinfo($oldPath, PATHINFO_BASENAME);

                        // resetting directories
                        $oldPath = str_replace(DIRECTORY_SEPARATOR.$id_custom_field, '', realpath(dirname($oldPath)));
                        $newName = str_replace(DIRECTORY_SEPARATOR.$id_guest, DIRECTORY_SEPARATOR.$id_customer, $oldPath);

                        if (self::updateFolder($oldPath, $newName)) {
                            Db::getInstance()->execute( 'UPDATE `'._DB_PREFIX_.'fmm_registration_userdata`
                                SET `value` = "'.pSQL($newValue).'"
                                WHERE id_customer = '.(int)$id_customer.'
                                AND id_custom_field = '.(int)$id_custom_field
                            );
                        }
                    }
                }
            }
        }
    }

    public static function getFieldIdByType($type)
    {
        if (!$type) {
            return false;
        } else {
            $result = array();
            $sql = new DbQuery();
            $sql->select('id_custom_field');
            $sql->from('fmm_registration_fields');
            $sql->where('field_type = "'.pSQL($type).'"');

            $res = Db::getInstance()->executeS($sql);
            if (isset($res) && $res) {
                foreach ($res as $r) {
                    $result[] = $r['id_custom_field'];
                }
            }
            return $result;
        }
    }

    public static function getFileValues($id_custom_field, $and = null, $field = 'value')
    {
        if (!$id_custom_field) {
            return false;
        } else {
            $sql = new DbQuery();
            $sql->select($field);
            $sql->from('fmm_registration_userdata');
            $sql->where('id_custom_field = '.(int)$id_custom_field);
            if ($and && !empty($and)) {
                $sql->where($and);
            }
            return Db::getInstance()->getValue($sql);
        }
    }

    public static function updateFolder($oldName, $newName)
    {
        return rename($oldName, $newName);
    }

    public static function deleteByCustomer($id_customer)
    {
        if (!$id_customer) {
            return false;
        } else {
            $sql = 'DELETE FROM `'._DB_PREFIX_.'fmm_registration_userdata` WHERE id_customer = '.(int)$id_customer;
            if (Db::getInstance()->execute($sql)) {
                $dirname = _PS_UPLOAD_DIR_.Module::getInstanceByName('registrationfields')->name.DIRECTORY_SEPARATOR.$id_customer;
                return self::deleteDir($dirname);
            } else {
                return false;
            }
        }
    }

    public static function deleteDir($dirname)
    {
        if (is_dir($dirname)) {
            $dir_handle = opendir($dirname);
        }
        if (!$dir_handle) {
            return false;
        }

        while($file = readdir($dir_handle)) {
            if ($file != '.' && $file != '..') {
                if (!is_dir($dirname.DIRECTORY_SEPARATOR.$file)) {
                    @unlink($dirname.DIRECTORY_SEPARATOR.$file);
                } else {
                    self::deleteDir($dirname.DIRECTORY_SEPARATOR.$file);
                }
            }
        }
        closedir($dir_handle);
        @rmdir($dirname);
        return true;
    }
}
