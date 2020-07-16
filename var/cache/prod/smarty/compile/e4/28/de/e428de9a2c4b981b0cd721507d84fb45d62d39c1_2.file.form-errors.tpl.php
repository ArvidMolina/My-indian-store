<?php
/* Smarty version 3.1.33, created on 2020-07-16 01:54:35
  from '/home/myindian/public_html/themes/theme_origine4/templates/_partials/form-errors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f892be1e3b2_36139557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e428de9a2c4b981b0cd721507d84fb45d62d39c1' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/templates/_partials/form-errors.tpl',
      1 => 1584378789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f892be1e3b2_36139557 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if (count($_smarty_tpl->tpl_vars['errors']->value)) {?>
  <div class="help-block">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5524744795f0f892be19cb6_36415063', 'form_errors');
?>

  </div>
<?php }
}
/* {block 'form_errors'} */
class Block_5524744795f0f892be19cb6_36415063 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_errors' => 
  array (
    0 => 'Block_5524744795f0f892be19cb6_36415063',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
          <li class="alert alert-danger"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8');?>
</li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    <?php
}
}
/* {/block 'form_errors'} */
}
