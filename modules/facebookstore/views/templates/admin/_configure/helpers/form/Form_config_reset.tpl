
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
{extends file="helpers/form/form.tpl"}
{block name="defaultForm"}
<script>
    var fb_config_reset_action ="{$action_config_reset|escape:'quotes':'UTF-8'}";
    var action_config = "{$action_config|escape:'quotes':'UTF-8'}";
    $(document).ready(function(){
        $('.tab-content').hide();
    });
    
</script>

<div class='row'>
     {$form}{*Variable contains HTML content, escape not required*}

</div>
<div id="kb_buy_link" style="text-align: center; padding: 25px; height: 140px; background: #ffffff;">
    <div><span style="font-size:18px;">{l s='You are using the Free version of the module. Click here to buy the Paid version which is having the advanced features. ' mod='facebookstore'}</span>
        <br>
        <br>
        <a target="_blank" href="https://www.knowband.com/prestashop-fb-store"><span style="margin-left:30%;max-width:40% !important;font-size:18px;" class="btn btn-block btn-success action-btn">{l s='Buy Now' mod='facebookstore'}</span></a><div>
        </div>
    </div>
</div>
{/block}
