<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:22
  from '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/steps/carrier.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dce2e8b64_22047762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45a34111a80b139e9ba5c0ec4a6fa773df05bf01' => 
    array (
      0 => '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/steps/carrier.tpl',
      1 => 1584378778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f8dce2e8b64_22047762 (Smarty_Internal_Template $_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['register_customer']->value) {?>
    <div id="onepagecheckoutps_step_two_container" class="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['classes']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php if (isset($_smarty_tpl->tpl_vars['is_virtual_cart']->value) && $_smarty_tpl->tpl_vars['is_virtual_cart']->value) {?>hidden<?php }?>">
        <h5 class="onepagecheckoutps_p_step onepagecheckoutps_p_step_two">
            <i class="fa-pts fa-pts-truck fa-pts-2x"></i>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping method','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

        </h5>
        <div id="onepagecheckoutps_step_two"></div>
    </div>
<?php }
}
}
