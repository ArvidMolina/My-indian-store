<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:22
  from '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/address.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dce14d273_83851609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b19d6479c3b8fd396edccb5d7bf6799d25ba6a90' => 
    array (
      0 => '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/address.tpl',
      1 => 1584378778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./controls.tpl' => 3,
    'file:./form-fields.tpl' => 1,
    'file:./custom_html/address.tpl' => 1,
  ),
),false)) {
function content_5f0f8dce14d273_83851609 (Smarty_Internal_Template $_smarty_tpl) {
if (!isset($_smarty_tpl->tpl_vars['rc_page']->value)) {?>
    <?php $_smarty_tpl->_assignInScope('rc_page', false);
}?>
<input type="hidden" id="rc_page" name="rc_page" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rc_page']->value, ENT_QUOTES, 'UTF-8');?>
" />

<?php if (!$_smarty_tpl->tpl_vars['register_customer']->value || !$_smarty_tpl->tpl_vars['rc_page']->value || $_smarty_tpl->tpl_vars['rc_page']->value == 'identity') {?>
    <?php if (isset($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->customer])) {?>
        <h5 class="onepagecheckoutps_p_step onepagecheckoutps_p_step_one">
            <i class="fa-pts fa-pts-user fa-pts-2x"></i>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your data','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

            <?php if (!$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED'] || $_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_GUEST']) {?>
                <button type="button" id="opc_show_login" class="btn btn-primary btn-xs float-lg-right" >
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Already registered?','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                </button>
            <?php }?>
        </h5>

        <?php if (!$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED'] && $_smarty_tpl->tpl_vars['opc_social_networks']->value) {?>
            <section id="opc_social_networks">
                <h5><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Login using your social networks','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</h5>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['opc_social_networks']->value, 'network', false, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['network']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['network']->value->enable && $_smarty_tpl->tpl_vars['network']->value->client_id != '' && $_smarty_tpl->tpl_vars['network']->value->client_secret != '') {?>
                        <button type="button" class="btn btn-sm btn-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" onclick="Fronted.openWindow('<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getModuleLink('onepagecheckoutps','login',array('sv'=>$_smarty_tpl->tpl_vars['network']->value->name_network)),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
', true)">
                            <?php if ($_smarty_tpl->tpl_vars['network']->value->name_network == 'Google') {?>
                                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['ONEPAGECHECKOUTPS_IMG'], ENT_QUOTES, 'UTF-8');?>
social/btn_google.png" alt="google">
                            <?php } elseif ($_smarty_tpl->tpl_vars['network']->value->name_network == 'Biocryptology') {?>
                                <img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['ONEPAGECHECKOUTPS_IMG'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
social/btn_biocryptology.png" alt="biocryptology">
                            <?php } else { ?>
                                <i class="fa-pts fa-pts-2x fa-pts-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['network']->value->class_icon,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"></i>
                            <?php }?>
                            <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['network']->value->name_network,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                        </button>
                    <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </section>
        <?php }?>

        <section id="customer_container">
            <form id="form_customer" autocomplete="on">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->customer], 'fields', false, NULL, 'f_row_fields', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fields']->value) {
?>
                    <div class="row">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields']->value, 'field', false, NULL, 'f_fields', array (
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
                            <?php $_smarty_tpl->_subTemplateRender("file:./controls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('field'=>$_smarty_tpl->tpl_vars['field']->value,'cant_fields'=>(isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_fields']->value['total']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_fields']->value['total'] : null)), 0, true);
?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <?php if (!$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED']) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['additional_customer_form_fields']->value, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
                        <?php $_smarty_tpl->_subTemplateRender("file:./form-fields.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('field'=>$_smarty_tpl->tpl_vars['field']->value), 0, true);
?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>

                <?php if (!$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED'] && !$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_GUEST']) {?>
                        <?php echo $_smarty_tpl->tpl_vars['hook_create_account_form']->value;?>

                <?php }?>
            </form>
        </section>
    <?php }?>

    <?php echo $_smarty_tpl->tpl_vars['hook_create_account_top']->value;?>


    <?php if ($_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED'] && !$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_GUEST'] && (!$_smarty_tpl->tpl_vars['register_customer']->value || $_smarty_tpl->tpl_vars['rc_page']->value == 'identity')) {?>
        <div class="row">
            <div class="fields_required col-xs-12 clear clearfix">
                <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The fields with red asterisks(*) are required.','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</span>
            </div>
        </div>
        <button type="button" id="btn_save_customer" class="btn btn-primary btn-lg btn-block">
            <i class="fa-pts fa-pts-save fa-pts-lg"></i>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save information','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

        </button>
    <?php }
}?>

