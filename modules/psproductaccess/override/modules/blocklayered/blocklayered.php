<?php 
class BlockLayeredOverride extends BlockLayered
{
	private $products;
	private $nbr_products;
	private $page = 1;



	public function ajaxCall()
	{
		global $smarty, $cookie;

		$selected_filters = $this->getSelectedFilters();
		$filter_block = $this->getFilterBlock($selected_filters);
		$this->getProducts($selected_filters, $products, $nb_products, $p, $n, $pages_nb, $start, $stop, $range);

		// Add pagination variable
		$nArray = (int)Configuration::get('PS_PRODUCTS_PER_PAGE') != 10 ? array((int)Configuration::get('PS_PRODUCTS_PER_PAGE'), 10, 20, 50) : array(10, 20, 50);
		// Clean duplicate values
		$nArray = array_unique($nArray);
		asort($nArray);

		Hook::exec(
			'actionProductListModifier',
			array(
				'nb_products' => &$nb_products,
				'cat_products' => &$products,
			)
		);

		if (version_compare(_PS_VERSION_, '1.6.0', '>=') === true)
			$this->context->controller->addColorsToProductList($products);

		$category = new Category(Tools::getValue('id_category_layered', Configuration::get('PS_HOME_CATEGORY')), (int)$cookie->id_lang);

		// Generate meta title and meta description
		$category_title = (empty($category->meta_title) ? $category->name : $category->meta_title);
		$category_metas = Meta::getMetaTags((int)$cookie->id_lang, 'category');
		$title = '';
		$keywords = '';

		if (is_array($filter_block['title_values']))
			foreach ($filter_block['title_values'] as $key => $val)
			{
				$title .= ' > '.$key.' '.implode('/', $val);
				$keywords .= $key.' '.implode('/', $val).', ';
			}

		$title = $category_title.$title;

		if (!empty($title))
			$meta_title = $title;
		else
			$meta_title = $category_metas['meta_title'];

		$meta_description = $category_metas['meta_description'];

		$keywords = Tools::substr(Tools::strtolower($keywords), 0, 1000);
		if (!empty($keywords))
			$meta_keywords = rtrim($category_title.', '.$keywords.', '.$category_metas['meta_keywords'], ', ');
d($nb_products);
		$smarty->assign(
			array(
				'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
				'nb_products' => $nb_products,
				'category' => $category,
				'pages_nb' => (int)$pages_nb,
				'p' => (int)$p,
				'n' => (int)$n,
				'range' => (int)$range,
				'start' => (int)$start,
				'stop' => (int)$stop,
				'n_array' => ((int)Configuration::get('PS_PRODUCTS_PER_PAGE') != 10) ? array((int)Configuration::get('PS_PRODUCTS_PER_PAGE'), 10, 20, 50) : array(10, 20, 50),
				'comparator_max_item' => (int)(Configuration::get('PS_COMPARATOR_MAX_ITEM')),
				'products' => $products,
				'products_per_page' => (int)Configuration::get('PS_PRODUCTS_PER_PAGE'),
				'static_token' => Tools::getToken(false),
				'page_name' => 'category',
				'nArray' => $nArray,
				'compareProducts' => CompareProduct::getCompareProducts((int)$this->context->cookie->id_compare)
			)
		);

		// Prevent bug with old template where category.tpl contain the title of the category and category-count.tpl do not exists
		if (file_exists(_PS_THEME_DIR_.'category-count.tpl'))
			$category_count = $smarty->fetch(_PS_THEME_DIR_.'category-count.tpl');
		else
			$category_count = '';

		if ($nb_products == 0)
			$product_list = $this->display(__FILE__, 'blocklayered-no-products.tpl');
		else
			$product_list = $smarty->fetch(_PS_THEME_DIR_.'product-list.tpl');

		$vars = array(
			'filtersBlock' => utf8_encode($this->generateFiltersBlock($selected_filters)),
			'productList' => utf8_encode($product_list),
			'pagination' => $smarty->fetch(_PS_THEME_DIR_.'pagination.tpl'),
			'categoryCount' => $category_count,
			'meta_title' => $meta_title.' - '.Configuration::get('PS_SHOP_NAME'),
			'heading' => $meta_title,
			'meta_keywords' => isset($meta_keywords) ? $meta_keywords : null,
			'meta_description' => $meta_description,
			'current_friendly_url' => ((int)$n == (int)$nb_products) ? '#/show-all': '#'.$filter_block['current_friendly_url'],
			'filters' => $filter_block['filters'],
			'nbRenderedProducts' => (int)$nb_products,
			'nbAskedProducts' => (int)$n
		);

		if (version_compare(_PS_VERSION_, '1.6.0', '>=') === true)
			$vars = array_merge($vars, array('pagination_bottom' => $smarty->assign('paginationId', 'bottom')
				->fetch(_PS_THEME_DIR_.'pagination.tpl')));
		/* We are sending an array in jSon to the .js controller, it will update both the filters and the products zones */
		return Tools::jsonEncode($vars);
	}

