<?php
/* Smarty version 3.1.33, created on 2020-06-22 19:00:39
  from '/home/myindian/public_html/admin123/themes/default/template/helpers/tree/tree_toolbar_link.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef0d5a7e2e102_27554218',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f10d7e2fa4b4be6a97e7f192c0821f5c292028c5' => 
    array (
      0 => '/home/myindian/public_html/admin123/themes/default/template/helpers/tree/tree_toolbar_link.tpl',
      1 => 1584378675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef0d5a7e2e102_27554218 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['action']->value)) {?> onclick="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"<?php }
if (isset($_smarty_tpl->tpl_vars['id']->value)) {?> id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id']->value,'html','UTF-8' ));?>
"<?php }?> class="btn btn-default">
	<?php if (isset($_smarty_tpl->tpl_vars['icon_class']->value)) {?><i class="<?php echo $_smarty_tpl->tpl_vars['icon_class']->value;?>
"></i><?php }?>
	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_smarty_tpl->tpl_vars['label']->value),$_smarty_tpl ) );?>

</a>
<?php }
}
