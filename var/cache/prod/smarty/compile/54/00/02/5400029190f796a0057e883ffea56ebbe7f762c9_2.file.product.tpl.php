<?php
/* Smarty version 3.1.33, created on 2020-07-16 11:05:54
  from '/home/myindian/public_html/modules/ps_emailalerts/views/templates/hook/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f100a6286c339_01865615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5400029190f796a0057e883ffea56ebbe7f762c9' => 
    array (
      0 => '/home/myindian/public_html/modules/ps_emailalerts/views/templates/hook/product.tpl',
      1 => 1584378767,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f100a6286c339_01865615 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="tabs">
    <form>
        <div class="js-mailalert" style="text-align:center;" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'module','name'=>'ps_emailalerts','controller'=>'actions','params'=>array('process'=>'add')),$_smarty_tpl ) );?>
">
            <?php if (isset($_smarty_tpl->tpl_vars['email']->value) && $_smarty_tpl->tpl_vars['email']->value) {?>
                <input class="form-control" type="email" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'your@email.com','d'=>'Modules.Mailalerts.Shop'),$_smarty_tpl ) );?>
"/><br />
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['id_module']->value)) {?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayGDPRConsent','id_module'=>$_smarty_tpl->tpl_vars['id_module']->value),$_smarty_tpl ) );?>

            <?php }?>
            <input type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_product']->value, ENT_QUOTES, 'UTF-8');?>
"/>
            <input type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_product_attribute']->value, ENT_QUOTES, 'UTF-8');?>
"/>
            <button class="btn btn-primary" type="submit" rel="nofollow" onclick="return addNotification();"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Notify me when available','d'=>'Modules.Mailalerts.Shop'),$_smarty_tpl ) );?>
</button>
            <span style="display:none;padding:5px"></span>
        </div>
    </form>
</div>
<?php }
}
