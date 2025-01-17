<input type="hidden" id="venipak_pickup_carrier_id" value="{$venipak_carrier_id}" />
<input type="hidden" id="venipak_pickup_address_id" value="{$id_address_delivery}" />

<div id="venipak-additional-info">
    <div class="venipak-order-comments">

        {if !empty($pickup_points)}
            <select class="venipak_select2 form-control input-medium" id="venipak_id_pickup_point" name="venipak_id_pickup_point" style="width:100%">
                <option value="0">{l s='Select pickup location' mod='venipakcarrier'}</option>
                {foreach from=$pickup_points item=country}
                    {if count($pickup_points) > 1}
                        <optgroup label="{$country.name}">
                    {/if}
                    {foreach from=$country.city item=city}
                        <optgroup label="{$city.name}">
                            {foreach from=$city.point item=point}
                                <option value="{$point.id}">{$point.name}</option>
                            {/foreach}
                        </optgroup>
                    {/foreach}
                    {if count($pickup_points) > 1}
                        </optgroup>
                    {/if}
                {/foreach}
            </select>
        {/if}

    </div>

    <div class="alert alert-danger venipakAlert hidden" role="alert">
        {l s='Select pickup point!' mod='venipakcarrier'}
    </div>
</div>
