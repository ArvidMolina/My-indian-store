<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:23
  from '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/payment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dcf764be2_24678367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f13fc85e2c7815c246d0b84fcef947730dcdc1a' => 
    array (
      0 => '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/payment.tpl',
      1 => 1584378778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f8dcf764be2_24678367 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18001664945f0f8dcf71bb14_66214872', 'step_payment');
}
/* {block 'step_payment'} */
class Block_18001664945f0f8dcf71bb14_66214872 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'step_payment' => 
  array (
    0 => 'Block_18001664945f0f8dcf71bb14_66214872',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['total_order']->value <= 0) {?>
        <span id="free_order" class="alert alert-warning col-xs-12 col-12 text-md-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Free Order.','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</span>
    <?php } else { ?>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayPaymentTop'),$_smarty_tpl ) );?>

        <div id="payment_method_container" class="payment-options">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payment_options']->value, 'module_options', false, 'name_module');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name_module']->value => $_smarty_tpl->tpl_vars['module_options']->value) {
?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['module_options']->value, 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                    <div class="module_payment_container">
                        <div class="row pts-vcenter payment-option" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['action'], ENT_QUOTES, 'UTF-8');?>
">
                            <div class="payment_input col-xs-1 col-1">
                                <input type="radio" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
" name="payment-option" class="payment_radio not_unifrom not_uniform" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name_module']->value, ENT_QUOTES, 'UTF-8');?>
" data-module-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['module_name'], ENT_QUOTES, 'UTF-8');?>
">
                                <input type="hidden" id="url_module_payment_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id_module_payment'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['action'], ENT_QUOTES, 'UTF-8');?>
">
                            </div>
                            <?php if (!empty($_smarty_tpl->tpl_vars['option']->value['logo']) && $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_IMAGE_PAYMENT']) {?>
                                <div class="payment_image col-xs-3 col-3">
                                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['call_to_action_text'], ENT_QUOTES, 'UTF-8');?>
" class="img-thumbnail <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name_module']->value, ENT_QUOTES, 'UTF-8');?>
">
                                </div>
                            <?php }?>
                            <div class="payment_content <?php if (!empty($_smarty_tpl->tpl_vars['option']->value['logo'])) {?>col-xs-8 col-8<?php } else { ?>col-xs-11 col-11<?php }?>">
                                <span>
                                    <?php if (isset($_smarty_tpl->tpl_vars['option']->value['title_opc'])) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['option']->value['title_opc'];?>

                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['option']->value['call_to_action_text'];?>

                                    <?php }?>
                                </span>
                                <?php if (isset($_smarty_tpl->tpl_vars['option']->value['description_opc'])) {?>
                                    <p>
                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['description_opc'], ENT_QUOTES, 'UTF-8');?>

                                    </p>
                                <?php }?>
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_SHOW_DETAIL_PAYMENT']) {?>
                            <?php if ($_smarty_tpl->tpl_vars['option']->value['additionalInformation']) {?>
                                <div id="payment_content_html_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="payment_content_html hidden">
                                    <?php echo $_smarty_tpl->tpl_vars['option']->value['additionalInformation'];?>

                                </div>
                            <?php }?>
                        <?php }?>
                        <div
                            id="pay-with-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
-form"
                            class="js-payment-option-form <?php if ($_smarty_tpl->tpl_vars['option']->value['id'] != $_smarty_tpl->tpl_vars['selected_payment_option']->value) {?> ps-hidden <?php }?>"
                        >
                            <?php if ($_smarty_tpl->tpl_vars['option']->value['form']) {?>
                                <?php echo $_smarty_tpl->tpl_vars['option']->value['form'];?>

                            <?php } else { ?>
                                <form id="payment-form" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['option']->value['action'];?>
">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['option']->value['inputs'], 'input');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['input']->value) {
?>
                                        <input type="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input']->value['type'], ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input']->value['name'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input']->value['value'], ENT_QUOTES, 'UTF-8');?>
">
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <button style="display:none" id="pay-with-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
" type="submit"></button>
                                </form>
                            <?php }?>
                        </div>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php
}
} else {
?>
                <p class="alert alert-danger">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Unfortunately, there are no payment method available.','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                </p>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayPaymentByBinaries'),$_smarty_tpl ) );?>

    <?php }
}
}
/* {/block 'step_payment'} */
}
