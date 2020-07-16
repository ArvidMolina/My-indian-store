{*
* Registration
*
* NOTICE OF LICENSE
*
* You are not authorized to modify, copy or redistribute this file.
* Permissions are reserved by FME Modules.
*
*  @author    FME Modules
*  @copyright 2017 fmemodules All right reserved
*  @license   FMM Modules
*  @package   Registration
*}
{if $version < 1.6}<div class="separation"></div>{/if}<div class="panel"><h2 class="panel-heading"><img width="16" src="{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}modules/registrationfields/views/img/info.png"/>&nbsp;{if $REGISTRATION_FIELDS_HEADING}{$REGISTRATION_FIELDS_HEADING|escape:'htmlall':'UTF-8'}{else}{l s='Registration Fields' mod='registrationfields' js=1}{/if}</h2><div class="form-horizontal"><div {if $version >= 1.6}class="row"{/if}>{foreach from=$groupedFields item=field}<div class="clearfix"></div><label class="control-label col-lg-3">{$field.field_name|escape:'htmlall':'UTF-8'}&nbsp;:</label><div class="col-lg-9"><strong><p class="form-control-static">{Tools::htmlentitiesUTF8($obj->getFormatedValue(($field))|escape:'htmlall':'UTF-8')}</p></strong></div>{/foreach}</div></div></div><div class="clearfix"></div><div class="separation"></div>
