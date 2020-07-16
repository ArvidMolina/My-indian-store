<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:21
  from '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/onepagecheckoutps.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dcdb61204_58100256',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2fa993342524dfcd2d86182f60b69a1f19c3028' => 
    array (
      0 => '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/onepagecheckoutps.tpl',
      1 => 1584378778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:checkout/_partials/steps/shipping.tpl' => 1,
  ),
),false)) {
function content_5f0f8dcdb61204_58100256 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12273287945f0f8dcdad9378_79594510', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_footer_container'} */
class Block_18131444445f0f8dcdb52397_18873025 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <footer class="page-footer">
                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['my_account'], ENT_QUOTES, 'UTF-8');?>
" class="account-link">
                        <i class="material-icons">&#xE5CB;</i>
                        <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back to your account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>
</span>
                    </a>
                </footer>
            <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_12273287945f0f8dcdad9378_79594510 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12273287945f0f8dcdad9378_79594510',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_18131444445f0f8dcdb52397_18873025',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section id="main">
        <?php echo $_smarty_tpl->tpl_vars['onepagecheckoutps']->value->includeTpl('theme.tpl',array('CONFIGS'=>$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['CONFIGS']));?>


        <div id="onepagecheckoutps" class="js-current-step <?php if ($_smarty_tpl->tpl_vars['register_customer']->value) {?>rc<?php }?>">
            <input type="hidden" id="logged" value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['customer']->value['is_logged']), ENT_QUOTES, 'UTF-8');?>
" />

            <?php if ($_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['CONFIGS']['OPC_SHIPPING_COMPATIBILITY']) {?>
                <div id="opc_shipping_compability" style="display: none;">
                    <?php $_smarty_tpl->_subTemplateRender('file:checkout/_partials/steps/shipping.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <button type="button" name="processCarrier" id="hide_carrier_embed" class="btn btn-primary">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Continue','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                        <i class="fa-pts fa-pts-arrow-right"></i>
                    </button>
                </div>
            <?php }?>

            <div class="loading_big">
                <div class="loader">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>

            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'emailVerificationOPC'),$_smarty_tpl ) );?>


            <?php if (!$_smarty_tpl->tpl_vars['register_customer']->value) {?>
                <div id="onepagecheckoutps_header" class="col-xs-12 col-12">
                    <div class="row">
                        <div id="div_onepagecheckoutps_info" class="<?php if ($_smarty_tpl->tpl_vars['customer']->value['is_logged'] && !$_smarty_tpl->tpl_vars['customer']->value['is_guest']) {?>col-md-8<?php }?> col-sm-12 col-xs-12 col-12">
                            <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick Checkout','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</h1>
                            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Complete the following fields to process your order.','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</p>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['customer']->value['is_logged'] && !$_smarty_tpl->tpl_vars['customer']->value['is_guest']) {?>
                            <div id="div_onepagecheckoutps_login" class="col-md-4 col-sm-12 col-xs-12 col-12">
                                <div class="text-md-right">
                                    <p>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Welcome','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
,&nbsp;
                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['my_account'], ENT_QUOTES, 'UTF-8');?>
">
                                            <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer_info']->value->firstname, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer_info']->value->lastname, ENT_QUOTES, 'UTF-8');?>
</b>
                                        </a>
                                        <br/>
                                        <button id="btn-logout" data-link="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['actions']['logout'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Log me out','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
