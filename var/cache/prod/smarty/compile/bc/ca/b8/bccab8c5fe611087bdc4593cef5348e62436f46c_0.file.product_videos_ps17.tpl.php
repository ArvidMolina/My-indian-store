<?php
/* Smarty version 3.1.33, created on 2020-06-30 15:07:20
  from '/home/myindian/public_html/modules/magiczoomplus/views/templates/admin/product_videos_ps17.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efb2af83c0c03_96407145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bccab8c5fe611087bdc4593cef5348e62436f46c' => 
    array (
      0 => '/home/myindian/public_html/modules/magiczoomplus/views/templates/admin/product_videos_ps17.tpl',
      1 => 1584378765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efb2af83c0c03_96407145 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-9">
            <fieldset class="form-group">
                <label class="form-control-label">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product Videos','mod'=>'magiczoomplus'),$_smarty_tpl ) );?>

                    <span class="help-box" data-toggle="popover" data-content="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Provide links to video separated by a space or new line.','mod'=>'magiczoomplus'),$_smarty_tpl ) );?>
" ></span>
                </label>
                <?php if (isset($_smarty_tpl->tpl_vars['magiczoomplus_invalid_urls']->value)) {?>
                <div class="row">
                    <div class="col-md-9">
                        <div class="alert alert-warning" role="alert">
                            <i class="material-icons">help</i>
                            <p class="alert-text">
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'"Product Videos" value contains incorrect urls:','mod'=>'magiczoomplus'),$_smarty_tpl ) );?>
<br><br>
                                <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['magiczoomplus_invalid_urls']->value, 'url');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['url']->value) {
?>
                                        <li><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['url']->value,'html','UTF-8' ));?>
</li>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <?php }?>
                <div class="translations tabbable" id="form_stepX_product_videos">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <textarea name="magiczoomplus_video" placeholder="" class="form-control" rows="10" cols="45"><?php if (isset($_smarty_tpl->tpl_vars['magiczoomplus_textarea']->value)) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['magiczoomplus_textarea']->value,'html','UTF-8' ));
}?></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<?php }
}
