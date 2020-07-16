<?php
/* Smarty version 3.1.33, created on 2020-01-17 06:51:37
  from '/home/myindian/wholesale.myindianstore.eu/modules/posslideshows/views/templates/hook/slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e219fc91ff3d5_03755359',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3fdaea6b9b61424a87308c8c504f7e0dba38045' => 
    array (
      0 => '/home/myindian/wholesale.myindianstore.eu/modules/posslideshows/views/templates/hook/slider.tpl',
      1 => 1579261777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e219fc91ff3d5_03755359 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '14897507615e219fc91c5b45_59008078';
if ($_smarty_tpl->tpl_vars['homeslider']->value['slides']) {?>
<div class="slideshow_container">
	<div class="pos-slideshow">
		<div class="flexslider ma-nivoslider">
			<div class="pos-loading"></div>
			<div id="pos-slideshow-home" class="slides">
				
				<?php $_smarty_tpl->_assignInScope('count', 0);?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['homeslider']->value['slides'], 'slide', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['slide']->value) {
?>
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['title'], ENT_QUOTES, 'UTF-8');?>
" ><img style="display:none" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
"  data-thumb="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
"  alt="" title="#htmlcaption<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['id_slide'], ENT_QUOTES, 'UTF-8');?>
"  /> </a>
			   <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['homeslider']->value['show_caption'] != 0) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['homeslider']->value['slides'], 'slide', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['slide']->value) {
?>
					<div id="htmlcaption<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['id_slide'], ENT_QUOTES, 'UTF-8');?>
" class="pos-slideshow-caption nivo-html-caption nivo-caption">					
							<div class="timethai" style=" 
								position:absolute;
								top:0;
								left:0;
								z-index:8;
								background-color: rgba(49, 56, 72, 0.298);
								height:5px;
								-webkit-animation: myfirst <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['speed'], ENT_QUOTES, 'UTF-8');?>
ms ease-in-out;
								-moz-animation: myfirst <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['speed'], ENT_QUOTES, 'UTF-8');?>
ms ease-in-out;
								-ms-animation: myfirst <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['speed'], ENT_QUOTES, 'UTF-8');?>
ms ease-in-out;
								animation: myfirst <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['speed'], ENT_QUOTES, 'UTF-8');?>
ms ease-in-out;
							
							">
							</div>
							<?php if ($_smarty_tpl->tpl_vars['slide']->value['description']) {?>
							<div class="banner7-des"><div class="container"><?php echo $_smarty_tpl->tpl_vars['slide']->value['description'];?>
</div> </div>
							<?php }?>
					</div>
				 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			 <?php }?>
		</div>
	</div>
</div>

<?php }?>
 <?php echo '<script'; ?>
 type="text/javascript">
 $(document).ready(function() {
	//Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	//Variables on page load 
	var $myCarousel = $('.ma-nivoslider'),
		$firstAnimatingElems = $myCarousel.find('.nivo-caption').find("[data-animation ^= 'animated']");
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);

});
<?php echo '</script'; ?>
><?php }
}
