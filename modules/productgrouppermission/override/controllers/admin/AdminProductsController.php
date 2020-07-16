<?php
class AdminProductsController extends AdminProductsControllerCore{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'product';
        $this->className = 'Product';
        $this->lang = true;
        $this->explicitSelect = true;
        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'icon' => 'icon-trash',
                'confirm' => $this->l('Delete selected items?')
            )
        );
        if (!Tools::getValue('id_product')) {
            $this->multishop_context_group = false;
        }

        parent::__construct();

        $this->imageType = 'jpg';
        $this->_defaultOrderBy = 'position';
        $this->max_file_size = (int)(Configuration::get('PS_LIMIT_UPLOAD_FILE_VALUE') * 1000000);
        $this->max_image_size = (int)Configuration::get('PS_PRODUCT_PICTURE_MAX_SIZE');
        $this->allow_export = true;

        // @since 1.5 : translations for tabs
        $this->available_tabs_lang = array(
            'Informations' => $this->l('Information'),
            'Pack' => $this->l('Pack'),
            'VirtualProduct' => $this->l('Virtual Product'),
            'Prices' => $this->l('Prices'),
            'Seo' => $this->l('SEO'),
            'Images' => $this->l('Images'),
            'Associations' => $this->l('Associations'),
            'Shipping' => $this->l('Shipping'),
            'Combinations' => $this->l('Combinations'),
            'Features' => $this->l('Features'),
            'Customization' => $this->l('Customization'),
            'Attachments' => $this->l('Attachments'),
            'Quantities' => $this->l('Quantities'),
            'Suppliers' => $this->l('Suppliers'),
            'Warehouses' => $this->l('Warehouses'),
			'ProductGroupPermission' => $this->l('Customer Group Permission'),
        );
        $this->available_tabs = array('Quantities' => 6, 'Warehouses' => 14);
        if ($this->context->shop->getContext() != Shop::CONTEXT_GROUP) {
            $this->available_tabs = array_merge($this->available_tabs, array(
                'Informations' => 0,
                'Pack' => 7,
                'VirtualProduct' => 8,
                'Prices' => 1,
                'Seo' => 2,
                'Associations' => 3,
                'Images' => 9,
                'Shipping' => 4,
                'Combinations' => 5,
                'Features' => 10,
                'Customization' => 11,
                'Attachments' => 12,
                'Suppliers' => 13,
				'ProductGroupPermission' => 14,
            ));
        }
	}
	
	public function processProductGroupPermission(){
		$pId = (int)Tools::getValue('id_product');
		$group = $_POST['groupBox'];
		Db::getInstance()->delete('ps_product_permission', 'permission_product_id = '.$pId);
		
		if(is_array($group)){
			foreach($group as $k => $v){
				Db::getInstance()->execute("INSERT INTO `ps_product_permission` (`permission_product_id`, `permission_customer_group_id`) VALUES (".$pId.", ".$k.")");
			}
		}
	}

    public function processUpdate()
    {
        $existing_product = $this->object;

        $this->checkProduct();

        if (!empty($this->errors)) {
            $this->display = 'edit';
            return false;
        }

        $id = (int)Tools::getValue('id_'.$this->table);
        /* Update an existing product */
        if (isset($id) && !empty($id)) {
            /** @var Product $object */
            $object = new $this->className((int)$id);
            $this->object = $object;

            if (Validate::isLoadedObject($object)) {
                $this->_removeTaxFromEcotax();
                $product_type_before = $object->getType();
                $this->copyFromPost($object, $this->table);
                $object->indexed = 0;

                if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP) {
                    $object->setFieldsToUpdate((array)Tools::getValue('multishop_check', array()));
                }

                // Duplicate combinations if not associated to shop
                if ($this->context->shop->getContext() == Shop::CONTEXT_SHOP && !$object->isAssociatedToShop()) {
                    $is_associated_to_shop = false;
                    $combinations = Product::getProductAttributesIds($object->id);
                    if ($combinations) {
                        foreach ($combinations as $id_combination) {
                            $combination = new Combination((int)$id_combination['id_product_attribute']);
                            $default_combination = new Combination((int)$id_combination['id_product_attribute'], null, (int)$this->object->id_shop_default);

                            $def = ObjectModel::getDefinition($default_combination);
                            foreach ($def['fields'] as $field_name => $row) {
                                $combination->$field_name = ObjectModel::formatValue($default_combination->$field_name, $def['fields'][$field_name]['type']);
                            }

                            $combination->save();
                        }
                    }
                } else {
                    $is_associated_to_shop = true;
                }

                if ($object->update()) {
                    // If the product doesn't exist in the current shop but exists in another shop
                    if (Shop::getContext() == Shop::CONTEXT_SHOP && !$existing_product->isAssociatedToShop($this->context->shop->id)) {
                        $out_of_stock = StockAvailable::outOfStock($existing_product->id, $existing_product->id_shop_default);
                        $depends_on_stock = StockAvailable::dependsOnStock($existing_product->id, $existing_product->id_shop_default);
                        StockAvailable::setProductOutOfStock((int)$this->object->id, $out_of_stock, $this->context->shop->id);
                        StockAvailable::setProductDependsOnStock((int)$this->object->id, $depends_on_stock, $this->context->shop->id);
                    }

                    PrestaShopLogger::addLog(sprintf($this->l('%s modification', 'AdminTab', false, false), $this->className), 1, null, $this->className, (int)$this->object->id, true, (int)$this->context->employee->id);
                    if (in_array($this->context->shop->getContext(), array(Shop::CONTEXT_SHOP, Shop::CONTEXT_ALL))) {
                        if ($this->isTabSubmitted('Shipping')) {
                            $this->addCarriers();
                        }
                        if ($this->isTabSubmitted('Associations')) {
                            $this->updateAccessories($object);
                        }
                        if ($this->isTabSubmitted('Suppliers')) {
                            $this->processSuppliers();
                        }
                        if ($this->isTabSubmitted('Features')) {
                            $this->processFeatures();
                        }
                        if ($this->isTabSubmitted('Combinations')) {
                            $this->processProductAttribute();
                        }
                        if ($this->isTabSubmitted('Prices')) {
                            $this->processPriceAddition();
                            $this->processSpecificPricePriorities();
                        }
                        if ($this->isTabSubmitted('Customization')) {
                            $this->processCustomizationConfiguration();
                        }
                        if ($this->isTabSubmitted('Attachments')) {
                            $this->processAttachments();
                        }
                        if ($this->isTabSubmitted('Images')) {
                            $this->processImageLegends();
                        }
						$this->processProductGroupPermission();
                        

                        $this->updatePackItems($object);
                        // Disallow avanced stock management if the product become a pack
                        if ($product_type_before == Product::PTYPE_SIMPLE && $object->getType() == Product::PTYPE_PACK) {
                            StockAvailable::setProductDependsOnStock((int)$object->id, false);
                        }
                        $this->updateDownloadProduct($object, 1);
                        $this->updateTags(Language::getLanguages(false), $object);

                        if ($this->isProductFieldUpdated('category_box') && !$object->updateCategories(Tools::getValue('categoryBox'))) {
                            $this->errors[] = Tools::displayError('An error occurred while linking the object.').' <b>'.$this->table.'</b> '.Tools::displayError('To categories');
                        }
                    }

                    if ($this->isTabSubmitted('Warehouses')) {
                        $this->processWarehouses();
                    }
                    if (empty($this->errors)) {
                        if (in_array($object->visibility, array('both', 'search')) && Configuration::get('PS_SEARCH_INDEXATION')) {
                            Search::indexation(false, $object->id);
                        }

                        // Save and preview
                        if (Tools::isSubmit('submitAddProductAndPreview')) {
                            $this->redirect_after = $this->getPreviewUrl($object);
                        } else {
                            $page = (int)Tools::getValue('page');
                            // Save and stay on same form
                            if ($this->display == 'edit') {
                                $this->confirmations[] = $this->l('Update successful');
                                $this->redirect_after = self::$currentIndex.'&id_product='.(int)$this->object->id
                                    .(Tools::getIsset('id_category') ? '&id_category='.(int)Tools::getValue('id_category') : '')
                                    .'&updateproduct&conf=4&key_tab='.Tools::safeOutput(Tools::getValue('key_tab')).($page > 1 ? '&page='.(int)$page : '').'&token='.$this->token;
                            } else {
                                // Default behavior (save and back)
                                $this->redirect_after = self::$currentIndex.(Tools::getIsset('id_category') ? '&id_category='.(int)Tools::getValue('id_category') : '').'&conf=4'.($page > 1 ? '&submitFilterproduct='.(int)$page : '').'&token='.$this->token;
                            }
                        }
                    }
                    // if errors : stay on edit page
                    else {
                        $this->display = 'edit';
                    }
                } else {
                    if (!$is_associated_to_shop && $combinations) {
                        foreach ($combinations as $id_combination) {
                            $combination = new Combination((int)$id_combination['id_product_attribute']);
                            $combination->delete();
                        }
                    }
                    $this->errors[] = Tools::displayError('An error occurred while updating an object.').' <b>'.$this->table.'</b> ('.Db::getInstance()->getMsgError().')';
                }
            } else {
                $this->errors[] = Tools::displayError('An error occurred while updating an object.').' <b>'.$this->table.'</b> ('.Tools::displayError('The object cannot be loaded. ').')';
            }
            return $object;
        }
    }

    public function initFormProductGroupPermission($obj){
        $data = $this->createTemplate($this->tpl_form);

        if ($obj->id) {
            if ($this->product_exists_in_shop) {

				$groups = Group::getGroups($this->default_form_language, true);
       			$guest = new Group(Configuration::get('PS_GUEST_GROUP'));
       			$default = new Group(Configuration::get('PS_CUSTOMER_GROUP'));

				$checkedGroups = Db::getInstance()->executeS("SELECT * FROM ps_product_permission WHERE permission_product_id = ".$obj->id);

				foreach ($groups as $key => $g) {
					
					foreach($checkedGroups as $k => $v){
						
						if($g['id_group'] == $v['permission_customer_group_id']){
							$groups[$key]['checked'] = 'checked';
						}
					}
					
					if (in_array($g['id_group'], array($default, $guest))) {
						unset($groups[$key]);
					}
					
				
				}
				$data->assign(array(
                    'groups' => $groups,
                    'product' => $obj,
                    'link' => $this->context->link,
                    'token' => $this->token
                ));
				
            } else {
                $this->displayWarning($this->l('You must save the product in this shop before managing group permission.'));
            }
        } else {
            $this->displayWarning($this->l('You must save this product before managing group permission.'));
        }

        $this->tpl_form_vars['custom_form'] = $data->fetch();
    }
}
