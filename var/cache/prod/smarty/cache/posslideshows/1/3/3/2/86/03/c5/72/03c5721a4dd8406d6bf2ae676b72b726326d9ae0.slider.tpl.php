<?php
/* Smarty version 3.1.33, created on 2020-06-06 22:33:15
  from '/home/myindian/public_html/modules/posslideshows/views/templates/hook/slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5edbef7bf1a966_12610200',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fc543fd07f2e39e33a684ca5fc1b2b19a0ca04b' => 
    array (
      0 => '/home/myindian/public_html/modules/posslideshows/views/templates/hook/slider.tpl',
      1 => 1584378773,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_5edbef7bf1a966_12610200 (Smarty_Internal_Template $_smarty_tpl) {
?> <script type="text/javascript">
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
</script><?php }
}
