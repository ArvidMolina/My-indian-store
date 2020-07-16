<?php
/* Smarty version 3.1.33, created on 2020-01-16 12:59:24
  from '/home/myindian/test.myindianstore.eu/modules/posslideshows/views/templates/hook/slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e20a47c5a5081_59348249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8eea7f594ad9c7904718e7f27d9d10fb855a6fbf' => 
    array (
      0 => '/home/myindian/test.myindianstore.eu/modules/posslideshows/views/templates/hook/slider.tpl',
      1 => 1578924313,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_5e20a47c5a5081_59348249 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="slideshow_container">
	<div class="pos-slideshow">
		<div class="flexslider ma-nivoslider">
			<div class="pos-loading"></div>
			<div id="pos-slideshow-home" class="slides">
				
													<a href="http://www.posthemes.com" title="Sample 2" ><img style="display:none" src="http://test.myindianstore.eu/modules/posslideshows/images/c37657b52a918b4cf86c409ec851ed48a8d8212c_sample-2.jpg"  data-thumb="http://test.myindianstore.eu/modules/posslideshows/images/c37657b52a918b4cf86c409ec851ed48a8d8212c_sample-2.jpg"  alt="" title="#htmlcaption2"  /> </a>
			   			</div>
												<div id="htmlcaption2" class="pos-slideshow-caption nivo-html-caption nivo-caption">					
							<div class="timethai" style=" 
								position:absolute;
								top:0;
								left:0;
								z-index:8;
								background-color: rgba(49, 56, 72, 0.298);
								height:5px;
								-webkit-animation: myfirst 5000ms ease-in-out;
								-moz-animation: myfirst 5000ms ease-in-out;
								-ms-animation: myfirst 5000ms ease-in-out;
								animation: myfirst 5000ms ease-in-out;
							
							">
							</div>
														<div class="banner7-des"><div class="container"><div class="info desc1 ">
<p class="title1">Welcome to</p>
<p class="title2">My indian Store</p>
<p class="title3">Best Indian Food in Tallinn</p>
<p class="readmore"><a href="#">shopping Now</a></p>
</div></div> </div>
												</div>
				 			 		</div>
	</div>
</div>

 <script type="text/javascript">
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
