<?php
/* Smarty version 3.1.33, created on 2020-03-04 13:56:37
  from '/home/myindian/wholesale.myindianstore.eu/themes/theme_origine4/templates/_partials/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5f9775bd3d75_92247654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c84eb83950bed15ed3c8cced644a65ae3dd5fe7' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/themes/theme_origine4/templates/_partials/footer.tpl',
      1 => 1579261783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5f9775bd3d75_92247654 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="footer-container">
	
	<div class="container">	
		<div class=" footer-middle">
			  <div class="row">	
					<div class="col-sm-12 col-md-12 col-lg-4 col-xs-12 ">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterBefore'),$_smarty_tpl ) );?>

					</div>
					<div class="col-sm-12 col-md-12 col-lg-4 col-xs-12">
						<div class="row">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooter'),$_smarty_tpl ) );?>

						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-4 col-xs-12">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBlockFooter2'),$_smarty_tpl ) );?>

					</div>
			  </div>
		</div>
		<div class="newsletter">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterAfter'),$_smarty_tpl ) );?>

		</div>
	</div>
	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBlockFooter1'),$_smarty_tpl ) );?>

</div><?php }
}
