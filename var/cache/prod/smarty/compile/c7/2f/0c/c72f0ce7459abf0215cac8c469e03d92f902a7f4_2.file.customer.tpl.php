<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:22
  from '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/steps/customer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dce03e050_48674378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c72f0ce7459abf0215cac8c469e03d92f902a7f4' => 
    array (
      0 => '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/steps/customer.tpl',
      1 => 1584378778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./../address.tpl' => 1,
  ),
),false)) {
function content_5f0f8dce03e050_48674378 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="onepagecheckoutps_step_one_container" class="<?php if (!$_smarty_tpl->tpl_vars['register_customer']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['classes']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>col-xs-12 col-12<?php }?>">
    <div id="onepagecheckoutps_step_one">
        <?php $_smarty_tpl->_subTemplateRender("file:./../address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div><?php }
}
