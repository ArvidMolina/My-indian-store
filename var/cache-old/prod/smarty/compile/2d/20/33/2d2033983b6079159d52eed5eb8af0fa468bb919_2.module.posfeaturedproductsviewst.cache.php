<?php
/* Smarty version 3.1.33, created on 2020-01-17 06:51:38
  from 'module:posfeaturedproductsviewst' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e219fca3d7957_19912028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d2033983b6079159d52eed5eb8af0fa468bb919' => 
    array (
      0 => 'module:posfeaturedproductsviewst',
      1 => 1579261776,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/customize/button-cart.tpl' => 1,
    'file:catalog/_partials/variant-links.tpl' => 1,
    'file:catalog/_partials/miniatures/product.tpl' => 1,
  ),
),false)) {
function content_5e219fca3d7957_19912028 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '17825200775e219fca314697_15234099';
?>

<div class="pos-featured-products  product_block_container" 
		data-items="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['number_item'], ENT_QUOTES, 'UTF-8');?>
" 
		data-speed="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['speed_slide'], ENT_QUOTES, 'UTF-8');?>
"
		data-autoplay="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['auto_play'], ENT_QUOTES, 'UTF-8');?>
"
		data-time="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['auto_time'], ENT_QUOTES, 'UTF-8');?>
"
		data-arrow="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['show_arrow'], ENT_QUOTES, 'UTF-8');?>
"
		data-pagination="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['show_pagination'], ENT_QUOTES, 'UTF-8');?>
"
		data-move="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['move'], ENT_QUOTES, 'UTF-8');?>
"
		data-pausehover="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['pausehover'], ENT_QUOTES, 'UTF-8');?>
"
		data-md="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_md'], ENT_QUOTES, 'UTF-8');?>
"
		data-sm="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_sm'], ENT_QUOTES, 'UTF-8');?>
"
		data-xs="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_xs'], ENT_QUOTES, 'UTF-8');?>
"
		data-xxs="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_xxs'], ENT_QUOTES, 'UTF-8');?>
">
	<div class="container">
	<div class="feature-iner">
			<?php if ($_smarty_tpl->tpl_vars['title']->value) {?>
			<div class="pos_title">
				 <h2>
					<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>

				</h2>	
			</div>
			<?php }?>
			<?php $_smarty_tpl->_assignInScope('rows', $_smarty_tpl->tpl_vars['slider_options']->value['rows']);?>
			<div class="block-content">
				<div class="row">
					<div class="col-left col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBlockPosition6'),$_smarty_tpl ) );?>

					</div>
					<div class="col-center col-xs-12 col-sm-12 col-md-6 col-lg-5 col-xl-4">
						<?php $_smarty_tpl->_assignInScope('j', 0);?>
						 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, NULL, 'myLoop', array (
  'index' => true,
  'first' => true,
  'iteration' => true,
  'last' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['total'];
?>
							<article class="js-product-miniature" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" itemscope itemtype="http://schema.org/Product">
								<div class="img_block">
									<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15151628025e219fca33ff52_50226144', 'product_thumbnail');
?>

									<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_946148985e219fca359063_61094182', 'product_flags');
?>

									<ul class="link">
										<li class="wishlist">
											<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

										</li>
										<li class="quick_view">
											<a href="#" class="quick-view" data-link-action="quickview" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</a>
										</li>
									
									</ul>	
								</div>
								<div class="product_desc">
									<div class="desc_info">
										<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16047499585e219fca376f54_30285357', 'product_price_and_shipping');
?>

										<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7893765445e219fca39a101_76469070', 'product_name');
?>

										<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3779286595e219fca3a5065_64719410', 'product_reviews');
?>
 
										<div class="hover">
											<div class="add-to-links">
												<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
											</div>	
										</div>	
										<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19212603175e219fca3abf63_38030267', 'product_description_short');
?>

										<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5669647455e219fca3b0ce4_90811742', 'product_variants');
?>

									</div>	
									
								</div>
							</article>						
						<?php $_smarty_tpl->_assignInScope('j', $_smarty_tpl->tpl_vars['j']->value+1);?>  
						<?php if ($_smarty_tpl->tpl_vars['j']->value == 1) {
break 1;
}?>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>
				
					<div class="col-right col-xs-12 col-sm-12 col-md-6 col-lg-7 col-xl-5">
						<div class=" pos_content">
							<div class="feature-item owl-carousel">
								<?php $_smarty_tpl->_assignInScope('j', 0);?>
								  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, NULL, 'myLoop', array (
  'index' => true,
  'first' => true,
  'iteration' => true,
  'last' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['total'];
?>
								  <?php if ($_smarty_tpl->tpl_vars['j']->value > 1) {?>	
									   <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index'] : null)%$_smarty_tpl->tpl_vars['rows']->value == 0 || (isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['first'] : null)) {?>
										<div class="item-product">
										<?php }?>
											<?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>

									   <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration'] : null)%$_smarty_tpl->tpl_vars['rows']->value == 0 || (isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['last'] : null)) {?>
										</div>
										<?php }?>
								<?php }?>
								<?php $_smarty_tpl->_assignInScope('j', $_smarty_tpl->tpl_vars['j']->value+1);?>  
								<?php if ($_smarty_tpl->tpl_vars['j']->value == 20) {
break 1;
}?>	
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	</div>
</div>
<?php }
/* {block 'product_thumbnail'} */
class Block_15151628025e219fca33ff52_50226144 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_thumbnail' => 
  array (
    0 => 'Block_15151628025e219fca33ff52_50226144',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

										<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="thumbnail product-thumbnail">
										  <img
											src = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
											alt = "<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['cover']['legend'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],30,'...' )), ENT_QUOTES, 'UTF-8');
}?>"
											data-full-size-image-url = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['large']['url'], ENT_QUOTES, 'UTF-8');?>
