<input type="hidden" name="CustomerGroupPermission_loaded" value="1">
{if isset($product->id)}
<div id="product-CustomerGroupPermission" class="panel product-tab">
  <input type="hidden" name="submitted_tabs[]" value="CustomerGroupPermission" />
  <h3>{l s='Customer Group Permission'}</h3>
	<div class="row">
		<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=P2RY8FSMSEJ5N" target="_blank" style="margin-bottom:15px;">
			<img src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" alt="" />
		</a>
	</div>
  <div class="row">
    <div class="alert alert-info" style="display:block; position:'auto';">
      <p>{l s='Product for Customer Group active'}</p>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-3"> <span class="label-tooltip" title="" data-html="true" data-toggle="tooltip" data-original-title=""> {l s='Group access'} </span> </label>
    <div class="col-lg-9">
      <div class="row">
        <div class="col-lg-6">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="fixed-width-xs"> <span class="title_box">
                  <input id="checkme" type="checkbox" onclick="
                                    console.log(jQuery(this).is(':checked'));
                                    if(jQuery(this).is(':checked')){
                                    	jQuery('.groupPermission').find('input').prop('checked',true)
                                        }else{
                                        jQuery('.groupPermission').find('input').prop('checked',false)
                                        }" name="checkme">
                  </span> </th>
                <th class="fixed-width-xs"> <span class="title_box">{l s='ID'}</span> </th>
                <th> <span class="title_box">{l s='Group-Name'}</span> </th>
              </tr>
            </thead>
            <tbody class="groupPermission">
            
            {foreach from=$groups item=group name=data}
            <tr>
              <td><input id="groupBox_{$group.id_group}" class="groupBox" value="1" type="checkbox"{if isset($group.checked) AND $group.checked == 'checked'} checked="checked"{/if} name="groupBox[{$group.id_group}]"></td>
              <td>{$group.id_group}</td>
              <td><label for="groupBox_{$group.id_group}">{$group.name}</label></td>
            </tr>
            {/foreach}
              </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
 
  <div class="panel-footer"> <a href="{$link->getAdminLink('AdminProducts')|escape:'html':'UTF-8'}{if isset($smarty.request.page) && $smarty.request.page > 1}&amp;submitFilterproduct={$smarty.request.page|intval}{/if}" class="btn btn-default"><i class="process-icon-cancel"></i> {l s='Cancel'}</a>
    <button type="submit" name="submitAddproduct" class="btn btn-default pull-right" disabled="disabled"><i class="process-icon-loading"></i> {l s='Save'}</button>
    <button type="submit" name="submitAddproductAndStay" class="btn btn-default pull-right" disabled="disabled"><i class="process-icon-loading"></i> {l s='Save and stay'}</button>
  </div>
</div>
{/if} 