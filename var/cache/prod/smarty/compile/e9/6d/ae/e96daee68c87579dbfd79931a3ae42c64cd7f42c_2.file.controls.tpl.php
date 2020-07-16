<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:22
  from '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/controls.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dce2bcb21_41488243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e96daee68c87579dbfd79931a3ae42c64cd7f42c' => 
    array (
      0 => '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/controls.tpl',
      1 => 1584378778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f8dce2bcb21_41488243 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/myindian/public_html/vendor/smarty/smarty/libs/plugins/function.math.php','function'=>'smarty_function_math',),));
?>

<?php echo smarty_function_math(array('assign'=>'num_col','equation'=>'12/a','a'=>$_smarty_tpl->tpl_vars['cant_fields']->value),$_smarty_tpl);?>


<div id="field_<?php if ($_smarty_tpl->tpl_vars['field']->value->object != '') {
echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->object, ENT_QUOTES, 'UTF-8');?>
_<?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name, ENT_QUOTES, 'UTF-8');?>
"
     class="form-group col-xs-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num_col']->value, ENT_QUOTES, 'UTF-8');?>
 col-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num_col']->value, ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>required<?php }?> <?php if ($_smarty_tpl->tpl_vars['cant_fields']->value == 1) {?>clear clearfix<?php }?>">
    <?php if ($_smarty_tpl->tpl_vars['field']->value->type_control == $_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type_control->textbox) {?>
        <label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name_control, ENT_QUOTES, 'UTF-8');?>
">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->description, ENT_QUOTES, 'UTF-8');?>
:
            <sup><?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>*<?php }?></sup>
        </label>
        <input
            id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->id_control, ENT_QUOTES, 'UTF-8');?>
"
            name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name_control, ENT_QUOTES, 'UTF-8');?>
"
            type="<?php if ($_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type->{$_smarty_tpl->tpl_vars['field']->value->type} == 'password' || $_smarty_tpl->tpl_vars['field']->value->name == 'conf_passwd') {?>password<?php } elseif ($_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type->{$_smarty_tpl->tpl_vars['field']->value->type} == 'email') {?>email<?php } else { ?>text<?php }?>"
            class="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value->classes,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 form-control input-sm not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['field']->value->is_custom) {?>custom_field<?php }?> <?php if ($_smarty_tpl->tpl_vars['field']->value->capitalize) {?>capitalize<?php }?>"
            data-field-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name, ENT_QUOTES, 'UTF-8');?>
"
            data-validation="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value->type,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['field']->value->size != 0 && $_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type->{$_smarty_tpl->tpl_vars['field']->value->type} == 'string') {?>,length<?php }?> <?php if ($_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_VALIDATE_DNI'] && $_smarty_tpl->tpl_vars['field']->value->name == 'dni') {?>isValidIdByCountry<?php }?>"
            data-default-value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->default_value, ENT_QUOTES, 'UTF-8');?>
"
            data-required="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['field']->value->required), ENT_QUOTES, 'UTF-8');?>
"
            <?php if ($_smarty_tpl->tpl_vars['field']->value->name == 'address' && $_smarty_tpl->tpl_vars['CONFIGS']->value['OPC_AUTOCOMPLETE_GOOGLE_ADDRESS']) {?>autocomplete="off"<?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['field']->value->required) {?>data-validation-optional="true"<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value->error_message) && $_smarty_tpl->tpl_vars['field']->value->error_message != '') {?>data-validation-error-msg="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->error_message, ENT_QUOTES, 'UTF-8');?>
"<?php }?>
            <?php if (in_array($_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type->{$_smarty_tpl->tpl_vars['field']->value->type},array('string','integer','text'))) {?>data-validation-length="max<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['field']->value->size), ENT_QUOTES, 'UTF-8');?>
" maxlength="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['field']->value->size), ENT_QUOTES, 'UTF-8');?>
"<?php }?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['field']->value->value)) {?>value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>
        />
        <?php if ($_smarty_tpl->tpl_vars['field']->value->label != '') {?>
            <em><?php echo $_smarty_tpl->tpl_vars['field']->value->label;?>
</em>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type_control == $_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type_control->select) {?>
        <label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name_control, ENT_QUOTES, 'UTF-8');?>
