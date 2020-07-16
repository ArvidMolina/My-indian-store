<?php

/*
* 2007-2017 PrestaShop
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
* *****************************************************
*/

require_once _PS_MODULE_DIR_ . 'bestkit_checkoutfields/includer.php';

class BestKitCustomerFields extends ObjectModel
{
	const FILES_DIR = 'files';

    public $id;
    public $id_bestkit_customerfields;
    public $name;
    public $code;
    public $type = 'text';
    public $is_enabled = 1;
    public $sort_order = 0;
    public $display_on = 'both';
    public $required = 0;
    public $readonly = 0; //since 1.7
    public $default_value; //since 1.7
    public $validation;
    public $values;
    public $max_text_length;
    public $file_size;
    public $file_extensions;
    public $date_add;
    public $date_upd;
    public $groups;

    protected static $_types = array(
    	'text',
    	'textarea',
    	'date',
    	'radio',
    	//'multiselect',
    	'dropdown',
    	'image',
    	'attachment'
    );
    
	protected static $_fields_relations = array(
		'values',
		'file_size',
		'file_extensions',
		'validation',
		'max_text_length'
	);
    
    protected static $_type_fields_hider = array(
    	'text' => array('validation', 'max_text_length'),
    	'textarea' => array('validation', 'max_text_length'),
    	'radio' => array('values'),
    	'multiselect' => array('values'),
    	'dropdown' => array('values'),
    	'image' => array('file_size'),
    	'attachment' => array('file_size', 'file_extensions'),
    );
    
    protected static $_display_ons = array(
    	'create',
    	'myaccount',
    	'both'
    );
    
    protected static $_validations = array(
    	'isCarrierName' => 'Alphanumeric',
    	'isFloat' => 'Numeric',
    	'isCountryName' => 'Alpha',
    	'isUrl' => 'Url',
    	'isEmail' => 'Email',
    );

	protected static $_allowedImagesExt = array(
		'jpg',
		'jpeg',
		'png',
		'gif'
	);

    public static $definition = array(
        'table' => "bestkit_customerfields",
        'primary' => 'id_bestkit_customerfields',
        'multilang' => TRUE,
        'fields' => array(
            'code' => array('type' => self::TYPE_STRING, 'validate' => 'isTableOrIdentifier', 'required' => TRUE),
            'type' => array('type' => self::TYPE_STRING, 'validate' => 'isTableOrIdentifier', 'required' => TRUE),
            'is_enabled' => array('type' => self::TYPE_INT),
            'sort_order' => array('type' => self::TYPE_INT),
            'display_on' => array('type' => self::TYPE_STRING, 'required' => TRUE),
			'default_value' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'required' => array('type' => self::TYPE_INT),
            'readonly' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'validation' => array('type' => self::TYPE_STRING),
            'values' => array('type' => self::TYPE_HTML),
            'groups' => array('type' => self::TYPE_HTML),
            'max_text_length' => array('type' => self::TYPE_INT),
            'file_size' => array('type' => self::TYPE_INT),
            'file_extensions' => array('type' => self::TYPE_HTML),
            'date_add' => array('type' => self::TYPE_DATE),
            'date_upd' => array('type' => self::TYPE_DATE),
            'name' => array(
                'type' => self::TYPE_STRING,
                'lang' => TRUE,
                'validate' => 'isString',
                'size' => 3999999999999,
                'required' => TRUE)
            )
        );

