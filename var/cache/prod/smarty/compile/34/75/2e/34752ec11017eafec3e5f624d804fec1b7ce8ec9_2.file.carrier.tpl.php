<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:21
  from '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/carrier.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dcdabb108_55210066',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34752ec11017eafec3e5f624d804fec1b7ce8ec9' => 
    array (
      0 => '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/carrier.tpl',
      1 => 1584378778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f8dcdabb108_55210066 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12844062535f0f8dcda019a3_06831773', 'step_carrier');
}
/* {block 'step_carrier'} */
class Block_12844062535f0f8dcda019a3_06831773 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'step_carrier' => 
  array (
    0 => 'Block_12844062535f0f8dcda019a3_06831773',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php echo '<script'; ?>
 type="text/javascript">
    var is_necessary_postcode = Boolean(<?php if (isset($_smarty_tpl->tpl_vars['is_necessary_postcode']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['is_necessary_postcode']->value, ENT_QUOTES, 'UTF-8');
}?>);
    var is_necessary_city = Boolean(<?php if (isset($_smarty_tpl->tpl_vars['is_necessary_city']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['is_necessary_city']->value, ENT_QUOTES, 'UTF-8');
}?>);
    var id_carrier_selected = '<?php if (isset($_smarty_tpl->tpl_vars['delivery_option']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['delivery_option']->value, ENT_QUOTES, 'UTF-8');
}?>';

    <?php if (isset($_smarty_tpl->tpl_vars['deliverydate_position']->value) && isset($_smarty_tpl->tpl_vars['deliverydate_reason']->value)) {?>
        var deliverydate_position = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['deliverydate_position']->value,"htmlall" )), ENT_QUOTES, 'UTF-8');?>
";
        var deliverydate_reason = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['deliverydate_reason']->value,"htmlall" )), ENT_QUOTES, 'UTF-8');?>
";
    <?php }?>

    
        if (!OnePageCheckoutPS.IS_LOGGED && is_necessary_postcode)
            $('div#onepagecheckoutps')
                .off('blur', 'input#delivery_postcode')
                .on('blur', 'input#delivery_postcode', function() {
                    Address.updateAddress({object: 'delivery', load_carriers: true})
                });
        if (!OnePageCheckoutPS.IS_LOGGED && is_necessary_city)
            $('div#onepagecheckoutps')
                .off('blur', 'input#delivery_city')
                .on('blur', 'input#delivery_city', function() {
                    Address.updateAddress({object: 'delivery', load_carriers: true})
                });
    
<?php echo '</script'; ?>
>

    <?php if (isset($_smarty_tpl->tpl_vars['is_virtual_cart']->value) && $_smarty_tpl->tpl_vars['is_virtual_cart']->value) {?>
        <input id="input_virtual_carrier" class="hidden" type="hidden" name="id_carrier" value="0" />
    <?php } else { ?>
        <?php if (($_smarty_tpl->tpl_vars['hasError']->value)) {?>
            <p class="alert alert-warning">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error', false, 'k', 'f_errors', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_f_errors']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_f_errors']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_f_errors']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_f_errors']->value['total'];
?>
                    -&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8');?>

                    <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_errors']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_errors']->value['last'] : null)) {?><br/><br/><?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </p>

			<button class="btn btn-info pull-right btn-sm" type="button" onclick="Address.updateAddress({object: 'delivery', update_cart: true, load_carriers: true});">
				<i class="fa-pts fa-pts-refresh"></i>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reload','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

			</button>
            <div class="clear"></div>
        <?php } else { ?>
            <div id="hook-display-before-carrier">
                <?php echo $_smarty_tpl->tpl_vars['hookDisplayBeforeCarrier']->value;?>

            </div>

            <div id="shipping_container">
                <?php if (count($_smarty_tpl->tpl_vars['delivery_options']->value)) {?>
                    <div id="js-delivery" class="delivery-options">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['delivery_options']->value, 'carrier', false, 'carrier_id');
$_smarty_tpl->tpl_vars['carrier']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['carrier_id']->value => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->index++;
$__foreach_carrier_17_saved = $_smarty_tpl->tpl_vars['carrier'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHIPPING_COMPATIBILITY'] && $_smarty_tpl->tpl_vars['delivery_option']->value != $_smarty_tpl->tpl_vars['carrier_id']->value) {?>
                                <?php continue 1;?>
                            <?php }?>
                            <div class="delivery-option delivery_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['delivery_option']->value == $_smarty_tpl->tpl_vars['carrier_id']->value) {?> selected alert alert-info<?php }?>">
                                <div class="row pts-vcenter">
                                    <div class="col-xs-1 col-1">
                                        <input class="delivery_option_radio not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHIPPING_COMPATIBILITY']) {?>hidden<?php }?>" type="radio" name="delivery_option[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_address']->value, ENT_QUOTES, 'UTF-8');?>
]" id="delivery_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier_id']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['delivery_option']->value == $_smarty_tpl->tpl_vars['carrier_id']->value) {?>checked<?php }?> />
                                    </div><!--
                                    --><div class="delivery_option_logo <?php if (!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER'] && !$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DESCRIPTION_CARRIER']) {?>col-xs-11 col-11<?php } else {
