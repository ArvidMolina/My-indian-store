<?php
/* Smarty version 3.1.33, created on 2020-07-14 23:54:24
  from '/home/myindian/public_html/modules/neworderalarm/views/alarm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0e1b8059fd86_00185823',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5124fa6dd4a7b78744b40936b12ed361e39a1af3' => 
    array (
      0 => '/home/myindian/public_html/modules/neworderalarm/views/alarm.tpl',
      1 => 1587562918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0e1b8059fd86_00185823 (Smarty_Internal_Template $_smarty_tpl) {
?><audio id="alarmAudio" src="<?php echo $_smarty_tpl->tpl_vars['alarmAudio']->value;?>
" preload="none">
<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your browser does not support the audio element','mod'=>'neworderalarm'),$_smarty_tpl ) );?>

</audio>
<?php echo '<script'; ?>
 type="text/javascript">
  var orderAlarmUrl = '<?php echo $_smarty_tpl->tpl_vars['alarmCallback']->value;?>
';
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['alarmScript']->value;?>
"><?php echo '</script'; ?>
><?php }
}
