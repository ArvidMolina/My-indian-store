<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:21
  from '/home/myindian/public_html/modules/registrationfields/views/templates/hook/summary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dcd983ee2_94421057',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7dda88fba8c227252b37132cd376d20df5a0de86' => 
    array (
      0 => '/home/myindian/public_html/modules/registrationfields/views/templates/hook/summary.tpl',
      1 => 1591313122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f8dcd983ee2_94421057 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/myindian/public_html/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>
<section>
<fieldset id="registration_fields" class="account_creation form-group" style="border: none;">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary_fields']->value, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
		<div class="clearfix"></div>
		<div class="rf_input_wrapper required form-group text form-group row">
            <label class="rf_input_label <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?> required <?php }
if ($_smarty_tpl->tpl_vars['version']->value >= 1.7) {?>col-md-3<?php }?> form-control-label">
            	<?php if ($_smarty_tpl->tpl_vars['field']->value['value_required'] && $_smarty_tpl->tpl_vars['version']->value >= 1.7) {?><span style="color: #FF5555!important">*</span><?php }?>
            	<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['field_name'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</label>
			<div class="<?php if ($_smarty_tpl->tpl_vars['version']->value >= 1.7) {?>col-md-6<?php }?>">
			<?php $_smarty_tpl->_assignInScope('field_value', Fields::getFormatedValue($_smarty_tpl->tpl_vars['field']->value,null,$_smarty_tpl->tpl_vars['id_customer']->value,$_smarty_tpl->tpl_vars['id_guest']->value));?>
			<?php if ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'text') {?>
				<?php $_smarty_tpl->_assignInScope('text_default_value', $_smarty_tpl->tpl_vars['field']->value['default_value']);?>
				<?php if ($_smarty_tpl->tpl_vars['field']->value['editable'] == 0) {?>
						<?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {?>
							<span class="form-control"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>
						<?php } else { ?>
							<input type="text" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value=""  class="text <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }
if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?>validate_field<?php }?> form-control" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?> data-validate="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['field_validation'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>/>
						<?php }?>
				<?php } else { ?>
					<input type="text" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]"
					value="<?php if (!empty($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
} elseif (!empty($_smarty_tpl->tpl_vars['text_default_value']->value) && $_smarty_tpl->tpl_vars['text_default_value']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['text_default_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>"
					class="text <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }
if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?>validate_field<?php }?> form-control" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?> data-validate="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['field_validation'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>/>
				<?php }?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'textarea') {?>
				<?php $_smarty_tpl->_assignInScope('texta_default_value', $_smarty_tpl->tpl_vars['field']->value['default_value']);?>
				<?php if ($_smarty_tpl->tpl_vars['field']->value['editable'] == 0) {?>

						<?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {?>
							<span class="form-control"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>
						<?php } else { ?>
							<textarea name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" class="form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?>data-validate="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['field_validation'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>></textarea>
						
						<?php }?>
				<?php } else { ?>
					<textarea name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" class="form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?>data-validate="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['field_validation'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php if (!empty($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
} elseif (!empty($_smarty_tpl->tpl_vars['text_default_value']->value) && $_smarty_tpl->tpl_vars['text_default_value']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['text_default_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?></textarea>
				<?php }?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'date') {?>
				<?php if ($_smarty_tpl->tpl_vars['field']->value['editable'] == 0) {?>

					<?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {?>
						<span class="form-control"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>
					<?php } else { ?>
						<input class="fields_datapicker form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?> is_required <?php }?> validate_field" type="text" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="" data-validate="isDate"/>
					<?php }?>
				<?php } else { ?>
					<input class="fields_datapicker form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?> is_required <?php }?> validate_field"
	                type="text"
	                name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]"
	                value="<?php if (!empty($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>"
	                data-validate="isDate"/>
				<?php }?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'boolean') {?>

				<?php if ($_smarty_tpl->tpl_vars['field']->value['editable'] == 0) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {?>
                        <span class="form-control"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>
                    <?php } else { ?>
                        <select class="select form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }?>" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" >
                        <option value="No"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</option>
                        <option value="Yes"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</option>
                    </select>
                    <?php }?>
                <?php } else { ?>
					<select class="select form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }?>" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" >
						<option value="No" <?php if (!empty($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value == 'No') {?>selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</option>
						<option value="Yes" <?php if (!empty($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value == 'Yes') {?>selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</option>
					</select>
                <?php }?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'select') {?>

	            <?php if ($_smarty_tpl->tpl_vars['field']->value['editable'] == 0) {?>
	                <?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {?>
	                    <?php $_smarty_tpl->_assignInScope('field_value', FieldsModel::getFieldsValueById($_smarty_tpl->tpl_vars['field_value']->value));?>
	                    <span class="form-control"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>
	                <?php } else { ?>
	                    <select class="select form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }?>" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" >
	                    <option value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select Option','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</option>
	                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary_fields_values']->value[$_smarty_tpl->tpl_vars['field']->value['id_custom_field']], 'summary_fields_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['summary_fields_value']->value) {
?>
	                        <option value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

	                        </option>
	                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	                </select>
	                <?php }?>
	            <?php } else { ?>
					<select class="select form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }?>" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" >
						<option value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select Option','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary_fields_values']->value[$_smarty_tpl->tpl_vars['field']->value['id_custom_field']], 'summary_fields_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['summary_fields_value']->value) {
?>
							<option value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
	                        <?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'] == $_smarty_tpl->tpl_vars['field_value']->value) {?>selected="selected"<?php }?>><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

							</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
	            <?php }?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'radio') {?>
				<input class="rf_checkboxes" type="hidden" data-required="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['value_required'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['field_value']->value), ENT_QUOTES, 'UTF-8');?>
">
				<?php if ($_smarty_tpl->tpl_vars['field']->value['editable'] == 0) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {?>
                        <span class="form-control">
                        	<?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && is_array($_smarty_tpl->tpl_vars['field_value']->value)) {?>
                        		<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Fields::getOptionValue(implode(',',$_smarty_tpl->tpl_vars['field_value']->value)),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                        	<?php }?>
                        </span>
                    <?php } else { ?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary_fields_values']->value[$_smarty_tpl->tpl_vars['field']->value['id_custom_field']], 'summary_fields_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['summary_fields_value']->value) {
?>
                            <div class="type_multiboxes col-lg-1" id="uniform-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                <input type="radio"
                                id="radio_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                                class="form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }?>"
                                name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
][]"
                                value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"/>
                            </div>
                            <label class="type_multiboxes col-lg-8 top" for="radio_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                            </label>
                            <div class="clearfix"></div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                <?php } else { ?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary_fields_values']->value[$_smarty_tpl->tpl_vars['field']->value['id_custom_field']], 'summary_fields_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['summary_fields_value']->value) {
?>
                        <div class="type_multiboxes col-lg-1" id="uniform-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                            <input type="radio"
                            id="radio_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                            class="form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }?>"
                            name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
][]"
                            value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                            <?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && is_array($_smarty_tpl->tpl_vars['field_value']->value) && in_array($_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],$_smarty_tpl->tpl_vars['field_value']->value)) {?>checked="checked"<?php }?>
                            />
                        </div>
                        <label class="type_multiboxes col-lg-8 top" for="radio_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                        	<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

						</label>
                        <div class="clearfix"></div>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'checkbox') {?>
				<input class="rf_checkboxes" type="hidden" data-required="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['value_required'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['field_value']->value), ENT_QUOTES, 'UTF-8');?>
">
				<?php if ($_smarty_tpl->tpl_vars['field']->value['editable'] == 0) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {?>
                        <span class="form-control">
                        	<?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && is_array($_smarty_tpl->tpl_vars['field_value']->value)) {?>
                        		<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Fields::getOptionValue(implode(',',$_smarty_tpl->tpl_vars['field_value']->value)),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                        	<?php }?>
                        </span>
                    <?php } else { ?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary_fields_values']->value[$_smarty_tpl->tpl_vars['field']->value['id_custom_field']], 'summary_fields_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['summary_fields_value']->value) {
?>
                            <div class="type_multiboxes checker col-lg-1" id="uniform-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                <input type="checkbox"
                                value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                                name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
][]" id="checkbox_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                                class="<?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required<?php }?>"/>
                            </div>
                            <label class="type_multiboxes col-lg-8" for="checkbox_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                            </label>
                            <div class="clearfix"></div>
                    	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                <?php } else { ?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary_fields_values']->value[$_smarty_tpl->tpl_vars['field']->value['id_custom_field']], 'summary_fields_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['summary_fields_value']->value) {
?>

                            <div class="type_multiboxes col-lg-1" id="uniform-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                <input type="checkbox"
                                value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                                name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
][]" id="checkbox_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                                class="<?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required<?php }?> form-control"
                                <?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && is_array($_smarty_tpl->tpl_vars['field_value']->value) && in_array($_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],$_smarty_tpl->tpl_vars['field_value']->value)) {?>checked="checked"<?php }?>
                                />
                            </div>
							<label class="type_multiboxes col-lg-7" for="checkbox_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

							</label>
                            <div class="clearfix"></div>

					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'multiselect') {?>
                <input class="rf_checkboxes" type="hidden" data-required="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['value_required'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['field_value']->value), ENT_QUOTES, 'UTF-8');?>
">
                <?php if ($_smarty_tpl->tpl_vars['field']->value['editable'] == 0) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {?>
                        <span class="form-control">
                        	<?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && is_array($_smarty_tpl->tpl_vars['field_value']->value)) {?>
                        		<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Fields::getOptionValue(implode(',',$_smarty_tpl->tpl_vars['field_value']->value)),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                        	<?php }?>
                    	</span>
                    <?php } else { ?>
                        <select name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
][]" multiple="multiple" class="type_multiboxes multiselect form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }?>">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary_fields_values']->value[$_smarty_tpl->tpl_vars['field']->value['id_custom_field']], 'summary_fields_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['summary_fields_value']->value) {
?>
                                <option value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                                </option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                        <p><small><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hold CTRL/Command key to select multiple values.','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</small></p>
                    <?php }?>
                <?php } else { ?>
					<select name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
][]" multiple="multiple" class="type_multiboxes multiselect form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }?>">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary_fields_values']->value[$_smarty_tpl->tpl_vars['field']->value['id_custom_field']], 'summary_fields_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['summary_fields_value']->value) {
?>
							<option value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && is_array($_smarty_tpl->tpl_vars['field_value']->value) && in_array($_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value_id'],$_smarty_tpl->tpl_vars['field_value']->value)) {?>selected="selected"<?php }?>><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['summary_fields_value']->value['field_value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                            </option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
					<p><small><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hold CTRL/Command key to select multiple values.','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</small></p>
                <?php }?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'image') {?>
					<div id="field_image_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
					<?php $_smarty_tpl->_assignInScope('root_dir', ((@constant('_PS_ROOT_DIR_')).('/')));?>
					<?php if ($_smarty_tpl->tpl_vars['field']->value['editable'] == 0) {?>
						<?php $_smarty_tpl->_assignInScope('field_value', '');?>
						<?php if (isset($_smarty_tpl->tpl_vars['value_reg_fields']->value) && $_smarty_tpl->tpl_vars['value_reg_fields']->value) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['value_reg_fields']->value, 'field_edit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_edit']->value) {
?>
							
								<?php if (!empty($_smarty_tpl->tpl_vars['field_edit']->value) && $_smarty_tpl->tpl_vars['field_edit']->value && $_smarty_tpl->tpl_vars['field_edit']->value['id_custom_field'] == $_smarty_tpl->tpl_vars['field']->value['id_custom_field'] && !empty($_smarty_tpl->tpl_vars['field_edit']->value['value'])) {?>
									<?php $_smarty_tpl->_assignInScope('field_value', smarty_modifier_replace($_smarty_tpl->tpl_vars['field_edit']->value['value'],$_smarty_tpl->tpl_vars['root_dir']->value,''));?>
								<?php }?>
							
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php } else { ?>
							<?php $_smarty_tpl->_assignInScope('field_value', '');?>
						<?php }?>

						<?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {?>
							<img id="preview-image-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="image_container" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('__PS_BASE_URI__'),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
						<?php } else { ?>
							<img id="preview-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="image_container" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('__PS_BASE_URI__'),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
modules/registrationfields/views/img/empty.png">
							<input type="file" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" id="image_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="image_input <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }
if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?>validate_field<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?> data-validate="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['field_validation'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['field']->value['extensions']) && $_smarty_tpl->tpl_vars['field']->value['extensions']) {?> data-extensions="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['extensions'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?> data-id="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
							<p class="alert alert-danger error extension_error"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Image type not allowed.','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</p>
						<?php }?>
					<?php } else { ?>
							<img id="preview-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="image_container" src="<?php if (!empty($_smarty_tpl->tpl_vars['value_reg_fields']->value) && $_smarty_tpl->tpl_vars['value_reg_fields']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['value_reg_fields']->value, 'field_edit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_edit']->value) {
if (!empty($_smarty_tpl->tpl_vars['field_edit']->value) && $_smarty_tpl->tpl_vars['field_edit']->value && $_smarty_tpl->tpl_vars['field_edit']->value['id_custom_field'] == $_smarty_tpl->tpl_vars['field']->value['id_custom_field'] && !empty($_smarty_tpl->tpl_vars['field_edit']->value['value'])) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('__PS_BASE_URI__'),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( smarty_modifier_replace($_smarty_tpl->tpl_vars['field_edit']->value['value'],$_smarty_tpl->tpl_vars['root_dir']->value,''),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('__PS_BASE_URI__'),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
modules/registrationfields/views/img/empty.png<?php }?>" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click here to upload image','mod'=>'registrationfields'),$_smarty_tpl ) );?>
">
							<input type="file" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" id="image_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="image_input <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }
if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?>validate_field<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?> data-validate="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['field_validation'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['field']->value['extensions']) && $_smarty_tpl->tpl_vars['field']->value['extensions']) {?> data-extensions="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['extensions'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?> data-id="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
							<?php if (isset($_smarty_tpl->tpl_vars['field']->value['extensions']) && $_smarty_tpl->tpl_vars['field']->value['extensions']) {?> <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Allowed file types','mod'=>'registrationfields'),$_smarty_tpl ) );?>
: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['extensions'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
							<p class="alert alert-danger error extension_error"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Image type not allowed.','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</p>
					<?php }?>
					</div>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'attachment') {?>
					<div id="field_attachment_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
					<?php $_smarty_tpl->_assignInScope('root_dir', ((@constant('_PS_ROOT_DIR_')).('/')));?>
					<?php if ($_smarty_tpl->tpl_vars['field']->value['editable'] == 0) {?>
						<?php $_smarty_tpl->_assignInScope('field_value', '');?>
						<?php if (isset($_smarty_tpl->tpl_vars['value_reg_fields']->value) && $_smarty_tpl->tpl_vars['value_reg_fields']->value) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['value_reg_fields']->value, 'field_edit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_edit']->value) {
?>
							
								<?php if (!empty($_smarty_tpl->tpl_vars['field_edit']->value) && $_smarty_tpl->tpl_vars['field_edit']->value && $_smarty_tpl->tpl_vars['field_edit']->value['id_custom_field'] == $_smarty_tpl->tpl_vars['field']->value['id_custom_field'] && !empty($_smarty_tpl->tpl_vars['field_edit']->value['value'])) {?>
									<?php $_smarty_tpl->_assignInScope('field_value', smarty_modifier_replace($_smarty_tpl->tpl_vars['field_edit']->value['value'],$_smarty_tpl->tpl_vars['root_dir']->value,''));?>
								<?php }?>
							
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php } else { ?>
							<?php $_smarty_tpl->_assignInScope('field_value', '');?>
						<?php }?>

						<?php if (isset($_smarty_tpl->tpl_vars['field_value']->value) && $_smarty_tpl->tpl_vars['field_value']->value) {?>
							<a class="btn button btn-primary" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['actionLink']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
&field=<?php ob_start();
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
$_prefixVariable1 = ob_get_clean();
echo htmlspecialchars(base64_encode($_prefixVariable1), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(pathinfo(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_value']->value,'htmlall','UTF-8' )),@constant('PATHINFO_FILENAME')), ENT_QUOTES, 'UTF-8');?>

							</a>
							<br>
						<?php } else { ?>
							<img id="preview-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="image_container" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('__PS_BASE_URI__'),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
modules/registrationfields/views/img/empty.png">
							<input type="file" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="<?php if (!empty($_smarty_tpl->tpl_vars['value_reg_fields']->value) && $_smarty_tpl->tpl_vars['value_reg_fields']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['value_reg_fields']->value, 'field_edit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_edit']->value) {
if (!empty($_smarty_tpl->tpl_vars['field_edit']->value) && $_smarty_tpl->tpl_vars['field_edit']->value && $_smarty_tpl->tpl_vars['field_edit']->value['id_custom_field'] == $_smarty_tpl->tpl_vars['field']->value['id_custom_field'] && !empty($_smarty_tpl->tpl_vars['field_edit']->value['value'])) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_edit']->value['value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} elseif (empty($_smarty_tpl->tpl_vars['value_reg_fields']->value) && !empty($_smarty_tpl->tpl_vars['text_default_value']->value) && $_smarty_tpl->tpl_vars['text_default_value']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['text_default_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>"  class="form-control attachment <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }
if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?>validate_field<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?> data-validate="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['field_validation'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['field']->value['extensions']) && $_smarty_tpl->tpl_vars['field']->value['extensions']) {?> data-extensions="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['extensions'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
							<?php if (isset($_smarty_tpl->tpl_vars['field']->value['extensions']) && $_smarty_tpl->tpl_vars['field']->value['extensions']) {?> <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Allowed file types','mod'=>'registrationfields'),$_smarty_tpl ) );?>
: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['extensions'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
							<p class="alert alert-danger error extension_error"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Image type not allowed.','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</p>
						<?php }?>
					<?php } else { ?>
						<?php if (!empty($_smarty_tpl->tpl_vars['value_reg_fields']->value) && $_smarty_tpl->tpl_vars['value_reg_fields']->value) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['value_reg_fields']->value, 'field_edit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_edit']->value) {
?>
								<?php if (!empty($_smarty_tpl->tpl_vars['field_edit']->value) && $_smarty_tpl->tpl_vars['field_edit']->value && $_smarty_tpl->tpl_vars['field_edit']->value['id_custom_field'] == $_smarty_tpl->tpl_vars['field']->value['id_custom_field'] && !empty($_smarty_tpl->tpl_vars['field_edit']->value['value'])) {?>
									<a class="btn button btn-primary" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['actionLink']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
&field=<?php ob_start();
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
$_prefixVariable2 = ob_get_clean();
echo htmlspecialchars(base64_encode($_prefixVariable2), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(pathinfo(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( smarty_modifier_replace($_smarty_tpl->tpl_vars['field_edit']->value['value'],$_smarty_tpl->tpl_vars['root_dir']->value,''),'htmlall','UTF-8' )),@constant('PATHINFO_FILENAME')), ENT_QUOTES, 'UTF-8');?>
</a>
									<br>
								<?php }?>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
						<input type="file" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="<?php if (!empty($_smarty_tpl->tpl_vars['value_reg_fields']->value) && $_smarty_tpl->tpl_vars['value_reg_fields']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['value_reg_fields']->value, 'field_edit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_edit']->value) {
if (!empty($_smarty_tpl->tpl_vars['field_edit']->value) && $_smarty_tpl->tpl_vars['field_edit']->value && $_smarty_tpl->tpl_vars['field_edit']->value['id_custom_field'] == $_smarty_tpl->tpl_vars['field']->value['id_custom_field'] && !empty($_smarty_tpl->tpl_vars['field_edit']->value['value'])) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_edit']->value['value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} elseif (empty($_smarty_tpl->tpl_vars['value_reg_fields']->value) && !empty($_smarty_tpl->tpl_vars['text_default_value']->value) && $_smarty_tpl->tpl_vars['text_default_value']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['text_default_value']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>"  class="form-control attachment <?php if ($_smarty_tpl->tpl_vars['field']->value['value_required']) {?>is_required <?php }
if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?>validate_field<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['field_validation']) && $_smarty_tpl->tpl_vars['field']->value['field_validation']) {?> data-validate="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['field_validation'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['field']->value['extensions']) && $_smarty_tpl->tpl_vars['field']->value['extensions']) {?> data-extensions="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['extensions'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
						<?php if (isset($_smarty_tpl->tpl_vars['field']->value['extensions']) && $_smarty_tpl->tpl_vars['field']->value['extensions']) {?> <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Allowed file types','mod'=>'registrationfields'),$_smarty_tpl ) );?>
: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['extensions'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
						<p class="alert alert-danger error extension_error"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Image type not allowed.','mod'=>'registrationfields'),$_smarty_tpl ) );?>
</p>
						<?php }?>
					</div>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type'] == 'message') {?>
				<div class="alert alert-<?php if (isset($_smarty_tpl->tpl_vars['field']->value['alert_type']) && $_smarty_tpl->tpl_vars['field']->value['alert_type'] && $_smarty_tpl->tpl_vars['field']->value['alert_type'] == 'error') {?>danger <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['alert_type'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['alert_type'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>">
					<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['default_value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

				</div>
				<input type="hidden" name="fields[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['id_custom_field'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
][]" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['default_value'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
			<?php }?>
			</div>
			<div class="clearfix"></div>
		</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</fieldset>
<div class="form-group row ">
	<label class="col-md-3 form-control-label required"></label>
	<div class="col-md-6">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayGDPRConsent','mod'=>'psgdpr','id_module'=>$_smarty_tpl->tpl_vars['id_module']->value),$_smarty_tpl ) );?>

	</div>
</div>

<style>
#registration_fields .radio-inline, #registration_fields .checkbox { display: inline-block; margin-right: 3%}
#registration_fields .radio-inline .radio, #registration_fields .checkbox .checker { display:inline-block; padding-right: 3px; vertical-align: middle}
</style>

</section>
<?php }
}
