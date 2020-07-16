{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer tohttp://www.prestashop.com for more information.
* We offer the best and most useful modules PrestaShop and modifications for your online store.
*
* @category  PrestaShop Module
* @author    knowband.com <support@knowband.com>
* @copyright 2017 Knowband
* @license   see file: LICENSE.txt
*
* Description
*
* Admin tpl file
*}
<script type="text/javascript">
    
    var thumb = '{$thumbnail}';{*Variable contains url, escape not required*}
    var banner = '{$banner}';{*Variable contains url, escape not required*}
    var noimagelogo = '{$noimagelogo}';{*Variable contains url, escape not required*}
    var noimagebanner = '{$noimagebanner}';{*Variable contains url, escape not required*}
    var config_link = '{$config_link}';{*Variable contains url, escape not required*}
    var pretsa_cat_error = '{l s="Please select Store Category." mod="facebookstore"}';
    var pretsa_menu_error = '{l s="Please select atleast one menu item." mod="facebookstore"}';
    var confirmation_text_logo = '{l s="Do you want to reset logo?" mod="facebookstore"}';
    var confirmation_text_banner = '{l s="Do you want to reset Banner?" mod="facebookstore"}';
    var pretsa_pro_error = '{l s="Please select atleast one product." mod="facebookstore"}';
    
</script>

{if $thumbnail == ""}
    <img id="vss-thumbnail" class="vss-thumbnail-no-image" height="100" src="{$thumbnail}"/>{*Variable contains url, escape not required*}
{/if}
{if $thumbnail != ""}
    <img id="vss-thumbnail" class="vss-thumbnail-no-image" height="100" src="{$thumbnail}"/>{*Variable contains url, escape not required*}
{/if}
<span id='vss-clear-thumb-image'>
    <button id="clear-thumb" type="button" name="ClearAttachment" class="btn btn-default">
        <i class="icon-trash vss-icon"></i>{l s='Clear Image' mod='facebookstore'}</button>
</span>
<span id='vss-remove-thumb-image'>
    <button id="remove-thumb" type="button" name="removeAttachments" class="btn btn-default">
        <i class="icon-trash vss-icon"></i>{l s='Reset Logo' mod='facebookstore'}</button>
</span>
<span id='vss-clear-thumb-image1'>
    <button id="clear-thumb1" type="button" name="ClearAttachment1" class="btn btn-default">
        <i class="icon-trash vss-icon"></i>{l s='Clear Image' mod='facebookstore'}</button>
</span>
<span id='vss-remove-thumb-image1'>
    <button id="remove-thumb1" type="button" name="removeAttachments1" class="btn btn-default">
        <i class="icon-trash vss-icon"></i>{l s='Reset Banner' mod='facebookstore'}</button>
</span>
<span id='vss-reset-color-span'>
    <button id="vss-reset-color" type="button" name="resetcolor" class="btn btn-default">
        {l s='Reset Color' mod='facebookstore'}</button>
</span>
<style>
.subject-info-box-1,
.subject-info-box-2 {
    float: left;
    width: 45%;
    
    select {
        height: 300px;
        padding: 0;

        option {
            padding: 4px 10px 4px 10px;
        }

        option:hover {
            background: #EEEEEE;
        }
    }
}

.subject-info-arrows {
    float: left;
    width: 10%;

    input {
        width: 70%;
        margin-bottom: 5px;
    }
}
#lstBox1 {
    height: 200px;
}
#lstBox2 {
    height: 200px;
}
</style>
<div class="menu-item">
<div class="subject-info-box-1">
  <select multiple="multiple" id='lstBox1' class="form-control">
    {$allmenuitems}{*Variable contains html content, escape not required*}
    {$othermenuitems}   {*Variable contains html content, escape not required*}
  </select>
</div>
<div class="subject-info-arrows text-center">
  <input type="button" id="btnAllRight" value=">>" class="btn btn-default" /><br />
  <input type="button" id="btnRight" value=">" class="btn btn-default" /><br />
  <input type="button" id="btnLeft" value="<" class="btn btn-default" /><br />
  <input type="button" id="btnAllLeft" value="<<" class="btn btn-default" />
</div>
<div class="subject-info-box-2">
  <select multiple="multiple" id='lstBox2' class="form-control">
      {$selectedmenuitems}{*Variable contains html content, escape not required*}
  </select>
</div>
<div class="clearfix"></div>
</div>

{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer tohttp://www.prestashop.com for more information.
* We offer the best and most useful modules PrestaShop and modifications for your online store.
*
* @category  PrestaShop Module
* @author    knowband.com <support@knowband.com>
* @copyright 2016 Knowband
* @license   see file: LICENSE.txt
*
* Description
*
* Admin tpl file
*}