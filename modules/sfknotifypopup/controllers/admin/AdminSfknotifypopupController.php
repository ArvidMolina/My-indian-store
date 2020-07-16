<?php
/**
* SFK Notification Popup Text on Home Page
*
* NOTICE OF LICENSE
* 
* Each copy of the software must be used for only one production website, it may be used on additional
* test servers. You are not permitted to make copies of the software without first purchasing the
* appropriate additional licenses. This license does not grant any reseller privileges.
* 
* @author    Shahab
* @copyright 2007-2019 Shahab-FK Enterprises
* @license   Prestashop Commercial Module License
*/

class AdminSfknotifypopupControllerCore extends AdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table     = 'sfknotifypopup';
        $this->className = 'Sfknotifypopup';
        $this->lang      = false;
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->context = Context::getContext();
        if (!Tools::getValue('realedit'))
                $this->deleted = false;
        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'confirm' => $this->l('Delete selected items?')
            )
        );
        $this->fields_list = array(
            'id_sfknotifypopup' => array(
                'title' => $this->l('Sr No.'),
                'align' => 'left',
                'width' => 'auto'
            ),
        'sfk_text' => array('title' => $this->l('Notification Information Text'),'filter_key' => 'sfk_text','align' => 'left','width' => 'auto'),
        'sfk_text_css' => array('title' => $this->l('Text Position'),'filter_key' => 'sfk_text_css','align' => 'left','width' => 'auto'),
        'sfk_dates' => array('title' => $this->l('Date'),'filter_key' => 'sfk_dates','align' => 'left','width' => 'auto'),
        );
        
        if(!$this->ajax && !isset($this->display)){
            $this->context->smarty->assign(array(
                'modules_dir' => _MODULE_DIR_
            ));
            $this->content .= $this->context->smarty->fetch(_PS_MODULE_DIR_.'sfknotifypopup/views/templates/admin/sfknotifypopupadmin.tpl');
        }
        
        parent::__construct();
    }
    public function renderForm()
    {
        $options_type = array(
            array(
            'id_option' => 'primary',
            'name' => 'Primary'
            ),
            array(
            'id_option' => 'secondary',
            'name' => 'Secondary'
            ),
            array(
           'id_option' => 'success',
           'name' => 'Success'
           ),
            array(
           'id_option' => 'danger',
           'name' => 'Danger'
           ),
            array(
           'id_option' => 'warning',
           'name' => 'Warning'
           ),
            array(
           'id_option' => 'light',
           'name' => 'Light'
           ),
            array(
           'id_option' => 'dark',
           'name' => 'Dark'
           ),
            array(
           'id_option' => 'info',
           'name' => 'Info'
           ),
           
        );
        
        if (_PS_VERSION_ < '1.6') {
            $type = 'radio' ;
        } else {
            $type = 'switch' ;
        }
        
        $this->fields_form = array(
                'legend' => array(
                    'title' => $this->l('Notifications popup information on home page Management'),
                    'image' => '../img/admin/tab-sfknotifypopup.gif'
                ),
                'input' => array(
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('Notification Information Text: '),
                        'name' => 'sfk_text',
                        'desc' => $this->l('The text will be shown on home page top or bottom of the page. '),
                        'cols' => 20,
                        'rows' => 10,
                        'required' => true
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Choose text css style on home page: '),
                        'name' => 'sfk_text_css',
                        'desc' => $this->l('The text css style helps to manage background color and text color of the popup.'),
                        'required' => true,
                        'options' => array(
                            'query' => $options_type,
                            'id' => 'id_option',
                            'name' => 'name'
                        )
                    ),
                    array(
                        'type' => "$type",
                        'label' => $this->l('Active: '),
                        'name' => 'sfk_status',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'sfk_status_on',
                                'value' => 1,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'sfk_status_off',
                                'value' => 0,
                                'label' => $this->l('No')
                            )
                        ),
                        'required' => true,
                        'desc' => $this->l('Active or Inactive record status.')
                    ),
                    array(
                        'type' => 'date',
                        'label' => $this->l('Date'),
                        'name' => 'sfk_dates',
                        'size' => 20,
                        'search' => false,
                        'desc' => $this->l('The date record added/updated.')
                    )
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'class' => 'btn btn-default'
                )
        );
        
        if(isset($_REQUEST['id_sfknotifypopup']))
        {
            $id_sfknotifypopup = (trim($_REQUEST['id_sfknotifypopup']));
        }

        if(!empty($id_sfknotifypopup)) 
        {
            $sfk_text_css = Db::getInstance()->getValue('SELECT sfk_text_css FROM '._DB_PREFIX_.'sfknotifypopup WHERE 
            id_sfknotifypopup='.pSQL($id_sfknotifypopup).' ');
            
            $this->fields_value['sfk_text_css'] = $sfk_text_css;
            
        }	
        return parent::renderForm();
    }
    
    /**
    * Surcharge de la fonction de traduction sur PS 1.7 et supérieur.
    * La fonction globale ne fonctionne pas
    * @param type $string
    * @param type $class
    * @param type $addslashes
    * @param type $htmlentities
    * @return type
     */
    public function l($string, $class = null, $addslashes = false, $htmlentities = true)
    {
        if ( _PS_VERSION_ >= '1.7') {
            return Context::getContext()->getTranslator()->trans($string);
        } else {
            return parent::l($string, $class, $addslashes, $htmlentities);
        }
    }
	
}
