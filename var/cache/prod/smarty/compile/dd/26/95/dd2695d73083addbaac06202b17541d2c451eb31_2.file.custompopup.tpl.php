<?php
/* Smarty version 3.1.33, created on 2020-07-16 11:15:38
  from '/home/myindian/public_html/modules/custompopup/views/templates/hook/custompopup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f100caa12ad69_06611899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd2695d73083addbaac06202b17541d2c451eb31' => 
    array (
      0 => '/home/myindian/public_html/modules/custompopup/views/templates/hook/custompopup.tpl',
      1 => 1585936667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f100caa12ad69_06611899 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['pc_popup_enabled']->value) {?>
    
        <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_css_tingle']->value, ENT_QUOTES, 'UTF-8');?>
">
        <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_css_popup']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_js_tingle']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_js_cookie']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            if (typeof id_lang === 'undefined') {
                var id_lang = <?php echo htmlspecialchars(Context::getContext()->language->id, ENT_QUOTES, 'UTF-8');?>
;
            }

            <?php if (!$_smarty_tpl->tpl_vars['pc_popup_cookie']->value && $_smarty_tpl->tpl_vars['pc_popup_cookie']->value == 0) {?>
                prestacraftDeleteCookie('responsive_popup_<?php echo htmlspecialchars(Context::getContext()->shop->id, ENT_QUOTES, 'UTF-8');?>
');
            <?php }?>

            if (prestacraftGetCookie('responsive_popup_<?php echo htmlspecialchars(Context::getContext()->shop->id, ENT_QUOTES, 'UTF-8');?>
') != 'yes') {

                <?php if ($_smarty_tpl->tpl_vars['pc_popup_delay']->value > 0) {?>
                setTimeout(function(){
                <?php }?>
                    var modal = new tingle.modal({
                        footer: true,
                        stickyFooter: false,
                        closeMethods: [<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['pc_closetype']->value, ENT_QUOTES);?>
],
                        closeLabel: "Close",
                        cssClass: ['custom-class-1', 'custom-class-2'],
                        onOpen: function() {
                        },
                        onClose: function() {
                            <?php if ($_smarty_tpl->tpl_vars['pc_popup_cookie']->value && $_smarty_tpl->tpl_vars['pc_popup_cookie']->value > 0) {?>
                            prestacraftSetCookie('responsive_popup_<?php echo htmlspecialchars(Context::getContext()->shop->id, ENT_QUOTES, 'UTF-8');?>
',
                                'yes', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_popup_cookie']->value*0.000694, ENT_QUOTES, 'UTF-8');?>
);
                            <?php }?>
                        },
                        beforeClose: function() {
                            return true; // close the modal
                        }
                    });

                    var content = "<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['pc_content_'.(Context::getContext()->language->id)]->value, ENT_QUOTES);?>
";
                    // set content
                    modal.setContent(content);

                    // close button
                    modal.addFooterBtn('x', 'prestacraft-close', function() {
                        modal.close();
                    });

                    <?php if ($_smarty_tpl->tpl_vars['pc_footer']->value) {?>
                        <?php if ($_smarty_tpl->tpl_vars['pc_footer_type']->value == 'button' || $_smarty_tpl->tpl_vars['pc_footer_type']->value == 'text_buttons') {?>
                            <?php if ($_smarty_tpl->tpl_vars['pc_footer_button1_enabled']->value) {?>
                                modal.addFooterBtn('<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['pc_button1_text_'.(Context::getContext()->language->id)]->value, ENT_QUOTES);?>
', 'tingle-btn prestacraft-button1', function() {
                                    <?php if ($_smarty_tpl->tpl_vars['pc_button1_act_close']->value) {?>
                                        modal.close();
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['pc_button1_url_'.(Context::getContext()->language->id)]->value) {?>
                                        <?php if ($_smarty_tpl->tpl_vars['pc_button1_new_tab']->value) {?>
                                            window.open(
                                                '<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['pc_button1_url_'.(Context::getContext()->language->id)]->value, ENT_QUOTES);?>
',
                                                '_blank'
                                            );
                                        <?php } else { ?>
                                            window.location.href = "<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['pc_button1_url_'.(Context::getContext()->language->id)]->value, ENT_QUOTES);?>
";
                                        <?php }?>
                                    <?php }?>
                                });
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['pc_footer_button2_enabled']->value) {?>
                                modal.addFooterBtn('<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['pc_button2_text_'.(Context::getContext()->language->id)]->value, ENT_QUOTES);?>
', 'tingle-btn prestacraft-button2', function() {
                                    <?php if ($_smarty_tpl->tpl_vars['pc_button2_act_close']->value) {?>
                                        modal.close();
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['pc_button2_url_'.(Context::getContext()->language->id)]->value) {?>
                                        <?php if ($_smarty_tpl->tpl_vars['pc_button2_new_tab']->value) {?>
                                            window.open(
                                                '<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['pc_button2_url_'.(Context::getContext()->language->id)]->value, ENT_QUOTES);?>
',
                                                '_blank'
                                            );
                                        <?php } else { ?>
                                            window.location.href = "<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['pc_button2_url_'.(Context::getContext()->language->id)]->value, ENT_QUOTES);?>
";
                                        <?php }?>
                                    <?php }?>
                                });
                            <?php }?>
                        <?php }?>


                        <?php if ($_smarty_tpl->tpl_vars['pc_footer_type']->value == 'text' || $_smarty_tpl->tpl_vars['pc_footer_type']->value == 'text_buttons') {?>
                        modal.addFooterBtn('<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['pc_footer_text_'.(Context::getContext()->language->id)]->value, ENT_QUOTES);?>
', 'prestacraft-special-text', function() {
                        });
                        <?php }?>
                    <?php }?>

                    modal.open();
                    <?php if ($_smarty_tpl->tpl_vars['pc_popup_delay']->value > 0) {?>
                },  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_popup_delay']->value*1000, ENT_QUOTES, 'UTF-8');?>
);
                <?php }?>
            }
        <?php echo '</script'; ?>
>
    

    
        <style>
            .tingle-modal-box__content {
                background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_popup_color']->value, ENT_QUOTES, 'UTF-8');?>
 !important;
                padding: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_padding']->value, ENT_QUOTES, 'UTF-8');?>
px;
                padding-top: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_top_padding']->value, ENT_QUOTES, 'UTF-8');?>
px;
            }
            <?php if ($_smarty_tpl->tpl_vars['pc_back_color']->value) {?>
            .tingle-modal--visible {
                background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_back_color']->value, ENT_QUOTES, 'UTF-8');?>
;
            }
            <?php }?>
            .prestacraft-close:hover {
                color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_button_hover_color']->value, ENT_QUOTES, 'UTF-8');?>
;
            }
            .prestacraft-close {
                color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_button_color']->value, ENT_QUOTES, 'UTF-8');?>
;
                top: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_button_top_padding']->value, ENT_QUOTES, 'UTF-8');?>
px;
                font-size: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_button_size']->value, ENT_QUOTES, 'UTF-8');?>
px !important;
            }

            <?php if (!$_smarty_tpl->tpl_vars['pc_footer']->value) {?>
            .tingle-modal-box__footer {
                height: 1px;
                padding: 0;
                background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_popup_color']->value, ENT_QUOTES, 'UTF-8');?>
 !important;
            }
            <?php } else { ?>
            .tingle-modal-box__footer {
                background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_footer_background']->value, ENT_QUOTES, 'UTF-8');?>
;
                text-align: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_footer_align']->value, ENT_QUOTES, 'UTF-8');?>
;
            }
            <?php }?>

            .prestacraft-special-text {
                text-align: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_footer_align']->value, ENT_QUOTES, 'UTF-8');?>
;
                <?php if ($_smarty_tpl->tpl_vars['pc_footer_type']->value == 'text_buttons') {?>
                margin-top: 20px;
                <?php }?>
            }

            .prestacraft-button1 {
                background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_footer_button1_background']->value, ENT_QUOTES, 'UTF-8');?>
;
            }

            .prestacraft-button2 {
                background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pc_footer_button2_background']->value, ENT_QUOTES, 'UTF-8');?>
;
            }
        </style>
    
<?php }
}
}
