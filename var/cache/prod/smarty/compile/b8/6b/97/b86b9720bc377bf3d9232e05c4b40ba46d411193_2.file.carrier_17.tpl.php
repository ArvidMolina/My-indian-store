<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:21
  from '/home/myindian/public_html/modules/venipakcarrier/views/templates/hook/carrier_17.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dcd9eb9b5_66064572',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b86b9720bc377bf3d9232e05c4b40ba46d411193' => 
    array (
      0 => '/home/myindian/public_html/modules/venipakcarrier/views/templates/hook/carrier_17.tpl',
      1 => 1585504699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f8dcd9eb9b5_66064572 (Smarty_Internal_Template $_smarty_tpl) {
?><input type="hidden" id="venipak_carrier_carrier_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['venipak_carrier_id']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" id="venipak_carrier_address_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_address_delivery']->value, ENT_QUOTES, 'UTF-8');?>
" />

<div id="venipak-additional-info">
    <div class="venipak-order-comments">

        <?php if (Configuration::get('VENIPAK_SHOW_DELIVERY_TYPES') == '1') {?>
            <div class="field-row">
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delivery time:','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</label>
                <select name="venipak_delivery_type" id="venipak_delivery_type" class="venipak_select2 input-medium form-control" style="width:100%">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['availableDeliveryTypes']->value, 'type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
?>
                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['type']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['allDeliveryTypes']->value[$_smarty_tpl->tpl_vars['type']->value], ENT_QUOTES, 'UTF-8');?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
        <?php }?>

        <?php if (Configuration::get('VENIPAK_SHOW_COMMENT_DOOR_CODE') == '1') {?>
            <div class="field-row">
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Door code:','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</label>
                <input type="text" name="venipak_door_code" id="venipak_door_code" class="form-control" value="" />
            </div>
        <?php }?>

        <?php if (Configuration::get('VENIPAK_SHOW_COMMENT_OFFICE_NO') == '1') {?>
            <div class="field-row">
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Office number:','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</label>
                <input type="text" name="venipak_office_no" id="venipak_office_no" class="form-control" value="" />
            </div>
        <?php }?>

        <?php if (Configuration::get('VENIPAK_SHOW_COMMENT_WAREHOUSE_NO') == '1') {?>
            <div class="field-row">
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Warehouse number:','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</label>
                <input type="text" name="venipak_warehouse_no" id="venipak_warehouse_no" class="form-control" value="" />
            </div>
        <?php }?>

        <?php if (Configuration::get('VENIPAK_SHOW_COMMENT_CALL') == '1') {?>
            <div class="field-row" ><label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Call before delivery:','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</label>
                <select name="venipak_comment_call" id="venipak_comment_call" class="form-control select2 col-12">
                    <option value="1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</option>
                    <option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</option>
                </select>
            </div>
        <?php }?>

    </div>
</div>
<?php }
}
