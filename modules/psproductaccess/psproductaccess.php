<?php

if (!defined('_PS_VERSION_'))
	exit;


class psProductAccess extends Module
{

	private $_html = '';

	function __construct()
	{
		$this->name = 'psproductaccess';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'Nemo';
		$this->need_instance = 0;
		$this->table_name = 'product_group';

		$this->bootstrap = true;

	 	parent::__construct();

		$this->displayName = $this->l('Product access for groups');
		$this->description = $this->l('Define which products can be accessed by specific customer groups');

	}

	public function install()
	{
		if (!parent::install() OR
			!$this->_installTable() OR
			!$this->_assignAll() OR
			!$this->registerHook('displayAdminProductsExtra') OR
			!$this->registerHook('actionProductUpdate'))
			return false;
		return true;
	}

	public function uninstall()
	{
		if (!parent::uninstall() OR
			!$this->_eraseTable())
			return false;
		return true;
	}

	private function _installTable()
	{
		$sql = '
			CREATE TABLE `'._DB_PREFIX_.$this->table_name .'` (
				`id_product` INT(12) NOT NULL,
				`id_group` VARCHAR(64) NOT NULL,
				PRIMARY KEY ( `id_product`, `id_group` )
				) ENGINE = ' ._MYSQL_ENGINE_;
		if(!Db::getInstance()->Execute($sql))
			return false;
		return true;
	}

	private function _eraseTable()
	{
		if(!Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.$this->table_name.'`'))
			return false;
		return true;
	}

	/**
	 * Enables all products for all groups by default
	 * @return bool success
	 */
	private function _assignAll()
	{
		$all_products = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
			SELECT DISTINCT(id_product)
			FROM '._DB_PREFIX_.'product
			WHERE active = 1
			');

		$all_groups = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
			SELECT DISTINCT(id_group)
			FROM '._DB_PREFIX_.'group
			');

		$sql_string = '';
		$count = 0;
		foreach ($all_products as $p) {
			foreach ($all_groups as $g) {
				$sql_string .= '('.$p['id_product'].','.$g['id_group'].'),';
			}
			$count ++;
			if($count == 1000) { // batches of 1k products
				Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.$this->table_name. ' (id_product, id_group) VALUES ' . rtrim($sql_string, ','));
				$sql_string = '';
				$count = 0;
			}
		}

		Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.$this->table_name. ' (id_product, id_group) VALUES ' . rtrim($sql_string, ','));
		return true;
		    
		    
	}

	public function getProductGroupAccess($id_product)
	{
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
			SELECT id_group
			FROM '._DB_PREFIX_.$this->table_name.'
			WHERE id_product = '.(int)$id_product);

		if(!$result)
			return false;


		foreach ($result as $g) {
			$group_list[] = $g['id_group'];
		}
		return $group_list;
		    
	}

	/**
	 * Returns true if the current customer can access a product
	 * @param  int $id_product current product id
	 * @param  array $ids_groups list of customer groups the customer belongs to
	 * @return bool             access granted or not
	 */
	public function getProductCustomerGroupAccess($id_product, $ids_groups)
	{
		return (bool)Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
			SELECT id_group
			FROM '._DB_PREFIX_.$this->table_name.'
			WHERE id_product = '.(int)$id_product.'
			AND id_group IN ('.implode(',', $ids_groups).')');
		    
	}

	private function _resetGroupAccess($id_product)
	{
		Db::getInstance()->delete($this->table_name, 'id_product = ' .(int)$id_product);
	}


	public function hookActionProductUpdate($params)
	{
		if(Tools::isSubmit('acc_groupBox'))
		{
			$id_product = $params['id_product'];
			// first, reset the access
			$this->_resetGroupAccess($params['id_product']);
			// then, add back
			$string = 'INSERT INTO '._DB_PREFIX_.$this->table_name. ' (id_product, id_group) VALUES ';
			foreach (Tools::getValue('acc_groupBox') as $id_group) {
				if($id_group)
					$string .= "($id_product, $id_group),";
			}

			Db::getInstance()->Execute(rtrim($string, ','));
		}
	}

	public function hookDisplayAdminProductsExtra($params)
	{	
		$groups = Group::getGroups($this->context->language->id);
		$valid_groups = $this->getProductGroupAccess(Tools::getValue('id_product'));
		foreach ($groups as $k => $gr) {
			if($valid_groups)
			{
				if(in_array($gr['id_group'], $valid_groups))
					$groups[$k]['access'] = 1;
			}
		}
		
		$this->context->smarty->assign('access_groups', $groups);
		return $this->display(__FILE__, 'adminProductsExtra.tpl');
	}

	public function enable($force_all = false)
	{
		Tools::clearCache();
		parent::enable();
	}

	public function disable($force_all = false)
	{
		Tools::clearCache();
		parent::disable();
	}

}