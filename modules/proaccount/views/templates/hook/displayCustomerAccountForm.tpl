{*
* Proaccount Front Office Feature
*
* @authors DMConcept.fr <support@dmconcept.fr>
* @copyright DMConcept 2015
* +
* +Languages: EN, FR
* +PS version: 1.6
*}

{if $use_fileupload_field and $isPro_authentication}

    {if $register_with_address}
        <div class="account_creation">
        <h3 class="page-subheading">{l s='Further information' mod='proaccount'}</h3>
    {/if}
    <label>{l s='Attach File' mod='proaccount'}</label>
    <input type="hidden" name="MAX_FILE_SIZE"
           value="{if isset($max_upload_size) && $max_upload_size}{$max_upload_size|intval}{else}2000000{/if}"/>
    <input type="file" name="fileUpload" id="fileUpload" class="form-control"/>
    {if $register_with_address}
        </div>
    {/if}
    <div style="margin-bottom: 16px;"></div>
{/if}

{addJsDefL name='proaccount_fileDefaultHtml'}{l s='No file selected' mod='proaccount' js=1}{/addJsDefL}
{addJsDefL name='proaccount_fileButtonHtml'}{l s='Choose File'  mod='proaccount' js=1}{/addJsDefL}