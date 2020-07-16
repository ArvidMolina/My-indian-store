<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:51:35
  from 'module:makecommerceviewstemplate' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f9687331c32_30859337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d133073ae5887be258ecb2194e5b5b9e12119d3' => 
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
function content_5f0f9687331c32_30859337 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14955802465f0f968731e1d8_72373797', "page_content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block "page_content"} */
class Block_14955802465f0f968731e1d8_72373797 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_14955802465f0f968731e1d8_72373797',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="veebipoed-overlay" class="ajax_loader"></div>
    <div class="box">
        <h3 class="page-subheading"><img class="logo_size_m" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo']->value, ENT_QUOTES, 'UTF-8');?>
"> </h3>
        <p style="margin-top:20px;">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The total amount of your order is','mod'=>'makecommerce'),$_smarty_tpl ) );?>

            <span id="amount" class="price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['total']->value, ENT_QUOTES, 'UTF-8');?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value == 0) {?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'(tax incl.)','mod'=>'makecommerce'),$_smarty_tpl ) );?>

            <?php }?>
        </p>
        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The payment is being processed through ','mod'=>'makecommerce'),$_smarty_tpl ) );?>
<a href="https://maksekeskus.ee/ostjale/" target="_blank">Maksekeskus AS</a></p>
        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If you want to proceed, please click "Confirm", otherwise click "Back"','mod'=>'makecommerce'),$_smarty_tpl ) );?>
</p>
    </div>
    <p class="cart_navigation clearfix" id="cart_navigation">
        <a class="button-exclusive btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['back_href']->value, ENT_QUOTES, 'UTF-8');?>
">
            <i class="icon-chevron-left"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back','mod'=>'makecommerce'),$_smarty_tpl ) );?>

        </a>
        <a class="button btn btn-default button-medium" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8');?>
">
            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Confirm','mod'=>'makecommerce'),$_smarty_tpl ) );?>
<i class="icon-chevron-right right"></i></span>
        </a>
    </p>
<?php
}
}
/* {/block "page_content"} */
}