">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->description, ENT_QUOTES, 'UTF-8');?>
:
            <sup><?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>*<?php }?></sup>
        </label>
        <select
            id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->id_control, ENT_QUOTES, 'UTF-8');?>
"
            name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name_control, ENT_QUOTES, 'UTF-8');?>
"
            class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->classes, ENT_QUOTES, 'UTF-8');?>
 form-control input-sm not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['field']->value->is_custom) {?>custom_field<?php }?>"
            data-field-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name, ENT_QUOTES, 'UTF-8');?>
"
            data-default-value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->default_value, ENT_QUOTES, 'UTF-8');?>
"
            data-required="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['field']->value->required), ENT_QUOTES, 'UTF-8');?>
"
            <?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>data-validation="required"<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value->error_message) && $_smarty_tpl->tpl_vars['field']->value->error_message != '') {?>data-validation-error-msg="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->error_message, ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value->options['empty_option']) && $_smarty_tpl->tpl_vars['field']->value->options['empty_option']) {?>
                <option value="" data-text="" <?php if ($_smarty_tpl->tpl_vars['field']->value->default_value == '' || (!isset($_smarty_tpl->tpl_vars['field']->value->options['data']) && count($_smarty_tpl->tpl_vars['field']->value->options['data']))) {?>selected<?php }?>>
                    <?php if ($_smarty_tpl->tpl_vars['field']->value->name_control == 'delivery_id' || $_smarty_tpl->tpl_vars['field']->value->name_control == 'invoice_id') {?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create a new address','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
....
                    <?php } else { ?>
                        --
                    <?php }?>
                </option>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value->options['data'])) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value->options['data'], 'item', false, NULL, 'f_options', array (
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <option
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['value']], ENT_QUOTES, 'UTF-8');?>
"
                        data-text="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['description']], ENT_QUOTES, 'UTF-8');?>
"
                        <?php if ($_smarty_tpl->tpl_vars['field']->value->name == 'id_country') {?>data-iso-code="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['field']->value->default_value == $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['value']]) {?>selected<?php }?>>
                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['description']], ENT_QUOTES, 'UTF-8');?>

                    </option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
        </select>
        <?php if ($_smarty_tpl->tpl_vars['field']->value->label != '') {?>
            <em><?php echo $_smarty_tpl->tpl_vars['field']->value->label;?>
</em>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type_control == $_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type_control->checkbox) {?>
        <label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name_control, ENT_QUOTES, 'UTF-8');?>
">
            <input
                id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->id_control, ENT_QUOTES, 'UTF-8');?>
"
                name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name_control, ENT_QUOTES, 'UTF-8');?>
"
                type="checkbox"
                class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->classes, ENT_QUOTES, 'UTF-8');?>
 not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['field']->value->is_custom) {?>custom_field<?php }?>"
                <?php if ($_smarty_tpl->tpl_vars['field']->value->default_value) {?>checked<?php }?>
                data-field-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name, ENT_QUOTES, 'UTF-8');?>
"
                data-default-value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->default_value, ENT_QUOTES, 'UTF-8');?>
"
                data-required="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['field']->value->required), ENT_QUOTES, 'UTF-8');?>
