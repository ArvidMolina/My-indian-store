<?php
/* Smarty version 3.1.33, created on 2020-03-04 13:56:45
  from '/home/myindian/wholesale.myindianstore.eu/themes/theme_origine4/templates/catalog/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5f977dc0b979_87909289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92f545709703642318aa82de2382c65611d65d2f' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/themes/theme_origine4/templates/catalog/product.tpl',
      1 => 1579261784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/product-cover-thumbnails.tpl' => 1,
    'file:catalog/_partials/product-prices.tpl' => 1,
    'file:catalog/_partials/product-customization.tpl' => 1,
    'file:catalog/_partials/product-variants.tpl' => 1,
    'file:catalog/_partials/miniatures/pack-product.tpl' => 1,
    'file:catalog/_partials/product-discounts.tpl' => 1,
    'file:catalog/_partials/product-add-to-cart.tpl' => 1,
    'file:catalog/_partials/product-details.tpl' => 1,
    'file:catalog/_partials/miniatures/product.tpl' => 1,
    'file:catalog/_partials/product-images-modal.tpl' => 1,
  ),
),false)) {
function content_5e5f977dc0b979_87909289 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5945021415e5f977dbc8170_33523079', 'head_seo');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13269760865e5f977dbcacc7_01563452', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12244211245e5f977dbd3535_56759664', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'head_seo'} */
class Block_5945021415e5f977dbc8170_33523079 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head_seo' => 
  array (
    0 => 'Block_5945021415e5f977dbc8170_33523079',
  ),
);
public $prepend = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <link rel="canonical" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['canonical_url'], ENT_QUOTES, 'UTF-8');?>
"> 
<?php
}
}
/* {/block 'head_seo'} */
/* {block 'head'} */
class Block_13269760865e5f977dbcacc7_01563452 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_13269760865e5f977dbcacc7_01563452',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <meta property="og:type" content="product">
  <meta property="og:url" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['current_url'], ENT_QUOTES, 'UTF-8');?>
">
  <meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
">
  <meta property="og:site_name" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
  <meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['description'], ENT_QUOTES, 'UTF-8');?>
">
  <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['large']['url'], ENT_QUOTES, 'UTF-8');?>
">
  <meta property="product:pretax_price:amount" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price_tax_exc'], ENT_QUOTES, 'UTF-8');?>
">
  <meta property="product:pretax_price:currency" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">
  <meta property="product:price:amount" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price_amount'], ENT_QUOTES, 'UTF-8');?>
">
  <meta property="product:price:currency" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">
  <?php if (isset($_smarty_tpl->tpl_vars['product']->value['weight']) && ($_smarty_tpl->tpl_vars['product']->value['weight'] != 0)) {?>
  <meta property="product:weight:value" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['weight'], ENT_QUOTES, 'UTF-8');?>
">
  <meta property="product:weight:units" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['weight_unit'], ENT_QUOTES, 'UTF-8');?>
">
  <?php }
}
}
/* {/block 'head'} */
/* {block 'product_cover_tumbnails'} */
class Block_16947416525e5f977dbd4e83_50190277 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-cover-thumbnails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
					<?php
}
}
/* {/block 'product_cover_tumbnails'} */
/* {block 'page_content'} */
class Block_9167708435e5f977dbd4849_63750222 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					

					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16947416525e5f977dbd4e83_50190277', 'product_cover_tumbnails', $this->tplIndex);
?>

					<div class="scroll-box-arrows">
						<i class="material-icons left">&#xE314;</i>
						<i class="material-icons right">&#xE315;</i>
					</div>

					<?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_10915238935e5f977dbd4236_03380891 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<section class="page-content" id="content">
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9167708435e5f977dbd4849_63750222', 'page_content', $this->tplIndex);
?>

				</section>
				<?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_title'} */
class Block_11104979145e5f977dbd9631_94250142 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');
}
}
/* {/block 'page_title'} */
/* {block 'page_header'} */
class Block_4314326715e5f977dbd9129_39214638 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<h1 class="h1 namne_details" itemprop="name"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11104979145e5f977dbd9631_94250142', 'page_title', $this->tplIndex);
?>
</h1>
				<?php
}
}
/* {/block 'page_header'} */
/* {block 'page_header_container'} */
class Block_17563990035e5f977dbd8ba3_30640627 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4314326715e5f977dbd9129_39214638', 'page_header', $this->tplIndex);
?>

				<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reference','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');?>