    public function __construct($id = NULL, $id_lang = NULL)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, NULL);
    }

	public static function getModule()
	{
		return Module::getInstanceByName('bestkit_checkoutfields');
	}

    public static function getTypes()
    {
	    return self::$_types;
    }
    
    public static function getDisplayOns()
    {
	    return self::$_display_ons;
    }
    
    public static function getValidations()
    {
	    return self::$_validations;
    }
    
    public static function getFieldsRelations()
    {
	    return self::$_fields_relations;
    }
    
    public static function getTypeFieldsHider()
    {
	    return self::$_type_fields_hider;
    }

	public static function getAllowedImagesExt()
	{
		return self::$_allowedImagesExt;
	}

    public function toggleStatus()
    {
        if ($this->is_enabled) {
            $this->is_enabled = 0;
        } else {
            $this->is_enabled = 1;
        }

        return $this->save();
    }
    
    public function getGroups()
    {
	    return explode(';', $this->groups);
    }
    
    public static function getCollection($groups, $page = 'both', $status = 1, $id_lang = NULL)
    {
    	if (is_null($id_lang)) {
	    	$id_lang = Context::getContext()->language->id;
    	}

    	if (!is_array($groups)) {
	    	$groups = array($id_lang);
    	}

    	if (!in_array($page, self::$_display_ons)) {
	    	$page = 'both';
    	}

	    $_collection = new Collection(__CLASS__, $id_lang);
	    $_collection->where('is_enabled', '=', (int)$status);
    	
    	if ($page != 'both') {
	    	$_collection->where('display_on', '=', array($page, 'both'));
    	}
    	
    	if (!self::getModule()->isWriteable()) {
	    	$_collection->where('type', 'notin', array('image', 'attachment'));
    	}

	    $_collection->orderBy('sort_order');

	    if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_ALL) {
	    	$_collection->sqlWhere(
	    		'a0.id_bestkit_customerfields IN (
	                SELECT sa.id_bestkit_customerfields
	                FROM `' . _DB_PREFIX_ . 'bestkit_customerfields_shop` sa
	                WHERE sa.id_shop IN (' . implode(', ', Shop::getContextListShopID()) . ')
                )'
			);
	    }

	    foreach ($_collection as $offset => $item) {
		    if (!count(array_intersect($groups, $item->getGroups()))) {
			    $_collection->offsetUnset($offset);
		    }
	    }

	    return $_collection;
    }

	public function getValues()
	{
		return explode(';', $this->values);
	}

	public static function getFileUrl($id_customer, $value, $type)
	{
		return self::getModule()->getPath() . self::FILES_DIR . '/' . $id_customer . '/' . $type . '/' . $value;
	}

	public static function getFilePath($id_customer, $value, $type)
	{
		return self::getModule()->getLocalPath() . self::FILES_DIR . '/' . $id_customer . '/' . $type . '/' . $value;
	}

	public function getCustomerValue($id_customer)
	{
		$value = (string)Db::getInstance()->getValue('
			SELECT `value` 
			FROM `' . _DB_PREFIX_ . 'bestkit_customerfields_customer`
			WHERE `id_customer` = ' . (int)$id_customer . '
			AND `id_bestkit_customerfields` = ' . (int)$this->id . '
		');

		if ($this->type == 'multiselect') {
			$value = explode(';', $value);
		}

		return $value;
	}

	public function setCustomerValue($id_customer, $value)
	{
		if ($this->type == 'multiselect') {
			$value = implode(';', $value);
		}

		$data = array(
			'id_bestkit_customerfields' => $this->id,
			'id_customer' => (int)$id_customer,
			'value' => pSQL($value)
		);

		return Db::getInstance()->insert('bestkit_customerfields_customer', $data, false, false, Db::REPLACE);
	}

	public function deleteUserFiles($folder)
	{
	    if (is_dir($folder)) {
	        $handle = opendir($folder);
	        while ($subfile = readdir($handle)) {
	            if ($subfile == '.' or $subfile == '..') {
	            	continue;
	            }

	            if (is_file($subfile)) {
	            	unlink("{$folder}/{$subfile}");
	            } else {
	            	self::deleteUserFiles("{$folder}/{$subfile}");
	            }
	        }

	        closedir($handle);
	        rmdir($folder);
	    } else {
	        unlink($folder);
		}
	}

    public static function saveAttributes($page, $id_customer = NULL)
    {
    	if (Tools::getIsset('bestkit_customerfields')) {
    		$errors = array();
    		if (is_null($id_customer)) {
    			$id_customer = (int)Tools::getValue('bestkit_customer_id');
    		}

	    	$attributes = self::getCollection(Customer::getGroupsStatic($id_customer), $page);
	    	foreach ($attributes as $attribute) {
	    		$attr_key = 'bestkit_customerattributes_' . $attribute->code;
	    		if (in_array($attribute->type, array('image', 'attachment'))) {
		    		$file = $_FILES[$attr_key];
		    		$old_value = $attribute->getCustomerValue($id_customer);

		    		if ($file['error'] == 4 && $attribute->required && !$old_value) {
			    		$errors[] = self::getModule()->l('File ') . $attribute->name . ' ' . self::getModule()->l('is required!');
			    		continue;
		    		}

		    		if ($file['error'] == 0) {
			    		$name = explode('.', $file['name']);
				    	$ext = $name[count($name) - 1];
	
						$allowedExt = self::getAllowedImagesExt();
			    		if ($attribute->type == 'attachment') {
				    		$allowedExt = explode(';', $attribute->file_extensions);
			    		}

			    		if (!in_array($ext, $allowedExt)) {
				    		$errors[] = self::getModule()->l('Incorrect file format for ') . $attribute->name;
			    		}
			    	}
	    		} else {
		    		$value = Tools::getValue($attr_key);
		    		if ($attribute->required && !$value) {
			    		$errors[] = $attribute->name . ' ' . self::getModule()->l('is required!');
			    		continue;
		    		}
		    		
		    		if ($value && in_array($attribute->type, array('text', 'textarea'))) {
			    		if ($attribute->validation && !call_user_func(array('Validate', $attribute->validation), $value)) {
				    		$errors[] = $attribute->name . ' ' . self::getModule()->l('is invalid!');
			    		}
			    	}
	    		}
	    	}

	    	if (count($errors)) {
		    	return $errors;
	    	}

	    	foreach ($attributes as $attribute) {
	    		$attr_key = 'bestkit_customerattributes_' . $attribute->code;
	    		if (in_array($attribute->type, array('image', 'attachment'))) {
		    		$file = $_FILES[$attr_key];
		    		$name = explode('.', $file['name']);
				    $ext = $name[count($name) - 1];
					
					$value = $attribute->code . '.' . $ext;
		    		$dest = self::getFilePath($id_customer, $value, $attribute->type);
		    		$dir = dirname($dest);
		    		if (!is_dir($dir)) {
						@mkdir($dir, 0777, TRUE);
					}

		    		if (!@move_uploaded_file($file['tmp_name'], $dest)) {
			    		$value = FALSE;
		    		}
	    		} else {
		    		$value = Tools::getValue($attr_key);
	    		}

				if ($value) {
	    			$attribute->setCustomerValue($id_customer, $value);
	    		}
	    	}

	    	return TRUE;
    	}
    }
}
