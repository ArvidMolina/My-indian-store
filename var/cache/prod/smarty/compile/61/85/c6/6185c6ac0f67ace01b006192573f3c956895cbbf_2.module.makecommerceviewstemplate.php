<?php
/* Smarty version 3.1.33, created on 2020-07-16 02:14:23
  from 'module:makecommerceviewstemplate' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0f8dcf6fed56_93880762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6185c6ac0f67ace01b006192573f3c956895cbbf' => 
    array (
      0 => 'module:makecommerceviewstemplate',
      1 => 1584379509,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0f8dcf6fed56_93880762 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    var mk_ajax_url = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mk_ajax_url']->value, ENT_QUOTES, 'UTF-8');?>
";
    mk_show_country_code = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_country_code']->value, ENT_QUOTES, 'UTF-8');?>
";
    mk_expanded = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['expanded']->value, ENT_QUOTES, 'UTF-8');?>
";
<?php echo '</script'; ?>
>
<?php if (isset($_smarty_tpl->tpl_vars['widget']->value) && $_smarty_tpl->tpl_vars['widget']->value) {?>
    <div id="mk_widget" <?php if ($_smarty_tpl->tpl_vars['expanded']->value) {?>class="expanded"<?php }?>>
        <div class="row">
            <div class="col-xs-12">
                <div class="payment_module">
                    <?php if (isset($_smarty_tpl->tpl_vars['widget_title']->value) && $_smarty_tpl->tpl_vars['widget_title']->value) {?>
                        <a><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['widget_title']->value, ENT_QUOTES, 'UTF-8');?>
</a>
                    <?php }?>
                    <?php if (!$_smarty_tpl->tpl_vars['expanded']->value) {?><i class="material-icons keyboard arrow down">keyboard_arrow_down</i><?php }?>
                    <div class="payment_method_list">
                        <?php if (isset($_smarty_tpl->tpl_vars['show_country_code']->value) && $_smarty_tpl->tpl_vars['show_country_code']->value) {?>
                            <ul class="flag_mk_select">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
?>
                                    <li class="<?php if ($_smarty_tpl->tpl_vars['country']->value == $_smarty_tpl->tpl_vars['current_country']->value) {?>selected<?php }?>"><a href="#" data-country="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['country']->value, ENT_QUOTES, 'UTF-8');?>
"><img src="../modules/makecommerce/views/img/flags/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['country']->value, ENT_QUOTES, 'UTF-8');?>
.png"></a></li>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['separate_group']->value) && $_smarty_tpl->tpl_vars['separate_group']->value) {?>
                        <!-- <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_total']->value, ENT_QUOTES, 'UTF-8');?>
 * -->
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payment_methods']->value, 'method');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['method']->value) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['method']->value->type == "banklinks" || $_smarty_tpl->tpl_vars['method']->value->type == "other") {?>
                                        <li class="mk_method mk_country-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->country, ENT_QUOTES, 'UTF-8');?>
">
                                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->link, ENT_QUOTES, 'UTF-8');?>
">
                                                <?php if ($_smarty_tpl->tpl_vars['method']->value->img) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->img, ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pay by','mod'=>'makecommerce'),$_smarty_tpl ) );?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->name, ENT_QUOTES, 'UTF-8');?>
" class="logo_size_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_size']->value, ENT_QUOTES, 'UTF-8');?>
"><?php }?>
                                            </a>
                                        </li>
                                    <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payment_methods']->value, 'method');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['method']->value) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['method']->value->type == "cards") {?>
                                        <li class="mk_method mk_country-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->country, ENT_QUOTES, 'UTF-8');?>
">
                                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->link, ENT_QUOTES, 'UTF-8');?>
">
                                                <?php if ($_smarty_tpl->tpl_vars['method']->value->img) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->img, ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pay by','mod'=>'makecommerce'),$_smarty_tpl ) );?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->name, ENT_QUOTES, 'UTF-8');?>
" class="logo_size_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_size']->value, ENT_QUOTES, 'UTF-8');?>
"><?php }?>
                                            </a>
                                        </li>
                                    <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payment_methods']->value, 'method');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['method']->value) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['method']->value->type == "payLater") {?>
                                        <?php if (($_smarty_tpl->tpl_vars['method']->value->min_amount) == 0 || ($_smarty_tpl->tpl_vars['method']->value->min_amount <= $_smarty_tpl->tpl_vars['order_total']->value)) {?>
                                            <?php if (($_smarty_tpl->tpl_vars['method']->value->max_amount == 0) || (($_smarty_tpl->tpl_vars['method']->value->max_amount > 0) && ($_smarty_tpl->tpl_vars['method']->value->max_amount >= $_smarty_tpl->tpl_vars['order_total']->value))) {?>
                                        <li class="mk_method mk_country-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->country, ENT_QUOTES, 'UTF-8');?>
">
                                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->link, ENT_QUOTES, 'UTF-8');?>
">
                                                <?php if ($_smarty_tpl->tpl_vars['method']->value->img) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->img, ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pay by','mod'=>'makecommerce'),$_smarty_tpl ) );?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->name, ENT_QUOTES, 'UTF-8');?>
" class="logo_size_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_size']->value, ENT_QUOTES, 'UTF-8');?>
"><?php }?>
                                            </a>
                                        </li>
                                            <?php }?>
                                        <?php }?>
                                    <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        <?php } else { ?>
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payment_methods']->value, 'method');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['method']->value) {
?>
                                    <li class="mk_method mk_country-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->country, ENT_QUOTES, 'UTF-8');?>
">
                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->link, ENT_QUOTES, 'UTF-8');?>
">
                                            <?php if ($_smarty_tpl->tpl_vars['method']->value->img) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->img, ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pay by','mod'=>'makecommerce'),$_smarty_tpl ) );?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->name, ENT_QUOTES, 'UTF-8');?>
" class="logo_size_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_size']->value, ENT_QUOTES, 'UTF-8');?>
"><?php }?>
                                        </a>
                                    </li>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div id="mk_list">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payment_methods']->value, 'method');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['method']->value) {
?>
            <div class="row">
                <div class="col-xs-12">
                    <p class="payment_module">
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->link, ENT_QUOTES, 'UTF-8');?>
">
                            <?php if ($_smarty_tpl->tpl_vars['method']->value->img) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->img, ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pay by','mod'=>'makecommerce'),$_smarty_tpl ) );?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->name, ENT_QUOTES, 'UTF-8');?>
" class="logo_size_s"><?php }?>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pay by','mod'=>'makecommerce'),$_smarty_tpl ) );?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->name, ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['method']->value->country != 'all' && $_smarty_tpl->tpl_vars['show_country_code']->value) {?><span>(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['method']->value->country, ENT_QUOTES, 'UTF-8');?>
)</span> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'banklink','mod'=>'makecommerce'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'card','mod'=>'makecommerce'),$_smarty_tpl ) );
}?>
                        </a>
                    </p>
                </div>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
<?php }
}
}