</p>
				<?php
}
}
/* {/block 'page_header_container'} */
/* {block 'product_prices'} */
class Block_5288859325e5f977dbdd516_25345032 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-prices.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
				<?php
}
}
/* {/block 'product_prices'} */
/* {block 'product_description_short'} */
class Block_12452439535e5f977dbde3c5_16760253 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<div id="product-description-short-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="product-desc" itemprop="description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
					<?php
}
}
/* {/block 'product_description_short'} */
/* {block 'product_customization'} */
class Block_15935552575e5f977dbe0e05_43256136 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/product-customization.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('customizations'=>$_smarty_tpl->tpl_vars['product']->value['customizations']), 0, false);
?>
					<?php
}
}
/* {/block 'product_customization'} */
/* {block 'product_variants'} */
class Block_5322275255e5f977dbe6066_78499568 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-variants.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
							<?php
}
}
/* {/block 'product_variants'} */
/* {block 'product_miniature'} */
class Block_11892269215e5f977dbec0e1_99656702 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/pack-product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product_pack']->value), 0, true);
?>
								<?php
}
}
/* {/block 'product_miniature'} */
/* {block 'product_pack'} */
class Block_919535565e5f977dbe6da9_35034198 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php if ($_smarty_tpl->tpl_vars['packItems']->value) {?>
							<section class="product-pack">
								<h3 class="h4"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This pack contains','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</h3>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['packItems']->value, 'product_pack');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product_pack']->value) {
?>
								<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11892269215e5f977dbec0e1_99656702', 'product_miniature', $this->tplIndex);
?>

								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</section>
							<?php }?>
							<?php
}
}
/* {/block 'product_pack'} */
/* {block 'product_discounts'} */
class Block_20765713295e5f977dbee040_84885360 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-discounts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
							<?php
}
}
/* {/block 'product_discounts'} */
/* {block 'product_add_to_cart'} */
class Block_11516639505e5f977dbeef62_00342426 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-add-to-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
							<?php
}
}
/* {/block 'product_add_to_cart'} */
/* {block 'product_refresh'} */
class Block_21399360755e5f977dbf05a9_28660802 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<input class="product-refresh ps-hidden-by-js" name="refresh" type="submit" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refresh','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
">
							<?php
}
}
/* {/block 'product_refresh'} */
/* {block 'product_buy'} */
class Block_15472624685e5f977dbe3fc2_34568114 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
" method="post" id="add-to-cart-or-refresh">
							<input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
">
							<input type="hidden" name="id_product" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" id="product_page_product_id">
							<input type="hidden" name="id_customization" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
" id="product_customization_id">

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5322275255e5f977dbe6066_78499568', 'product_variants', $this->tplIndex);
?>


							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_919535565e5f977dbe6da9_35034198', 'product_pack', $this->tplIndex);
?>


							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20765713295e5f977dbee040_84885360', 'product_discounts', $this->tplIndex);
?>


							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11516639505e5f977dbeef62_00342426', 'product_add_to_cart', $this->tplIndex);
?>


							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>


							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21399360755e5f977dbf05a9_28660802', 'product_refresh', $this->tplIndex);
?>

						</form>
						<?php
}
}
/* {/block 'product_buy'} */
/* {block 'product_description'} */
class Block_20557070085e5f977dbf83a6_80828437 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="product-description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</div>
						<?php
}
}
/* {/block 'product_description'} */
/* {block 'product_details'} */
class Block_1909843795e5f977dbf9461_63144738 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-details.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
					<?php
}
}
/* {/block 'product_details'} */
/* {block 'product_attachments'} */
class Block_6722255445e5f977dbfa649_61632770 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<?php if ($_smarty_tpl->tpl_vars['product']->value['attachments']) {?>
					<div class="tab-pane fade in" id="attachments">
						<section class="product-attachments">
							<h3 class="h5 text-uppercase"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</h3>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['attachments'], 'attachment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->value) {
?>
							<div class="attachment">
								<h4><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'attachment','params'=>array('id_attachment'=>$_smarty_tpl->tpl_vars['attachment']->value['id_attachment'])),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></h4>
								<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['description'], ENT_QUOTES, 'UTF-8');?>
</p
								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'attachment','params'=>array('id_attachment'=>$_smarty_tpl->tpl_vars['attachment']->value['id_attachment'])),$_smarty_tpl ) );?>
">
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['file_size_formatted'], ENT_QUOTES, 'UTF-8');?>
)
								</a>
							</div>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</section>
					</div>
					<?php }?>
					<?php
}
}
/* {/block 'product_attachments'} */
/* {block 'product_miniature'} */
class Block_11329106325e5f977dc06214_07266965 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<div class="item-product">
								<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product_accessory']->value), 0, true);
