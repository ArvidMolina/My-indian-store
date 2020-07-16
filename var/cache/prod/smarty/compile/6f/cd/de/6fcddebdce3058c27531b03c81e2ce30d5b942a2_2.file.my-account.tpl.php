<?php
/* Smarty version 3.1.33, created on 2020-07-15 20:18:15
  from '/home/myindian/public_html/themes/theme_origine4/modules/ps_emailalerts/views/templates/hook/my-account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f3a571ef796_84361944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fcddebdce3058c27531b03c81e2ce30d5b942a2' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/modules/ps_emailalerts/views/templates/hook/my-account.tpl',
      1 => 1584378789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f3a571ef796_84361944 (Smarty_Internal_Template $_smarty_tpl) {
?>
<a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="emailsalerts"
   href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'module','name'=>'ps_emailalerts','controller'=>'account'),$_smarty_tpl ) );?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My alerts','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
">
  <span class="link-item">
  <i class="material-icons">&#xE151;</i>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My alerts','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>

  </span>
</a>
<?php }
}
