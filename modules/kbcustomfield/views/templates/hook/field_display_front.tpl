<style>
    {$kb_custom_css nofilter}
</style>
<div class="kb_custom_field_block">
    <div >  
          {assign var='field_counter' value=0}
          
        {foreach $kb_available_section as $key => $section}
            <div id="{if $section['placement'] == 'top'}kbdisplaytop-{$key}{/if}" class="kbcustomfieldblock">  
                <div class="form-group row">
                <div class="col-md-12">
                    <h3  class="page-subheading" style="padding-bottom: 6px;padding-left: 6px;border-bottom: 1px solid #a9a9a9;margin-left: 2px;margin-right: 2px;text-transform: uppercase;color: #414141;">
                        {$section['label']}
                    </h3>
                </div>
            </div>     
        {foreach $kb_available_field as $kbfield}
            {if ($kbfield['type'] == 'text') && ($section['id_section'] == $kbfield['id_section'])}
                <div class="form-group row">
                        <label class="col-md-3 form-control-label {if $kbfield['required']}required{/if}" for="{$kbfield['field_name']}">{$kbfield['label']}</label>
                        <div class="col-md-6">
                        <input type="{if $kbfield['validation'] == 'isEmail'}email{else}text{/if}" {if $kbfield['placeholder'] != ''}placeholder="{$kbfield['placeholder']}"{/if} 
                               name='{$kbfield['field_name']}' id="{$kbfield['html_id']}" class="kbfield {$kbfield['html_class']} {if $kbfield['required']}is_required{/if} {if $kbfield['validation'] != ''}validate{/if}  form-control"
                               {if $kbfield['validation'] != ''} data-validate="{$kbfield['validation']}"{/if} {if ($kbfield['max_length'] != '') && ($kbfield['max_length'] > 0)} maxlength="{$kbfield['max_length']}"{/if} {if $kbfield['min_length'] != ''}minlength="{$kbfield['min_length']}"{/if}
                               value="{if isset($kbfield['customer_value'])}{$kbfield['customer_value']}{/if}"
                               />
                        {if $kbfield['error_msg'] != ''}<span class="error_message" style="display:none;">{$kbfield['error_msg']}</span>{/if}
                        </div>
                         <div class="col-md-3 form-control-comment">
                         {if $kbfield['description'] != ''}<span class="form-info">({$kbfield['description']})</span>{/if}
                     </div>
                        <input type="hidden" name="kb_register_newsletter" value="{if $kbfield['register_for_newsletter']}1{else}0{/if}"/>
                    </div>
            {/if}
            {if ($kbfield['type'] == 'radio') && ($section['id_section'] == $kbfield['id_section'])}
                <div class="clearfix row">
                         <label class="col-md-3 form-control-label {if $kbfield['required']}required{/if}">{$kbfield['label']}</label></br>
                         <div class="col-md-6">    
                             <div class="radio_kb_validate">
                        {if $kbfield['value'] != ''}
                            {foreach $kbfield['value']|json_decode:1 as $field_value}
                                    <label for="{$kbfield['field_name']}" class="radio-inline">
                                        <span class="custom-radio">
                                        <input type="radio" name="{$kbfield['field_name']}" id="{$kbfield['html_id']}" class="kbfield {$kbfield['html_class']} {if $kbfield['required']}is_required{/if}" value="{$field_value['option_value']}" 
                                             {if isset($kbfield['default_value'])}
                                                   {if $kbfield['default_value'] != ""}
                                                       {if isset($kbfield['default_value'][0]) && isset($kbfield['default_value'][0]['option_value'])}
                                                           {if $kbfield['default_value'][0]['option_value'] == $field_value['option_value']}
                                                               checked
                                                           {/if}
                                                       {/if}
                                                   {/if}
                                               {/if}  /><span></span>
                                    </span>
                                        {$field_value['option_label']}
                                    </label>
                            {/foreach}
                        {/if}
                                     {if $kbfield['error_msg'] != ''}<span class="error_message" style="display:none;">{$kbfield['error_msg']}</span>{/if}
                         </div>
                         </div>
                       <div class="col-md-3 form-control-comment">
                         {if $kbfield['description'] != ''}<span class="form-info">({$kbfield['description']})</span>{/if}
                     </div>
                    </div>
            {/if}

        {/foreach}
        </div>
        <script>
            {if $section['placement'] == 'top'}
                $('.account_creation').before($('#kb_custom_section_front_{$key|escape:'htmlall':'UTF-8'}'));
            {/if}
        </script>
        {/foreach}
    </div>
</div>
    <script>
        var submit_account_btn = 1;
        var kb_not_valid = "{l s='Field is not valid' mod='kbcustomfield'}";
        var file_not_empty = "{l s='File cannot be empty' mod='kbcustomfield'}";
        var field_not_empty = "{l s='Field cannot be empty' mod='kbcustomfield'}";
        var kb_empty_field = "{l s='Field cannot be empty.' mod='kbcustomfield'}";
        var kb_number_field = "{l s='You can enter only numbers.' mod='kbcustomfield'}";
        var kb_positive_number = "{l s='Number should be greater than 0.' mod='kbcustomfield'}";
        var kb_maxchar_field = "{l s='Field cannot be greater than # characters.' mod='kbcustomfield'}";
        var kb_minchar_field =  "{l s='Field cannot be less than # character(s).' mod='kbcustomfield'}";
        var kb_empty_email =  "{l s='Please enter Email.' mod='kbcustomfield'}";
        var kb_validate_email =  "{l s='Please enter a valid Email.' mod='kbcustomfield'}";
        var kb_max_email =  "{l s='Email cannot be greater than # characters.' mod='kbcustomfield'}";
        var kb_script = "{l s='Script tags are not allowed.' mod='kbcustomfield'}";
        var kb_style="{l s='Style tags are not allowed.' mod='kbcustomfield'}";
        var kb_iframe =  "{l s='Iframe tags are not allowed.' mod='kbcustomfield'}";
        var kb_html_tags =  "{l s='Field should not contain HTML tags.' mod='kbcustomfield'}";
        var kb_invalid_date = "{l s='Invalid date format.' mod='kbcustomfield'}";
        var file_format_error = "{l s='File is not in supported format' mod='kbcustomfield'}";
    </script>

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
*}