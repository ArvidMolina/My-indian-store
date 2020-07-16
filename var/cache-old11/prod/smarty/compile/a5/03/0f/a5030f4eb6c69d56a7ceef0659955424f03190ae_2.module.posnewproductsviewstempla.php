<?php
/* Smarty version 3.1.33, created on 2020-03-04 13:48:59
  from 'module:posnewproductsviewstempla' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5f95ab58d195_83455850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5030f4eb6c69d56a7ceef0659955424f03190ae' => 
    array (
      0 => 'module:posnewproductsviewstempla',
      1 => 1579261783,
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
function content_5e5f95ab58d195_83455850 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<div class="pos_new_product  product_block_container" 
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
		<div class="new-iner">
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
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBlockPosition7'),$_smarty_tpl ) );?>

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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8180624975e5f95ab567b11_86102249', 'product_thumbnail');
?>

									<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14075746985e5f95ab56d477_96617103', 'product_flags');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13273471935e5f95ab5739e2_19136495', 'product_price_and_shipping');
?>

										<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8492966905e5f95ab57b554_89132834', 'product_name');
?>

										<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21013637815e5f95ab57da42_82307130', 'product_reviews');
?>
 
										<div class="hover">
											<div class="add-to-links">
												<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
											</div>	
										</div>	
										<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13883435825e5f95ab57f222_16563977', 'product_description_short');
?>

										<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1219544505e5f95ab5803e7_69747147', 'product_variants');
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
							<div class="newSlide owl-carousel">
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
											<?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
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
class Block_8180624975e5f95ab567b11_86102249 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_thumbnail' => 
  array (
    0 => 'Block_8180624975e5f95ab567b11_86102249',
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
class Block_14075746985e5f95ab56d477_96617103 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_flags' => 
  array (
    0 => 'Block_14075746985e5f95ab56d477_96617103',
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
class Block_13273471935e5f95ab5739e2_19136495 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_price_and_shipping' => 
  array (
    0 => 'Block_13273471935e5f95ab5739e2_19136495',
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
class Block_8492966905e5f95ab57b554_89132834 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_name' => 
  array (
    0 => 'Block_8492966905e5f95ab57b554_89132834',
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
class Block_21013637815e5f95ab57da42_82307130 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_reviews' => 
  array (
    0 => 'Block_21013637815e5f95ab57da42_82307130',
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
class Block_13883435825e5f95ab57f222_16563977 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_description_short' => 
  array (
    0 => 'Block_13883435825e5f95ab57f222_16563977',
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
class Block_1219544505e5f95ab5803e7_69747147 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_variants' => 
  array (
    0 => 'Block_1219544505e5f95ab5803e7_69747147',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

											<?php if ($_smarty_tpl->tpl_vars['product']->value['main_variants']) {?>
											  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/variant-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('variants'=>$_smarty_tpl->tpl_vars['product']->value['main_variants']), 0, true);
?>
											<?php }?>
										<?php
}
}
/* {/block 'product_variants'} */
}
