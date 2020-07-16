<?php
/* Smarty version 3.1.33, created on 2020-07-15 16:50:15
  from '/home/myindian/public_html/themes/theme_origine4/templates/customer/_partials/my-account-links.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f0997f1c894_25405647',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6508fec16d69f07fc1056c24632013653f8eacd' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/templates/customer/_partials/my-account-links.tpl',
      1 => 1584378789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f0997f1c894_25405647 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5682212175f0f0997f147e1_21219175', 'my_account_links');
?>

<?php }
/* {block 'my_account_links'} */
class Block_5682212175f0f0997f147e1_21219175 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'my_account_links' => 
  array (
    0 => 'Block_5682212175f0f0997f147e1_21219175',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['my_account'], ENT_QUOTES, 'UTF-8');?>
" class="account-link">
    <i class="material-icons">&#xE5CB;</i>
    <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back to your account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>
</span>
  </a>
  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
" class="account-link">
    <i class="material-icons">&#xE88A;</i>
    <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Home','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
  </a>
<?php
}
}
/* {/block 'my_account_links'} */
}
