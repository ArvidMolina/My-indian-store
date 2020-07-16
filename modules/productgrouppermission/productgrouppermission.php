<?php
if (!defined('_PS_VERSION_'))
  exit;
 
class ProductGroupPermission extends Module{
	protected $_html = '';
	protected $_postErrors = array();
	public $product_delimiter;
	
	public function __construct(){
		$this->name = 'productgrouppermission';
		$this->tab = 'administration';
		$this->version = 1.3;
		$this->author = 'Robert Erdmann';
		$this->need_instance = 1;
		$this->bootstrap = true;
		$this->bootstrap = true;
		
		parent::__construct();
		$this->displayName = $this->l('Produkt Kundengruppen Zugang');
		$this->description = $this->l('Produkte verschiedenen Kundengruppen zuordnen.');
	
	}
 
  	public function install(){
			$this->copyModuleFiles();
		$this->createOverrideFile();
		$this->createTables();
		$this->insertAllGroupActive();
		
		$success = (parent::install()
			&& $this->registerHook('deleteproduct')
		);
		
		$this->_clearCache('*');	
		return $success;
    }
	
  	public function uninstall() {   
		$this->deleteOverrideFile();
		$this->deleteTables();
        if (!parent::uninstall())
            return false;
        return true;
  	}
		
	protected function copyModuleFiles(){
		$modulesDir = _PS_ROOT_DIR_."/modules/";
		rename($modulesDir."blocklayered/blocklayered.php", $modulesDir."blocklayered/blocklayered_copy.php");
	}
	
	protected function createTables(){
		return (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'product_permission` (
				`permission_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`permission_product_id` int(10) NOT NULL,
				`permission_customer_group_id` int(10) NOT NULL,
				PRIMARY KEY (`permission_id`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
		');
	}
	
	protected function insertAllGroupActive(){
		 Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'product_permission` (`permission_product_id`, `permission_customer_group_id`) SELECT p.id_product, g.id_group FROM ps_product as p, ps_group as g');	
	}

	
	public function hookDeleteProduct($params){
		return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'product_permission` WHERE `permission_product_id` = '.(int)Tools::getValue('id_product'));
		$this->_clearCache('*');
	}
	
	protected function createOverrideFile(){
		$dir = _PS_ROOT_DIR_."/override/controllers/admin/templates/products";
 
		if(!file_exists($dir) && !is_dir($dir)){
			@mkdir(_PS_ROOT_DIR_."/override/controllers/admin/templates/products", 0777);
		}
 
		$fileData = file_get_contents(dirname(__FILE__).'/productgrouppermission.tpl');
		$filepath = _PS_ROOT_DIR_."/override/controllers/admin/templates/products/productgrouppermission.tpl";
		file_put_contents($filepath,$fileData);
		chmod($filepath, 0777);
		
		$fileData1 = dirname(__FILE__).'/module/blocklayered/blocklayered.php';
		$filepath1 = _PS_ROOT_DIR_."/modules/blocklayered/blocklayered.php";
		chmod($fileData1, 0777);
		chmod($filepath1, 0777);
		copy($fileData1,$filepath1);
	}

	protected function deleteOverrideFile(){
		$filepath = _PS_ROOT_DIR_."/override/controllers/admin/templates/products/productgrouppermission.tpl";
		if(!file_exists($filepath)){
			unlink($filepath);
		}
		$filepath1 = _PS_ROOT_DIR_."/module/blocklayered/blocklayered.php";
		if(!file_exists($filepath1)){
			unlink($filepath1);
			$modulesDir = _PS_ROOT_DIR_."/modules/";
			rename($modulesDir."blocklayered/blocklayered_copy.php", $modulesDir."blocklayered/blocklayered.php");
		}
	}
	
	protected function deleteTables(){
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'product_permission`;');
	}
	
}   

?>