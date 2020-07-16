<?php
/* Smarty version 3.1.33, created on 2020-07-14 14:11:01
  from '/home/myindian/public_html/themes/theme_origine4/templates/customer/address.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0d92c54c2112_95141949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a59379d4ac6519d4947c1b6674f3ff30df99c96c' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/templates/customer/address.tpl',
      1 => 1584378789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0d92c54c2112_95141949 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21362888825f0d92c54b1347_20467921', 'page_title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6291604705f0d92c54ba866_54826591', 'page_content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'customer/page.tpl');
}
/* {block 'page_title'} */
class Block_21362888825f0d92c54b1347_20467921 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_title' => 
  array (
    0 => 'Block_21362888825f0d92c54b1347_20467921',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php if ($_smarty_tpl->tpl_vars['editing']->value) {?>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update your address','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>

  <?php } else { ?>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New address','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>

  <?php }
}
}
/* {/block 'page_title'} */
/* {block 'page_content'} */
class Block_6291604705f0d92c54ba866_54826591 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_6291604705f0d92c54ba866_54826591',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="address-form">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0], array( array('template'=>"customer/_partials/address-form.tpl",'ui'=>$_smarty_tpl->tpl_vars['address_form']->value),$_smarty_tpl ) );?>

  </div>
<?php
}
}
/* {/block 'page_content'} */
}
