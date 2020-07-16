<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:13:56
  from '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/addresses.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8db403ea03_51510065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3c1c86c01f99cb0edd89d80c7b0a6d9c5a2a494' => 
    array (
      0 => '/home/myindian/public_html/modules/onepagecheckoutps/views/templates/front/addresses.tpl',
      1 => 1584378778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f8db403ea03_51510065 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="address_card_new" class="address_card col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container_card">
        <div id="address_card_new_content">
            <span>
                <i class="fa-pts fa-pts-plus"></i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new address','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

            </span>
        </div>
    </div>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['addresses']->value)) {?>
    <?php if (count($_smarty_tpl->tpl_vars['addresses']->value) > 4) {?>
        <div id="search_addresses" class="col-md-12 col-xs-12">
            <input type="text" class="search_address form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search your address','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>
" />
            <i class="fa-pts fa-pts-search icon_search_address"></i>
        </div>
    <?php }?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['addresses']->value, 'address', false, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value => $_smarty_tpl->tpl_vars['address']->value) {
?>
    <div id="address_card_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['address']->value['id_address']), ENT_QUOTES, 'UTF-8');?>
" data-id-address="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['address']->value['id_address']), ENT_QUOTES, 'UTF-8');?>
" class="address_card col-xs-12 col-md-12 <?php if (count($_smarty_tpl->tpl_vars['addresses']->value) > 1) {?>col-lg-6<?php } else { ?>col-lg-12<?php }?>">
        <div class="container_card <?php if ($_smarty_tpl->tpl_vars['address']->value['id_address'] == $_smarty_tpl->tpl_vars['id_address']->value) {?>selected alert alert-info<?php }?>">
            <div class="header_card">
                <span>
                    <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['alias'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                </span>
                <?php if ($_smarty_tpl->tpl_vars['id_address']->value != 0) {?>
                    <?php if ($_smarty_tpl->tpl_vars['address']->value['id_address'] == $_smarty_tpl->tpl_vars['id_address']->value) {?>
                        <i class="fa-pts fa-pts-check-circle-o"></i>
                    <?php } else { ?>
                        <i class="fa-pts fa-pts-circle-thin"></i>
                    <?php }?>
                <?php }?>
            </div>
            <div class="content_card">
                <ul>
                    <li class="full_name" style='font-weight: bold;'><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['firstname'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['lastname'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</li>
                    <?php if ($_smarty_tpl->tpl_vars['address']->value['company'] != '') {?>
                    <li class="company"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['company'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</li>
                    <?php }?>
                    <li class="address1"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['address1'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</li>
                    <li class="city_state_postcode"><?php if ($_smarty_tpl->tpl_vars['address']->value['city'] != '.') {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['city'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
, <?php }
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['state'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['address']->value['postcode'] != 0) {?>(<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['postcode'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
)<?php }?></li>
                    <li class="country"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['country'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</li>
                    <li class="phone">
                        <?php if ($_smarty_tpl->tpl_vars['address']->value['phone'] != '') {?>
                            <i class="fa-pts fa-pts-phone" style="font-size: 15px;"></i>&nbsp;<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['phone'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['address']->value['phone_mobile'] != '') {?>
                            <?php if ($_smarty_tpl->tpl_vars['address']->value['phone'] != '') {?>&nbsp;/&nbsp;<?php }?>
                            <i class="fa-pts fa-pts-mobile" style="font-size: 15px;"></i>&nbsp;<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['address']->value['phone_mobile'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                        <?php }?>
                    </li>
                </ul>
            </div>
            <div class="footer_card">
                <button type="button" data-id-address="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['address']->value['id_address']), ENT_QUOTES, 'UTF-8');?>
" class="edit_address btn btn-sm btn-default <?php if ($_smarty_tpl->tpl_vars['address']->value['id_address'] == $_smarty_tpl->tpl_vars['id_address']->value) {?>btn-block<?php }?>">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                </button>
                <?php if ($_smarty_tpl->tpl_vars['address']->value['id_address'] != $_smarty_tpl->tpl_vars['id_address']->value) {?>
                    <button type="button" data-id-address="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['address']->value['id_address']), ENT_QUOTES, 'UTF-8');?>
" class="delete_address btn btn-sm btn-default pull-right">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                    </button>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['id_address']->value != 0) {?>
                    <?php if ($_smarty_tpl->tpl_vars['address']->value['id_address'] != $_smarty_tpl->tpl_vars['id_address']->value) {?>
                        <button type="button" data-id-address="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['address']->value['id_address']), ENT_QUOTES, 'UTF-8');?>
" style="margin-top: 6px;padding: 2px;text-transform: capitalize;" class="choose_address btn btn-sm btn-primary btn-block">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                        </button>
                    <?php } else { ?>
                        <button type="button" style="margin-top: 6px;padding: 2px;text-transform: capitalize;" class="selected_address btn btn-sm btn-primary btn-block disabled">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Selected','mod'=>'onepagecheckoutps'),$_smarty_tpl ) );?>

                        </button>
                    <?php }?>
                <?php }?>
            </div>
        </div>
    </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
