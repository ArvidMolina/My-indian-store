<?php
/* Smarty version 3.1.33, created on 2020-01-16 04:30:51
  from '/home/myindian/test.myindianstore.eu/modules/kbcustomfield/views/templates/hook/field_display_front.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e202d4b40bad7_22402216',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e184d1fb6d9878ab57bce66bcfc06b605f3bd3d' => 
    array (
      0 => '/home/myindian/test.myindianstore.eu/modules/kbcustomfield/views/templates/hook/field_display_front.tpl',
      1 => 1579165067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e202d4b40bad7_22402216 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    <?php echo $_smarty_tpl->tpl_vars['kb_custom_css']->value;?>

</style>
<div class="kb_custom_field_block">
    <div >  
          <?php $_smarty_tpl->_assignInScope('field_counter', 0);?>
          
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kb_available_section']->value, 'section', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['section']->value) {
?>
            <div id="<?php if ($_smarty_tpl->tpl_vars['section']->value['placement'] == 'top') {?>kbdisplaytop-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');
}?>" class="kbcustomfieldblock">  
                <div class="form-group row">
                <div class="col-md-12">
                    <h3  class="page-subheading" style="padding-bottom: 6px;padding-left: 6px;border-bottom: 1px solid #a9a9a9;margin-left: 2px;margin-right: 2px;text-transform: uppercase;color: #414141;">
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['label'], ENT_QUOTES, 'UTF-8');?>

                    </h3>
                </div>
            </div>     
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kb_available_field']->value, 'kbfield');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kbfield']->value) {
?>
            <?php if (($_smarty_tpl->tpl_vars['kbfield']->value['type'] == 'text') && ($_smarty_tpl->tpl_vars['section']->value['id_section'] == $_smarty_tpl->tpl_vars['kbfield']->value['id_section'])) {?>
                <div class="form-group row">
                        <label class="col-md-3 form-control-label <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['required']) {?>required<?php }?>" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['field_name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['label'], ENT_QUOTES, 'UTF-8');?>
</label>
                        <div class="col-md-6">
                        <input type="<?php if ($_smarty_tpl->tpl_vars['kbfield']->value['validation'] == 'isEmail') {?>email<?php } else { ?>text<?php }?>" <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['placeholder'] != '') {?>placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['placeholder'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> 
                               name='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['field_name'], ENT_QUOTES, 'UTF-8');?>
' id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['html_id'], ENT_QUOTES, 'UTF-8');?>
" class="kbfield <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['html_class'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['required']) {?>is_required<?php }?> <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['validation'] != '') {?>validate<?php }?>  form-control"
                               <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['validation'] != '') {?> data-validate="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['validation'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if (($_smarty_tpl->tpl_vars['kbfield']->value['max_length'] != '') && ($_smarty_tpl->tpl_vars['kbfield']->value['max_length'] > 0)) {?> maxlength="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['max_length'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['min_length'] != '') {?>minlength="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['min_length'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>
                               value="<?php if (isset($_smarty_tpl->tpl_vars['kbfield']->value['customer_value'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['customer_value'], ENT_QUOTES, 'UTF-8');
}?>"
                               />
                        <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['error_msg'] != '') {?><span class="error_message" style="display:none;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['error_msg'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?>
                        </div>
                         <div class="col-md-3 form-control-comment">
                         <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['description'] != '') {?><span class="form-info">(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['description'], ENT_QUOTES, 'UTF-8');?>
)</span><?php }?>
                     </div>
                        <input type="hidden" name="kb_register_newsletter" value="<?php if ($_smarty_tpl->tpl_vars['kbfield']->value['register_for_newsletter']) {?>1<?php } else { ?>0<?php }?>"/>
                    </div>
            <?php }?>
            <?php if (($_smarty_tpl->tpl_vars['kbfield']->value['type'] == 'radio') && ($_smarty_tpl->tpl_vars['section']->value['id_section'] == $_smarty_tpl->tpl_vars['kbfield']->value['id_section'])) {?>
                <div class="clearfix row">
                         <label class="col-md-3 form-control-label <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['required']) {?>required<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['label'], ENT_QUOTES, 'UTF-8');?>
</label></br>
                         <div class="col-md-6">    
                             <div class="radio_kb_validate">
                        <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['value'] != '') {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_decode' ][ 0 ], array( $_smarty_tpl->tpl_vars['kbfield']->value['value'],1 )), 'field_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->value) {
?>
                                    <label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['field_name'], ENT_QUOTES, 'UTF-8');?>
" class="radio-inline">
                                        <span class="custom-radio">
                                        <input type="radio" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['field_name'], ENT_QUOTES, 'UTF-8');?>
" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['html_id'], ENT_QUOTES, 'UTF-8');?>
" class="kbfield <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['html_class'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['required']) {?>is_required<?php }?>" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field_value']->value['option_value'], ENT_QUOTES, 'UTF-8');?>
" 
                                             <?php if (isset($_smarty_tpl->tpl_vars['kbfield']->value['default_value'])) {?>
                                                   <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['default_value'] != '') {?>
                                                       <?php if (isset($_smarty_tpl->tpl_vars['kbfield']->value['default_value'][0]) && isset($_smarty_tpl->tpl_vars['kbfield']->value['default_value'][0]['option_value'])) {?>
                                                           <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['default_value'][0]['option_value'] == $_smarty_tpl->tpl_vars['field_value']->value['option_value']) {?>
                                                               checked
                                                           <?php }?>
                                                       <?php }?>
                                                   <?php }?>
                                               <?php }?>  /><span></span>
                                    </span>
                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field_value']->value['option_label'], ENT_QUOTES, 'UTF-8');?>

                                    </label>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                                     <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['error_msg'] != '') {?><span class="error_message" style="display:none;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['error_msg'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?>
                         </div>
                         </div>
                       <div class="col-md-3 form-control-comment">
                         <?php if ($_smarty_tpl->tpl_vars['kbfield']->value['description'] != '') {?><span class="form-info">(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kbfield']->value['description'], ENT_QUOTES, 'UTF-8');?>
)</span><?php }?>
                     </div>
                    </div>
            <?php }?>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <?php echo '<script'; ?>
>
            <?php if ($_smarty_tpl->tpl_vars['section']->value['placement'] == 'top') {?>
                $('.account_creation').before($('#kb_custom_section_front_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
'));
            <?php }?>
        <?php echo '</script'; ?>
>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</div>
    <?php echo '<script'; ?>
>
        var submit_account_btn = 1;
        var kb_not_valid = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Field is not valid','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var file_not_empty = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'File cannot be empty','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var field_not_empty = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Field cannot be empty','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_empty_field = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Field cannot be empty.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_number_field = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can enter only numbers.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_positive_number = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Number should be greater than 0.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_maxchar_field = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Field cannot be greater than # characters.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_minchar_field =  "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Field cannot be less than # character(s).','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_empty_email =  "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please enter Email.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_validate_email =  "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please enter a valid Email.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_max_email =  "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email cannot be greater than # characters.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_script = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Script tags are not allowed.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_style="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Style tags are not allowed.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_iframe =  "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Iframe tags are not allowed.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_html_tags =  "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Field should not contain HTML tags.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var kb_invalid_date = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invalid date format.','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
        var file_format_error = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'File is not in supported format','mod'=>'kbcustomfield'),$_smarty_tpl ) );?>
";
    <?php echo '</script'; ?>
>

<?php }
}
