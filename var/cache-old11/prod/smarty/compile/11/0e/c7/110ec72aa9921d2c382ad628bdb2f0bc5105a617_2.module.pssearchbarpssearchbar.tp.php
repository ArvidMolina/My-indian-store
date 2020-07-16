<?php
/* Smarty version 3.1.33, created on 2020-03-04 14:23:27
  from 'module:pssearchbarpssearchbar.tp' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5f9dbf592724_97167327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '110ec72aa9921d2c382ad628bdb2f0bc5105a617' => 
    array (
      0 => 'module:pssearchbarpssearchbar.tp',
      1 => 1579261783,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5f9dbf592724_97167327 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Block search module TOP -->
<div class="block-search  dropdown js-dropdown">
	<span class="search-icon" data-toggle="dropdown"></span>
	<div id="search_widget" class="search_top dropdown-menu" data-search-controller-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search_controller_url']->value, ENT_QUOTES, 'UTF-8');?>
">
		<form method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search_controller_url']->value, ENT_QUOTES, 'UTF-8');?>
">
			<input type="hidden" name="controller" value="search">
			<input class="text_input" type="text" name="s" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search_string']->value, ENT_QUOTES, 'UTF-8');?>
" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search our catalog','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
">
			<button type="submit">
				<span class="pe-7s-search"></span>
			</button>
		</form>
	</div>
</div>

<!-- /Block search module TOP --><?php }
}
