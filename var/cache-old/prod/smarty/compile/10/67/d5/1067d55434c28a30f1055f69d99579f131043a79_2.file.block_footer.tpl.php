<?php
/* Smarty version 3.1.33, created on 2020-01-17 06:51:38
  from '/home/myindian/wholesale.myindianstore.eu/modules/posstaticfooter/block_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e219fca559a48_18151486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1067d55434c28a30f1055f69d99579f131043a79' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/modules/posstaticfooter/block_footer.tpl',
      1 => 1579261777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e219fca559a48_18151486 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['staticblocks']->value, 'block', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['block']->value) {
?>
		<?php if ($_smarty_tpl->tpl_vars['block']->value['active'] == 1) {?>
			<p class ="title_block"> <?php ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['title'], ENT_QUOTES, 'UTF-8');
$_prefixVariable2 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_prefixVariable2),$_smarty_tpl ) );?>
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
