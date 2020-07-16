<?php
/* Smarty version 3.1.33, created on 2020-01-16 04:30:51
  from '/home/myindian/test.myindianstore.eu/themes/theme_origine4/templates/_partials/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e202d4b57ee09_77565237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '745a0c1449db06bed73a276c1f63ddff0e30f815' => 
    array (
      0 => '/home/myindian/test.myindianstore.eu/themes/theme_origine4/templates/_partials/footer.tpl',
      1 => 1578924315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e202d4b57ee09_77565237 (Smarty_Internal_Template $_smarty_tpl) {
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
