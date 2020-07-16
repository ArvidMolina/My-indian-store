<?php
/* Smarty version 3.1.33, created on 2020-01-16 13:01:07
  from '/home/myindian/test.myindianstore.eu/admin123/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e20a4e3abf042_38795141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac946792154ee88aced857e0e2f91fe93a9b86bc' => 
    array (
      0 => '/home/myindian/test.myindianstore.eu/admin123/themes/default/template/content.tpl',
      1 => 1574704756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e20a4e3abf042_38795141 (Smarty_Internal_Template $_smarty_tpl) {
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
