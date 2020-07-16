<?php
/* Smarty version 3.1.33, created on 2020-07-16 11:24:40
  from '/home/myindian/public_html/modules/posstaticfooter/block_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f100ec8cf9499_30745224',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03840ab9a7a6359c070a1e9c833910cc65eead20' => 
    array (
      0 => '/home/myindian/public_html/modules/posstaticfooter/block_footer.tpl',
      1 => 1584378784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f100ec8cf9499_30745224 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['staticblocks']->value, 'block', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['block']->value) {
?>
		<?php if ($_smarty_tpl->tpl_vars['block']->value['active'] == 1) {?>
			<p class ="title_block"> <?php ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['title'], ENT_QUOTES, 'UTF-8');
$_prefixVariable6 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_prefixVariable6),$_smarty_tpl ) );?>
 </p>
		      
		<?php }?>
		<?php echo $_smarty_tpl->tpl_vars['block']->value['description'];?>

		<?php if ($_smarty_tpl->tpl_vars['block']->value['insert_module'] == 1) {?>
		      <?php echo $_smarty_tpl->tpl_vars['block']->value['block_module'];?>

		 <?php }?>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }
}
