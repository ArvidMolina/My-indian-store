<?php
/* Smarty version 3.1.33, created on 2020-07-14 14:40:01
  from '/home/myindian/public_html/modules/registrationfields/views/templates/admin/pdf/pdf_registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0d99917ca4d1_86797237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72ab9a16e0cd0e04f9aa52fdcbc9441627709453' => 
    array (
      0 => '/home/myindian/public_html/modules/registrationfields/views/templates/admin/pdf/pdf_registration.tpl',
      1 => 1591313122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0d99917ca4d1_86797237 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/myindian/public_html/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>
<!-- registration fields heading -->
 <table id="summary-tab">
	<tr>
		<td class="center grey bold">
			<?php if ($_smarty_tpl->tpl_vars['REGISTRATION_FIELDS_HEADING']->value) {?>
				<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['REGISTRATION_FIELDS_HEADING']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

			<?php } else { ?>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Registration Fields','mod'=>'registrationfields','pdf'=>true),$_smarty_tpl ) );?>

			<?php }?>
		</td>
	</tr>
</table>
<!-- registration fields -->
<table id="summary-tab">
	<?php $_smarty_tpl->_assignInScope('root_dir', ((@constant('_PS_ROOT_DIR_')).('/')));?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groupedFields']->value, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
	 <?php if ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'attachment' || $_smarty_tpl->tpl_vars['field']->value['field_type'] == 'message') {?>
	 	<?php continue 1;?>
	 <?php } else { ?>
		<tr>
			<td class="left grey bold" width="45%" style="margin-left:15px;">
				<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['field_name'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

			</td>
			<td class="left white" width="55%" style="margin-left:15px;">
				<?php if ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'image' && $_smarty_tpl->tpl_vars['field']->value['value'] && file_exists($_smarty_tpl->tpl_vars['field']->value['value'])) {?>
					<?php $_smarty_tpl->_assignInScope('field_value', smarty_modifier_replace($_smarty_tpl->tpl_vars['field']->value['value'],$_smarty_tpl->tpl_vars['root_dir']->value,''));?>
					<img class="imgm img-thumbnail" src="<?php if ($_smarty_tpl->tpl_vars['pv']->value < 1.7) {
echo htmlspecialchars(Tools::getShopDomain(), ENT_QUOTES, 'UTF-8');
}
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('__PS_BASE_URI__'),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" width="16px">
				<?php } else { ?>
					<?php echo htmlspecialchars(Tools::htmlentitiesUTF8(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['obj']->value->getFormatedValue(($_smarty_tpl->tpl_vars['field']->value)),'htmlall','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>

				<?php }?>
			</td>
		</tr>
	<?php }?>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}
