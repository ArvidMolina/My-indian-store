{*
* Registration Fields
*
* NOTICE OF LICENSE
*
* You are not authorized to modify, copy or redistribute this file.
* Permissions are reserved by FME Modules.
*
*  @author    FME Modules
*  @copyright 2018 FME Modules All right reserved
*  @license   FMM Modules
*  @package   Registration Fields
*}
{if $version < 1.6}<div class="separation"></div>{/if}<div class="panel col-lg-12"><h2 class="panel-heading"><img width="16" src="{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}modules/registrationfields/views/img/info.png"/>&nbsp;{if $REGISTRATION_FIELDS_HEADING}{$REGISTRATION_FIELDS_HEADING|escape:'htmlall':'UTF-8'}{else}{l s='Registration Fields' mod='registrationfields' js=1}{/if}</h2>{assign var='root_dir' value=($smarty.const._PS_ROOT_DIR_|cat:'/')}<div class="form-horizontal"><div {if $version >= 1.6}class="row"{/if}>{foreach from=$groupedFields item=field}<div class="clearfix"></div><label class="control-label col-lg-4">{$field.field_name|escape:'htmlall':'UTF-8'}&nbsp;:</label><div class="col-lg-8"><strong><p class="form-control-static">{if $field.field_type == 'image' AND $field.value AND file_exists($field.value)}{assign var='field_value' value=$field.value|replace:$root_dir:''}<img class="imgm img-thumbnail" src="{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}{$field_value|escape:'htmlall':'UTF-8'}" width="32px">{else if $field.field_type == 'attachment' AND $field.value AND file_exists($field.value)}<a class="btn btn-default button" href="{$downloadLink|escape:'htmlall':'UTF-8'}&downloadFile&l={base64_encode($field.value)|escape:'htmlall':'UTF-8'}" target="_blank"><img src="{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}modules/registrationfields/views/img/download.png" alt="{l s='Download Attachment' mod='registrationfields'}" title="{l s='Download Attachment' mod='registrationfields'}"/></a>{else}{Tools::htmlentitiesUTF8($obj->getFormatedValue(($field))|escape:'htmlall':'UTF-8')}{/if}</p></strong></div>{/foreach}</div></div></div><div class="clearfix"></div><div class="separation"></div>