"
                <?php if (!$_smarty_tpl->tpl_vars['field']->value->required) {?>data-validation-optional="true"<?php } else { ?>data-validation="required"<?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['field']->value->error_message) && $_smarty_tpl->tpl_vars['field']->value->error_message != '') {?>data-validation-error-msg="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->error_message, ENT_QUOTES, 'UTF-8');?>
"<?php }?>
            />
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->description, ENT_QUOTES, 'UTF-8');?>

            <sup><?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>*<?php }?></sup>
        </label>
        <?php if ($_smarty_tpl->tpl_vars['field']->value->label != '') {?>
            <em><?php echo $_smarty_tpl->tpl_vars['field']->value->label;?>
</em>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type_control == $_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type_control->radio) {?>
        <label>
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->description, ENT_QUOTES, 'UTF-8');?>
:
            <sup><?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>*<?php }?></sup>
        </label>
        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value->options['data'], 'item', false, NULL, 'f_options', array (
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <?php echo smarty_function_math(array('assign'=>'num_col_option','equation'=>'12/a','a'=>(isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_options']->value['total']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_options']->value['total'] : null)),$_smarty_tpl);?>

                <div class="col-xs-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num_col_option']->value, ENT_QUOTES, 'UTF-8');?>
 col-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num_col_option']->value, ENT_QUOTES, 'UTF-8');?>
">
                    <label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name_control, ENT_QUOTES, 'UTF-8');?>
">
                        <input
                            id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->id_control, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['value']], ENT_QUOTES, 'UTF-8');?>
"
                            name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name, ENT_QUOTES, 'UTF-8');?>
"
                            type="radio"
                            class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->classes, ENT_QUOTES, 'UTF-8');?>
 not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['field']->value->is_custom) {?>custom_field<?php }?>"
                            value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['value']], ENT_QUOTES, 'UTF-8');?>
"
                            <?php if ($_smarty_tpl->tpl_vars['field']->value->default_value == $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['value']]) {?>checked<?php }?>
                            data-field-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name, ENT_QUOTES, 'UTF-8');?>
"
                            data-required="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['field']->value->required), ENT_QUOTES, 'UTF-8');?>
"
                        />
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['field']->value->options['description']], ENT_QUOTES, 'UTF-8');?>

                    </label>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['field']->value->label != '') {?>
            <em><?php echo $_smarty_tpl->tpl_vars['field']->value->label;?>
</em>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type_control == $_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type_control->textarea) {?>
        <label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name_control, ENT_QUOTES, 'UTF-8');?>
">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->description, ENT_QUOTES, 'UTF-8');?>
:
            <sup><?php if ($_smarty_tpl->tpl_vars['field']->value->required) {?>*<?php }?></sup>
        </label>
        <textarea
            id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->id_control, ENT_QUOTES, 'UTF-8');?>
"
            name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name_control, ENT_QUOTES, 'UTF-8');?>
"
            class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->classes, ENT_QUOTES, 'UTF-8');?>
 form-control input-sm not_unifrom not_uniform <?php if ($_smarty_tpl->tpl_vars['field']->value->is_custom) {?>custom_field<?php }?>"
            data-field-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->name, ENT_QUOTES, 'UTF-8');?>
"
            data-validation="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->type, ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['field']->value->size != 0) {?>,length<?php }?>"
            data-default-value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->default_value, ENT_QUOTES, 'UTF-8');?>
"
            data-required="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['field']->value->required), ENT_QUOTES, 'UTF-8');?>
"
            <?php if (!$_smarty_tpl->tpl_vars['field']->value->required) {?>data-validation-optional="true"<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value->error_message) && $_smarty_tpl->tpl_vars['field']->value->error_message != '') {?>data-validation-error-msg="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->error_message, ENT_QUOTES, 'UTF-8');?>
"<?php }?>
            <?php if (in_array($_smarty_tpl->tpl_vars['OPC_GLOBALS']->value->type->{$_smarty_tpl->tpl_vars['field']->value->type},array('string','integer','text'))) {?>data-validation-length="max<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['field']->value->size), ENT_QUOTES, 'UTF-8');?>
"<?php }?>
            ></textarea>
        <?php if ($_smarty_tpl->tpl_vars['field']->value->label != '') {?>
            <em><?php echo $_smarty_tpl->tpl_vars['field']->value->label;?>
</em>
        <?php }?>
    <?php }?>
</div>

<?php }
}
