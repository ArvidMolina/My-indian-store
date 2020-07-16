<?php
/* Smarty version 3.1.33, created on 2020-03-04 13:48:59
  from '/home/myindian/wholesale.myindianstore.eu/modules/posslideshows/views/templates/hook/slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5f95ab298f10_27556257',
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
  'cache_lifetime' => 31536000,
),true)) {
function content_5e5f95ab298f10_27556257 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="slideshow_container">
	<div class="pos-slideshow">
		<div class="flexslider ma-nivoslider">
			<div class="pos-loading"></div>
			<div id="pos-slideshow-home" class="slides">
				
													<a href="http://www.posthemes.com" title="Sample 2" ><img style="display:none" src="https://wholesale.myindianstore.eu/modules/posslideshows/images/c37657b52a918b4cf86c409ec851ed48a8d8212c_sample-2.jpg"  data-thumb="https://wholesale.myindianstore.eu/modules/posslideshows/images/c37657b52a918b4cf86c409ec851ed48a8d8212c_sample-2.jpg"  alt="" title="#htmlcaption2"  /> </a>
			   			</div>
												<div id="htmlcaption2" class="pos-slideshow-caption nivo-html-caption nivo-caption">					
							<div class="timethai" style=" 
								position:absolute;
								top:0;
								left:0;
								z-index:8;
								background-color: rgba(49, 56, 72, 0.298);
								height:5px;
								-webkit-animation: myfirst 60000000ms ease-in-out;
								-moz-animation: myfirst 60000000ms ease-in-out;
								-ms-animation: myfirst 60000000ms ease-in-out;
								animation: myfirst 60000000ms ease-in-out;
							
							">
							</div>
														<div class="banner7-des"><div class="container"><div class="info desc1 ">
<p class="title1" style="text-align: center;">Welcome to</p>
<p class="title2" style="text-align: center;">My indian Store</p>
<p class="title2" style="text-align: center;">Indian Grocery Shop Online</p>
<p class="title3" style="text-align: center;">First Indian Store in Baltics <br />Since 2015</p>
<p class="readmore" style="text-align: center;"><a href="#">shopping Now</a></p>
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
