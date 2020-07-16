<?php
/* Smarty version 3.1.33, created on 2020-07-12 14:07:54
  from '/home/myindian/public_html/themes/theme_origine4/templates/cms/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0aef0acde2f9_23158527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7180077326b1ea6b9f8536691a6bee88a4bfb3be' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/templates/cms/category.tpl',
      1 => 1584378789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0aef0acde2f9_23158527 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17376222615f0aef0acb8971_85086077', 'page_title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11702592935f0aef0acbc045_27132357', 'page_content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_title'} */
class Block_17376222615f0aef0acb8971_85086077 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_title' => 
  array (
    0 => 'Block_17376222615f0aef0acb8971_85086077',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cms_category']->value['name'], ENT_QUOTES, 'UTF-8');?>

<?php
}
}
/* {/block 'page_title'} */
/* {block 'cms_sub_categories'} */
class Block_9188321145f0aef0acbd0e1_92791308 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['sub_categories']->value) {?>
      <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'List of sub categories in %name%:','d'=>'Shop.Theme.Global','sprintf'=>array('%name%'=>$_smarty_tpl->tpl_vars['cms_category']->value['name'])),$_smarty_tpl ) );?>
</p>
      <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sub_categories']->value, 'sub_category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sub_category']->value) {
?>
          <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_category']->value['link'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_category']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    <?php }?>
  <?php
}
}
/* {/block 'cms_sub_categories'} */
/* {block 'cms_sub_pages'} */
class Block_14587473945f0aef0acd30f1_97507074 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['cms_pages']->value) {?>
      <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'List of pages in %name%:','d'=>'Shop.Theme.Global','sprintf'=>array('%name%'=>$_smarty_tpl->tpl_vars['cms_category']->value['name'])),$_smarty_tpl ) );?>
</p>
      <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cms_pages']->value, 'cms_page');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cms_page']->value) {
?>
          <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cms_page']->value['link'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cms_page']->value['meta_title'], ENT_QUOTES, 'UTF-8');?>
</a></li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    <?php }?>
  <?php
}
}
/* {/block 'cms_sub_pages'} */
/* {block 'page_content'} */
class Block_11702592935f0aef0acbc045_27132357 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_11702592935f0aef0acbc045_27132357',
  ),
  'cms_sub_categories' => 
  array (
    0 => 'Block_9188321145f0aef0acbd0e1_92791308',
  ),
  'cms_sub_pages' => 
  array (
    0 => 'Block_14587473945f0aef0acd30f1_97507074',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9188321145f0aef0acbd0e1_92791308', 'cms_sub_categories', $this->tplIndex);
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14587473945f0aef0acd30f1_97507074', 'cms_sub_pages', $this->tplIndex);
?>

<?php
}
}
/* {/block 'page_content'} */
}
