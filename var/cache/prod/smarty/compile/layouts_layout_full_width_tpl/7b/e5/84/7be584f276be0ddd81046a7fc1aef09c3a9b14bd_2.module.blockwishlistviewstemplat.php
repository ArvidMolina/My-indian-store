<?php
/* Smarty version 3.1.33, created on 2020-06-11 18:16:35
  from 'module:blockwishlistviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ee24ad30c3bf9_66761297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7be584f276be0ddd81046a7fc1aef09c3a9b14bd' => 
    array (
      0 => 'module:blockwishlistviewstemplat',
      1 => 1584378784,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee24ad30c3bf9_66761297 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11702316115ee24ad30265f4_87055152', 'page_content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content'} */
class Block_11702316115ee24ad30265f4_87055152 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_11702316115ee24ad30265f4_87055152',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/myindian/public_html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<div class="col-sm-12 col-xs-12">
    <div id="mywishlist">
    	<?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value) {?>
        	<div class="alert alert-danger">
        		<p><?php if (count($_smarty_tpl->tpl_vars['errors']->value) > 1) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'There are %d errors','sprintf'=>count($_smarty_tpl->tpl_vars['errors']->value)),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'There is %d error','sprintf'=>count($_smarty_tpl->tpl_vars['errors']->value)),$_smarty_tpl ) );
}?></p>
        		<ol>
        		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['error']->value) {
?>
        			<li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8');?>
</li>
        		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        		</ol>
        		<?php if (isset($_SERVER['HTTP_REFERER']) && !strstr($_smarty_tpl->tpl_vars['request_uri']->value,'authentication') && preg_replace('#^https?://[^/]+/#','/',$_SERVER['HTTP_REFERER']) != $_smarty_tpl->tpl_vars['request_uri']->value) {?>
        			<p class="lnk"><a class="alert-link" href="#" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back'),$_smarty_tpl ) );?>
">&laquo; <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back'),$_smarty_tpl ) );?>
</a></p>
        		<?php }?>
        	</div>
        <?php }?>
    	<?php if (intval($_smarty_tpl->tpl_vars['id_customer']->value) != 0) {?>
    		<form method="post" class="std box" id="form_wishlist">
    			<fieldset>
    				<div class="page-header"><h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New wishlist','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
</h1></div>
    				<div class="form-group">
    					<input type="hidden" name="token" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
    					<label class="align_right" for="name">
    						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Name','mod'=>'blockwishlist'),$_smarty_tpl ) );?>

    					</label>
    					<input type="text" id="name" name="name" class="inputTxt form-control" value="<?php if (isset($_POST['name']) && count($_smarty_tpl->tpl_vars['errors']->value) > 0) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_POST['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>" />
    				</div>
    				<p class="submit">
                        <button id="submitWishlist" class="btn btn-default button btn-secondary" type="submit" name="submitWishlist">
                        	<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
</span>
                        </button>
    				</p>
    			</fieldset>
    		</form>
    		<?php if ($_smarty_tpl->tpl_vars['wishlists']->value) {?>
    			<div id="block-history" class="block-center">
    				<table class="table table-bordered">
    					<thead>
    						<tr>
    							<th class="first_item"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Name','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
</th>
    							<th class="item mywishlist_first"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Qty','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
</th>
    							<th class="item mywishlist_first"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Viewed','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
</th>
    							<th class="item mywishlist_second"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Created','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
</th>
    							<th class="item mywishlist_second"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Direct Link','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
</th>
    							<th class="item mywishlist_second"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Default','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
</th>
    							<th class="last_item mywishlist_first"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
</th>
    						</tr>
    					</thead>
    					<tbody>
    						<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['wishlists']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
    							<tr id="wishlist_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_wishlist']), ENT_QUOTES, 'UTF-8');?>
">
    								<td style="width:200px;">
    									<a href="#" onclick="javascript:event.preventDefault();WishlistManage('block-order-detail', '<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_wishlist']), ENT_QUOTES, 'UTF-8');?>
');">
    										<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'],30,'...' )),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

    									</a>
    								</td>
    								<td class="bold align_center">
    									<?php $_smarty_tpl->_assignInScope('n', 0);?>
    									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nbProducts']->value, 'nb', false, NULL, 'i', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['nb']->value) {
?>
    										<?php if ($_smarty_tpl->tpl_vars['nb']->value['id_wishlist'] == $_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_wishlist']) {?>
    											<?php $_smarty_tpl->_assignInScope('n', intval($_smarty_tpl->tpl_vars['nb']->value['nbProducts']));?>
    										<?php }?>
    									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    									<?php if ($_smarty_tpl->tpl_vars['n']->value) {?>
    										<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['n']->value), ENT_QUOTES, 'UTF-8');?>

    									<?php } else { ?>
    										0
    									<?php }?>
    								</td>
    								<td><?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['counter']), ENT_QUOTES, 'UTF-8');?>
</td>
    								<td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['date_add'],"%Y-%m-%d"), ENT_QUOTES, 'UTF-8');?>
</td>
    								<td>
    									<a href="#" onclick="javascript:event.preventDefault();WishlistManage('block-order-detail', '<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_wishlist']), ENT_QUOTES, 'UTF-8');?>
');">
    										<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View','mod'=>'blockwishlist'),$_smarty_tpl ) );?>

    									</a>
    								</td>
    								<td class="wishlist_default">
    									<?php if ((($_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['default'] !== null )) && $_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['default'] == 1) {?>
    										<p class="is_wish_list_default">
    											<i class="fa fa-check-square"></i>
    										</p>
    									<?php } else { ?>
    										<a href="#" onclick="javascript:event.preventDefault();(WishlistDefault('wishlist_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_wishlist']), ENT_QUOTES, 'UTF-8');?>
', '<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_wishlist']), ENT_QUOTES, 'UTF-8');?>
'));">
    											<i class="fa fa-square"></i>
    										</a>
    									<?php }?>
    								</td>
    								<td class="wishlist_delete">
    									<a class="icon" href="#" onclick="javascript:event.preventDefault();return (WishlistDelete('wishlist_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_wishlist']), ENT_QUOTES, 'UTF-8');?>
', '<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wishlists']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_wishlist']), ENT_QUOTES, 'UTF-8');?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you really want to delete this wishlist ?','mod'=>'blockwishlist','js'=>1),$_smarty_tpl ) );?>
'));">
    										<i class="material-icons">delete</i>
    									</a>
    								</td>
    							</tr>
    						<?php
}
}
?>
    					</tbody>
    				</table>
    			</div>
    			<div id="block-order-detail">&nbsp;</div>
    		<?php }?>
    	<?php }?>
    	<div class="footer_links wishlist_footer clearfix">
			<a class="btn btn-default button btn-secondary" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
				<span>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back to Your Account','mod'=>'blockwishlist'),$_smarty_tpl ) );?>

				</span>
			</a>
			<a class="btn btn-default button btn-secondary pull-right" href="#">
				<span>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Home','mod'=>'blockwishlist'),$_smarty_tpl ) );?>

				</span>
			</a>
    	</div>
    </div>
</div>
<?php
}
}
/* {/block 'page_content'} */
}
