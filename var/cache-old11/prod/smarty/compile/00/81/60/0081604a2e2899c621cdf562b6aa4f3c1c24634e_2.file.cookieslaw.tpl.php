<?php
/* Smarty version 3.1.33, created on 2020-03-04 13:54:08
  from '/home/myindian/wholesale.myindianstore.eu/modules/lgcookieslaw/views/templates/hook/cookieslaw.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5f96e0eee3d1_08695372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0081604a2e2899c621cdf562b6aa4f3c1c24634e' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/modules/lgcookieslaw/views/templates/hook/cookieslaw.tpl',
      1 => 1580459225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5f96e0eee3d1_08695372 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="lgcookieslaw_banner" class="lgcookieslaw_banner">
			<?php if ($_smarty_tpl->tpl_vars['buttons_position']->value == 2) {?>
						<span id="lgcookieslaw_accept" class="lgcookieslaw_btn lgcookieslaw_btn_accept" onclick="closeinfo(true)"><?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['button1']->value,'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
</span>
			<a id="lgcookieslaw_info" class="lgcookieslaw_btn" <?php if (isset($_smarty_tpl->tpl_vars['cms_target']->value) && $_smarty_tpl->tpl_vars['cms_target']->value) {?> target="_blank" <?php }?> href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cms_link']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" >
				<?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['button2']->value,'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>

			</a>
		<?php }?>
		<div class="lgcookieslaw_container">
			<?php if ($_smarty_tpl->tpl_vars['buttons_position']->value == 4) {?>
				<div class="lgcookieslaw_button_container" style="padding:5px">
										<span id="lgcookieslaw_accept" class="lgcookieslaw_btn lgcookieslaw_btn_accept" onclick="closeinfo(true)"><?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['button1']->value,'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
</span>
					<a id="lgcookieslaw_info" class="lgcookieslaw_btn" <?php if (isset($_smarty_tpl->tpl_vars['cms_target']->value) && $_smarty_tpl->tpl_vars['cms_target']->value) {?> target="_blank" <?php }?> href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cms_link']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" >
						<?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['button2']->value,'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>

					</a>
				</div>
			<?php }?>
			<div class="lgcookieslaw_message"><?php if (version_compare(@constant('_PS_VERSION_'),'1.7.0','>=')) {
echo $_smarty_tpl->tpl_vars['cookie_message']->value;
} else {
echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cookie_message']->value,'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');
}?></div>
			<?php if ($_smarty_tpl->tpl_vars['buttons_position']->value == 5) {?>
				<div class="lgcookieslaw_button_container">
					<div>
												<span id="lgcookieslaw_accept" class="lgcookieslaw_btn lgcookieslaw_btn_accept" onclick="closeinfo(true)"><?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['button1']->value,'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
</span>
					</div>
					<div>
						<a id="lgcookieslaw_info" class="lgcookieslaw_btn" <?php if (isset($_smarty_tpl->tpl_vars['cms_target']->value) && $_smarty_tpl->tpl_vars['cms_target']->value) {?> target="_blank" <?php }?> href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cms_link']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" >
							<?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['button2']->value,'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>

						</a>
					</div>
				</div>
			<?php }?>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['buttons_position']->value == 3) {?>
						<span id="lgcookieslaw_accept" class="lgcookieslaw_btn lgcookieslaw_btn_accept" onclick="closeinfo(true)"><?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['button1']->value,'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
</span>
			<a id="lgcookieslaw_info" class="lgcookieslaw_btn" <?php if (isset($_smarty_tpl->tpl_vars['cms_target']->value) && $_smarty_tpl->tpl_vars['cms_target']->value) {?> target="_blank" <?php }?> href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cms_link']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" >
				<?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['button2']->value,'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>

			</a>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['show_close']->value) {?>
			<div id="lgcookieslaw_close" class="lgcookieslaw_btn-close">
				<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_module']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
/views/img/close.png" alt="close" class="lgcookieslaw_close_banner_btn" onclick="closeinfo();">
			</div>
		<?php }?>
	</div>
<?php }
}
