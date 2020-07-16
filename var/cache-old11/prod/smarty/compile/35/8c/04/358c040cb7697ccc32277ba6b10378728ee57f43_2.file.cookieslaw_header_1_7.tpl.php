<?php
/* Smarty version 3.1.33, created on 2020-03-04 13:48:58
  from '/home/myindian/wholesale.myindianstore.eu/modules/lgcookieslaw/views/templates/hook/cookieslaw_header_1_7.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5f95aaeba7b5_40456893',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '358c040cb7697ccc32277ba6b10378728ee57f43' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/modules/lgcookieslaw/views/templates/hook/cookieslaw_header_1_7.tpl',
      1 => 1580459225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./cookieslaw_header_code.tpl' => 1,
  ),
),false)) {
function content_5e5f95aaeba7b5_40456893 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>
	.lgcookieslaw_banner {
		display:<?php if ($_smarty_tpl->tpl_vars['hidden']->value) {?>none<?php } else { ?>table<?php }?>;
		width:100%;
		position:fixed;
		left:0;
		repeat-x scroll left top;
		background: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bgcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bgcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		border-left: 1px solid <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bgcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		border-radius: 3px 3px 3px 3px;
		border-right: 1px solid <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bgcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fontcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
		z-index: 99999;
		border-style: solid;
		border-width: 1px;
		margin: 0;
		outline: medium none;
		text-align: center;
		vertical-align: middle;
		text-shadow: 0 0 0 0;
		-webkit-box-shadow: 0px 1px 5px 0px <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['shadowcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		-moz-box-shadow:    0px 1px 5px 0px <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['shadowcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		box-shadow:         0px 1px 5px 0px <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['shadowcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		font-size: 12px;
	
		<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['position']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['opacity']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
	
	}

	.lgcookieslaw_banner > form
	{
		position:relative;
	}

	.lgcookieslaw_banner span.lgcookieslaw_btn
	{
		border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn1_bgcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
		background: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn1_bgcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
		color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn1_fontcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
		text-align: center;
		margin: 5px 0px 5px 0px;
		padding: 5px 5px;
		display: inline-block;
		border: 0;
		font-weight: bold;
		height: 26px;
		line-height: 16px;
		width: auto;
		font-size: 12px;
		cursor: pointer;
	}

	.lgcookieslaw_banner span:hover.lgcookieslaw_btn
	{
		moz-opacity:0.85;
		opacity: 0.85;
		filter: alpha(opacity=85);
	}

	.lgcookieslaw_banner a.lgcookieslaw_btn
	{
		border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn2_bgcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		background: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn2_bgcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn2_fontcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
		margin: 5px 0px 5px 0px;
		text-align: center;
		padding: 5px 5px;
		display: inline-block;
		border: 0;
		font-weight: bold;
		height: 26px;
		line-height: 16px;
		width: auto;
		font-size: 12px;
	}

	@media (max-width: 768px) {
		.lgcookieslaw_banner span.lgcookieslaw_btn,
		.lgcookieslaw_banner a.lgcookieslaw_btn {
			height: auto;
		}
	}

	.lgcookieslaw_banner a:hover.lgcookieslaw_btn
	{
		border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn2_bgcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		background: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn2_bgcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn2_fontcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
		moz-opacity:0.85;
		opacity: 0.85;
		filter: alpha(opacity=85);
	}

	.lgcookieslaw_close_banner_btn
	{
		cursor:pointer;
		height:21px;
		max-width:21px;
		width:21px;
	}

	.lgcookieslaw_container {
		display:table;
		margin: 0 auto;
	}

	.lgcookieslaw_button_container {
		display:table-cell;
		padding:0px;
		vertical-align: middle;
	}

	.lgcookieslaw_button_container div{
		display:table-cell;
		padding: 0px 4px 0px 0px;
		vertical-align: middle;
	}

	.lgcookieslaw_message {
		display:table-cell;
		font-size: 12px;
		padding:2px 5px 5px 5px;
		vertical-align: middle;
	}

	.lgcookieslaw_message p {
		margin: 0;
		color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fontcolor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
	}

	.lgcookieslaw_btn-close {
		position:absolute;
		right:5px;
		top:5px;
	}
</style>

<?php $_smarty_tpl->_subTemplateRender('file:./cookieslaw_header_code.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
