<?php
/* Smarty version 3.1.33, created on 2020-07-14 13:49:31
  from '/home/myindian/public_html/modules/registrationfields/views/templates/front/errors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0d8dbb2df890_19550899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45bc98677e08feee01e3d9c9713fbfeb8a36ae41' => 
    array (
      0 => '/home/myindian/public_html/modules/registrationfields/views/templates/front/errors.tpl',
      1 => 1591313122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0d8dbb2df890_19550899 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['errors']->value) && count($_smarty_tpl->tpl_vars['errors']->value) > 0) {?>
    <ul id="field-errors" class="alert alert-danger error">    
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
            <ol><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['error']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</ol>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
<?php }
}
}
