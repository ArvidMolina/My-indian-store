<?php
/* Smarty version 3.1.33, created on 2020-07-16 11:24:40
  from '/home/myindian/public_html/modules/possearchproducts/category-tree-branch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f100ec85543e1_79725535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74aac904162b383cb5d11dbfc812878d73b65825' => 
    array (
      0 => '/home/myindian/public_html/modules/possearchproducts/category-tree-branch.tpl',
      1 => 1584378773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modules/possearchproducts/category-tree-branch.tpl' => 2,
  ),
),false)) {
function content_5f100ec85543e1_79725535 (Smarty_Internal_Template $_smarty_tpl) {
?>
<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
	<?php if (!$_smarty_tpl->tpl_vars['main']->value) {
echo htmlspecialchars(str_repeat('- ',(2*$_smarty_tpl->tpl_vars['node']->value['currentDepth'])), ENT_QUOTES, 'UTF-8');
}?> <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['node']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

</option>
<?php if (count($_smarty_tpl->tpl_vars['node']->value['children']) > 0) {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['node']->value['children'], 'child', false, NULL, 'categoryTreeBranch', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
				<?php $_smarty_tpl->_subTemplateRender("file:modules/possearchproducts/category-tree-branch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'main'=>false), 0, true);
?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
