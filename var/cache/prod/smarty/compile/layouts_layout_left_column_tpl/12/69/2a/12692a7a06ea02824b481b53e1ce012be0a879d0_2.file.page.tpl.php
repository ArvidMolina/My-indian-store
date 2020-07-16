<?php
/* Smarty version 3.1.33, created on 2020-07-15 18:50:35
  from '/home/myindian/public_html/themes/theme_origine4/templates/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f25cba29280_78334084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12692a7a06ea02824b481b53e1ce012be0a879d0' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/templates/page.tpl',
      1 => 1584378789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f25cba29280_78334084 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18558980195f0f25cba194a8_54710442', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_16481687995f0f25cba1bd95_51711755 extends Smarty_Internal_Block
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
class Block_3414426515f0f25cba1a708_30554323 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16481687995f0f25cba1bd95_51711755', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_15355819555f0f25cba21a02_32443198 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_20909536315f0f25cba23096_68327984 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_6530152485f0f25cba207a9_21419175 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15355819555f0f25cba21a02_32443198', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20909536315f0f25cba23096_68327984', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_17495592865f0f25cba26828_78487179 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_8180404625f0f25cba257a8_74190016 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17495592865f0f25cba26828_78487179', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_18558980195f0f25cba194a8_54710442 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18558980195f0f25cba194a8_54710442',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_3414426515f0f25cba1a708_30554323',
  ),
  'page_title' => 
  array (
    0 => 'Block_16481687995f0f25cba1bd95_51711755',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_6530152485f0f25cba207a9_21419175',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_15355819555f0f25cba21a02_32443198',
  ),
  'page_content' => 
  array (
    0 => 'Block_20909536315f0f25cba23096_68327984',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_8180404625f0f25cba257a8_74190016',
  ),
  'page_footer' => 
  array (
    0 => 'Block_17495592865f0f25cba26828_78487179',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <div id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3414426515f0f25cba1a708_30554323', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6530152485f0f25cba207a9_21419175', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8180404625f0f25cba257a8_74190016', 'page_footer_container', $this->tplIndex);
?>


  </div>

<?php
}
}
/* {/block 'content'} */
}