<?php if (!$_smarty_tpl->tpl_vars['register_customer']->value || $_smarty_tpl->tpl_vars['rc_page']->value == 'addresses') {?>
    <div id="panel_addresses_customer" class="card-group">
    <?php if (isset($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->delivery]) && sizeof($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->delivery]) > 1 && (($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DELIVERY_VIRTUAL'] && $_smarty_tpl->tpl_vars['is_virtual_cart']->value) || !$_smarty_tpl->tpl_vars['is_virtual_cart']->value)) {?>
        <div id="panel_address_delivery" class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <a data-toggle="collapse" href="#delivery_address_container">
                        <i class="more-less fa-pts fa-pts-angle-up pull-right"></i>
                        <?php if ($_smarty_tpl->tpl_vars['register_customer']->value && $_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED']) {?>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your delivery addresses','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                        <?php } else { ?>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select your delivery address','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                        <?php }?>
                    </a>
                </h5>
            </div>
            <div class="card-body">
                <div id="delivery_address_container" class="collapse in show">
                    <div class="row addresses_customer_container delivery" data-object="delivery"></div>

                    <form id="form_address_delivery" autocomplete="on" style="display: none;">
                        <div class="fields_container">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->delivery], 'fields', false, NULL, 'f_row_fields', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fields']->value) {
?>
                                <div class="row">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields']->value, 'field', false, NULL, 'f_fields', array (
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
                                        <?php $_smarty_tpl->_subTemplateRender("file:./controls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('field'=>$_smarty_tpl->tpl_vars['field']->value,'cant_fields'=>(isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_fields']->value['total']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_fields']->value['total'] : null)), 0, true);
?>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <div class="row">
                                <div class="fields_required col-xs-12 clear clearfix">
                                    <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The fields with red asterisks(*) are required.','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</span>
                                </div>
                            </div>

                            <div id="action_address_delivery" class="row <?php if (!$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED']) {?>hidden<?php }?>">
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-5 pts-nopadding">
                                    <?php if (!$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_GUEST']) {?>
                                    <button type="reset" id="btn_cancel_address_delivery" class="btn btn-link btn-sm btn-block">
                                        <i class="fa-pts fa-pts-reply"></i>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                                    </button>
                                    <?php }?>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-7 pts-nopadding">
                                    <button type="button" id="btn_update_address_delivery" class="btn btn-primary btn-sm btn-block pull-right">
                                        <i class="fa-pts fa-pts-save fa-pts-lg"></i>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <input type="hidden" id="delivery_id" value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_address_delivery']->value), ENT_QUOTES, 'UTF-8');?>
"/>
    <?php }?>

    
    <?php if (!$_smarty_tpl->tpl_vars['register_customer']->value || ($_smarty_tpl->tpl_vars['register_customer']->value && !$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED']) || ($_smarty_tpl->tpl_vars['register_customer']->value && !$_smarty_tpl->tpl_vars['rc_page']->value) || ($_smarty_tpl->tpl_vars['rc_page']->value == 'addresses')) {?>
        <?php if (isset($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->invoice]) && sizeof($_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->invoice]) > 1 && $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_INVOICE_ADDRESS']) {?>
            <?php if (!$_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_REQUIRED_INVOICE_ADDRESS']) {?>
                <label for="checkbox_create_invoice_address" class="<?php if ($_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED'] && $_smarty_tpl->tpl_vars['register_customer']->value && $_smarty_tpl->tpl_vars['rc_page']->value == 'addresses') {?>hidden<?php }?>">
                    <input type="checkbox" name="checkbox_create_invoice_address" id="checkbox_create_invoice_address" class="input_checkbox not_unifrom not_uniform" <?php if ($_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED'] && $_smarty_tpl->tpl_vars['register_customer']->value && $_smarty_tpl->tpl_vars['rc_page']->value == 'addresses') {?>checked<?php }?>/>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I want to set another address for my invoice.','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                </label>
            <?php }?>
            <div id="panel_address_invoice" class="card hidden">
                <div class="card-header">
                    <h5 class="card-title">
                        <a data-toggle="collapse" href="#invoice_address_container">
                            <i class="more-less fa-pts fa-pts-angle-up pull-right"></i>
                            <?php if ($_smarty_tpl->tpl_vars['register_customer']->value && $_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED']) {?>
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your invoice addresses','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                            <?php } else { ?>
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select your invoice address','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                            <?php }?>
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div id="invoice_address_container" class="collapse in show">
                        <div class="row addresses_customer_container invoice" data-object="invoice"></div>

                        <form id="form_address_invoice" autocomplete="on" style="display: none;">
                            <div class="fields_container">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['OPC_FIELDS']->value[$_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->object->invoice], 'fields', false, NULL, 'f_row_fields', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fields']->value) {
?>
                                    <div class="row">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields']->value, 'field', false, NULL, 'f_fields', array (
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
                                            <?php $_smarty_tpl->_subTemplateRender("file:./controls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('field'=>$_smarty_tpl->tpl_vars['field']->value,'cant_fields'=>(isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_fields']->value['total']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_fields']->value['total'] : null)), 0, true);
?>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <div class="row">
                                    <div class="fields_required col-xs-12 clear clearfix">
                                        <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The fields with red asterisks(*) are required.','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</span>
                                    </div>
                                </div>

                                <div id="action_address_invoice" class="row <?php if (!$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED']) {?>hidden<?php }?>">
                                    <div class="col-sm-5 col-xs-12 pts-nopadding-left">
                                        <?php if (!$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_GUEST']) {?>
                                        <button type="reset" id="btn_cancel_address_invoice" class="btn btn-link btn-sm btn-block">
                                            <i class="fa-pts fa-pts-reply"></i>
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                                        </button>
                                        <?php }?>
                                    </div>
                                    <div class="col-sm-7 col-xs-12 pts-nopadding-right">
                                        <button type="button" id="btn_update_address_invoice" class="btn btn-primary btn-sm btn-block pull-right">
                                            <i class="fa-pts fa-pts-save fa-pts-lg"></i>
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <input type="hidden" id="invoice_id" value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_address_invoice']->value), ENT_QUOTES, 'UTF-8');?>
"/>
        <?php }?>
    <?php }?>
</div>
<?php }?>

<?php if ((!$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED'] || $_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_GUEST']) && $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ENABLE_PRIVACY_POLICY']) {?>
    <div id="div_privacy_policy">
        <p id="p_privacy_policy">
            <label for="privacy_policy">
                <input type="checkbox" class="not_unifrom not_uniform" name="privacy_policy" id="privacy_policy" value="1"/>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I have read and accept the Privacy Policy.','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                <span class="read"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'(read)','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</span>
            </label>
        </p>
    </div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['message_psgdpr']->value)) {?>
    <div id="gdpr_consent">
        <label for="gdpr_consent_checkbox">
            <input type="checkbox" class="not_unifrom not_uniform" name="psgdpr_consent_checkbox" id="gdpr_consent_checkbox"/>
            <?php echo $_smarty_tpl->tpl_vars['message_psgdpr']->value;?>

        </label>
    </div>
<?php }?>

<?php if ((!$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['IS_LOGGED'] && $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_BUTTON_REGISTER']) || ($_smarty_tpl->tpl_vars['register_customer']->value && !$_smarty_tpl->tpl_vars['rc_page']->value)) {?>
    <button type="button" id="btn_save_customer" class="btn btn-primary btn-lg btn-block">
        <i class="fa-pts fa-pts-save fa-pts-lg"></i>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save information','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

    </button>
<?php }?>

<div class="row">
    <?php $_smarty_tpl->_subTemplateRender('file:./custom_html/address.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div><?php }
}
