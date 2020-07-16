<?php
/* Smarty version 3.1.33, created on 2020-01-16 12:59:25
  from '/home/myindian/test.myindianstore.eu/themes/theme_origine4/templates/catalog/_partials/customize/button-cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e20a47d330904_38875812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21ed8e3faad42a0680f18d898884a3b615434d4e' => 
    array (
      0 => '/home/myindian/test.myindianstore.eu/themes/theme_origine4/templates/catalog/_partials/customize/button-cart.tpl',
      1 => 1578924315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e20a47d330904_38875812 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '16929743595e20a47d31bc60_79176516';
?>
 
<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity'] > 0) {
if (!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>
<div class="product-add-to-cart">	
 <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
" method="post" class="add-to-cart-or-refresh">
   <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
">
   <input type="hidden" name="id_product" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="product_page_product_id">
   <input type="hidden" name="qty" value="1">
   <button class="button ajax_add_to_cart_button add-to-cart btn-default" data-button-action="add-to-cart" type="submit">
  		 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to cart','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

   </button>
 </form>
</div>
<?php }?> 
<?php } else { ?>
	<span class="ajax_add_to_cart_button disabled" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' Out of stock ','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to cart','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span>
<?php }
}
}
