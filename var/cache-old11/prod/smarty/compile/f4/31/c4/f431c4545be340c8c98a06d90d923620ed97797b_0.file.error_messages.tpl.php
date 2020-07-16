<?php
/* Smarty version 3.1.33, created on 2020-03-04 13:54:23
  from '/home/myindian/wholesale.myindianstore.eu/admin123/themes/new-theme/template/components/layout/error_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5f96ef2aa3b9_22656232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f431c4545be340c8c98a06d90d923620ed97797b' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/admin123/themes/new-theme/template/components/layout/error_messages.tpl',
      1 => 1579261771,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5f96ef2aa3b9_22656232 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['errors']->value) && current($_smarty_tpl->tpl_vars['errors']->value) != '' && (!isset($_smarty_tpl->tpl_vars['disableDefaultErrorOutPut']->value) || $_smarty_tpl->tpl_vars['disableDefaultErrorOutPut']->value == false)) {?>
  <div class="bootstrap">
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php if (count($_smarty_tpl->tpl_vars['errors']->value) == 1) {?>
        <?php echo reset($_smarty_tpl->tpl_vars['errors']->value);?>

      <?php } else { ?>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%d errors','sprintf'=>array(count($_smarty_tpl->tpl_vars['errors']->value))),$_smarty_tpl ) );?>

        <br/>
        <ol>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
            <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ol>
      <?php }?>
    </div>
  </div>
<?php }
}
}
