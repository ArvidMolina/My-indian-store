<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:55:28
  from '/home/myindian/public_html/pdf/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f9770b78c41_36606009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b54ae11c98727eb7d88dca55e9dd8e4aa8489f2' => 
    array (
      0 => '/home/myindian/public_html/pdf/header.tpl',
      1 => 1584378786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f9770b78c41_36606009 (Smarty_Internal_Template $_smarty_tpl) {
?>

<table style="width: 100%">
<tr>
	<td style="width: 50%">
		<?php if ($_smarty_tpl->tpl_vars['logo_path']->value) {?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['logo_path']->value;?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['width_logo']->value;?>
px; height:<?php echo $_smarty_tpl->tpl_vars['height_logo']->value;?>
px;" />
		<?php }?>
	</td>
	<td style="width: 50%; text-align: right;">
		<table style="width: 100%">
			<tr>
				<td style="font-weight: bold; font-size: 14pt; color: #444; width: 100%;"><?php if (isset($_smarty_tpl->tpl_vars['header']->value)) {
echo mb_strtoupper(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['header']->value,'html','UTF-8' )), 'UTF-8');
}?></td>
			</tr>
			<tr>
				<td style="font-size: 14pt; color: #9E9F9E"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date']->value,'html','UTF-8' ));?>
</td>
			</tr>
			<tr>
				<td style="font-size: 14pt; color: #9E9F9E"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'html','UTF-8' ));?>
</td>
			</tr>
		</table>
	</td>
</tr>
</table>

<?php }
}