if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER']) {?>col-xs-3 col-3<?php } else { ?>col-xs-4 col-4<?php }
}?>">
                                        <?php if (($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER'])) {?>
                                            <?php if ($_smarty_tpl->tpl_vars['carrier']->value['logo']) {?>
                                                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
" class="img-thumbnail"/>
                                            <?php } else { ?>
                                                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ONEPAGECHECKOUTPS_IMG']->value, ENT_QUOTES, 'UTF-8');?>
shipping.png" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
" class="img-thumbnail"/>
                                            <?php }?>
                                        <?php } else { ?>
                                            <div class="delivery_option_title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
</div>
                                            <?php if (!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER'] && !$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DESCRIPTION_CARRIER']) {?>
                                                <div class="delivery_option_price">
                                                    (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['price'], ENT_QUOTES, 'UTF-8');?>
)
                                                </div>
                                            <?php }?>
                                        <?php }?>

                                        <?php if ($_smarty_tpl->tpl_vars['carrier']->value['external_module_name'] != '') {?>
                                            <input type="hidden" class="module_carrier" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['external_module_name'], ENT_QUOTES, 'UTF-8');?>
" value="delivery_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_address']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->index, ENT_QUOTES, 'UTF-8');?>
" />
                                            <input type="hidden" name="name_carrier" id="name_carrier_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_address']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->index, ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
                                        <?php }?>
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER'] || $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DESCRIPTION_CARRIER']) {?>
                                        <div class="carrier_delay <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER']) {?>col-xs-8 col-8<?php } else { ?>col-xs-7 col-7<?php }?>">
                                            <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_CARRIER']) {?>
                                                <div class="delivery_option_title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
</div>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DESCRIPTION_CARRIER'] && $_smarty_tpl->tpl_vars['carrier']->value['delay']) {?>
                                                <div class="delivery_option_delay">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['carrier']->value['estimate_days'])) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carrier']->value['estimate_days'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Days','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['delay'], ENT_QUOTES, 'UTF-8');
}?>
                                                </div>
                                            <?php }?>
                                            <div class="delivery_option_price">
                                                (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['price'], ENT_QUOTES, 'UTF-8');?>
)
                                            </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['carrier']->value['external_module_name'] != '' && isset($_smarty_tpl->tpl_vars['carrier']->value['extra_info_carrier'])) {?>
                                        <div class="extra_info_carrier pull-right" style="display:<?php if (isset($_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value]) && $_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value] == $_smarty_tpl->tpl_vars['key']->value) {?>block<?php } else { ?>none<?php }?>">
                                            <?php if (!empty($_smarty_tpl->tpl_vars['carrier']->value['extra_info_carrier'])) {?>
                                                <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['extra_info_carrier'], ENT_QUOTES, 'UTF-8');?>
</span>
                                                <br />
                                                <a class="edit_pickup_point" onclick="Carrier.displayPopupModule_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['external_module_name'], ENT_QUOTES, 'UTF-8');?>
(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');?>
)"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit pickup point','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</a>
                                            <?php } else { ?>
                                                <a class="select_pickup_point" onclick="Carrier.displayPopupModule_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['external_module_name'], ENT_QUOTES, 'UTF-8');?>
(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');?>
)"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select pickup point','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</a>
                                            <?php }?>
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="row carrier-extra-content"<?php if ($_smarty_tpl->tpl_vars['delivery_option']->value != $_smarty_tpl->tpl_vars['carrier_id']->value) {?> style="display:none;"<?php }?>>
                                    <?php echo $_smarty_tpl->tpl_vars['carrier']->value['extraContent'];?>

                                </div>
                            </div>
                        <?php
$_smarty_tpl->tpl_vars['carrier'] = $__foreach_carrier_17_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['recyclablePackAllowed']->value || $_smarty_tpl->tpl_vars['gift']->value['allowed']) {?>
                        <div class="row">
                            <?php if ($_smarty_tpl->tpl_vars['recyclablePackAllowed']->value) {?>
                                <div class="col-xs-12 col-12">
                                    <label for="recyclable">
                                        <input type="checkbox" name="recyclable" id="recyclable" value="1" <?php if ($_smarty_tpl->tpl_vars['recyclable']->value == 1) {?>checked="checked"<?php }?> class="carrier_checkbox not_unifrom not_uniform"/>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I agree to receive my order in recycled packaging','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                                    </label>
                                </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['gift']->value['allowed']) {?>
                                <div class="col-xs-12 col-12">
                                    <label for="gift">
                                        <input type="checkbox" name="gift" id="gift" value="1" <?php if ($_smarty_tpl->tpl_vars['gift']->value['isGift']) {?>checked<?php }?> class="carrier_checkbox not_unifrom not_uniform"/>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I would like the order to be gift-wrapped.','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                                    </label>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['gift']->value['allowed']) {?>
                        <div class="row">
                            <div class="col-xs-12 col-12">
                                <p id="gift_div_opc" class="textarea <?php if (!$_smarty_tpl->tpl_vars['gift']->value['isGift']) {?>hidden<?php }?>">
                                    <label for="gift_message"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If you\'d like, you can add a note to the gift:','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</label>
                                    <textarea rows="1" id="gift_message" name="gift_message" class="form-control"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gift']->value['message'], ENT_QUOTES, 'UTF-8');?>
</textarea>
                                </p>
                            </div>
                        </div>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHIPPING_COMPATIBILITY']) {?>
                        <div class="pts-btn-secondary" id="show_carrier_embed">
                            <span>
                                <i class="fa-pts fa-pts-refresh"></i>
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Change shipping carrier','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                            </span>
                        </div>
                    <?php }?>
                <?php } else { ?>
                    <p class="alert alert-danger"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Unfortunately, there are no carriers available for your delivery address.','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</p>
                <?php }?>
            </div>
            <?php if (!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHIPPING_COMPATIBILITY']) {?>
                <div id="hook-display-after-carrier">
                    <?php echo $_smarty_tpl->tpl_vars['hookDisplayAfterCarrier']->value;?>

                </div>
            <?php }?>

            <div id="extra_carrier"></div>
        <?php }?>
    <?php }
}
}
/* {/block 'step_carrier'} */
}
