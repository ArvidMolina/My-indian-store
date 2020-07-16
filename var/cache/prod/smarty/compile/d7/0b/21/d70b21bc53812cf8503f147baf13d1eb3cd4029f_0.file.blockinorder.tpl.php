<?php
/* Smarty version 3.1.33, created on 2020-07-14 23:54:23
  from '/home/myindian/public_html/modules/venipakcarrier/views/templates/admin/blockinorder.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0e1b7fc3a5a2_35970667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd70b21bc53812cf8503f147baf13d1eb3cd4029f' => 
    array (
      0 => '/home/myindian/public_html/modules/venipakcarrier/views/templates/admin/blockinorder.tpl',
      1 => 1585504699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0e1b7fc3a5a2_35970667 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
<div class="col-lg-6 col-md-6 col-xs-12 panel">

    <div class="panel-heading">
        <i class="icon-tags"></i>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Venipak','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>

    </div>

    <?php if ($_smarty_tpl->tpl_vars['venipakBlockAllowed']->value) {?>
    <div class="venipak_order_config">
    <form action="<?php echo $_smarty_tpl->tpl_vars['venimoduleurl']->value;?>
" method="post" id="venipakOrderSubmitForm">

        <div class="row">
            <div class="col-md-12 col-xs-12">

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="field-row">
                            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Packets (count)",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
: </span>
                            <span>
                        <input type="text" name="packs" value="<?php if (isset($_smarty_tpl->tpl_vars['venipakOrderInfo']->value['packs'])) {?> <?php echo $_smarty_tpl->tpl_vars['venipakOrderInfo']->value['packs'];
} else { ?>1<?php }?>" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?> />
                    </span>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="field-row">
                            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Weight (Kg)",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
: </span>
                            <span>
                        <input type="text" name="weight" value="<?php if (isset($_smarty_tpl->tpl_vars['venipakOrderInfo']->value['weight'])) {
echo $_smarty_tpl->tpl_vars['venipakOrderInfo']->value['weight'];
} else {
echo $_smarty_tpl->tpl_vars['total_weight']->value;
}?>" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?> />
                    </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="field-row row">
                            <div class="col-sm-6">
                                <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"C.O.D.",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
: </span>
                                <span>
                    <select name="is_cod" disabled="disabled">
                        <option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</option>
                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['is_cod']->value) {?> selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</option>
                    </select>
                </span>
                            </div>
                            <div class="col-sm-6"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"C.O.D. amount",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
: <input type="text" name="cod_amount" value="<?php if ($_smarty_tpl->tpl_vars['isPickup']->value) {?>0<?php } else {
echo $_smarty_tpl->tpl_vars['total_paid_tax_incl']->value;
}?>" disabled="disabled" /></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="field-row">
                            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Pickup address",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
: </span>
                            <span>
                <select name="warehouse_id" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['venipak_warehouses']->value, 'warehouse');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['warehouse']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['warehouse']->value['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['venipakOrderInfo']->value['warehouse_id']) && $_smarty_tpl->tpl_vars['venipakOrderInfo']->value['warehouse_id'] == $_smarty_tpl->tpl_vars['warehouse']->value['id']) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['warehouse']->value['address_title'];?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </span>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="field-row"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Delivery option",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
:
                            <select name="delivery_time" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['delivery_times']->value, 'deliveryName', false, 'deliveryt');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['deliveryt']->value => $_smarty_tpl->tpl_vars['deliveryName']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['deliveryt']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['venipakOrderInfo']->value['delivery_time']) && $_smarty_tpl->tpl_vars['venipakOrderInfo']->value['delivery_time'] == $_smarty_tpl->tpl_vars['deliveryt']->value) || (isset($_smarty_tpl->tpl_vars['selectedComments']->value['delivery_type']) && $_smarty_tpl->tpl_vars['selectedComments']->value['delivery_type'] == $_smarty_tpl->tpl_vars['deliveryt']->value)) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['deliveryName']->value;?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <?php if ($_smarty_tpl->tpl_vars['VENIPAK_SHOW_RETURN_DOCS']->value == 1) {?>
                            <div class="field-row"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Return documents",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
:
                                <select name="return_docs" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>>
                                    <option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</option>
                                    <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['venipakOrderInfo']->value['return_docs']) && $_smarty_tpl->tpl_vars['venipakOrderInfo']->value['return_docs'] == 1) {?> selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</option>
                                </select>
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <?php if ($_smarty_tpl->tpl_vars['VENIPAK_SHOW_CHECK_ID']->value == 1) {?>
                            <div class="field-row"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Check recipient ID','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
:
                                <select name="check_docs" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>>
                                    <option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</option>
                                    <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['venipakOrderInfo']->value['check_docs']) && $_smarty_tpl->tpl_vars['venipakOrderInfo']->value['check_docs'] == 1) {?> selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</option>
                                </select>
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="field-row" <?php if ($_smarty_tpl->tpl_vars['VENIPAK_SHOW_PICKUP']->value != 1) {?>style="display: none;"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Sender",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
:
                            <select name="show_sender" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['venipak_senders']->value, 'sender');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sender']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['sender']->value['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['venipakOrderInfo']->value['show_sender']) && $_smarty_tpl->tpl_vars['venipakOrderInfo']->value['show_sender'] == $_smarty_tpl->tpl_vars['sender']->value['id']) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['sender']->value['address_title'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="field-row"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Package preparation time",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
:
                            <select name="manifest_date" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['venipak_manifest_dates']->value, 'mandate');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mandate']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['mandate']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['venipakOrderInfo']->value['manifest_date']) && $_smarty_tpl->tpl_vars['venipakOrderInfo']->value['manifest_date'] == $_smarty_tpl->tpl_vars['mandate']->value) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['mandate']->value;?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                </div>

                <?php if ($_smarty_tpl->tpl_vars['isPickup']->value == false) {?>

                <?php if (Configuration::get('VENIPAK_SHOW_COMMENT_DOOR_CODE') == '1' || Configuration::get('VENIPAK_SHOW_COMMENT_OFFICE_NO') == '1' || Configuration::get('VENIPAK_SHOW_COMMENT_WAREHOUSE_NO') == '1' || Configuration::get('VENIPAK_SHOW_COMMENT_CALL') == '1') {?>
                <hr />
                <?php }?>

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php if (Configuration::get('VENIPAK_SHOW_COMMENT_DOOR_CODE') == '1') {?>
                            <div class="field-row">
                                <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Comment - door code",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
: </span><span>
                                    <input type="text" name="comment_door_code" value="<?php if (isset($_smarty_tpl->tpl_vars['selectedComments']->value['comment_door_code'])) {
echo $_smarty_tpl->tpl_vars['selectedComments']->value['comment_door_code'];
}?>"  <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>/>
                                </span>
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <?php if (Configuration::get('VENIPAK_SHOW_COMMENT_OFFICE_NO') == '1') {?>
                            <div class="field-row">
                                <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Comment - office no.",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
: </span><span>
                                    <input type="text" name="comment_office_no" value="<?php if (isset($_smarty_tpl->tpl_vars['selectedComments']->value['comment_office_no'])) {
echo $_smarty_tpl->tpl_vars['selectedComments']->value['comment_office_no'];
}?>"  <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>/>
                                </span>
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <?php if (Configuration::get('VENIPAK_SHOW_COMMENT_WAREHOUSE_NO') == '1') {?>
                            <div class="field-row">
                                <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Comment - warehouse number",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
: </span><span>
                                    <input type="text" name="comment_warehous_no" value="<?php if (isset($_smarty_tpl->tpl_vars['selectedComments']->value['comment_warehous_no'])) {
echo $_smarty_tpl->tpl_vars['selectedComments']->value['comment_warehous_no'];
}?>"  <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>/>
                                </span>
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <?php if (Configuration::get('VENIPAK_SHOW_COMMENT_CALL') == '1') {?>
                            <div class="field-row">
                                <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Comment - call before delivery",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
: </span><span>
                                    <select name="comment_call" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>>
                                        <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['selectedComments']->value['comment_call']) && $_smarty_tpl->tpl_vars['selectedComments']->value['comment_call'] == 0) {?> selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"No"),$_smarty_tpl ) );?>
</option>
                                        <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['selectedComments']->value['comment_call']) && $_smarty_tpl->tpl_vars['selectedComments']->value['comment_call'] == 1) {?> selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Yes"),$_smarty_tpl ) );?>
</option>
                                    </select>
                                </span>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <?php } else { ?>
                <hr />

                    <div class="col-md-6 col-xs-12">
                        <div class="field-row">
                            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Selected pickup point",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
: </span><span>
                                <select id="id_pickup_point" name="id_pickup_point" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == 1) {?>disabled="disabled"<?php }?>>
                                <option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select pickup location','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pickup_points']->value, 'country');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
?>
                                        <?php if (count($_smarty_tpl->tpl_vars['pickup_points']->value) > 1) {?>
                                            <optgroup label="<?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>
">
                                        <?php }?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['country']->value['city'], 'city');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['city']->value) {
?>
                                            <optgroup label="<?php echo $_smarty_tpl->tpl_vars['city']->value['name'];?>
">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['city']->value['point'], 'point');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['point']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['point']->value['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['selectedComments']->value['id_pickup_point']) && $_smarty_tpl->tpl_vars['selectedComments']->value['id_pickup_point'] == $_smarty_tpl->tpl_vars['point']->value['id']) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['point']->value['name'];?>
</option>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </optgroup>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <?php if (count($_smarty_tpl->tpl_vars['pickup_points']->value) > 1) {?>
                                            </optgroup>
                                        <?php }?>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            </span>
                        </div>
                    </div>

                <?php }?>

            </div>
        </div>

        <div class="venipak-padding">
            <div class="venipakAction">
                <button type="button" name="venipak_save" id="venipakOrderSubmitBtn" class="btn btn-primary" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == true) {?>disabled="disabled"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"1. Save",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</button>
            </div>
        </div>
    </form>

        <div class="venipak-padding">
            <div class="venipakAction">
                <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['veniprintlabelsurl']->value;?>
" id="venipakOrderPrintLabelsForm" target="_blank">
                    <input type="hidden" name="order_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
" />
                    <button type="submit" name="venipak_printlabel" id="venipakOrderPrintLabels" <?php if ($_smarty_tpl->tpl_vars['venipakalldisabled']->value == false) {?>disabled="disabled"<?php }?> class="btn btn-success"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"2. Print labels",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 responseVenipak" style="margin-top: 15px;"></div>
        </div>
    </div>
    <?php } else { ?>
        <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['moduleUrl']->value;?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click here','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</a> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'to change settings.','mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</div>
    <?php }?>
</div>
</div>


    <style type="text/css">
        .venipak-padding {
            padding-top:10px;
            border-top: 1px solid #ececec;
            padding-right: 15px;
            float: left;
        }

        .venipakAction {
            display:inline-block;
        }

        .venipak_order_config .field-row {
            margin-bottom:10px;
        }

        .venipak_order_config .field-row input, .venipak_order_config .field-row select {
            margin-top:5px;
        }
    </style>



<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
    $("#venipakOrderPrintLabelsForm").submit(function(e){
        $("#venipakOrderSubmitForm").find('.response').html('');
        if($("#venipakOrderSubmitBtn").is(':disabled')){
            return true;
        }else{
            var saveResult = saveVenipakOrder();
            if(saveResult){
                return true;
            }else{
                return false;
            }
        }
    });

    function saveVenipakOrder(){
        $("#venipakOrderSubmitBtn").attr('disabled','disabled');
        var formData = $("#venipakOrderSubmitForm").serialize()+'&'+$.param({
					ajax: "1",
                    token: "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminOrders'),$_smarty_tpl ) );?>
",
					order_id: "<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
",

					});
        $.ajax({
				type:"POST",
                url: "<?php echo $_smarty_tpl->tpl_vars['venimoduleurl']->value;?>
",
				async: false,
				dataType: "json",
				data : formData,
				success : function(res)
				{
					//disable the inputs
                    if(typeof res.error !== "undefined"){
                        $('.responseVenipak').html('<div class="alert alert-danger">'+res.error+'</div>');
                        $("#venipakOrderSubmitBtn").removeAttr('disabled');
                    }else{
                        $('.responseVenipak').html('<div class="alert alert-success"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Successfully saved. Now you can print label.",'mod'=>'venipakcarrier'),$_smarty_tpl ) );?>
</div>');
                        $("#venipakOrderSubmitForm").find('input, select, button').attr('disabled','disabled');
                        $("#venipakOrderPrintLabels").removeAttr('disabled');
                    }
				},
                error: function(res){
                }
			});
            return $("#venipakOrderSubmitBtn").is(":disabled");
    }
    $("#venipakOrderSubmitBtn").unbind('click').bind('click',function(e){
        $(this).attr('disabled','disabled');
        $('.responseVenipak').html('');
        e.preventDefault();
        e.stopPropagation();
        saveVenipakOrder();

        return false;
    });
});
<?php echo '</script'; ?>
>
<?php }
}
