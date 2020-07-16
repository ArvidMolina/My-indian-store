<?php
/* Smarty version 3.1.33, created on 2020-07-16 11:08:30
  from '/home/myindian/public_html/themes/theme_origine4/templates/catalog/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f100afe0f4249_73080876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '773c93f2caa7a656907a759d5242f4f50f66c579' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/templates/catalog/product.tpl',
      1 => 1584378789,
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
function content_5f100afe0f4249_73080876 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16739771785f100afe02ef31_47789976', 'head_seo');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2752349855f100afe033131_73445064', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19451503455f100afe04b6e3_61686577', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'head_seo'} */
class Block_16739771785f100afe02ef31_47789976 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head_seo' => 
  array (
    0 => 'Block_16739771785f100afe02ef31_47789976',
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
class Block_2752349855f100afe033131_73445064 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_2752349855f100afe033131_73445064',
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
class Block_15370824525f100afe050000_92503504 extends Smarty_Internal_Block
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
class Block_2847796185f100afe04f0d5_39943261 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					

					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15370824525f100afe050000_92503504', 'product_cover_tumbnails', $this->tplIndex);
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
class Block_5184313625f100afe04e0f0_34080223 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<section class="page-content" id="content">
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2847796185f100afe04f0d5_39943261', 'page_content', $this->tplIndex);
?>

				</section>
				<?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_title'} */
class Block_11950977275f100afe0565b8_20207997 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');
}
}
/* {/block 'page_title'} */
/* {block 'page_header'} */
class Block_3655437245f100afe0555f3_71603830 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<h1 class="h1 namne_details" itemprop="name"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11950977275f100afe0565b8_20207997', 'page_title', $this->tplIndex);
?>
</h1>
				<?php
}
}
/* {/block 'page_header'} */
/* {block 'page_header_container'} */
class Block_18227687235f100afe054472_90359202 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3655437245f100afe0555f3_71603830', 'page_header', $this->tplIndex);
?>

				<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reference','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');?>
</p>
				<?php
}
}
/* {/block 'page_header_container'} */
/* {block 'product_prices'} */
class Block_3636608985f100afe062395_71509812 extends Smarty_Internal_Block
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
class Block_6903515465f100afe0650b1_42985243 extends Smarty_Internal_Block
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
class Block_217830995f100afe06db59_76482686 extends Smarty_Internal_Block
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
class Block_21267614695f100afe07c9f3_80180031 extends Smarty_Internal_Block
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
class Block_463343635f100afe08d946_33337906 extends Smarty_Internal_Block
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
class Block_11169578075f100afe07f592_18882417 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_463343635f100afe08d946_33337906', 'product_miniature', $this->tplIndex);
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
class Block_3808752835f100afe094028_90370571 extends Smarty_Internal_Block
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
class Block_10530004135f100afe096cc0_95989340 extends Smarty_Internal_Block
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
class Block_16213409395f100afe09ad63_42371831 extends Smarty_Internal_Block
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
class Block_17704532705f100afe0765f8_58613472 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21267614695f100afe07c9f3_80180031', 'product_variants', $this->tplIndex);
?>


							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11169578075f100afe07f592_18882417', 'product_pack', $this->tplIndex);
?>


							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3808752835f100afe094028_90370571', 'product_discounts', $this->tplIndex);
?>


							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10530004135f100afe096cc0_95989340', 'product_add_to_cart', $this->tplIndex);
?>


							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>


							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16213409395f100afe09ad63_42371831', 'product_refresh', $this->tplIndex);
?>

						</form>
						<?php
}
}
/* {/block 'product_buy'} */
/* {block 'product_description'} */
class Block_11521619495f100afe0b4bd3_18267219 extends Smarty_Internal_Block
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
class Block_21062806115f100afe0b84b7_74913737 extends Smarty_Internal_Block
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
class Block_5785734015f100afe0bc130_88957718 extends Smarty_Internal_Block
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
class Block_6836517975f100afe0e0609_55943358 extends Smarty_Internal_Block
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
class Block_20057268875f100afe0db0a3_68190559 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6836517975f100afe0e0609_55943358', 'product_miniature', $this->tplIndex);
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
class Block_20326758005f100afe0e5857_40900874 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterProduct','product'=>$_smarty_tpl->tpl_vars['product']->value,'category'=>$_smarty_tpl->tpl_vars['category']->value),$_smarty_tpl ) );?>

	<?php
}
}
/* {/block 'product_footer'} */
/* {block 'product_images_modal'} */
class Block_10129750935f100afe0e8c50_72618673 extends Smarty_Internal_Block
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
class Block_16109946655f100afe0ec678_12935847 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<!-- Footer content -->
		<?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_13591404405f100afe0eb678_36429304 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<footer class="page-footer">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16109946655f100afe0ec678_12935847', 'page_footer', $this->tplIndex);
