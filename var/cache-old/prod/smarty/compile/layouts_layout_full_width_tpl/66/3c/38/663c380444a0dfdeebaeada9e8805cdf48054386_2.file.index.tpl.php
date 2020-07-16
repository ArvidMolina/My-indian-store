<?php
/* Smarty version 3.1.33, created on 2020-01-16 12:59:24
  from '/home/myindian/test.myindianstore.eu/themes/theme_origine4/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e20a47c255763_90866606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '663c380444a0dfdeebaeada9e8805cdf48054386' => 
    array (
      0 => '/home/myindian/test.myindianstore.eu/themes/theme_origine4/templates/index.tpl',
      1 => 1578924315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e20a47c255763_90866606 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17611704465e20a47c243f56_23304432', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_6763671985e20a47c245533_61731750 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_1945391115e20a47c247e12_03739498 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_13189177495e20a47c246e78_26189978 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1945391115e20a47c247e12_03739498', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_17611704465e20a47c243f56_23304432 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_17611704465e20a47c243f56_23304432',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_6763671985e20a47c245533_61731750',
  ),
  'page_content' => 
  array (
    0 => 'Block_13189177495e20a47c246e78_26189978',
  ),
  'hook_home' => 
  array (
    0 => 'Block_1945391115e20a47c247e12_03739498',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6763671985e20a47c245533_61731750', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13189177495e20a47c246e78_26189978', 'page_content', $this->tplIndex);
?>

      </div>
    <?php
}
}
/* {/block 'page_content_container'} */
}
