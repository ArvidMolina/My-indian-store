{*
* Proaccount Front Office Feature
*
* @authors DMConcept.fr <support@dmconcept.fr>
* @copyright DMConcept 2015
* +
* +Languages: EN, FR
* +PS version: 1.6
*}
<div id="_desktop_proaccount">
    <div class="header_proaccount">
        {if $display_page_link}
            <a href="{Context::getContext()->link->getModuleLink('proaccount')}" rel="nofollow"
               title="{l s='Professional account' mod='proaccount'}">
                <i class="material-icons">&#xE2C9;</i>
                <span class="hidden-sm-down">{l s='Professional account' mod='proaccount'}</span>
            </a>
        {elseif !$customer.is_logged}
            <form action="{Context::getContext()->link->getModuleLink('proaccount', 'authentication', ['create_account' => '1'])}"
                  method="post" id="form-nav-proaccount">
                <div class="submit">
                    <input type="hidden" value="my-account" name="back" class="hidden">
                    <input type="hidden" value="{l s='Professional account' mod='proaccount'}"
                           name="SubmitCreate" class="hidden">
                </div>
            </form>
            <a rel="nofollow" title="{l s='Professional account' mod='proaccount'}"
               onclick="$('#form-nav-proaccount').submit();">
                <i class="material-icons">&#xE2C9;</i>
                <span class="hidden-sm-down">{l s='Professional account' mod='proaccount'}</span>
            </a>
        {/if}
    </div>
</div>