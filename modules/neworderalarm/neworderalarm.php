<?php
/**
 * New order alarm module
 *
 * @copyright jgullstr
 * @link      http://www.prestashop.com/forums/user/597992-jgullstr/
 * @version   ver. 1.0.1
 *
 * CHANGELOG
 * 1.0.1 - Permission check in backoffice
 *       - Small script optimizations
 *       - preload="none" to audio tag
 *       - smaller, more discrete alarm sound
 * 1.0.0 Initial version
 */

class NewOrderAlarm extends Module
{
  public function __construct() {
    $this->name = 'neworderalarm';
    $this->author = 'jgullstr @ prestashop.com/forums';
    $this->version = '1.0.1';
		$this->tab = 'administration';
    parent::__construct();
    
    $this->displayName = $this->l('New Order Alarm');
    $this->description = $this->l('Plays an alarm sound in back-office on new order.');
  }
  
  public function getContent(){
    if (isset($_POST['alarm'])){
      if(Configuration::get('NEWORDERALARM_NEW_ORDER')){
        Configuration::updateValue('NEWORDERALARM_NEW_ORDER', FALSE);
        print json_encode(array('alarm' => '1'));
      }
      @exit();
    }else{
      Configuration::updateValue('NEWORDERALARM_NEW_ORDER', TRUE);
      return $this->l('Alarm queued. Wait to see if it works.');
    }
  }
  
  public function install(){
    return parent::install() && $this->registerHook('displayBackOfficeFooter') && $this->registerHook('actionValidateOrder');
  }

  public function hookDisplayBackOfficeFooter($params){
    if(!$this->getPermission('configure')){
      return;
    }
  
    $this->context->smarty->assign(
      array(
        'alarmAudio' => _MODULE_DIR_ . $this->name . '/media/noise.mp3',
        'alarmScript' =>  _MODULE_DIR_ . $this->name . '/js/alarm.js',
        'alarmCallback' => 'index.php?controller=AdminModules&token=' . Tools::getAdminTokenLite('AdminModules') . '&configure=neworderalarm&tab_module=administration&module_name=neworderalarm',
      )
    );
    return $this->context->smarty->fetch(_PS_MODULE_DIR_ . 'neworderalarm/views/alarm.tpl');
  }
  
  public function hookActionValidateOrder($params){
     Configuration::updateValue('NEWORDERALARM_NEW_ORDER', 1);
  }
}