" class="btn btn-primary btn-sm">
                                            <i class="fa-pts fa-pts-sign-out fa-pts-1x"></i>
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Log out','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                                        </button>
                                    </p>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            <?php }?>

            <div class="row">
                <?php echo $_smarty_tpl->tpl_vars['onepagecheckoutps']->value->includeTpl('custom_html/header.tpl',array());?>

            </div>

            <div id="onepagecheckoutps_contenedor" class="col-xs-12 col-12">
                <div id="onepagecheckoutps_forms" class="hidden"></div>
                <div id="opc_temporal" class="hidden"></div>

                <?php if ($_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['CONFIGS']['OPC_SHIPPING_COMPATIBILITY']) {?>
                    <div id="onepagecheckoutps_carrier_embed" style="display: none;">
                        <div class="row" id="carrier_embed_container">
                            <div class="col-xs-12"></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" id="hide_carrier_embed" class="btn btn-primary">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Continue','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                                    <i class="fa-pts fa-pts-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php }?>

                <div id="opc_container">

                    <?php if (!$_smarty_tpl->tpl_vars['customer']->value['is_logged'] || ($_smarty_tpl->tpl_vars['customer']->value['is_logged'] && $_smarty_tpl->tpl_vars['customer']->value['is_guest'])) {?>
                        <div id="opc_login" class="hidden" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Login','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
">
                            <div class="login-box">
                                <?php if ($_smarty_tpl->tpl_vars['opc_social_networks']->value) {?>
                                    <section id="opc_social_networks">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['opc_social_networks']->value, 'network', false, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['network']->value) {
?>
                                            <?php if ($_smarty_tpl->tpl_vars['network']->value->client_id != '' && $_smarty_tpl->tpl_vars['network']->value->client_secret != '' && $_smarty_tpl->tpl_vars['network']->value->enable > 0) {?>
                                                <button type="button" class="btn btn-sm btn-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
" onclick="Fronted.openWindow('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('onepagecheckoutps','login',array('sv'=>$_smarty_tpl->tpl_vars['network']->value->network)), ENT_QUOTES, 'UTF-8');?>
', true)">
                                                    <?php if ($_smarty_tpl->tpl_vars['network']->value->name_network == 'Google') {?>
                                                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['ONEPAGECHECKOUTPS_IMG'], ENT_QUOTES, 'UTF-8');?>
social/btn_google.png" alt="google">
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['network']->value->name_network == 'Biocryptology') {?>
                                                        <img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['ONEPAGECHECKOUTPS_IMG'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
social/btn_biocryptology.png" alt="biocryptology">
                                                    <?php } else { ?>
                                                        <i class="fa-pts fa-pts-1x fa-pts-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['network']->value->class_icon, ENT_QUOTES, 'UTF-8');?>
"></i>
                                                    <?php }?>
                                                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['network']->value->name_network, ENT_QUOTES, 'UTF-8');?>

                                                </button>
                                            <?php }?>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </section>
                                    <br/>
                                <?php }?>
                                <form id="form_login" autocomplete="off">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa-pts fa-pts-envelope-o fa-pts-fw"></i></span>
                                        <input
                                            id="txt_login_email"
                                            class="form-control"
                                            type="text"
                                            placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'E-mail','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
"
                                            data-validation="isEmail"
                                        />
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa-pts fa-pts-key fa-pts-fw"></i></span>
                                        <input
                                            id="txt_login_password"
                                            class="form-control"
                                            type="password"
                                            placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
"
                                            data-validation="length"
                                            data-validation-length="min5"
                                        />
                                    </div>
                                    <br/>
                                    <div class="alert alert-warning  pts-nopadding hidden"></div>
                                    <br/>
                                    <button type="button" id="btn_login" class="btn btn-info btn-block">
                                        <i class="fa-pts fa-pts-lock fa-pts-lg"></i>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Login','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                                    </button>

                                    <p class="forget_password">
                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['password'], ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Forgot your password?','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    <?php }?>

                </div>
                <div class="row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['position_steps']->value, 'column');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['column']->value) {
?>
                        <div class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['column']->value['classes'], ENT_QUOTES, 'UTF-8');?>
">
                            <div class="row">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['column']->value['rows'], 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                                    <?php echo $_smarty_tpl->tpl_vars['onepagecheckoutps']->value->includeTpl((('steps/').($_smarty_tpl->tpl_vars['row']->value['name_step'])).('.tpl'),array('register_customer'=>$_smarty_tpl->tpl_vars['register_customer']->value,'classes'=>$_smarty_tpl->tpl_vars['row']->value['classes'],'CONFIGS'=>$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value['CONFIGS'],'OnePageCheckoutPS'=>$_smarty_tpl->tpl_vars['OnePageCheckoutPS']->value));?>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>

            <div class="row">
                <?php echo $_smarty_tpl->tpl_vars['onepagecheckoutps']->value->includeTpl('custom_html/footer.tpl',array());?>

            </div>

            <div id="payment-confirmation" class="hidden"><div class="ps-shown-by-js"><button class="button btn-primary" type="submit"></button></div></div>

            <div class="clear clearfix"></div>
        </div>

        <?php if (isset($_smarty_tpl->tpl_vars['rc_page']->value) && ($_smarty_tpl->tpl_vars['rc_page']->value == 'addresses' || $_smarty_tpl->tpl_vars['rc_page']->value == 'identity')) {?>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18131444445f0f8dcdb52397_18873025', 'page_footer_container', $this->tplIndex);
?>

        <?php }?>
    </section>
<?php
}
}
/* {/block 'content'} */
}
