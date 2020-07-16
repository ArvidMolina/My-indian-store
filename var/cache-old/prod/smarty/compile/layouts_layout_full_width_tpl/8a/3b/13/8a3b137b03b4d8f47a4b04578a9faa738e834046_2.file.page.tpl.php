<?php
/* Smarty version 3.1.33, created on 2020-01-16 04:30:50
  from '/home/myindian/test.myindianstore.eu/themes/theme_origine4/templates/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e202d4adc9cb7_82529941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a3b137b03b4d8f47a4b04578a9faa738e834046' => 
    array (
      0 => '/home/myindian/test.myindianstore.eu/themes/theme_origine4/templates/page.tpl',
      1 => 1578924315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e202d4adc9cb7_82529941 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8442727435e202d4adb7417_48894270', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_9750961875e202d4adba066_07374714 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_9204320095e202d4adb86f0_45551957 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9750961875e202d4adba066_07374714', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_19898280585e202d4adc1189_26456208 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_3002294945e202d4adc2c36_63089485 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_13959311225e202d4adbfd20_83304954 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19898280585e202d4adc1189_26456208', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3002294945e202d4adc2c36_63089485', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_9899073615e202d4adc6a99_78978553 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_9811462485e202d4adc5797_69846271 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9899073615e202d4adc6a99_78978553', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_8442727435e202d4adb7417_48894270 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8442727435e202d4adb7417_48894270',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_9204320095e202d4adb86f0_45551957',
  ),
  'page_title' => 
  array (
    0 => 'Block_9750961875e202d4adba066_07374714',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_13959311225e202d4adbfd20_83304954',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_19898280585e202d4adc1189_26456208',
  ),
  'page_content' => 
  array (
    0 => 'Block_3002294945e202d4adc2c36_63089485',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_9811462485e202d4adc5797_69846271',
  ),
  'page_footer' => 
  array (
    0 => 'Block_9899073615e202d4adc6a99_78978553',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <div id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9204320095e202d4adb86f0_45551957', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13959311225e202d4adbfd20_83304954', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9811462485e202d4adc5797_69846271', 'page_footer_container', $this->tplIndex);
?>


  </div>

<?php
}
}
/* {/block 'content'} */
}
