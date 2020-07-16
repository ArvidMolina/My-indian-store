<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:01:19
  from '/home/myindian/public_html/themes/theme_origine4/templates/catalog/suppliers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8abf887235_53843327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9383e6bb0f5ae7ad7d0de3623edc809aa3a0a7dd' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/templates/catalog/suppliers.tpl',
      1 => 1584378789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f8abf887235_53843327 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18414392685f0f8abf881b37_53947926', 'brand_header');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'catalog/brands.tpl');
}
/* {block 'brand_header'} */
class Block_18414392685f0f8abf881b37_53947926 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'brand_header' => 
  array (
    0 => 'Block_18414392685f0f8abf881b37_53947926',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Suppliers','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</h1>
<?php
}
}
/* {/block 'brand_header'} */
}
