{*
* Proaccount Front Office Feature
*
* @authors DMConcept.fr <support@dmconcept.fr>
* @copyright DMConcept 2015
* +
* +Languages: EN, FR
* +PS version: 1.6
*}
{extends file='page.tpl'}

{block name='page_content'}
    {if isset($proaccount_cms)}
        {if !$proaccount_cms->active}
            <br/>
            <div id="admin-action-cms">
                <p>
                    <span>{l s='This CMS page is not visible to your customers.' mod='proaccount'}</span>
                    <input type="hidden" id="admin-action-cms-id" value="{$proaccount_cms->id}"/>
                    <input type="submit" value="{l s='Publish' mod='proaccount'}" name="publish_button"
                           class="button btn btn-default"/>
                    <input type="submit" value="{l s='Back' mod='proaccount'}" name="lnk_view"
                           class="button btn btn-default"/>
                </p>
                <div class="clear"></div>
                <p id="admin-action-result"></p>
                </p>
            </div>
        {/if}
        <div class="rte">
            {$proaccount_cms->content nofilter} {* HTML CONTENT, NO FILTER *}

            <div class="clearfix">&nbsp;</div>
            {if !$customer.is_logged}
                <form action="{Context::getContext()->link->getModuleLink('proaccount', 'authentication', ['create_account' => '1'])}"
                      method="post">
                    <div class="submit">
                        <input type="hidden" value="my-account" name="back" class="hidden">
                        <button name="SubmitCreate" id="SubmitCreate" type="submit"
                                class="btn btn-lg btn-primary">
                                            <span>
                                                    <i class="icon-user left"></i>
                                                {l s='Create your professional account' mod='proaccount'}
                                            </span>
                        </button>
                        <input type="hidden" value="{l s='Create your professional account' mod='proaccount'}"
                               name="SubmitCreate" class="hidden">
                    </div>
                </form>
            {else}
                <a class="btn btn-lg btn-primary" href="{Context::getContext()->link->getPageLink('my-account', true)}"
                   rel="nofollow" title="{l s='View my professional customer account' mod='proaccount'}">
                    <i class="icon-user left"></i>
                    {l s='View my professional customer account' mod='proaccount'}
                </a>
            {/if}
        </div>
    {else}
        <div class="alert alert-danger">
            {l s='This page does not exist.' mod='proaccount'}
        </div>
    {/if}
{/block}