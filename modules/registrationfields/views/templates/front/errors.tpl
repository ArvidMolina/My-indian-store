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

{if isset($errors) AND count($errors) > 0}
    <ul id="field-errors" class="alert alert-danger error">    
        {foreach from=$errors item=error}
            <ol>{$error|escape:'htmlall':'UTF-8'}</ol>
        {/foreach}
    </ul>
{/if}