?>
							</div>
						<?php
}
}
/* {/block 'product_miniature'} */
/* {block 'product_accessories'} */
class Block_9689646905e5f977dc044d9_73422875 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php if ($_smarty_tpl->tpl_vars['accessories']->value) {?>
        <section class="product-accessories clearfix">
			<div class="pos_title">
				<h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'related products','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</h2>
			</div>
			<div class="pos_content">
				<div class="product_accessoriesslide">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accessories']->value, 'product_accessory');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product_accessory']->value) {
?>
						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11329106325e5f977dc06214_07266965', 'product_miniature', $this->tplIndex);
?>

					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
        </section>
      <?php }?>
    <?php
}
}
/* {/block 'product_accessories'} */
/* {block 'product_footer'} */
class Block_3033548775e5f977dc07bf0_25733581 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterProduct','product'=>$_smarty_tpl->tpl_vars['product']->value,'category'=>$_smarty_tpl->tpl_vars['category']->value),$_smarty_tpl ) );?>

	<?php
}
}
/* {/block 'product_footer'} */
/* {block 'product_images_modal'} */
class Block_7441255495e5f977dc08d76_41902736 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-images-modal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php
}
}
/* {/block 'product_images_modal'} */
/* {block 'page_footer'} */
class Block_15242734355e5f977dc09f52_94776826 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<!-- Footer content -->
		<?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_4623445545e5f977dc09a66_42526227 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<footer class="page-footer">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15242734355e5f977dc09f52_94776826', 'page_footer', $this->tplIndex);
?>

	</footer>
	<?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_12244211245e5f977dbd3535_56759664 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12244211245e5f977dbd3535_56759664',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_10915238935e5f977dbd4236_03380891',
  ),
  'page_content' => 
  array (
    0 => 'Block_9167708435e5f977dbd4849_63750222',
  ),
  'product_cover_tumbnails' => 
  array (
    0 => 'Block_16947416525e5f977dbd4e83_50190277',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_17563990035e5f977dbd8ba3_30640627',
  ),
  'page_header' => 
  array (
    0 => 'Block_4314326715e5f977dbd9129_39214638',
  ),
  'page_title' => 
  array (
    0 => 'Block_11104979145e5f977dbd9631_94250142',
  ),
  'product_prices' => 
  array (
    0 => 'Block_5288859325e5f977dbdd516_25345032',
  ),
  'product_description_short' => 
  array (
    0 => 'Block_12452439535e5f977dbde3c5_16760253',
  ),
  'product_customization' => 
  array (
    0 => 'Block_15935552575e5f977dbe0e05_43256136',
  ),
  'product_buy' => 
  array (
    0 => 'Block_15472624685e5f977dbe3fc2_34568114',
  ),
  'product_variants' => 
  array (
    0 => 'Block_5322275255e5f977dbe6066_78499568',
  ),
  'product_pack' => 
  array (
    0 => 'Block_919535565e5f977dbe6da9_35034198',
  ),
  'product_miniature' => 
  array (
    0 => 'Block_11892269215e5f977dbec0e1_99656702',
    1 => 'Block_11329106325e5f977dc06214_07266965',
  ),
  'product_discounts' => 
  array (
    0 => 'Block_20765713295e5f977dbee040_84885360',
  ),
  'product_add_to_cart' => 
  array (
    0 => 'Block_11516639505e5f977dbeef62_00342426',
  ),
  'product_refresh' => 
  array (
    0 => 'Block_21399360755e5f977dbf05a9_28660802',
  ),
  'product_description' => 
  array (
    0 => 'Block_20557070085e5f977dbf83a6_80828437',
  ),
  'product_details' => 
  array (
    0 => 'Block_1909843795e5f977dbf9461_63144738',
  ),
  'product_attachments' => 
  array (
    0 => 'Block_6722255445e5f977dbfa649_61632770',
  ),
  'product_accessories' => 
  array (
    0 => 'Block_9689646905e5f977dc044d9_73422875',
  ),
  'product_footer' => 
  array (
    0 => 'Block_3033548775e5f977dc07bf0_25733581',
  ),
  'product_images_modal' => 
  array (
    0 => 'Block_7441255495e5f977dc08d76_41902736',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_4623445545e5f977dc09a66_42526227',
  ),
  'page_footer' => 
  array (
    0 => 'Block_15242734355e5f977dc09f52_94776826',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<section id="main" itemscope itemtype="https://schema.org/Product">
    <meta itemprop="url" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
	<div class="primary_block">
		<div class="row">
			<div class="col-md-5">
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10915238935e5f977dbd4236_03380891', 'page_content_container', $this->tplIndex);
?>

			</div>
			<div class="col-md-7">
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17563990035e5f977dbd8ba3_30640627', 'page_header_container', $this->tplIndex);
?>

				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'DisplayReviewsProduct'),$_smarty_tpl ) );?>

					
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5288859325e5f977dbdd516_25345032', 'product_prices', $this->tplIndex);
?>

				
				<div class="product-information">
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12452439535e5f977dbde3c5_16760253', 'product_description_short', $this->tplIndex);
?>


					<?php if ($_smarty_tpl->tpl_vars['product']->value['is_customizable'] && count($_smarty_tpl->tpl_vars['product']->value['customizations']['fields'])) {?>
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15935552575e5f977dbe0e05_43256136', 'product_customization', $this->tplIndex);
?>

					<?php }?>

					<div class="product-actions">
						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15472624685e5f977dbe3fc2_34568114', 'product_buy', $this->tplIndex);
