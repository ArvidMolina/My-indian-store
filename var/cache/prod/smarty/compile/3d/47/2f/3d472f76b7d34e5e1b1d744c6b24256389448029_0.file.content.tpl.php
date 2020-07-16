<?php
/* Smarty version 3.1.33, created on 2020-07-14 23:54:24
  from '/home/myindian/public_html/admin123/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0e1b8016c611_19936526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d472f76b7d34e5e1b1d744c6b24256389448029' => 
    array (
      0 => '/home/myindian/public_html/admin123/themes/default/template/content.tpl',
      1 => 1584378675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0e1b8016c611_19936526 (Smarty_Internal_Template $_smarty_tpl) {
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
