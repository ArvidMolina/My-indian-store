{*{block name='breadcrumb'}
    {include file='_partials/breadcrumb.tpl'}
{/block}*}
{extends file=$layout}
{block name = 'content'}
     <section id="main">
<style>
    {$kb_custom_css}
</style>
<div class="box page-content card card-block" id="identity">
    <form action="{$link->getModuleLink('kbcustomfield','kbadditionalinfo')|escape:'quotes':'UTF-8'}" method="post" class="kb_custom_additional_front" enctype="multipart/form-data">

        <p class="required">
            <sup>*</sup>{l s='Required field' mod='kbcustomfield'}
        </p>
{foreach $kb_available_section as $key => $section}
        <div class="kb_custom_field_block">
            {foreach $kb_available_field as $kbfield}
                {if ($kbfield['type'] == 'text') && ($section['id_section'] == $kbfield['id_section'])}
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label {if $kbfield['required']}required{/if}" for="{$kbfield['field_name']}">{$kbfield['label']}</label>
                        <div class="col-md-6">
                        <input type="{if $kbfield['validation'] == 'isEmail'}email{else}text{/if}" {if $kbfield['placeholder'] != ''}placeholder="{$kbfield['placeholder']}"{/if} 
                               name='{$kbfield['field_name']}' id="{$kbfield['html_id']}" class="kbfield {$kbfield['html_class']} {if $kbfield['required']}is_required{/if} {if $kbfield['validation'] != ''}validate{/if}  form-control"
                               {if $kbfield['validation'] != ''} data-validate="{$kbfield['validation']}"{/if} {if ($kbfield['max_length'] != '') && ($kbfield['max_length'] > 0)} maxlength="{$kbfield['max_length']}"{/if} {if $kbfield['min_length'] != ''}minlength="{$kbfield['min_length']}"{/if}
                               value="{if isset($kbfield['customer_value'])}{$kbfield['customer_value']}{/if}" {if $kbfield['editable'] != 1} disabled{/if}
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
                            <div class="clearfix">
                                <label>{$kbfield['label']|escape:'htmlall':'UTF-8'}</label></br>
                                {if $kbfield['value'] != ''}
                                    {foreach $kbfield['value']|json_decode:1 as $field_value}
                                        <div class="radio-inline">
                                            <label for="{$kbfield['field_name']|escape:'htmlall':'UTF-8'}" class="top">
                                                <input type="radio" name="{$kbfield['field_name']|escape:'htmlall':'UTF-8'}" id="{$kbfield['html_id']|escape:'htmlall':'UTF-8'}" class="kbfield {$kbfield['html_class']|escape:'htmlall':'UTF-8'} {if $kbfield['required']}is_required{/if}" value="{$field_value['option_value']|escape:'htmlall':'UTF-8'}" {if $kbfield['editable'] != 1} disabled{/if}
                                                       {if isset($kbfield['customer_value'])}
                                                           {if is_array($kbfield['customer_value']|json_decode:1)}
                                                               {if in_array($field_value['option_value'],$kbfield['customer_value']|json_decode:1)}
                                                                   checked
                                                               {/if}
                                                           {else if $kbfield['customer_value']|json_decode:1 == $field_value['option_value']}
                                                               checked
                                                           {/if}
                                                       {/if}  />
                                                {$field_value['option_label']|escape:'htmlall':'UTF-8'}
                                            </label>
                                        </div>
                                    {/foreach}
                                {/if}
                                {if $kbfield['error_msg'] != ''}<span class="error_message" style="display:none;">{$kbfield['error_msg']|escape:'htmlall':'UTF-8'}</span>{/if}
                                {if $kbfield['description'] != ''}</br><span class="form-info">({$kbfield['description']|escape:'htmlall':'UTF-8'})</span>{/if}</br>
                            </div>
                        {/if}
                    {/foreach}
                </div>
                <script>
                    {if $section['placement'] == 'top'}
                        $('.kb_custom_field_block').prepend($('#kb_custom_section_{$key|escape:'htmlall':'UTF-8'}'));
                    {/if}
                </script>
            {/foreach}
        </div>
        {/foreach}
        <div class="form-group">
            <button type="submit" name="submitKbAdditional" class="btn btn-primary form-control-submit pull-xs-right">
                <span>{l s='Save' mod='kbcustomfield'}<i class="icon-chevron-right right"></i></span>
            </button>
        </div>
    </form>
</div>
<script>
    var kb_front_controller = "{$kb_front_controller|escape:'quotes':'UTF-8'}";
    var kb_element_error = "{l s='Field is not valid' mod='kbcustomfield'}";
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
</script>
     </section>
{/block}

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