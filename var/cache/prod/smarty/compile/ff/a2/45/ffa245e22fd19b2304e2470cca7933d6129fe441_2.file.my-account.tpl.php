<?php
/* Smarty version 3.1.33, created on 2020-07-15 20:18:15
  from '/home/myindian/public_html/modules/registrationfields/views/templates/hook/my-account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f3a57227301_87494034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffa245e22fd19b2304e2470cca7933d6129fe441' => 
    array (
      0 => '/home/myindian/public_html/modules/registrationfields/views/templates/hook/my-account.tpl',
      1 => 1591313122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f3a57227301_87494034 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Registration Fields -->
<?php if ($_smarty_tpl->tpl_vars['ps_17']->value > 0) {?>
<a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getModuleLink('registrationfields','myinfo'),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
<span class="link-item">
  <i class="material-icons">&#xE85D;</i>
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My Registration Information','mod'=>'registrationfields'),$_smarty_tpl ) );?>

</span>
</a>
<?php } else { ?>
<li class="lnk_registration_fields">
	<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getModuleLink('registrationfields','myinfo',array(),true),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My Registration Information','mod'=>'registrationfields'),$_smarty_tpl ) );?>
">
		<?php if ($_smarty_tpl->tpl_vars['ps_version']->value < 1.6) {?>
		<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('__PS_BASE_URI__'),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
modules/registrationfields/views/img/info.png" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My Registration Information','mod'=>'registrationfields'),$_smarty_tpl ) );?>
" class="icon" />
		<?php }?>
		<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My Registration Information','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</span>
		<?php if ($_smarty_tpl->tpl_vars['ps_version']->value >= 1.6) {?>
		<i class="icon-file-text-o"></i>
		<?php }?>
	</a>
</li>
<?php }
}
}