	public function getProductByFilters($selected_filters = array())
	{
		global $cookie;
		if (!empty($this->products))
			return $this->products;
		$home_category = Configuration::get('PS_HOME_CATEGORY');
		
		$id_parent = (int)Tools::getValue('id_category', Tools::getValue('id_category_layered', $home_category));
		if ($id_parent == $home_category)
			return false;
		$alias_where = 'p';
		if (version_compare(_PS_VERSION_,'1.5','>'))
			$alias_where = 'product_shop';
		$query_filters_where = ' AND '.$alias_where.'.`active` = 1 AND '.$alias_where.'.`visibility` IN ("both", "catalog")';
		$query_filters_from = '';
		$parent = new Category((int)$id_parent);
		foreach ($selected_filters as $key => $filter_values)
		{
			if (!count($filter_values))
				continue;
			preg_match('/^(.*[^_0-9])/', $key, $res);
			$key = $res[1];
			switch ($key)
			{
				case 'id_feature':
					$sub_queries = array();
					foreach ($filter_values as $filter_value)
					{
						$filter_value_array = explode('_', $filter_value);
						if (!isset($sub_queries[$filter_value_array[0]]))
							$sub_queries[$filter_value_array[0]] = array();
						$sub_queries[$filter_value_array[0]][] = 'fp.`id_feature_value` = '.(int)$filter_value_array[1];
					}
					foreach ($sub_queries as $sub_query)
					{
						$query_filters_where .= ' AND p.id_product IN (SELECT `id_product` FROM `'._DB_PREFIX_.'feature_product` fp WHERE ';
						$query_filters_where .= implode(' OR ', $sub_query).') ';
					}
				break;
				case 'id_attribute_group':
					$sub_queries = array();
					foreach ($filter_values as $filter_value)
					{
						$filter_value_array = explode('_', $filter_value);
						if (!isset($sub_queries[$filter_value_array[0]]))
							$sub_queries[$filter_value_array[0]] = array();
						$sub_queries[$filter_value_array[0]][] = 'pac.`id_attribute` = '.(int)$filter_value_array[1];
					}
					foreach ($sub_queries as $sub_query)
					{
						$query_filters_where .= ' AND p.id_product IN (SELECT pa.`id_product`
						FROM `'._DB_PREFIX_.'product_attribute_combination` pac
						LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa
						ON (pa.`id_product_attribute` = pac.`id_product_attribute`)'.
						Shop::addSqlAssociation('product_attribute', 'pa').'
						WHERE '.implode(' OR ', $sub_query).') ';
					}
				break;
				case 'category':
					$query_filters_where .= ' AND p.id_product IN (SELECT id_product FROM '._DB_PREFIX_.'category_product cp WHERE ';
					foreach ($selected_filters['category'] as $id_category)
						$query_filters_where .= 'cp.`id_category` = '.(int)$id_category.' OR ';
					$query_filters_where = rtrim($query_filters_where, 'OR ').')';
				break;
				case 'quantity':
					if (count($selected_filters['quantity']) == 2)
						break;
					$query_filters_where .= ' AND sa.quantity '.(!$selected_filters['quantity'][0] ? '<=' : '>').' 0 ';
					$query_filters_from .= 'LEFT JOIN `'._DB_PREFIX_.'stock_available` sa ON (sa.id_product = p.id_product '.StockAvailable::addSqlShopRestriction(null, null,  'sa').') ';
				break;
				case 'manufacturer':
					$query_filters_where .= ' AND p.id_manufacturer IN ('.implode($selected_filters['manufacturer'], ',').')';
				break;
				case 'condition':
					if (count($selected_filters['condition']) == 3)
						break;
					$query_filters_where .= ' AND '.$alias_where.'.condition IN (';
					foreach ($selected_filters['condition'] as $cond)
						$query_filters_where .= '\''.pSQL($cond).'\',';
					$query_filters_where = rtrim($query_filters_where, ',').')';
				break;
				case 'weight':
					if ($selected_filters['weight'][0] != 0 || $selected_filters['weight'][1] != 0)
						$query_filters_where .= ' AND p.`weight` BETWEEN '.(float)($selected_filters['weight'][0] - 0.001).' AND '.(float)($selected_filters['weight'][1] + 0.001);
				break;
				case 'price':
					if (isset($selected_filters['price']))
					{
						if ($selected_filters['price'][0] !== '' || $selected_filters['price'][1] !== '')
						{
							$price_filter = array();
							$price_filter['min'] = (float)($selected_filters['price'][0]);
							$price_filter['max'] = (float)($selected_filters['price'][1]);
						}
					}
					else
						$price_filter = false;
				break;
			}
		}
		if(Module::isInstalled('psproductaccess') && Module::isEnabled('psproductaccess'))
		{
			$cgroups = FrontController::getCurrentCustomerGroups();
			$query_filters_from .= ' LEFT JOIN `'._DB_PREFIX_.'product_group` pg
	                            ON pg.`id_product` = p.`id_product` ';
			$query_filters_where .= ' AND pg.id_group '.(count($cgroups) ? 'IN ('.implode(',', $cgroups).')' : '= 1');	
		}
		
