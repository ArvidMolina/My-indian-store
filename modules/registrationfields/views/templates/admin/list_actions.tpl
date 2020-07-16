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

{if isset($type) AND $type}
    {if $type == 'image'}
        {assign var='root_dir' value=$smarty.const._PS_ROOT_DIR_|cat:'/'}
        <img src="{$smarty.const.__PS_BASE_URI__|cat:Tools::str_replace_once($root_dir, '', $value)}" class="imgm img-thumbnail" width="32px"/>
    {elseif $type == 'attachment'}
        <a class="btn btn-default button" href="{$link->getAdminLink('AdminCustomerRegistrationFields')|escape:'htmlall':'UTF-8'}&downloadFile&l={base64_encode($value)|escape:'htmlall':'UTF-8'}" target="_blank">
            <img src="{$smarty.const.__PS_BASE_URI__|escape:'htmlall':'UTF-8'}modules/registrationfields/views/img/download.png" alt="{l s='Download Attachment' mod='registrationfields'}" title="{l s='Download Attachment' mod='registrationfields'}"/>
        </a>
    {/if}
{/if}
