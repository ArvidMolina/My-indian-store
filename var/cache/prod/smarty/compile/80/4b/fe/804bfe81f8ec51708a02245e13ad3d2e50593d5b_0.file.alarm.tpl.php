<?php
/* Smarty version 3.1.33, created on 2020-07-07 14:57:36
  from '/home/myindian/public_html/modules/neworderalarm/views/alarm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f046330a696f9_19765067',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '804bfe81f8ec51708a02245e13ad3d2e50593d5b' => 
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
function content_5f046330a696f9_19765067 (Smarty_Internal_Template $_smarty_tpl) {
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
