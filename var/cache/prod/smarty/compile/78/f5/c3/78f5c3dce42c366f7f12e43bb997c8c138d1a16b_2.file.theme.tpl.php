<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:22
  from '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/theme.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dce01ec75_03583421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78f5c3dce42c366f7f12e43bb997c8c138d1a16b' => 
    array (
      0 => '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/theme.tpl',
      1 => 1584378778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f8dce01ec75_03583421 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>
    
    #order_step, #order_steps, div.order_delivery{
        display:none;
    }
    
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BACKGROUND_COLOR']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BACKGROUND_COLOR'])) {?>
        div#onepagecheckoutps div#onepagecheckoutps_contenedor,
        div#onepagecheckoutps div#onepagecheckoutps_header {
            background: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BACKGROUND_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BORDER_COLOR']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BORDER_COLOR'])) {?>
        div#onepagecheckoutps #onepagecheckoutps_contenedor,
        div#onepagecheckoutps div#onepagecheckoutps_header {
            border: 1px solid <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BORDER_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
                div#onepagecheckoutps div#onepagecheckoutps_step_review #order-detail-content .image_zoom{
            border: 2px solid <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BORDER_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_ICON_COLOR']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_ICON_COLOR'])) {?>
        div#onepagecheckoutps .onepagecheckoutps_p_step i.fa-pts {
            color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_ICON_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
        div#onepagecheckoutps .loading_big .loader .dot:nth-child(1),
        div#onepagecheckoutps .loading_big .loader .dot:nth-child(2),
        div#onepagecheckoutps .loading_big .loader .dot:nth-child(3),
        div#onepagecheckoutps .loading_big .loader .dot:nth-child(4),
        div#onepagecheckoutps .loading_big .loader .dot:nth-child(5){
            background: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_ICON_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_TEXT_COLOR']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_TEXT_COLOR'])) {?>
        #onepagecheckoutps a,
        #onepagecheckoutps span,
        #onepagecheckoutps label,
        #onepagecheckoutps h5,
        #onepagecheckoutps h4,
        #onepagecheckoutps h3,
        #onepagecheckoutps h2,
        #onepagecheckoutps h1,
        #onepagecheckoutps div,
        #onepagecheckoutps p{
            color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_TEXT_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_SELECTED_COLOR']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_SELECTED_COLOR'])) {?>
        div#onepagecheckoutps .container_card.alert,
        div#onepagecheckoutps .module_payment_container.selected.alert.alert-info,
        div#onepagecheckoutps #shipping_container .delivery-option.selected.alert.alert-info {
            background-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_SELECTED_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
            border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_SELECTED_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_SELECTED_TEXT_COLOR']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_SELECTED_TEXT_COLOR'])) {?>
        div#onepagecheckoutps .container_card.alert,
        #onepagecheckoutps .module_payment_container.selected.alert.alert-info,
        #onepagecheckoutps .module_payment_container.selected.alert.alert-info p,
        div#onepagecheckoutps #shipping_container .delivery-option.selected.alert.alert-info {
            color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_SELECTED_TEXT_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_CONFIRM_COLOR']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_CONFIRM_COLOR'])) {?>
        div#opc_loading,
        #onepagecheckoutps #btn_place_order,
        #onepagecheckoutps #payment_modal #cart_navigation button,
        #onepagecheckoutps #btn_save_customer {
            background: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_CONFIRM_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
            border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_CONFIRM_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_CONFIRM_TEXT_COLOR']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_CONFIRM_TEXT_COLOR'])) {?>
        div#opc_loading,
        #onepagecheckoutps #btn_place_order i.fa, #onepagecheckoutps #btn_place_order,
        #onepagecheckoutps #payment_modal #cart_navigation button i, #onepagecheckoutps #payment_modal #cart_navigation button,
        #onepagecheckoutps #btn_save_customer i.fa, #onepagecheckoutps #btn_save_customer {
            border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_CONFIRM_TEXT_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
            color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_CONFIRM_TEXT_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
        #onepagecheckoutps #btn_place_order:hover,
        #onepagecheckoutps #payment_modal #cart_navigation button:hover,
        #onepagecheckoutps #btn_save_customer:hover {
            opacity: 0.8;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ALREADY_REGISTER_BUTTON']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ALREADY_REGISTER_BUTTON'])) {?>
        #onepagecheckoutps #opc_show_login{
            background: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ALREADY_REGISTER_BUTTON'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
            border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ALREADY_REGISTER_BUTTON'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ALREADY_REGISTER_BUTTON_TEXT']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ALREADY_REGISTER_BUTTON_TEXT'])) {?>
        #onepagecheckoutps #opc_show_login{
            color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_ALREADY_REGISTER_BUTTON_TEXT'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_LOGIN_BUTTON']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_LOGIN_BUTTON'])) {?>
        #onepagecheckoutps #form_login #btn_login{
            background: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_LOGIN_BUTTON'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
            border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_LOGIN_BUTTON'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_LOGIN_BUTTON_TEXT']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_LOGIN_BUTTON_TEXT'])) {?>
        #onepagecheckoutps #form_login #btn_login{
            color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_LOGIN_BUTTON_TEXT'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_VOUCHER_BUTTON']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_VOUCHER_BUTTON'])) {?>
        #onepagecheckoutps #list-voucher-allowed #submitAddDiscount{
            background: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_VOUCHER_BUTTON'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
            border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_VOUCHER_BUTTON'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_VOUCHER_BUTTON_TEXT']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_VOUCHER_BUTTON_TEXT'])) {?>
        #onepagecheckoutps #list-voucher-allowed #submitAddDiscount{
            color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_VOUCHER_BUTTON_TEXT'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_BACKGROUND_BUTTON_FOOTER']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_BACKGROUND_BUTTON_FOOTER'])) {?>
        div#onepagecheckoutps div#onepagecheckoutps_step_review .stick_buttons_footer{
            background-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_BACKGROUND_BUTTON_FOOTER'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BORDER_BUTTON_FOOTER']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BORDER_BUTTON_FOOTER'])) {?>
        div#onepagecheckoutps div#onepagecheckoutps_step_review .stick_buttons_footer{
            border-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BORDER_BUTTON_FOOTER'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
        }
    <?php }?>

    @media (max-width: 992px) {
        #order-detail-content .cart_item {
            <?php if (isset($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BORDER_COLOR']) && !empty($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BORDER_COLOR'])) {?>
                border-bottom: 1px solid <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_THEME_BORDER_COLOR'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
            <?php } else { ?>
                border-bottom: 1px solid #d6d4d4;
            <?php }?>
        }
    }

</style>
<?php echo '<script'; ?>
 type="text/javascript">
    <?php if (isset($_smarty_tpl->tpl_vars['paypal_ec_canceled']->value) && $_smarty_tpl->tpl_vars['paypal_ec_canceled']->value) {?>
        window.location = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
    <?php }
echo '</script'; ?>
><?php }
}
