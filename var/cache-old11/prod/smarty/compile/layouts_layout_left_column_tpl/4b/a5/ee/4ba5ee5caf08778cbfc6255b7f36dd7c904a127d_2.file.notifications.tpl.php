<?php
/* Smarty version 3.1.33, created on 2020-03-04 13:56:37
  from '/home/myindian/wholesale.myindianstore.eu/themes/theme_origine4/templates/_partials/notifications.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5f9775aaf6d4_73717606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ba5ee5caf08778cbfc6255b7f36dd7c904a127d' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/themes/theme_origine4/templates/_partials/notifications.tpl',
      1 => 1579261783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5f9775aaf6d4_73717606 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php if (isset($_smarty_tpl->tpl_vars['notifications']->value)) {?>
<aside id="notifications">
  <div class="container">
    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['error']) {?>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9296285895e5f9775aa5e19_35106223', 'notifications_error');
?>

    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['warning']) {?>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4059419675e5f9775aa86f3_52211388', 'notifications_warning');
?>

    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['success']) {?>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8222724595e5f9775aaae75_59036989', 'notifications_success');
?>

    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['info']) {?>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7929721495e5f9775aad6f8_72942648', 'notifications_info');
?>

    <?php }?>
  </div>
</aside>
<?php }
}
/* {block 'notifications_error'} */
class Block_9296285895e5f9775aa5e19_35106223 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'notifications_error' => 
  array (
    0 => 'Block_9296285895e5f9775aa5e19_35106223',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <article class="alert alert-danger" role="alert" data-alert="danger">
          <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['notifications']->value['error'], 'notif');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->value) {
?>
              <li><?php echo $_smarty_tpl->tpl_vars['notif']->value;?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </ul>
        </article>
      <?php
}
}
/* {/block 'notifications_error'} */
/* {block 'notifications_warning'} */
class Block_4059419675e5f9775aa86f3_52211388 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'notifications_warning' => 
  array (
    0 => 'Block_4059419675e5f9775aa86f3_52211388',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <article class="alert alert-warning" role="alert" data-alert="warning">
          <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['notifications']->value['warning'], 'notif');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->value) {
?>
              <li><?php echo $_smarty_tpl->tpl_vars['notif']->value;?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </ul>
        </article>
      <?php
}
}
/* {/block 'notifications_warning'} */
/* {block 'notifications_success'} */
class Block_8222724595e5f9775aaae75_59036989 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'notifications_success' => 
  array (
    0 => 'Block_8222724595e5f9775aaae75_59036989',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <article class="alert alert-success" role="alert" data-alert="success">
          <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['notifications']->value['success'], 'notif');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->value) {
?>
              <li><?php echo $_smarty_tpl->tpl_vars['notif']->value;?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </ul>
        </article>
      <?php
}
}
/* {/block 'notifications_success'} */
/* {block 'notifications_info'} */
class Block_7929721495e5f9775aad6f8_72942648 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'notifications_info' => 
  array (
    0 => 'Block_7929721495e5f9775aad6f8_72942648',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <article class="alert alert-info" role="alert" data-alert="info">
          <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['notifications']->value['info'], 'notif');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->value) {
?>
              <li><?php echo $_smarty_tpl->tpl_vars['notif']->value;?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </ul>
        </article>
      <?php
}
}
/* {/block 'notifications_info'} */
}
