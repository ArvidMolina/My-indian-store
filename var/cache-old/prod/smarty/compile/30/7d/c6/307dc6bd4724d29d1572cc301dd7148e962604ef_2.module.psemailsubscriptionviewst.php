<?php
/* Smarty version 3.1.33, created on 2020-01-17 06:51:38
  from 'module:psemailsubscriptionviewst' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e219fca633746_70063825',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '307dc6bd4724d29d1572cc301dd7148e962604ef' => 
    array (
      0 => 'module:psemailsubscriptionviewst',
      1 => 1579261783,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e219fca633746_70063825 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<div class="ft_newsletter">
		<div class="content_newsletter">
		<div class="row">
			<div class="col-xs-12 col-md-3">
				<div class="titile">
					<h3>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Join Our','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>

						<span class="iner"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Newsletter Now','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
					</h3>
					
				</div>	
			</div>	
			<div class="col-xs-12 col-md-4">
				<div class="text_new"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Join 60.000+ subscribers and get a new discount coupon on every Wednesday.','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</div>
			</div>
			<div class="col-xs-12 col-md-5">
				<div class="block_content">
					<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
#footer" method="post">
						<div class="input-wrapper">
						  <input
							name="email"
							class="input_txt"
							type="text"
							value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8');?>
"
							placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your email address','d'=>'Shop.Forms.Labels'),$_smarty_tpl ) );?>
"
						  >
						</div>
						<button class="btn btn-primary" name="submitNewsletter" type="submit" value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Subscribe','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</button>
						<input type="hidden" name="action" value="0">
					</form>
					
					<div class="col-xs-12">
					  <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
						<p class="alert <?php if ($_smarty_tpl->tpl_vars['nw_error']->value) {?>alert-danger<?php } else { ?>alert-success<?php }?>">
						  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value, ENT_QUOTES, 'UTF-8');?>

						</p>
					  <?php }?>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
<?php }
}
