<?php
/* Smarty version 3.1.33, created on 2020-01-17 10:37:03
  from '/home/myindian/wholesale.myindianstore.eu/admin123/themes/new-theme/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e21d49f5d8850_63928799',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c73611088d3ce91f8d9dd3880cf2bb5c31893380' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/admin123/themes/new-theme/template/content.tpl',
      1 => 1579261771,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e21d49f5d8850_63928799 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="ajax_confirmation" class="alert alert-success" style="display: none;"></div>


<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}