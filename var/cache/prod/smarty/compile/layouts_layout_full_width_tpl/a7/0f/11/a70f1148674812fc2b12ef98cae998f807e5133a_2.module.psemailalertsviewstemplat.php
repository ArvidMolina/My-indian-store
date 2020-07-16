<?php
/* Smarty version 3.1.33, created on 2020-07-14 14:32:38
  from 'module:psemailalertsviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0d97d69c5938_35468693',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a70f1148674812fc2b12ef98cae998f807e5133a' => 
    array (
      0 => 'module:psemailalertsviewstemplat',
      1 => 1584378767,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'module:ps_emailalerts/views/templates/front/mailalerts-account-line.tpl' => 1,
  ),
),false)) {
function content_5f0d97d69c5938_35468693 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7007642395f0d97d69aff20_75508636', 'page_content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content'} */
class Block_7007642395f0d97d69aff20_75508636 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_7007642395f0d97d69aff20_75508636',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My alerts','d'=>'Modules.Mailalerts.Shop'),$_smarty_tpl ) );?>
</h2>
  <?php if ($_smarty_tpl->tpl_vars['mailAlerts']->value) {?>
      <ul>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mailAlerts']->value, 'mailAlert');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mailAlert']->value) {
?>
        <li><?php $_smarty_tpl->_subTemplateRender('module:ps_emailalerts/views/templates/front/mailalerts-account-line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('mailAlert'=>$_smarty_tpl->tpl_vars['mailAlert']->value), 0, true);
?></li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
  <?php } else { ?>
    <p class="warning"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No mail alerts yet.','d'=>'Modules.Mailalerts.Shop'),$_smarty_tpl ) );?>
</p>
  <?php }
}
}
/* {/block 'page_content'} */
}
