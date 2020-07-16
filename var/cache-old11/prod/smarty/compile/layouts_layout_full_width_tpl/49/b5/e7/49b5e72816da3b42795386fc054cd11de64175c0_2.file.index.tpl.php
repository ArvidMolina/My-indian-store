<?php
/* Smarty version 3.1.33, created on 2020-03-04 13:48:59
  from '/home/myindian/wholesale.myindianstore.eu/themes/theme_origine4/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5f95ab049c65_07188743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49b5e72816da3b42795386fc054cd11de64175c0' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/themes/theme_origine4/templates/index.tpl',
      1 => 1579261784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5f95ab049c65_07188743 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19188439045e5f95ab046a68_74681708', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_20171370425e5f95ab0476c4_57555059 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_3696114895e5f95ab048773_08893556 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_36031305e5f95ab048132_62213304 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3696114895e5f95ab048773_08893556', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_19188439045e5f95ab046a68_74681708 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_19188439045e5f95ab046a68_74681708',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_20171370425e5f95ab0476c4_57555059',
  ),
  'page_content' => 
  array (
    0 => 'Block_36031305e5f95ab048132_62213304',
  ),
  'hook_home' => 
  array (
    0 => 'Block_3696114895e5f95ab048773_08893556',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20171370425e5f95ab0476c4_57555059', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_36031305e5f95ab048132_62213304', 'page_content', $this->tplIndex);
?>

      </div>
    <?php
}
}
/* {/block 'page_content_container'} */
}
