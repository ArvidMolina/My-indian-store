{*
* Proaccount Front Office Feature
*
* @authors DMConcept.fr <support@dmconcept.fr>
* @copyright DMConcept 2015
* +
* +Languages: EN, FR
* +PS version: 1.6
*}

<div class="header_proaccount">
    {if $display_page_link}
        <a href="{$link->getModuleLink('proaccount')|escape:'html':'UTF-8'}" rel="nofollow"
           title="{l s='Professional account' mod='proaccount'}">
            {l s='Professional account' mod='proaccount'}
        </a>
    {elseif !$is_logged}
        <form action="{$link->getModuleLink('proaccount', 'authentication')|escape:'html':'UTF-8'}" method="post">
            <input type="hidden" value="my-account" name="back" class="hidden">
            <button name="SubmitCreate" id="SubmitCreate" type="submit" class="btn btn-link">
                {l s='Professional account' mod='proaccount'}
            </button>
            <input type="hidden" value="{l s='Professional account' mod='proaccount'}" name="SubmitCreate"
                   class="hidden">
        </form>
    {/if}
</div>