?>

	</footer>
	<?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_19451503455f100afe04b6e3_61686577 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19451503455f100afe04b6e3_61686577',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_5184313625f100afe04e0f0_34080223',
  ),
  'page_content' => 
  array (
    0 => 'Block_2847796185f100afe04f0d5_39943261',
  ),
  'product_cover_tumbnails' => 
  array (
    0 => 'Block_15370824525f100afe050000_92503504',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_18227687235f100afe054472_90359202',
  ),
  'page_header' => 
  array (
    0 => 'Block_3655437245f100afe0555f3_71603830',
  ),
  'page_title' => 
  array (
    0 => 'Block_11950977275f100afe0565b8_20207997',
  ),
  'product_prices' => 
  array (
    0 => 'Block_3636608985f100afe062395_71509812',
  ),
  'product_description_short' => 
  array (
    0 => 'Block_6903515465f100afe0650b1_42985243',
  ),
  'product_customization' => 
  array (
    0 => 'Block_217830995f100afe06db59_76482686',
  ),
  'product_buy' => 
  array (
    0 => 'Block_17704532705f100afe0765f8_58613472',
  ),
  'product_variants' => 
  array (
    0 => 'Block_21267614695f100afe07c9f3_80180031',
  ),
  'product_pack' => 
  array (
    0 => 'Block_11169578075f100afe07f592_18882417',
  ),
  'product_miniature' => 
  array (
    0 => 'Block_463343635f100afe08d946_33337906',
    1 => 'Block_6836517975f100afe0e0609_55943358',
  ),
  'product_discounts' => 
  array (
    0 => 'Block_3808752835f100afe094028_90370571',
  ),
  'product_add_to_cart' => 
  array (
    0 => 'Block_10530004135f100afe096cc0_95989340',
  ),
  'product_refresh' => 
  array (
    0 => 'Block_16213409395f100afe09ad63_42371831',
  ),
  'product_description' => 
  array (
    0 => 'Block_11521619495f100afe0b4bd3_18267219',
  ),
  'product_details' => 
  array (
    0 => 'Block_21062806115f100afe0b84b7_74913737',
  ),
  'product_attachments' => 
  array (
    0 => 'Block_5785734015f100afe0bc130_88957718',
  ),
  'product_accessories' => 
  array (
    0 => 'Block_20057268875f100afe0db0a3_68190559',
  ),
  'product_footer' => 
  array (
    0 => 'Block_20326758005f100afe0e5857_40900874',
  ),
  'product_images_modal' => 
  array (
    0 => 'Block_10129750935f100afe0e8c50_72618673',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_13591404405f100afe0eb678_36429304',
  ),
  'page_footer' => 
  array (
    0 => 'Block_16109946655f100afe0ec678_12935847',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5184313625f100afe04e0f0_34080223', 'page_content_container', $this->tplIndex);
?>

			</div>
			<div class="col-md-7">
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18227687235f100afe054472_90359202', 'page_header_container', $this->tplIndex);
?>

				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'DisplayReviewsProduct'),$_smarty_tpl ) );?>

					
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3636608985f100afe062395_71509812', 'product_prices', $this->tplIndex);
?>

				
				<div class="product-information">
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6903515465f100afe0650b1_42985243', 'product_description_short', $this->tplIndex);
?>


					<?php if ($_smarty_tpl->tpl_vars['product']->value['is_customizable'] && count($_smarty_tpl->tpl_vars['product']->value['customizations']['fields'])) {?>
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_217830995f100afe06db59_76482686', 'product_customization', $this->tplIndex);
?>

					<?php }?>

					<div class="product-actions">
						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17704532705f100afe0765f8_58613472', 'product_buy', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11521619495f100afe0b4bd3_18267219', 'product_description', $this->tplIndex);
?>

					</div>

					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21062806115f100afe0b84b7_74913737', 'product_details', $this->tplIndex);
?>

					<div class="tab-pane fade in" id="idTab5">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'ProductTabContent'),$_smarty_tpl ) );?>

					</div>
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5785734015f100afe0bc130_88957718', 'product_attachments', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20057268875f100afe0db0a3_68190559', 'product_accessories', $this->tplIndex);
?>


	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20326758005f100afe0e5857_40900874', 'product_footer', $this->tplIndex);
?>

	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10129750935f100afe0e8c50_72618673', 'product_images_modal', $this->tplIndex);
?>

	
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13591404405f100afe0eb678_36429304', 'page_footer_container', $this->tplIndex);
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
