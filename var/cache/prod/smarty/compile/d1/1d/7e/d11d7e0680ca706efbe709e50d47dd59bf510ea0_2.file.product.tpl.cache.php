<?php
/* Smarty version 3.1.33, created on 2020-06-06 22:33:06
  from '/home/myindian/public_html/themes/theme_origine4/templates/catalog/_partials/miniatures/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5edbef72d3bef2_26481194',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd11d7e0680ca706efbe709e50d47dd59bf510ea0' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/templates/catalog/_partials/miniatures/product.tpl',
      1 => 1584378789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/customize/button-cart.tpl' => 1,
    'file:catalog/_partials/variant-links.tpl' => 1,
  ),
),false)) {
function content_5edbef72d3bef2_26481194 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '9112105865edbef72cd9254_42334488';
?>
<article class="js-product-miniature" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" itemscope itemtype="http://schema.org/Product">
	<div class="img_block">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7459509535edbef72cdf697_48824370', 'product_thumbnail');
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8655162735edbef72cf2590_85949267', 'product_flags');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5968038965edbef72d07cd1_93861628', 'product_price_and_shipping');
?>

			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15893671955edbef72d23a48_91001535', 'product_name');
?>

			<!-- <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8606707365edbef72d2c070_52540834', 'product_reviews');
?>
 -->
			<div class="hover">
				<div class="add-to-links">
					<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, false);
?>
				</div>	
			</div>	
			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3810941785edbef72d316c5_32260107', 'product_description_short');
?>

			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10747396355edbef72d35511_71818853', 'product_variants');
?>

		</div>	
		
    </div>
</article>
<?php }
/* {block 'product_thumbnail'} */
class Block_7459509535edbef72cdf697_48824370 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_thumbnail' => 
  array (
    0 => 'Block_7459509535edbef72cdf697_48824370',
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
class Block_8655162735edbef72cf2590_85949267 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_flags' => 
  array (
    0 => 'Block_8655162735edbef72cf2590_85949267',
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
class Block_5968038965edbef72d07cd1_93861628 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_price_and_shipping' => 
  array (
    0 => 'Block_5968038965edbef72d07cd1_93861628',
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
class Block_15893671955edbef72d23a48_91001535 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_name' => 
  array (
    0 => 'Block_15893671955edbef72d23a48_91001535',
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
class Block_8606707365edbef72d2c070_52540834 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_reviews' => 
  array (
    0 => 'Block_8606707365edbef72d2c070_52540834',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 -->
				<!-- <div class="hook-reviews"> -->
					<!-- <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
 -->
				<!-- </div> -->
			<!-- <?php
}
}
/* {/block 'product_reviews'} */
/* {block 'product_description_short'} */
class Block_3810941785edbef72d316c5_32260107 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_description_short' => 
  array (
    0 => 'Block_3810941785edbef72d316c5_32260107',
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
class Block_10747396355edbef72d35511_71818853 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_variants' => 
  array (
    0 => 'Block_10747396355edbef72d35511_71818853',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<?php if ($_smarty_tpl->tpl_vars['product']->value['main_variants']) {?>
				  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/variant-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('variants'=>$_smarty_tpl->tpl_vars['product']->value['main_variants']), 0, false);
?>
				<?php }?>
			<?php
}
}
/* {/block 'product_variants'} */
}
