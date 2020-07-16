
<div id="product-modulemoduledemo5" class="panel product-tab">

	<input type="hidden" name="submitted_tabs[]" value="ModuleModuledemo5">
	<h3>{l s='Group Access' mod='psgroup access'}</h3>
	<div class="form-group">
		<label class="control-label col-lg-3">
			<span class="label-tooltip" data-toggle="tooltip" data-html="true" title="" data-original-title="{l s='Mark all of the customer groups which you would like to have access to this product.' mod='psproductaccess'}">Group access</span>
		</label>
		<div class="col-lg-9">
			<div class="row">
				<div class="col-lg-6">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th class="fixed-width-xs">
									<span class="title_box">
										<input type="checkbox" name="checkme" id="checkme" onclick="checkDelBoxes(this.form, 'acc_groupBox[]', this.checked)">
									</span>
								</th>
								<th class="fixed-width-xs"><span class="title_box">ID</span></th>
								<th>
									<span class="title_box">
										Group name
									</span>
								</th>
							</tr>
						</thead>
						<tbody>
							{* Just a trick to have it submit in any case *}
							<input type="hidden" name="acc_groupBox[]" value="0"> 
							{foreach from=$access_groups item=group}
								<tr>
									<td>
										<input type="checkbox" name="acc_groupBox[]" class="acc_groupBox" id="acc_groupBox_{$group.id_group}" value="{$group.id_group}" {if isset($group.access)} checked="checked"{/if}>
									</td>
									<td>{$group.id_group}</td>
									<td>
										<label for="acc_groupBox_{$group.id_group}">{$group['name']}</label>
									</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>
		</div>
							
	</div>

	<div class="panel-footer">
		<a href="{$link->getAdminLink('AdminProducts')}" class="btn btn-default"><i class="process-icon-cancel"></i> {l s='Cancel'}</a>
		<button type="submit" name="submitAddproduct" class="btn btn-default pull-right"><i class="process-icon-save"></i> {l s='Save'}</button>
		<button type="submit" name="submitAddproductAndStay" class="btn btn-default pull-right"><i class="process-icon-save"></i> {l s='Save and stay'}</button>
	</div>

</div>