"
										  >
										  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"rotatorImg",'product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
	
										</a>
									  <?php
}
}
/* {/block 'product_thumbnail'} */
/* {block 'product_flags'} */
class Block_946148985e219fca359063_61094182 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_flags' => 
  array (
    0 => 'Block_946148985e219fca359063_61094182',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

										<ul class="product-flag">
											<?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
											   <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
												   <?php if ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'percentage') {?>
													  <li class="discount-percentage"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_percentage'], ENT_QUOTES, 'UTF-8');?>
</li>
													<?php }?>
												<?php }?>
											<?php }?>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
?>
												<li class=" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</li>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</ul>
									 <?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_price_and_shipping'} */
class Block_16047499585e219fca376f54_30285357 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_price_and_shipping' => 
  array (
    0 => 'Block_16047499585e219fca376f54_30285357',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

										  <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
											<div class="product-price-and-shipping">
											   <span itemprop="price" class="price <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?> price_sale <?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
											  <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
												<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl ) );?>


												<span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Regular price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
												<span class="regular-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['regular_price'], ENT_QUOTES, 'UTF-8');?>
</span>
												<?php if ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'percentage') {?>
												  <span class="discount-percentage"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_percentage'], ENT_QUOTES, 'UTF-8');?>
</span>
												<?php }?>
											  <?php }?>

											  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"before_price"),$_smarty_tpl ) );?>


											  <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
										  

											  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'unit_price'),$_smarty_tpl ) );?>


											  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'weight'),$_smarty_tpl ) );?>

											</div>
										  <?php }?>
										<?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_name'} */
class Block_7893765445e219fca39a101_76469070 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_name' => 
  array (
    0 => 'Block_7893765445e219fca39a101_76469070',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

											<h4><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" itemprop="name" class="product_name"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],30,'...' )), ENT_QUOTES, 'UTF-8');?>
</a></h4>
										<?php
}
}
/* {/block 'product_name'} */
/* {block 'product_reviews'} */
class Block_3779286595e219fca3a5065_64719410 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_reviews' => 
  array (
    0 => 'Block_3779286595e219fca3a5065_64719410',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 
											<div class="hook-reviews"> 
												 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
 
											</div> 
										<?php
}
}
/* {/block 'product_reviews'} */
/* {block 'product_description_short'} */
class Block_19212603175e219fca3abf63_38030267 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_description_short' => 
  array (
    0 => 'Block_19212603175e219fca3abf63_38030267',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

											<div class="product-desc" itemprop="description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
										<?php
}
}
/* {/block 'product_description_short'} */
/* {block 'product_variants'} */
class Block_5669647455e219fca3b0ce4_90811742 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_variants' => 
  array (
    0 => 'Block_5669647455e219fca3b0ce4_90811742',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

											<?php if ($_smarty_tpl->tpl_vars['product']->value['main_variants']) {?>
											  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/variant-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('variants'=>$_smarty_tpl->tpl_vars['product']->value['main_variants']), 0, true);
?>
											<?php }?>
										<?php
}
}
/* {/block 'product_variants'} */
}
