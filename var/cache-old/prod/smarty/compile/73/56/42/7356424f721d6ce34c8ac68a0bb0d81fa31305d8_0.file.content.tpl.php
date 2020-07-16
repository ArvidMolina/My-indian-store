<?php
/* Smarty version 3.1.33, created on 2020-01-17 10:36:52
  from '/home/myindian/wholesale.myindianstore.eu/admin123/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e21d494319c97_70394279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7356424f721d6ce34c8ac68a0bb0d81fa31305d8' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/admin123/themes/default/template/content.tpl',
      1 => 1579261770,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e21d494319c97_70394279 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
