$(document).ready(function() {

	$('#configuration_form textarea').removeClass('textarea-autosize').css({'height': '400px'});
	$('textarea.hiddentosight').hide().before('<a href="javascript:void(0)" class="btn btn-default toggletextarea">'+clicktotoggle+'</a>');

	$('.toggletextarea').click(function(event) {
		$(this).next().removeClass('.hidden').toggle();
	});

	var editor = {};
	var textarea = {};


	// Htaccess

	textarea['htaccess'] = $('textarea[name="PSED_HTACCESS"]').hide();
	textarea['htaccess'].before('<div id="PSED_HTACCESS_DIV"></div>');
	editor['htaccess'] = ace.edit("PSED_HTACCESS_DIV");
	editor['htaccess'].setTheme("ace/theme/chrome");
	editor['htaccess'].getSession().setMode("ace/mode/apache_conf");
	editor['htaccess'].setOptions({'maxLines': 25});
	editor['htaccess'].getSession().setValue(textarea['htaccess'].val());
	editor['htaccess'].getSession().on('change', function(){
		textarea['htaccess'].text(editor['htaccess'].getSession().getValue());
	});


	// Robots

	if($('textarea[name="PSED_ROBOTS"]').length > 0)
	{
		textarea['robots'] = $('textarea[name="PSED_ROBOTS"]').hide();
		textarea['robots'].before('<div id="PSED_ROBOTS_DIV"></div>');
		editor['robots'] = ace.edit("PSED_ROBOTS_DIV");
		editor['robots'].setTheme("ace/theme/chrome");
		editor['robots'].getSession().setMode("ace/mode/apache_conf");
		editor['robots'].setOptions({'minLines': 15});
		editor['robots'].setOptions({'maxLines': 25});
		editor['robots'].getSession().setValue(textarea['robots'].val());
		editor['robots'].getSession().on('change', function(){
			textarea['robots'].text(editor['robots'].getSession().getValue());
		});	
	}
	


	// JS HEAD

	textarea['jshead'] = $('textarea[name="PSED_JS_HEAD"]').hide();
	textarea['jshead'].before('<div id="PSED_JS_HEAD_DIV"></div>');
	editor['jshead'] = ace.edit("PSED_JS_HEAD_DIV");
	editor['jshead'].setTheme("ace/theme/chrome");
	editor['jshead'].getSession().setMode("ace/mode/javascript");
	editor['jshead'].setOptions({'minLines': 15});
	editor['jshead'].setOptions({'maxLines': 25});
	editor['jshead'].getSession().setValue(textarea['jshead'].val());
	editor['jshead'].getSession().on('change', function(){
		textarea['jshead'].text(editor['jshead'].getSession().getValue());
	});	

	// JS FOOT

	textarea['jsfoot'] = $('textarea[name="PSED_JS_FOOT"]').hide();
	textarea['jsfoot'].before('<div id="PSED_JS_FOOT_DIV"></div>');
	editor['jsfoot'] = ace.edit("PSED_JS_FOOT_DIV");
	editor['jsfoot'].setTheme("ace/theme/chrome");
	editor['jsfoot'].getSession().setMode("ace/mode/javascript");
	editor['jsfoot'].setOptions({'minLines': 15});
	editor['jsfoot'].setOptions({'maxLines': 25});
	editor['jsfoot'].getSession().setValue(textarea['jsfoot'].val());
	editor['jsfoot'].getSession().on('change', function(){
		textarea['jsfoot'].text(editor['jsfoot'].getSession().getValue());
	});	

	textarea['css'] = $('textarea[name="PSED_CSS"]').hide();
	textarea['css'].before('<div id="PSED_CSS_DIV"></div>');
	editor['css'] = ace.edit("PSED_CSS_DIV");
	editor['css'].setTheme("ace/theme/chrome");
	editor['css'].getSession().setMode("ace/mode/css");
	editor['css'].setOptions({'minLines': 15});
	editor['css'].setOptions({'maxLines': 25});
	editor['css'].getSession().setValue(textarea['css'].val());
	editor['css'].resize();
	editor['css'].getSession().on('change', function(){
		textarea['css'].text(editor['css'].getSession().getValue());
	});

	textarea['verif'] = $('textarea[name="PSED_VERIF"]').hide();
	textarea['verif'].before('<div id="PSED_VERIF_DIV"></div>');
	editor['verif'] = ace.edit("PSED_VERIF_DIV");
	editor['verif'].setTheme("ace/theme/chrome");
	editor['verif'].getSession().setMode("ace/mode/html");
	editor['verif'].setOptions({'minLines': 15});
	editor['verif'].setOptions({'maxLines': 25});
	editor['verif'].getSession().setValue(textarea['verif'].val());
	editor['verif'].getSession().on('change', function(){
		textarea['verif'].text(editor['verif'].getSession().getValue());
	});	

	// Theme files
	if(typeof(theme_templates) != 'undefined')
	{
		$.each(theme_templates, function(index, el) {
			textarea[el] = $('textarea[name="PSED_THEME_'+el.toString().toUpperCase()+'"]').hide();
			textarea[el].before('<div id="PSED_THEME_'+el.toString().toUpperCase()+'_DIV"></div>');
			editor[el] = ace.edit("PSED_THEME_"+el.toString().toUpperCase()+'_DIV');
			editor[el].setTheme("ace/theme/chrome");
			editor[el].getSession().setMode("ace/mode/smarty");
			editor[el].getSession().setValue(textarea[el].val());
			editor[el].setOptions({'maxLines': 25});
			editor[el].getSession().on('change', function(){
				textarea[el].text(editor[el].getSession().getValue());
			});
		});
		
	}


	// CSS Files
	if(typeof(theme_css) != 'undefined')
	{
		$.each(theme_css, function(index, el) {
			textarea[el] = $('textarea[name="PSED_CSS_'+el.toString().toUpperCase()+'"]').hide();
			textarea[el].before('<div id="PSED_CSS_'+el.toString().toUpperCase()+'_DIV"></div>');
			editor[el] = ace.edit("PSED_CSS_"+el.toString().toUpperCase()+'_DIV');
			editor[el].setTheme("ace/theme/chrome");
			editor[el].getSession().setMode("ace/mode/css");
			editor[el].getSession().setValue(textarea[el].val());
			editor[el].setOptions({'maxLines': 25});
			editor[el].getSession().on('change', function(){
				textarea[el].text(editor[el].getSession().getValue());
			});
		});
		
	}


	// Module CSS Files
	if(typeof(module_css) != 'undefined')
	{
		
		$.each(module_css, function(module, files) {
			editor['mod_'+module] = {};
			textarea['mod_'+module] = {};
			$.each(files, function(i,el) {
				textarea['mod_'+module][el] = $('textarea[name="PSED_MODULE_CSS_'+module.toString().toUpperCase()+"_"+el.toString().toUpperCase()+'"]').hide();
				textarea['mod_'+module][el].before('<div id="PSED_MODULE_CSS_'+module.toString().toUpperCase()+"_"+el.toString().toUpperCase()+'_DIV"></div>');
				editor['mod_'+module][el] = ace.edit("PSED_MODULE_CSS_"+module.toString().toUpperCase()+"_"+el.toString().toUpperCase() + '_DIV');
				editor['mod_'+module][el].setTheme("ace/theme/chrome");
				editor['mod_'+module][el].getSession().setMode("ace/mode/css");
				editor['mod_'+module][el].getSession().setValue(textarea['mod_'+module][el].val());
				editor['mod_'+module][el].setOptions({'maxLines': 25});
				editor['mod_'+module][el].getSession().on('change', function(){
					textarea['mod_'+module][el].text(editor['mod_'+module][el].getSession().getValue());
				});
			});

			
		});
		
	}

	// PDF files
	if(typeof(pdf_templates) != 'undefined')
	{
		$.each(pdf_templates, function(index, el) {
			textarea[el] = $('textarea[name="PSED_PDF_'+el.toString().toUpperCase()+'"]').hide();
			textarea[el].before('<div id="PSED_PDF_'+el.toString().toUpperCase()+'_DIV"></div>');
			editor[el] = ace.edit("PSED_PDF_"+el.toString().toUpperCase()+'_DIV');
			editor[el].setTheme("ace/theme/chrome");
			editor[el].getSession().setMode("ace/mode/smarty");
			editor[el].getSession().setValue(textarea[el].val());
			editor[el].setOptions({'maxLines': 25});
			editor[el].getSession().on('change', function(){
				textarea[el].text(editor[el].getSession().getValue());
			});
		});
		
	}	

	$('#edittpl .ace_editor, #editthemecss .ace_editor, #editmodulecss .ace_editor, #editpdf .ace_editor ').hide();
});