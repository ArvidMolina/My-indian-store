<?php
/* Smarty version 3.1.33, created on 2020-06-22 19:00:39
  from '/home/myindian/public_html/admin123/themes/default/template/helpers/tree/tree_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef0d5a7e3a114_89900407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a6c587620363e1ff50edce025124e2a4c73a35e' => 
    array (
      0 => '/home/myindian/public_html/admin123/themes/default/template/helpers/tree/tree_header.tpl',
      1 => 1584378675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef0d5a7e3a114_89900407 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tree-panel-heading-controls clearfix">
	<?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?><i class="icon-tag"></i>&nbsp;<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_smarty_tpl->tpl_vars['title']->value),$_smarty_tpl ) );
}?>
	<?php if (isset($_smarty_tpl->tpl_vars['toolbar']->value)) {
echo $_smarty_tpl->tpl_vars['toolbar']->value;
}?>
</div>
<?php }
}
