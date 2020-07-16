<?php
/* Smarty version 3.1.33, created on 2020-07-16 11:15:38
  from '/home/myindian/public_html/themes/theme_origine4/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f100caa1642f7_26112576',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34574d1de94420189deafb77438abbcda6ea15d8' => 
    array (
      0 => '/home/myindian/public_html/themes/theme_origine4/templates/index.tpl',
      1 => 1584378789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f100caa1642f7_26112576 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2238526535f100caa15b1f1_49501502', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_9137855605f100caa15c8c1_86427230 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_9099617555f100caa15f614_84162030 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_19091587565f100caa15e403_90012471 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9099617555f100caa15f614_84162030', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_2238526535f100caa15b1f1_49501502 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_2238526535f100caa15b1f1_49501502',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_9137855605f100caa15c8c1_86427230',
  ),
  'page_content' => 
  array (
    0 => 'Block_19091587565f100caa15e403_90012471',
  ),
  'hook_home' => 
  array (
    0 => 'Block_9099617555f100caa15f614_84162030',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9137855605f100caa15c8c1_86427230', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19091587565f100caa15e403_90012471', 'page_content', $this->tplIndex);
?>

      </div>
    <?php
}
}
/* {/block 'page_content_container'} */
}
