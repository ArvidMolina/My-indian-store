/**
 * 2007-2017 Leotheme
 *
 * NOTICE OF LICENSE
 *
 * Leo Quick Login And Social Login For Prestashop 1.7 
 *
 * DISCLAIMER
 *
 *  @Module Name: Leo Quick Login
 *  @author    leotheme <leotheme@gmail.com>
 *  @copyright 2007-2018 Leotheme
 *  @license   http://leotheme.com - prestashop template provider
 */
$(document).ready(function() {
	
	//DONGND:: tab change in group config
	var id_panel = $("#leoquicklogin-setting .leoquicklogin-tablist li.active a").attr("href");
	$(id_panel).addClass('active').show();
	$('.leoquicklogin-tablist li').click(function(){
		if(!$(this).hasClass('active'))
		{
			var default_tab = $(this).find('a').attr("href");			
			$('#LEOQUICKLOGIN_DEFAULT_TAB').val(default_tab);
		}
	})
	
});