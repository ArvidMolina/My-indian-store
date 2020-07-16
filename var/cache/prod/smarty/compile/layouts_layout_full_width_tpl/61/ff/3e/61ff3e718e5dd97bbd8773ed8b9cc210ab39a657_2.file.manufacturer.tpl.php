<?php
/* Smarty version 3.1.33, created on 2020-06-27 02:41:16
  from '/home/myindian/public_html/themes/theme_origine4/templates/catalog/listing/manufacturer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef6879ccd0b42_63363245',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61ff3e718e5dd97bbd8773ed8b9cc210ab39a657' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/templates/catalog/listing/manufacturer.tpl',
      1 => 1584378789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef6879ccd0b42_63363245 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4136734395ef6879ccc5265_63270322', 'product_list_header');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'catalog/listing/product-list.tpl');
}
/* {block 'product_list_header'} */
class Block_4136734395ef6879ccc5265_63270322 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_list_header' => 
  array (
    0 => 'Block_4136734395ef6879ccc5265_63270322',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'List of products by brand %brand_name%','sprintf'=>array('%brand_name%'=>$_smarty_tpl->tpl_vars['manufacturer']->value['name']),'d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</h1>
  <div id="manufacturer-short_description"><?php echo $_smarty_tpl->tpl_vars['manufacturer']->value['short_description'];?>
</div>
  <div id="manufacturer-description"><?php echo $_smarty_tpl->tpl_vars['manufacturer']->value['description'];?>
</div>
<?php
}
}
/* {/block 'product_list_header'} */
}
