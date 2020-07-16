<?php
/* Smarty version 3.1.33, created on 2020-07-16 11:24:39
  from '/home/myindian/public_html/modules/lgcookieslaw/views/templates/hook/cookieslaw_header_code.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f100ec7c9b543_95546597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3c6e1d165591075e17bf6c525db37b67ed78f28' => 
    array (
      0 => '/home/myindian/public_html/modules/lgcookieslaw/views/templates/hook/cookieslaw_header_code.tpl',
      1 => 1584378775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f100ec7c9b543_95546597 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    function closeinfo(accept)
    {
        var banners = document.getElementsByClassName("lgcookieslaw_banner");
        if( banners ) {
            for (var i = 0; i < banners.length; i++) {
                banners[i].style.display = 'none';
            }
        }

        if (typeof accept != 'undefined' && accept == true) {
            setCookie("<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['nombre_cookie']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
", 1, <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tiempo_cookie']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
);
        }
    }

    function checkLgCookie()
    {
        return document.cookie.match(/^(.*;)?\s*<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['nombre_cookie']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
\s*=\s*[^;]+(.*)?$/);
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    var lgbtnclick = function(){
        var buttons = document.getElementsByClassName("lgcookieslaw_btn_accept");
        if( buttons != null ) {
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].addEventListener("click", function () {
                    closeinfo(true);
                    <?php if ($_smarty_tpl->tpl_vars['lgcookieslaw_reload']->value) {?>
                    location.reload(true);
                    <?php }?>
                    
                });
            }
        }
    };

    window.addEventListener('load',function(){
        if( checkLgCookie() ) {
            closeinfo();
        } else {
            
            <?php if ($_smarty_tpl->tpl_vars['hidden']->value) {?>
            var banners = document.getElementsByClassName("lgcookieslaw_banner");
            if( banners ) {
                for (var i = 0; i < banners.length; i++) {
                    banners[i].style.display = "table";
                }
            }
            <?php }?>
            
            lgbtnclick();
        }
    });

<?php echo '</script'; ?>
>
<?php }
}
