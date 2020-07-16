<?php
/* Smarty version 3.1.33, created on 2020-06-16 13:01:50
  from '/home/myindian/public_html/modules/ps_emailalerts/views/templates/admin/_configure/helpers/form/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ee8988ea0ffc5_40508658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cbf057b78f0b15354d375801a051381be41f437' => 
    array (
      0 => '/home/myindian/public_html/modules/ps_emailalerts/views/templates/admin/_configure/helpers/form/form.tpl',
      1 => 1584378767,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee8988ea0ffc5_40508658 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4386241685ee8988e9cc389_56783467', "input");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "input"} */
class Block_4386241685ee8988e9cc389_56783467 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input' => 
  array (
    0 => 'Block_4386241685ee8988e9cc389_56783467',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'switch' && addcslashes(@constant('_PS_VERSION_'),'\'') < '1.6') {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'], 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
			<input type="radio" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" id="<?php echo intval($_smarty_tpl->tpl_vars['value']->value['id']);?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value']->value['value'],'html','UTF-8' ));?>
"
					<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == $_smarty_tpl->tpl_vars['value']->value['value']) {?>checked="checked"<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['input']->value['disabled']) && $_smarty_tpl->tpl_vars['input']->value['disabled']) {?>disabled="disabled"<?php }?> />
			<label class="t" for="<?php echo intval($_smarty_tpl->tpl_vars['value']->value['id']);?>
">
			 <?php if (isset($_smarty_tpl->tpl_vars['input']->value['is_bool']) && $_smarty_tpl->tpl_vars['input']->value['is_bool'] == true) {?>
				<?php if ($_smarty_tpl->tpl_vars['value']->value['value'] == 1) {?>
					<img src="../img/admin/enabled.gif" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value']->value['label'],'html','UTF-8' ));?>
" />
				<?php } else { ?>
					<img src="../img/admin/disabled.gif" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value']->value['label'],'html','UTF-8' ));?>
" />
				<?php }?>
			 <?php } else { ?>
				<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value']->value['label'],'html','UTF-8' ));?>

			 <?php }?>
			</label>
			<?php if (isset($_smarty_tpl->tpl_vars['input']->value['br']) && $_smarty_tpl->tpl_vars['input']->value['br']) {?><br /><?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['value']->value['p']) && $_smarty_tpl->tpl_vars['value']->value['p']) {?><p><?php echo $_smarty_tpl->tpl_vars['value']->value['p'];?>
</p><?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php } else { ?>
		<?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }?>

<?php
}
}
/* {/block "input"} */
}