?>


					</div>

					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayReassurance'),$_smarty_tpl ) );?>

				</div>
			</div>
		
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="tabs">
				<ul class="nav nav-tabs">
	
					<?php if ($_smarty_tpl->tpl_vars['product']->value['description']) {?>
					<li class="nav-item">
						<a class="nav-link<?php if ($_smarty_tpl->tpl_vars['product']->value['description']) {?> active<?php }?>" data-toggle="tab" href="#description"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Description','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</a>
					</li>
					<?php }?>
					<li class="nav-item">
						<a class="nav-link<?php if (!$_smarty_tpl->tpl_vars['product']->value['description']) {?> active<?php }?>" data-toggle="tab" href="#product-details"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product Details','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</a>
					</li>
		
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'ProductTab'),$_smarty_tpl ) );?>

			
					<?php if ($_smarty_tpl->tpl_vars['product']->value['attachments']) {?>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#attachments"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Attachments','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</a>
					</li>
					<?php }?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['extraContent'], 'extra', false, 'extraKey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['extraKey']->value => $_smarty_tpl->tpl_vars['extra']->value) {
?>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#extra-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extraKey']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extra']->value['title'], ENT_QUOTES, 'UTF-8');?>
</a>
					</li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</ul>

				<div class="tab-content" id="tab-content">
					<div class="tab-pane fade in<?php if ($_smarty_tpl->tpl_vars['product']->value['description']) {?> active<?php }?>" id="description">
						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20557070085e5f977dbf83a6_80828437', 'product_description', $this->tplIndex);
?>

					</div>

					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1909843795e5f977dbf9461_63144738', 'product_details', $this->tplIndex);
?>

					<div class="tab-pane fade in" id="idTab5">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'ProductTabContent'),$_smarty_tpl ) );?>

					</div>
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6722255445e5f977dbfa649_61632770', 'product_attachments', $this->tplIndex);
?>

					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['extraContent'], 'extra', false, 'extraKey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['extraKey']->value => $_smarty_tpl->tpl_vars['extra']->value) {
?>
					<div class="tab-pane fade in <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extra']->value['attr']['class'], ENT_QUOTES, 'UTF-8');?>
" id="extra-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extraKey']->value, ENT_QUOTES, 'UTF-8');?>
" <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extra']->value['attr'], 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value, ENT_QUOTES, 'UTF-8');?>
"<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>>
						<?php echo $_smarty_tpl->tpl_vars['extra']->value['content'];?>

					</div>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
		</div>
	</div>
	    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9689646905e5f977dc044d9_73422875', 'product_accessories', $this->tplIndex);
?>


	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3033548775e5f977dc07bf0_25733581', 'product_footer', $this->tplIndex);
?>

	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7441255495e5f977dc08d76_41902736', 'product_images_modal', $this->tplIndex);
?>

	
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4623445545e5f977dc09a66_42526227', 'page_footer_container', $this->tplIndex);
?>

<?php echo '<script'; ?>
>
	// productcomments
	$(document).on('click','#product_comments_block_extra ul.comments_advices a', function(e){
		$('*[class^="tab-pane"]').removeClass('active');
		$('*[class^="tab-pane"]').removeClass('in');
		$('div#idTab5').addClass('active');
		$('div#idTab5').addClass('in');

		$('ul.nav-tabs a[href^="#"]').removeClass('active');
		$('a[href="#idTab5"]').addClass('active');
	});
	(function(){
		$(window).on("load",function(){
			
			/* Page Scroll to id fn call */
			$("#product_comments_block_extra ul.comments_advices a.reviews ").mPageScroll2id({
				highlightSelector:"#product_comments_block_extra ul.comments_advices a.reviews ",
				offset:100,
			});
		});
	})(jQuery);
<?php echo '</script'; ?>
>
</section>
<?php
}
}
/* {/block 'content'} */
}
