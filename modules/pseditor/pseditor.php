<?php


if (!defined('_PS_VERSION_'))
	exit;

class psEditor extends Module
{

	protected $_errors = array();
	protected $_html = '';
	protected $template_files = array();
	protected $css_files = array();
	protected $module_css_files = array();
	protected $pdf_template_files = array();
	


	/* Set default configuration values here */
	protected $_config = array(
		'PSED_OPTIMIZEADDED' => 0,
		'PSED_JS_HEAD' => '',
		'PSED_JS_FOOT' => '',
		'PSED_CSS' => '',
		'PSED_VERIF' => '',
		);


	public function __construct()
	{
		$this->name = 'pseditor';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'Dh42';
		$this->need_instance = 0;
		
		$this->bootstrap = true;

	 	parent::__construct();

		$this->displayName = $this->l('PrestaShop Editor');
		$this->description = $this->l('Edit various aspects of your shop.');
	}
	
	public function install()
	{
		if (!parent::install() OR
			!$this->_installConfig() OR
			!$this->registerHook('displayBackOfficeHeader') OR
			!$this->registerHook('displayHeader') OR
			!$this->registerHook('displayFooter')
			)
			return false;
		return true;
	}
	
	public function uninstall()
	{
		if (!parent::uninstall() OR
			!$this->_eraseConfig()
			)
			return false;
		return true;
	}

	private function _installConfig()
	{
		foreach ($this->_config as $keyname => $value) {
			Configuration::updateValue($keyname, $value);
		}
		return true;
	}


	private function _eraseConfig()
	{
		foreach ($this->_config as $keyname => $value) {
			Configuration::deleteByName($keyname);
		}
		return true;
	}

	


	public function getContent()
	{
		$this->_postProcess();
		$this->_displayForm();

		return	$this->_html;
	}
	
	private function _displayForm()
	{
		$this->context->controller->addJS($this->_path.'views/js/ace.js', 'all');
		$this->_html .= $this->_generateForm();
		$this->context->controller->addJS($this->_path.'views/js/pseditor.js', 'all');
		// // With Template
		// $this->context->smarty->assign(array(
		// 	'variable'=> 1
		// ));
		// $this->_html .= $this->display(__FILE__, 'backoffice.tpl');
	}

