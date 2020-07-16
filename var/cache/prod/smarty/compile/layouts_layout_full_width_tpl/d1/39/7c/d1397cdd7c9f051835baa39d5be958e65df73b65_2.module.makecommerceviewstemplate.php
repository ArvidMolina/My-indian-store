<?php
/* Smarty version 3.1.33, created on 2020-07-16 03:29:02
  from 'module:makecommerceviewstemplate' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f9f4eed5b01_87928422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1397cdd7c9f051835baa39d5be958e65df73b65' => 
    array (
      0 => 'module:makecommerceviewstemplate',
      1 => 1584379509,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f9f4eed5b01_87928422 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2494170275f0f9f4eeca939_26723973', "page_content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block "page_content"} */
class Block_2494170275f0f9f4eeca939_26723973 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_2494170275f0f9f4eeca939_26723973',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <p class="alert alert-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg_class']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banklink_msg']->value, ENT_QUOTES, 'UTF-8');?>
</p>
    <?php if (isset($_smarty_tpl->tpl_vars['order_reference']->value) && $_smarty_tpl->tpl_vars['order_reference']->value) {?>
        <a class="btn btn-default button button-medium exclusive" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_page_link']->value, ENT_QUOTES, 'UTF-8');?>
">
            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Try paying again','mod'=>'makecommerce'),$_smarty_tpl ) );?>
</span>
        </a>
    <?php }
}
}
/* {/block "page_content"} */
}
