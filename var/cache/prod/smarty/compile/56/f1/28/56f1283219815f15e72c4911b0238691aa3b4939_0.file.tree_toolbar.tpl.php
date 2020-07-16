<?php
/* Smarty version 3.1.33, created on 2020-06-22 19:00:39
  from '/home/myindian/public_html/admin123/themes/default/template/helpers/tree/tree_toolbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef0d5a7e07c19_01386519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56f1283219815f15e72c4911b0238691aa3b4939' => 
    array (
      0 => '/home/myindian/public_html/admin123/themes/default/template/helpers/tree/tree_toolbar.tpl',
      1 => 1584378675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef0d5a7e07c19_01386519 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tree-actions pull-right">
	<?php if (isset($_smarty_tpl->tpl_vars['actions']->value)) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['actions']->value, 'action');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['action']->value) {
?>
		<?php echo $_smarty_tpl->tpl_vars['action']->value->render();?>

	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php }?>
</div>
<?php }
}
