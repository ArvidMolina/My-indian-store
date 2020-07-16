
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
{block name="defaultForm"}
    <script>
        var config_link = 'index.php?controller=AdminKbFacebookConfigure';
    </script>

    {if isset($smarty.get.addkb_facebook_profiles) || isset($smarty.get.id_kb_facebook_profiles)}
        <div class="panel">                      
            <div class='panel-heading'>
                {l s='Facebook App Configuration' mod='facebookstore'}
            </div>
            <div class='row'>
                <p>1. <b>{l s='Click here to see user manual' mod='facebookstore'}</b> - <a target="_blank" href="{$usermanual_link|escape:'htmlall':'UTF-8'}">{$usermanual_link|escape:'htmlall':'UTF-8'}</a></p>
                <p>2. <b>{l s='Click here to see your Facebook page' mod='facebookstore'}</b> - <a target="_blank" href="{$front_module_url_link|escape:'htmlall':'UTF-8'}">{$front_module_url_link|escape:'htmlall':'UTF-8'}</a></p>
                <p>3. <b>{l s='Click here to add custom tab in your Facebook page' mod='facebookstore'}</b> - <a target="_blank" href="{$fbpage_tab_url|escape:'htmlall':'UTF-8'}">{$fbpage_tab_url|escape:'htmlall':'UTF-8'}</a></p>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="panel">         
            <div class="config-steps">
                <div class="stepconfig col-md-offset-3">
                    <div class="stepconfig-row setup-panel">
                        <div class="stepconfig-step">
                            <a href="#" type="button" class="btn btn-default btn-primary" id="step1" style="
                               width: 30px;
                               height: 30px;
                               text-align: center;
                               padding: 6px 0;
                               font-size: 12px;
                               line-height: 1.428571429;
                               border-radius: 15px;
                               ">1</a>
                            <p>{l s='Configuration' mod='facebookstore'}</p>
                        </div>
                        <div class="stepconfig-step">
                            <a href="#" type="button" class="btn btn-default btn-primary"  id="step2" style="
                               width: 30px;
                               height: 30px;
                               text-align: center;
                               padding: 6px 0;
                               font-size: 12px;
                               line-height: 1.428571429;
                               border-radius: 15px;
                               opacity:1;
                               ">2</a>
                            <p>{l s='Update Profile' mod='facebookstore'}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom:20px;">
            <div id="kb_config" style="width:15%;float:right;margin-right:10px;margin-left:10px;" class="btn btn-warning action-btn">{l s='Configuration' mod='facebookstore'}</div>
            <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
    {else}
        <div class="panel">         
            <div class="config-steps">
                <div class="stepconfig col-md-offset-3">
                    <div class="stepconfig-row setup-panel">
                        <div class="stepconfig-step">
                            <a href="#" type="button" class="btn btn-default btn-primary" id="step1" style="
                               width: 30px;
                               height: 30px;
                               text-align: center;
                               padding: 6px 0;
                               font-size: 12px;
                               line-height: 1.428571429;
                               border-radius: 15px;
                               ">1</a>
                            <p>{l s='Configuration' mod='facebookstore'}</p>
                        </div>
                        <div class="stepconfig-step">
                            <a href="#" type="button" class="btn btn-default btn-primary"  id="step2" style="
                               width: 30px;
                               height: 30px;
                               text-align: center;
                               padding: 6px 0;
                               font-size: 12px;
                               line-height: 1.428571429;
                               border-radius: 15px;
                               opacity:1;
                               ">2</a>
                            <p>{l s='Update' mod='facebookstore'}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom:20px;">
            <div id="kb_config_list" style="width:15%;float:right;margin-right:10px;margin-left:10px;" class="btn btn-warning action-btn">{l s='Configuration' mod='facebookstore'}</div>
            <div style="clear:both"></div>
        </div>
    {/if}
{/block}