		$context = Context::getContext();
		$id_currency = (int)$context->currency->id;
		$price_filter_query_in = ''; // All products with price range between price filters limits
		$price_filter_query_out = ''; // All products with a price filters limit on it price range
		if (isset($price_filter) && $price_filter)
		{
			$price_filter_query_in = 'INNER JOIN `'._DB_PREFIX_.'layered_price_index` psi
			ON
			(
				psi.price_min <= '.(int)$price_filter['max'].'
				AND psi.price_max >= '.(int)$price_filter['min'].'
				AND psi.`id_product` = p.`id_product`
				AND psi.`id_shop` = '.(int)$context->shop->id.'
				AND psi.`id_currency` = '.$id_currency.'
			)';
			$price_filter_query_out = 'INNER JOIN `'._DB_PREFIX_.'layered_price_index` psi
			ON
				((psi.price_min < '.(int)$price_filter['min'].' AND psi.price_max > '.(int)$price_filter['min'].')
				OR
				(psi.price_max > '.(int)$price_filter['max'].' AND psi.price_min < '.(int)$price_filter['max'].'))
				AND psi.`id_product` = p.`id_product`
				AND psi.`id_shop` = '.(int)$context->shop->id.'
				AND psi.`id_currency` = '.$id_currency;
		}
		$query_filters_from .= Shop::addSqlAssociation('product', 'p');
		Db::getInstance()->execute('DROP TEMPORARY TABLE IF EXISTS '._DB_PREFIX_.'cat_filter_restriction', false);
		if (empty($selected_filters['category']))
		{
			
			Db::getInstance()->execute('CREATE TEMPORARY TABLE '._DB_PREFIX_.'cat_filter_restriction ENGINE=MEMORY
														SELECT cp.id_product, MIN(cp.position) position FROM '._DB_PREFIX_.'category_product cp
														INNER JOIN '._DB_PREFIX_.'category c ON (c.id_category = cp.id_category AND
														'.(Configuration::get('PS_LAYERED_FULL_TREE') ? 'c.nleft >= '.(int)$parent->nleft.'
														AND c.nright <= '.(int)$parent->nright : 'c.id_category = '.(int)$id_parent).'
														AND c.active = 1)
														JOIN `'._DB_PREFIX_.'product` p USING (id_product)
														'.$price_filter_query_in.'
														'.$query_filters_from.'
														WHERE 1 '.$query_filters_where.'
														GROUP BY cp.id_product ORDER BY position, id_product', false);
		} else {
			$categories = array_map('intval', $selected_filters['category']);
			Db::getInstance()->execute('CREATE TEMPORARY TABLE '._DB_PREFIX_.'cat_filter_restriction ENGINE=MEMORY
														SELECT cp.id_product, MIN(cp.position) position FROM '._DB_PREFIX_.'category_product cp
														JOIN `'._DB_PREFIX_.'product` p USING (id_product)
														'.$price_filter_query_in.'
														'.$query_filters_from.'
														WHERE cp.`id_category` IN ('.implode(',', $categories).') '.$query_filters_where.'
														GROUP BY cp.id_product ORDER BY position, id_product', false);
		}
		Db::getInstance()->execute('ALTER TABLE '._DB_PREFIX_.'cat_filter_restriction ADD PRIMARY KEY (id_product), ADD KEY (position, id_product) USING BTREE', false);
		if (isset($price_filter) && $price_filter) {
			static $ps_layered_filter_price_usetax = null;
			static $ps_layered_filter_price_rounding = null;
			if ($ps_layered_filter_price_usetax === null) {
				$ps_layered_filter_price_usetax = Configuration::get('PS_LAYERED_FILTER_PRICE_USETAX');
			}
			if ($ps_layered_filter_price_rounding === null) {
				$ps_layered_filter_price_rounding = Configuration::get('PS_LAYERED_FILTER_PRICE_ROUNDING');
			}
			if (empty($selected_filters['category'])) {
				$all_products_out = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
				SELECT p.`id_product` id_product
				FROM `'._DB_PREFIX_.'product` p JOIN '._DB_PREFIX_.'category_product cp USING (id_product)
				INNER JOIN '._DB_PREFIX_.'category c ON (c.id_category = cp.id_category AND
					'.(Configuration::get('PS_LAYERED_FULL_TREE') ? 'c.nleft >= '.(int)$parent->nleft.'
					AND c.nright <= '.(int)$parent->nright : 'c.id_category = '.(int)$id_parent).'
					AND c.active = 1)
				'.$price_filter_query_out.'
				'.$query_filters_from.'
				WHERE 1 '.$query_filters_where.' GROUP BY cp.id_product');
			} else {
				$all_products_out = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
				SELECT p.`id_product` id_product
				FROM `'._DB_PREFIX_.'product` p JOIN '._DB_PREFIX_.'category_product cp USING (id_product)
				'.$price_filter_query_out.'
				'.$query_filters_from.'
				WHERE cp.`id_category` IN ('.implode(',', $categories).') '.$query_filters_where.' GROUP BY cp.id_product');
			}
			
			foreach($all_products_out as $product) {
				$price = Product::getPriceStatic($product['id_product'], $ps_layered_filter_price_usetax);
				if ($ps_layered_filter_price_rounding) {
					$price = (int)$price;
				}
				if ($price < $price_filter['min'] || $price > $price_filter['max']) {
					$product_id_delete_list[] = (int)$product['id_product'];
				}
			}
			if (!empty($product_id_delete_list)) {
				Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'cat_filter_restriction WHERE id_product IN ('.implode(',', $product_id_delete_list).')');
			}
		}
		$this->nbr_products = Db::getInstance()->getValue('SELECT COUNT(*) FROM '._DB_PREFIX_.'cat_filter_restriction');
		if ($this->nbr_products == 0)
			$this->products = array();
		else
		{
			$product_per_page = isset($this->context->cookie->nb_item_per_page) ? (int)$this->context->cookie->nb_item_per_page : Configuration::get('PS_PRODUCTS_PER_PAGE');
			$default_products_per_page = max(1, (int)Configuration::get('PS_PRODUCTS_PER_PAGE'));
		        $n = $default_products_per_page;
		        if (isset($this->context->cookie->nb_item_per_page)) {
		            $n = (int)$this->context->cookie->nb_item_per_page;
		        }
		        if ((int)Tools::getValue('n')) {
		            $n = (int)Tools::getValue('n');
		        }
			$nb_day_new_product = (Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20);
			if (version_compare(_PS_VERSION_, '1.6.1', '>=') === true)
			{
				$this->products = Db::getInstance()->executeS('
				SELECT
					p.*,
					'.($alias_where == 'p' ? '' : 'product_shop.*,' ).'
					'.$alias_where.'.id_category_default,
					pl.*,
					image_shop.`id_image` id_image,
					il.legend,
					m.name manufacturer_name,
					'.(Combination::isFeatureActive() ? 'product_attribute_shop.id_product_attribute id_product_attribute,' : '').'
					DATEDIFF('.$alias_where.'.`date_add`, DATE_SUB("'.date('Y-m-d').' 00:00:00", INTERVAL '.(int)$nb_day_new_product.' DAY)) > 0 AS new,
					stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity'.(Combination::isFeatureActive() ? ', product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity' : '').'
				FROM '._DB_PREFIX_.'cat_filter_restriction cp
				LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = cp.`id_product`
				'.Shop::addSqlAssociation('product', 'p').
				(Combination::isFeatureActive() ?
				' LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
					ON (p.`id_product` = product_attribute_shop.`id_product` AND product_attribute_shop.`default_on` = 1 AND product_attribute_shop.id_shop='.(int)$context->shop->id.')':'').'
				LEFT JOIN '._DB_PREFIX_.'product_lang pl ON (pl.id_product = p.id_product'.Shop::addSqlRestrictionOnLang('pl').' AND pl.id_lang = '.(int)$cookie->id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
					ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop='.(int)$context->shop->id.')
				LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$cookie->id_lang.')
				LEFT JOIN '._DB_PREFIX_.'manufacturer m ON (m.id_manufacturer = p.id_manufacturer)
				'.Product::sqlStock('p', 0).'
				WHERE '.$alias_where.'.`active` = 1 AND '.$alias_where.'.`visibility` IN ("both", "catalog")
				ORDER BY '.Tools::getProductsOrder('by', Tools::getValue('orderby'), true).' '.Tools::getProductsOrder('way', Tools::getValue('orderway')).' , cp.id_product'.
				' LIMIT '.(((int)$this->page - 1) * $n.','.$n));
			}
			else
			{
				$this->products = Db::getInstance()->executeS('
				SELECT
					p.*,
					'.($alias_where == 'p' ? '' : 'product_shop.*,' ).'
					'.$alias_where.'.id_category_default,
					pl.*,
					MAX(image_shop.`id_image`) id_image,
					il.legend,
					m.name manufacturer_name,
					'.(Combination::isFeatureActive() ? 'MAX(product_attribute_shop.id_product_attribute) id_product_attribute,' : '').'
					DATEDIFF('.$alias_where.'.`date_add`, DATE_SUB("'.date('Y-m-d').' 00:00:00", INTERVAL '.(int)$nb_day_new_product.' DAY)) > 0 AS new,
					stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity'.(Combination::isFeatureActive() ? ', MAX(product_attribute_shop.minimal_quantity) AS product_attribute_minimal_quantity' : '').'
				FROM '._DB_PREFIX_.'cat_filter_restriction cp
				LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = cp.`id_product`
				'.Shop::addSqlAssociation('product', 'p').
				(Combination::isFeatureActive() ?
				'LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa ON (p.`id_product` = pa.`id_product`)
				'.Shop::addSqlAssociation('product_attribute', 'pa', false, 'product_attribute_shop.`default_on` = 1 AND product_attribute_shop.id_shop='.(int)$context->shop->id):'').'
				LEFT JOIN '._DB_PREFIX_.'product_lang pl ON (pl.id_product = p.id_product'.Shop::addSqlRestrictionOnLang('pl').' AND pl.id_lang = '.(int)$cookie->id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'image` i  ON (i.`id_product` = p.`id_product`)'.
				Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
				LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$cookie->id_lang.')
				LEFT JOIN '._DB_PREFIX_.'manufacturer m ON (m.id_manufacturer = p.id_manufacturer)
				'.Product::sqlStock('p', 0).'
				WHERE '.$alias_where.'.`active` = 1 AND '.$alias_where.'.`visibility` IN ("both", "catalog")
				GROUP BY product_shop.id_product
				ORDER BY '.Tools::getProductsOrder('by', Tools::getValue('orderby'), true).' '.Tools::getProductsOrder('way', Tools::getValue('orderway')).' , cp.id_product'.
				' LIMIT '.(((int)$this->page - 1) * $n.','.$n));
			}
		}
		if (Tools::getProductsOrder('by', Tools::getValue('orderby'), true) == 'p.price')
			Tools::orderbyPrice($this->products, Tools::getProductsOrder('way', Tools::getValue('orderway')));
		return $this->products;
	}	
	
	public function getProducts($selected_filters, &$products, &$nb_products, &$p, &$n, &$pages_nb, &$start, &$stop, &$range)
	{
		global $cookie;

		$products = $this->getProductByFilters($selected_filters);
		$products = Product::getProductsProperties((int)$cookie->id_lang, $products);
		$nb_products = $this->nbr_products;

		$range = 2; /* how many pages around page selected */

		$product_per_page = isset($this->context->cookie->nb_item_per_page) ? (int)$this->context->cookie->nb_item_per_page : Configuration::get('PS_PRODUCTS_PER_PAGE');
		$n = (int)Tools::getValue('n', Configuration::get('PS_PRODUCTS_PER_PAGE'));

		if ($n <= 0)
			$n = 1;

		$p = $this->page;

		if ($p < 0)
			$p = 0;

		if ($p > ($nb_products / $n))
			$p = ceil($nb_products / $n);
		$pages_nb = ceil($nb_products / (int)($n));

		$start = (int)($p - $range);
		if ($start < 1)
			$start = 1;

		$stop = (int)($p + $range);
		if ($stop > $pages_nb)
			$stop = (int)($pages_nb);

		foreach ($products as &$product)
		{
			if ($product['id_product_attribute'] && isset($product['product_attribute_minimal_quantity']))
				$product['minimal_quantity'] = $product['product_attribute_minimal_quantity'];
		}
	}	

}