	private function _generateForm()
	{
		$inputs = array();

		$inputs[] = array(
			'tab' => 'settings',
			'type' => 'switch',
			'label' => $this->l('Optimize Added Javascript'),
			'name' => 'PSED_OPTIMIZEADDED',
			'values' => array(
                    array(
                        'id' => 'PSED_OPTIMIZEADDED_on',
                        'value' => 1
                    ),
                    array(
                        'id' => 'PSED_OPTIMIZEADDED_off',
                        'value' => 0
                    )
                )
			);

		$inputs[] = array(
			'tab' => 'settings',
			'type' => 'html',
            'name' => 'submit_settings_html',
            'html_content' => '<button type="submit" class="btn btn-default" name="submit_settings">'.$this->l('Save Settings').'</button>'
			);

		$htaccess = $this->getHtaccess();

		if(!$htaccess)
			$inputs[] = array(
				'tab' => 'hteditor',
				'type' => 'html',
                'name' => 'nothing',
                'html_content' => '<p>'.$this->l('htaccess not found or not writable').'</p>'
				);
		else
		{
			$fields_values['PSED_HTACCESS'] = $htaccess;
			$inputs[] = array(
				'tab' => 'hteditor',
				'type' => 'textarea',
				'label' => $this->l('.htaccess Editor'),
				'name' => 'PSED_HTACCESS',
				);

			$inputs[] = array(
				'tab' => 'hteditor',
				'type' => 'html',
                'name' => 'submit_htaccess_html',
                'html_content' => '<button type="submit" class="btn btn-default" name="submit_htaccess">'.$this->l('Save .htaccess').'</button>'
				);
		}
			
		
		$robots = $this->getRobots();
		if(!$robots)
			$inputs[] = array(
				'tab' => 'roeditor',
				'type' => 'html',
                'name' => 'nothing',
                'html_content' => '<p>'.$this->l('robots.txt not found or not writable').'</p>'
				);
		else
		{
			$fields_values['PSED_ROBOTS'] = $robots;
			$inputs[] = array(
				'tab' => 'roeditor',
				'type' => 'textarea',
				'label' => $this->l('Robots.txt Editor'),
				'name' => 'PSED_ROBOTS',
				);
			$inputs[] = array(
				'tab' => 'roeditor',
				'type' => 'html',
                'name' => 'submit_robots_html',
                'html_content' => '<button type="submit" class="btn btn-default" name="submit_robots">'.$this->l('Save robots.txt').'</button>'
				);
		}
			

		$inputs[] = array(
			'tab' => 'jseditor',
			'type' => 'textarea',
			'label' => $this->l('Page Header'),
			'name' => 'PSED_JS_HEAD',
			);

		$inputs[] = array(
			'tab' => 'jseditor',
			'type' => 'textarea',
			'label' => $this->l('Page Footer'),
			'name' => 'PSED_JS_FOOT',
			'desc' => $this->l('Before closing the Body tag')
			);

		$inputs[] = array(
			'tab' => 'jseditor',
			'type' => 'html',
            'name' => 'submit_js_html',
            'html_content' => '<button type="submit" class="btn btn-default" name="submit_js">'.$this->l('Save This Tab').'</button>'
			);


		$inputs[] = array(
			'tab' => 'csseditor',
			'type' => 'textarea',
			'label' => $this->l('CSS Editor'),
			'name' => 'PSED_CSS',
			);
		$inputs[] = array(
			'tab' => 'csseditor',
			'type' => 'html',
            'name' => 'submit_css_html',
            'html_content' => '<button type="submit" class="btn btn-default" name="submit_css">'.$this->l('Save This Tab').'</button>'
			);


		$inputs[] = array(
			'tab' => 'metaeditor',
			'type' => 'textarea',
			'label' => $this->l('Meta Verification Editor'),
			'name' => 'PSED_VERIF',
			);

		$inputs[] = array(
			'tab' => 'metaeditor',
			'type' => 'html',
            'name' => 'submit_verif_html',
            'html_content' => '<button type="submit" class="btn btn-default" name="submit_verif">'.$this->l('Save This Tab').'</button>'
			);


		// we need something different for the templates
		foreach ($this->template_files as $key => $content) {
			$inputs[] = array(
				'tab' => 'edittpl',
				'type' => 'textarea',
				'label' => $key,
				'name' => 'PSED_THEME_'.strtoupper($key),
				'class' => 'hiddentosight'
				);
			$fields_values['PSED_THEME_'.strtoupper($key)] = trim($content);
		}
		$inputs[] = array(
			'tab' => 'edittpl',
			'type' => 'html',
            'name' => 'submit_tpls_html',
            'html_content' => '<button type="submit" class="btn btn-default" name="submit_tpls">'.$this->l('Save Templates').'</button>'
			);

		Media::addJsDef(array('theme_templates'=> array_keys($this->template_files)));



		foreach ($this->css_files as $key => $content) {
			$inputs[] = array(
				'tab' => 'editthemecss',
				'type' => 'textarea',
				'label' => $key,
				'name' => 'PSED_CSS_'.strtoupper($key),
				'class' => 'hiddentosight'
				);
			$fields_values['PSED_CSS_'.strtoupper($key)] = trim($content);
		}
		$inputs[] = array(
			'tab' => 'editthemecss',
			'type' => 'html',
            'name' => 'submit_theme_css_html',
            'html_content' => '<button type="submit" class="btn btn-default" name="submit_theme_css">'.$this->l('Save Css').'</button>'
			);

		Media::addJsDef(array('theme_css'=> array_keys($this->css_files)));


		$module_css_for_js = array();
		foreach ($this->module_css_files as $module => $files_list) {


			$inputs[] = array(
				'tab' => 'editmodulecss',
				'type' => 'html',
				'name' => 'PSED_MODULE_CSS_'.strtoupper($module),
				'html_content' => '<h3>'.$module.'</h3>'
				);

			foreach ($files_list as $filename => $content) {
				$inputs[] = array(
				'tab' => 'editmodulecss',
				'type' => 'textarea',
				'label' => $filename,
				'name' => 'PSED_MODULE_CSS_'.strtoupper($module).'_'.strtoupper($filename),
				'class' => 'hiddentosight'
				);
				$fields_values['PSED_MODULE_CSS_'.strtoupper($module).'_'.strtoupper($filename)] = trim($content);
				$module_css_for_js[$module][] = $filename;
			}


			$inputs[] = array(
				'tab' => 'editmodulecss',
				'type' => 'html',
				'name' => 'PSED_MODULE_CSS_'.strtoupper($module),
				'html_content' => '<hr>'
				);

			
		}

		$inputs[] = array(
			'tab' => 'editmodulecss',
			'type' => 'html',
            'name' => 'submit_module_css_html',
            'html_content' => '<button type="submit" class="btn btn-default" name="submit_module_css">'.$this->l('Save Css').'</button>'
			);

		Media::addJsDef(array('module_css'=> $module_css_for_js));



		foreach ($this->pdf_template_files as $key => $content) {
			$inputs[] = array(
				'tab' => 'editpdf',
				'type' => 'textarea',
				'label' => $key,
				'name' => 'PSED_PDF_'.strtoupper($key),
				'class' => 'hiddentosight'
				);
			$fields_values['PSED_PDF_'.strtoupper($key)] = trim($content);
		}

		$inputs[] = array(
			'tab' => 'editpdf',
			'type' => 'html',
            'name' => 'submit_pdf_html',
            'html_content' => '<button type="submit" class="btn btn-default" name="submit_pdf">'.$this->l('Save Templates').'</button>'
			);

		Media::addJsDef(array('pdf_templates'=> array_keys($this->pdf_template_files)));

		$current_theme = $this->context->shop->getTheme();

		$fields_form = array(
			'form' => array(
				'id_form' => 'pseditor_form',
				'legend' => array(
					'title' => $this->l('Settings'),
					'icon' => 'icon-cogs'
					),
				'tabs' => array(
	                'settings' => $this->l('Settings'),
	                'hteditor' => $this->l('.htaccess Editor'),
	                'roeditor' => $this->l('Robotx.txt Editor'),
	                'jseditor' => $this->l('Add javascript'),
	                'csseditor' => $this->l('Add CSS'),
	                'metaeditor' => $this->l('Add Meta Verification'),
	                'edittpl' => $this->l('Edit Templates') . ' - ' .$current_theme,
	                'editthemecss' => $this->l('Edit Theme CSS')  . ' - ' .$current_theme,
	                'editmodulecss' => $this->l('Edit Module CSS')  . ' - ' .$current_theme,
	                'editemails' => $this->l('Edit Email Templates')  . ' - ' .$current_theme,
	                'editpdf' => $this->l('Edit PDF Templates'),

	            ),
				'input' => $inputs,
				)
			);



		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper = new HelperForm();
		$helper->default_form_language = $lang->id;

		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules',false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => array_merge($fields_values, $this->getConfig())
		);
		return $helper->generateForm(array($fields_form));
	}



	private function _postProcess()
	{
		$this->template_files = $this->getTemplateFiles();
		$this->css_files = $this->getCssFiles();
		$this->module_css_files = $this->getModuleCssFiles();
		$this->pdf_template_files = $this->getPDFTemplateFiles();


		if (Tools::isSubmit('submit_settings'))
		{
			Configuration::updateValue('PSED_OPTIMIZEADDED', Tools::getValue('PSED_OPTIMIZEADDED'));
			$this->_html .= $this->displayConfirmation($this->l('Settings Updated!'));
		}
		else if (Tools::isSubmit('submit_htaccess'))
		{

			if(!is_writable(_PS_ROOT_DIR_.'/.htaccess'))
				$this->_html .= $this->displayError($this->l('Error: Your .htaccess file is not writable'));
			else
			{
				$fh = fopen(_PS_ROOT_DIR_.'/.htaccess', 'w+');
				fwrite($fh, $_POST['PSED_HTACCESS']);
				fclose($fh);
				$this->_html .= $this->displayConfirmation($this->l('.htaccess rewritten!'));
			}
				
		}
		else if (Tools::isSubmit('submit_robots')) {
			if(!is_writable(_PS_ROOT_DIR_.'/robots.txt'))
				$this->_html .= $this->displayError($this->l('Error: Your robots.txt file is not writable'));
			else
			{
				$fh = fopen(_PS_ROOT_DIR_.'/robots.txt', 'w+');
				fwrite($fh, $_POST['PSED_ROBOTS']);
				fclose($fh);
				$this->_html .= $this->displayConfirmation($this->l('Robots rewritten!'));
			}
		}
		else if (Tools::isSubmit('submit_js'))
		{
			Configuration::updateValue('PSED_JS_HEAD', $_POST['PSED_JS_HEAD']);
			Configuration::updateValue('PSED_JS_FOOT', $_POST['PSED_JS_FOOT']);
			$this->_html .= $this->displayConfirmation($this->l('Settings Updated!'));
		}
		else if (Tools::isSubmit('submit_css'))
		{
			Configuration::updateValue('PSED_CSS', $_POST['PSED_CSS']);
			$this->_html .= $this->displayConfirmation($this->l('Settings Updated!'));
		}
		else if (Tools::isSubmit('submit_verif'))
		{
			Configuration::updateValue('PSED_VERIF', $_POST['PSED_VERIF']);
			$this->_html .= $this->displayConfirmation($this->l('Settings Updated!'));
		}
		else if (Tools::isSubmit('submit_tpls'))
		{
			foreach ($this->template_files as $key => $value) {
				$filename = str_replace('_tpl', '.tpl', $key);
				$filepath = _PS_THEME_DIR_. $filename;
				if(!is_writable($filepath))
					$this->_errors[] = $this->l('Error: Your file is not writable') .' '. $filename;
				else
				{
					$fh = fopen($filepath, 'w+');
					fwrite($fh, $_POST['PSED_THEME_'.strtoupper($key)]);
					fclose($fh);
					
				}
			}
			// reload templates
			$this->template_files = $this->getTemplateFiles();
			if($this->_errors)
				$this->_html .= $this->displayError(implode($this->_errors, '<br />'));
			else
				$this->_html .= $this->displayConfirmation($this->l('Template Files rewritten!'));
		}
		else if (Tools::isSubmit('submit_theme_css'))
		{
			foreach ($this->css_files as $key => $value) {
				$filename = str_replace('_css', '.css', $key);
				$filepath = _PS_THEME_DIR_. 'css/'. $filename;
				if(!is_writable($filepath))
					$this->_errors[] = $this->l('Error: Your file is not writable') .' '. $filename;
				else
				{	

					$fh = fopen($filepath, 'w+');
					fwrite($fh, $_POST['PSED_CSS_'.strtoupper($key)]);
					fclose($fh);
					
				}
			}
			// reload templates
			$this->css_files = $this->getCssFiles();
			if($this->_errors)
				$this->_html .= $this->displayError(implode($this->_errors, '<br />'));
			else
				$this->_html .= $this->displayConfirmation($this->l('CSS Files rewritten!'));
		}
		else if (Tools::isSubmit('submit_pdf'))
		{
			foreach ($this->pdf_template_files as $key => $value) {
				$filename = str_replace('_tpl', '.tpl', $key);
				$filepath = _PS_ROOT_DIR_.'/pdf/'. $filename;
				if(!is_writable($filepath))
					$this->_errors[] = $this->l('Error: Your file is not writable') .' '. $filename;
				else
				{
					// d($_POST);
					// d(Tools::getValue('PSED_PDF_'.strtoupper($key)));
					$fh = fopen($filepath, 'w+');
					fwrite($fh, $_POST['PSED_PDF_'.strtoupper($key)]);
					fclose($fh);
					
				}
			}
			// reload templates
			$this->pdf_template_files = $this->getPDFTemplateFiles();
			if($this->_errors)
				$this->_html .= $this->displayError(implode($this->_errors, '<br />'));
			else
				$this->_html .= $this->displayConfirmation($this->l('Template Files rewritten!'));
		}
		else if (Tools::isSubmit('submit_module_css'))
		{
			foreach ($this->module_css_files as $key => $value) {

				foreach ($value as $b_filename => $before_content) {
					$filename = str_replace('_css', '.css', $b_filename);
					$filepath = _PS_THEME_DIR_. 'css/modules/'. $key .'/' . $filename;
						if($b_filename == 'blocklanguages_css')
						{
						}
					if(!is_writable($filepath))
					{
						// check if it's the subfolder
						$filepath = _PS_THEME_DIR_. 'css/modules/'. $key .'/css/' . $filename;
						if(!is_writable($filepath))
							$this->_errors[] = $this->l('Error: Your file is not writable') .' '. $filename;
					}
					else
					{	

						$fh = fopen($filepath, 'w+');
						fwrite($fh, $_POST['PSED_MODULE_CSS_'.strtoupper($key).'_'.strtoupper($b_filename)]);
						fclose($fh);
						
					}				
				}

			}
			// reload templates
			$this->module_css_files = $this->getModuleCssFiles();
			if($this->_errors)
				$this->_html .= $this->displayError(implode($this->_errors, '<br />'));
			else
				$this->_html .= $this->displayConfirmation($this->l('CSS Files rewritten!'));
		}

	}


	public function getConfig()
	{
		// todo need to grab templates contents, etc
		$config_keys = array_keys($this->_config);
		return Configuration::getMultiple($config_keys);
	}

	public function getTemplateFiles()
	{
		$theme_files = scandir(_PS_THEME_DIR_);
		foreach ($theme_files as $file) {
			if(substr($file, strlen($file)-3) == 'tpl')
				$templates[] = $file;
		}
		foreach ($templates as $template) {
			$template_contents[str_replace('.tpl', '_tpl', $template)] = file_get_contents(_PS_THEME_DIR_ .'/'.$template);
		}
		return $template_contents;
	}

	public function getPDFTemplateFiles()
	{
		$theme_files = scandir(_PS_ROOT_DIR_.'/pdf/');
		foreach ($theme_files as $file) {
			if(substr($file, strlen($file)-3) == 'tpl')
				$templates[] = $file;
		}
		foreach ($templates as $template) {
			$template_contents[str_replace('.tpl', '_tpl', $template)] = file_get_contents(_PS_ROOT_DIR_.'/pdf/'.$template);
		}

		// TODO NOT WORKING HERE!
		return $template_contents;
	}


	public function getCSSFiles()
	{
		$theme_files = scandir(_PS_THEME_DIR_.'/css/');
		foreach ($theme_files as $file) {
			if(substr($file, strlen($file)-3) == 'css')
				$templates[] = $file;
		}
		foreach ($templates as $template) {
			$template_contents[str_replace('.css', '_css', $template)] = file_get_contents(_PS_THEME_DIR_ .'/css/'.$template);
		}
		return $template_contents;
	}

	public function getModuleCSSFiles()
	{
		$module_folders = scandir(_PS_THEME_DIR_.'css/modules');
		foreach ($module_folders as $folder) {
			if($folder != '..' && $folder != '.' && $folder != 'index.php')
			{
				// it's a module's folder
				$module_files = scandir(_PS_THEME_DIR_.'css/modules/'.$folder);
				foreach ($module_files as $file) {
					if(substr($file, strlen($file)-4) == '.css')
						$css_files[$folder][] = $file;
					else if ($file == 'css') // tis a folder
					{
						$module_sub_files = scandir(_PS_THEME_DIR_.'css/modules/'.$folder.'/css/');
						foreach ($module_sub_files as $file)
							if(substr($file, strlen($file)-4) == '.css')
								$css_files[$folder][] = $file;
					}
				}
				
			}
		}
		foreach ($css_files as $module => $css_file_list) {
			foreach ($css_file_list as $css_file) {
				if(file_exists(_PS_THEME_DIR_.'/css/modules/'.$module.'/'.$css_file))
					$css_contents[$module][str_replace('.css', '_css', $css_file)] = file_get_contents(_PS_THEME_DIR_.'/css/modules/'.$module.'/'.$css_file);		
				else // must be in the sub folder
					$css_contents[$module][str_replace('.css', '_css', $css_file)] = file_get_contents(_PS_THEME_DIR_.'/css/modules/'.$module.'/css/'.$css_file);		
			}
			
		}
		return $css_contents;
	}


	private function getHtaccess()
	{
		
		if(!file_exists(_PS_ROOT_DIR_.'/.htaccess'))
			return false;
		else if(!is_writable(_PS_ROOT_DIR_.'/.htaccess'))
			return false;
		else return file_get_contents(_PS_ROOT_DIR_.'/.htaccess');

	}

	private function getRobots()
	{
		
		if(!file_exists(_PS_ROOT_DIR_.'/robots.txt'))
			return false;
		else if(!is_writable(_PS_ROOT_DIR_.'/robots.txt'))
			return false;
		else return file_get_contents(_PS_ROOT_DIR_.'/robots.txt');

	}


	public function hookDisplayBackOfficeHeader($params)
	{
		Media::AddJsDefL('clicktotoggle', $this->l('Click To Toggle'));
		$this->context->controller->addCSS($this->_path.'views/css/pseditor.css', 'all');
		// $this->context->controller->addJS($this->_path.'views/js/pseditor.js', 'all');
	}

	public function hookDisplayHeader($params)
	{
		// get stuff that needs to be shown here
		$js_head = Configuration::get('PSED_JS_HEAD');
		$css = Configuration::get('PSED_CSS');
		$verify = Configuration::get('PSED_VERIF');
		$optimize = Configuration::get('PSED_OPTIMIZEADDED');
		$this->context->smarty->assign(array(
			'psed_js_head'=> $js_head,
			'psed_css'=> $css,
			'psed_verify'=> $verify,
			'psed_optimize' => $optimize
		));
		return $this->display(__FILE__, 'head.tpl');
	}

	public function hookDisplayFooter($params)
	{
		$js_foot = Configuration::get('PSED_JS_FOOT');
		$this->context->smarty->assign(array(
			'psed_js_foot'=> $js_foot,
		));

		return $this->display(__FILE__, 'foot.tpl');
	}

}
