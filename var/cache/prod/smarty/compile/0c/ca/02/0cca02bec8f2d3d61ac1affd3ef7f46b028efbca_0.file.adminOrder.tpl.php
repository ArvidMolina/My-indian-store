<?php
/* Smarty version 3.1.33, created on 2020-07-14 23:54:23
  from '/home/myindian/public_html/modules/makecommerce/views/templates/hook/adminOrder.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0e1b7fb09f92_82910989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cca02bec8f2d3d61ac1affd3ef7f46b028efbca' => 
    array (
      0 => '/home/myindian/public_html/modules/makecommerce/views/templates/hook/adminOrder.tpl',
      1 => 1584379509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0e1b7fb09f92_82910989 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="makecommerce_refund">
    <div>
        <div class="panel">
            <div class="panel-heading"><img width="16" height="16" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['base_url']->value,'htmlall','UTF-8' ));?>
modules/makecommerce/logo.png" alt="" /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'MakeCommerce Refund','mod'=>'makecommerce'),$_smarty_tpl ) );?>
</div>
			<?php if (isset($_smarty_tpl->tpl_vars['error']->value) && $_smarty_tpl->tpl_vars['error']->value) {?>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <ul class="list-unstyled">
                        <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
                    </ul>
                </div>
            <?php }?>	
            <?php if (!isset($_smarty_tpl->tpl_vars['refunded']->value)) {?>
                <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total refund','mod'=>'makecommerce'),$_smarty_tpl ) );?>
</h3>
                <form method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_SERVER['REQUEST_URI'],'htmlall','UTF-8' ));?>
" class="well">
                    <input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['id_order']->value;?>
" />
                    <p class="center">
                        <button type="submit" class="btn btn-default" name="submitMKRefund" onclick="if (!confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Are you sure to refund total amount?','mod'=>'makecommerce'),$_smarty_tpl ) );?>
'))return false;">
                            <i class="icon-undo"></i>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refund total ','mod'=>'makecommerce'),$_smarty_tpl ) );
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['total_amount']->value),$_smarty_tpl ) );?>

                        </button>
                    </p>
                </form>
			<?php }?>
            <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Partial refund','mod'=>'makecommerce'),$_smarty_tpl ) );?>
</h3>
            <form method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_SERVER['REQUEST_URI'],'htmlall','UTF-8' ));?>
" class="well">
				<input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['id_order']->value;?>
" />
                <p class="center">
					<input type="text" name="mk_partial_refund" id="mk_partial_refund" class="form-control fixed-width-sm pull-left" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Amount','mod'=>'makecommerce'),$_smarty_tpl ) );?>
">
                    <button type="submit" class="btn btn-default" name="submitMKRefundPartial" onclick="if (!confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Are you sure you want to do refund?','mod'=>'makecommerce'),$_smarty_tpl ) );?>
'))return false;">
						<i class="icon-undo"></i>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Partial refund','mod'=>'makecommerce'),$_smarty_tpl ) );?>

                    </button>
                </p>
            </form>
			<?php if (isset($_smarty_tpl->tpl_vars['refund_details']->value) && $_smarty_tpl->tpl_vars['refund_details']->value) {?>
                <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refund history','mod'=>'makecommerce'),$_smarty_tpl ) );?>
 (<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total refunded:','mod'=>'makecommerce'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['refunded']->value),$_smarty_tpl ) );?>
)</h3>
                <div class="table-responsive">
                    <table class="table" width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refund amount','mod'=>'makecommerce'),$_smarty_tpl ) );?>
</th>
                            <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refund date','mod'=>'makecommerce'),$_smarty_tpl ) );?>
</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['refund_details']->value, 'refund');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['refund']->value) {
?>
                            <tr>
                                <td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['refund']->value['refund_amount']),$_smarty_tpl ) );?>
</td>
                                <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Tools::displayDate($_smarty_tpl->tpl_vars['refund']->value['refund_date'],@constant('null'),true),'htmlall','UTF-8' ));?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                </div>
            <?php }?>
        </div>
    </div>
</div>

<?php }
}
