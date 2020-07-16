<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:55:28
  from '/home/myindian/public_html/pdf/invoice.shipping-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f9770ee3cb6_45315978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '636ee37f1edcd0551a829c379e9407c1010d30b6' => 
    array (
      0 => '/home/myindian/public_html/pdf/invoice.shipping-tab.tpl',
      1 => 1584378786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f9770ee3cb6_45315978 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="shipping-tab" width="100%">
	<tr>
		<td class="shipping center small grey bold" width="44%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</td>
		<td class="shipping center small white" width="56%"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
	</tr>
</table>
<?php }
}
