{**
*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*         DISCLAIMER   *
* *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
* versions in the future.
* ****************************************************
*
*  @author     BEST-KIT.COM (contact@best-kit.com)
*  @copyright  http://best-kit.com
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="input_fields_wrap">
    <button class="add_field_button btn btn-info">{l s='Add More Fields' mod='bestkit_checkoutfields'}</button>
    <div class="clear_left">
        <input type="text" name="mytext[]">
    </div>
    {foreach $options as $option}
        <div class="clear_left">
            <input type="text" value="{$option.value|escape:'htmlall':'UTF-8'}" name="mytext[]"/>
            <a href="#" class="remove_field">{l s='Remove' mod='bestkit_checkoutfields'}</a>
        </div>
    {/foreach}
</div>





<script type="text/javascript">
    var admin_checkoutfields_controller = "{$link->getAdminLink('AdminBestkitCheckoutFieldsController')}";

    function fieldTypeChange($this) {
        var field_type = $($this).val();
        if (field_type == 'dropdown' || field_type == 'multiple') {
            $('.input_fields_wrap').parents('.form-group:first').show()
        } else {
            $('.input_fields_wrap').parents('.form-group:first').hide()
        }
    }

    $(document).ready(function() {
        fieldTypeChange($('#field_type'));
        $('#field_type').change(function(){
            fieldTypeChange(this);
        })

        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            x++; //text box increment
            $(wrapper).append('<div class="clear_left"><input type="text" name="mytext[]"/><a href="#" class="remove_field">{l s='Remove' mod='bestkit_checkoutfields'}</a></div>'); //add input box
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>

<style type="text/css">
    .clear_left {
        clear:left
    }
    .btn, #submit {
        display: inline-block;
        margin-bottom: 0;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        padding: 5px 15px;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        font-size: 0.80em;
        text-transform: uppercase;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.22);
        border-bottom: 3px solid #000;
    }
    .btn-info {
        color: #ffffff;
        background-color: #5bc0de;
        border-color: #46b8da;
    }
    .btn-info:hover, .btn-info:focus, .btn-info:active {
        color: #ffffff;
        background-color: #39b3d7;
        border-color: #269abc;
    }
    .input_fields_wrap input[type=text] {
        padding: 0px 5px 0px 5px;
        margin: 2px 3px 3px 0px;
        font-size: 0.90em;
        line-height: 0.90em;
        font-weight: normal;
        width: auto;
        float: left;
    }
    .btn:hover, .btn:focus {
        color: #333333;
        text-decoration: none;
    }
    .input_fields_wrap .remove_field {
        font-size: 0.80em;
    }
</style>
