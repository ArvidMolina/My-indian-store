<?php
/* Smarty version 3.1.33, created on 2020-01-17 06:51:36
  from '/home/myindian/wholesale.myindianstore.eu/themes/theme_origine4/templates/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e219fc8b23e68_02008282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ec674f83cc3b0a496c7cb32857aec4080176e4e' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/themes/theme_origine4/templates/page.tpl',
      1 => 1579261784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e219fc8b23e68_02008282 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3570999455e219fc8af5271_44809161', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_5465449025e219fc8af8744_45250922 extends Smarty_Internal_Block
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
class Block_11949747035e219fc8af6858_12693890 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5465449025e219fc8af8744_45250922', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_18337954265e219fc8b18b49_78433300 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_5032000945e219fc8b1aad3_88926050 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_16965280445e219fc8b172e7_75076493 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18337954265e219fc8b18b49_78433300', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5032000945e219fc8b1aad3_88926050', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_19297462215e219fc8b20025_27155718 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_14345816525e219fc8b1ea34_40497457 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19297462215e219fc8b20025_27155718', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_3570999455e219fc8af5271_44809161 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_3570999455e219fc8af5271_44809161',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_11949747035e219fc8af6858_12693890',
  ),
  'page_title' => 
  array (
    0 => 'Block_5465449025e219fc8af8744_45250922',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_16965280445e219fc8b172e7_75076493',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_18337954265e219fc8b18b49_78433300',
  ),
  'page_content' => 
  array (
    0 => 'Block_5032000945e219fc8b1aad3_88926050',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_14345816525e219fc8b1ea34_40497457',
  ),
  'page_footer' => 
  array (
    0 => 'Block_19297462215e219fc8b20025_27155718',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <div id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11949747035e219fc8af6858_12693890', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16965280445e219fc8b172e7_75076493', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14345816525e219fc8b1ea34_40497457', 'page_footer_container', $this->tplIndex);
?>


  </div>

<?php
}
}
/* {/block 'content'} */
}
