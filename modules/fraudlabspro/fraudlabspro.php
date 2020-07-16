<?php
/**
* 2017 FraudLabs Pro
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0).
* It is available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
*    @author    Hexasoft <tech@hexasoft.com.my>
*    @copyright 2012-2017 FraudLabs Pro
*    @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

if (!defined('_PS_VERSION_'))
	exit;

class FraudLabsPro extends Module
{
	private $html;
	public $errors;

	public function __construct()
	{
		$this->name = 'fraudlabspro';
		$this->tab = 'payment_security';
		$this->version = '1.9.6';
		$this->author = 'FraudLabs Pro';
		$this->need_instance = 0;
		$this->module_key = 'cdb22a61c7ec8d1f900f6c162ad96caa';

		parent::__construct();

		$this->displayName = $this->l('FraudLabs Pro Fraud Prevention');
		$this->description = $this->l('FraudLabs Pro screens transaction for online frauds to protect your store from fraud attempts.');
	}

	public function install()
	{
		if (!parent::install() || !$this->registerHook('newOrder') || !$this->registerHook('adminOrder') || !$this->registerHook('cart') || !$this->registerHook('footer'))
			return false;

		Configuration::updateValue('FLP_LICENSE_KEY', '');

		Db::getInstance()->Execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'orders_fraudlabspro` (
			`id_order` INT(10) UNSIGNED NOT NULL,
			`is_country_match` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_high_risk_country` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`distance_in_km` VARCHAR(10) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`distance_in_mile` VARCHAR(10) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_address` VARCHAR(15) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_country` VARCHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_continent` VARCHAR(20) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_region` VARCHAR(21) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_city` VARCHAR(21) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_latitude` VARCHAR(21) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_longitude` VARCHAR(21) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_timezone` VARCHAR(10) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_elevation` VARCHAR(10) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_domain` VARCHAR(50) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_mobile_mnc` VARCHAR(100) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_mobile_mcc` VARCHAR(100) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_mobile_brand` VARCHAR(100) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_netspeed` VARCHAR(10) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_isp_name` VARCHAR(50) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`ip_usage_type` VARCHAR(30) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_free_email` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_new_domain_name` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_proxy_ip_address` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_bin_found` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_bin_country_match` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_bin_name_match` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_bin_phone_match` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_bin_prepaid` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_address_ship_forward` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_bill_ship_city_match` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_bill_ship_state_match` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_bill_ship_country_match` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_bill_ship_postal_match` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_ip_blacklist` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_email_blacklist` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_credit_card_blacklist` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_device_blacklist` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_user_blacklist` CHAR(2) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`flp_score` CHAR(3) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`flp_distribution` CHAR(3) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`flp_status` CHAR(10) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`flp_id` CHAR(15) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`flp_error_code` CHAR(3) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`flp_message` VARCHAR(50) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`flp_credits` VARCHAR(10) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`api_key` CHAR(32) NOT NULL DEFAULT \'\' COLLATE \'utf8_bin\',
			`is_blacklisted` CHAR(1) NOT NULL DEFAULT \'0\' COLLATE \'utf8_bin\',
			INDEX `id_order` (`id_order`)
		) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');

		Db::getInstance()->Execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'flp_order_ip` (
  			`id_cart` INT NOT NULL,
			`ip` VARCHAR(15) NOT NULL,
			PRIMARY KEY (`id_cart`)
		) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');

		return true;
	}

	public function getContent()
	{
		$this->postProcess();
		$this->displayConfiguration();

		return $this->html;
	}

	private function displayConfiguration()
	{
		$this->html .= '
		<script type="text/javascript">
			$(document).ready(function() {
				$(\'#submitCreateAccount\').unbind(\'click\').click(function() {
					if (!$(\'#terms_and_conditions\').attr(\'checked\'))
					{
						alert(\''.$this->l('Please accept the terms of service.').'\');
						return false;
					}
				});
			});
		</script>
		<fieldset>
			<legend>'.$this->l('FraudLabs Pro configuration').'</legend>

			<form action="'.Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI']).'" method="post" name="fraudlabspro" id="fraudlabspro">
				<label>'.$this->l('License Key:').'</label>
				<div class="margin-form">
					<input type="text" style="width:300px" name="api_key" value="'.Configuration::get('FLP_LICENSE_KEY').'"/>
				</div>
				<div class="clear">&nbsp;</div>
				<div class="margin-form">
					Enter your FraudLabs Pro License Key. You can register a free license key at
					<a href="https://www.fraudlabspro.com/sign-up?ref=4374" target="_blank">http://www.fraudlabspro.com/sign-up</a>
					if you do not have one.
				</div>
				<div class="clear">&nbsp;</div>
				<center><input type="submit" name="submitSettings" value="'.$this->l('Save').'" class="button" /></center>
			</form>
		</fieldset>';

		return $this->html;
	}

	public function postProcess()
	{
		if (Tools::isSubmit('submitSettings'))
		{
			if (Tools::getValue('api_key'))
				Configuration::updateValue('FLP_LICENSE_KEY', Tools::getValue('api_key'));
		}

		if (count($this->errors))
		{
			$err = '';
			foreach ($this->errors as $error)
				$err .= $error.'<br />';
			$this->html .= $this->displayError($err);
		}
	}

	public function hookCart($params)
	{
		if (!Validate::isLoadedObject($params['cart']))
			return;

		$ip = $_SERVER['REMOTE_ADDR'];

		if(isset($_SERVER['HTTP_CF_CONNECTING_IP']) && filter_var($_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)){
			$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
		}

		if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}

		Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'flp_order_ip` VALUES('.$params['cart']->id.',"'.$ip.'")');
	}

	public function hookNewOrder($params)
	{
		if (!Configuration::get('PS_SHOP_ENABLE') || !Configuration::get('FLP_LICENSE_KEY'))
			return;

		$customer = new Customer((int)$params['order']->id_customer);
		$address_delivery = new Address((int)$params['order']->id_address_delivery);
		$address_invoice = new Address((int)$params['order']->id_address_invoice);
		$default_currency = new Currency((int)Configuration::get('PS_CURRENCY_DEFAULT'));

		if ($address_delivery->id_state !== null || $address_delivery->id_state != '')
			$delivery_state = new State((int)$address_delivery->id_state);

		if ($address_invoice->id_state !== null || $address_invoice->id_state != '')
			$invoice_state = new State((int)$address_invoice->id_state);

		$product_list = $params['order']->getProductsDetail();

		$quantity = 0;

		foreach ($product_list as $p)
			$quantity += $p['product_quantity'];

		$ip = Db::getInstance()->getValue('SELECT `ip` FROM  `'._DB_PREFIX_.'flp_order_ip` WHERE `id_cart` = "' . ((int) $params['order']->id_cart) . '"');

		if(!$ip){
			$ip = $_SERVER['REMOTE_ADDR'];

			if(isset($_SERVER['HTTP_CF_CONNECTING_IP']) && filter_var($_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)){
				$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
			}

			if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)){
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
		}

		$bill_state = '';

		if ($address_invoice->id_state !== NULL OR $address_invoice->id_state != '')
		{
			$State = new State((int)$address_invoice->id_state);
			$bill_state = $State->iso_code;
		}

		$stream_context = stream_context_create(array('http' => array('timeout' => 10)));

		$response = Tools::file_get_contents('https://api.fraudlabspro.com/v1/order/screen?' . http_build_query(array(
			'key'				=> Configuration::get('FLP_LICENSE_KEY'),
			'ip'				=> $ip,
			'first_name'		=> $address_invoice->firstname,
			'last_name'			=> $address_invoice->lastname,
			'bill_city'			=> $address_invoice->city,
			'bill_state'		=> $bill_state,
			'bill_country'		=> Country::getIsoById((int)$address_invoice->id_country),
			'bill_zip_code'		=> $address_invoice->postcode,
			'email_domain'		=> Tools::substr($customer->email, strpos($customer->email, '@') + 1),
			'email_hash'		=> $this->hastIt($customer->email),
			'email'				=> $customer->email,
			'user_phone'		=> $address_invoice->phone,
			'ship_addr'			=> $address_delivery->address1.' '.$address_delivery->address2,
			'ship_city'			=> $address_delivery->city,
			'ship_state'		=> (Tools::getIsset($delivery_state->iso_code)) ? $delivery_state->iso_code : '',
			'ship_zip_code'		=> $address_delivery->postcode,
			'ship_country'		=> Country::getIsoById((int)$address_delivery->id_country),
			'amount'			=> $params['order']->total_paid,
			'quantity'			=> $quantity,
			'currency'			=> $default_currency->iso_code,
			'user_order_id'		=> $params['order']->id,
			'flp_checksum'		=> (isset($_COOKIE['flp_checksum'])) ? $_COOKIE['flp_checksum'] : '',
			'format'			=> 'json',
			'source'			=> 'prestashop',
			'source_version'	=> '1.9.6',
		)), false, $stream_context);

		if (is_null($json = Tools::jsonDecode($response)) === FALSE)
		{
			$data = array
			(
				$params['order']->id,
				$json->is_country_match,
				$json->is_high_risk_country,
				$json->distance_in_km,
				$json->distance_in_mile,
				$ip,
				$json->ip_country,
				$json->ip_continent,
				$json->ip_region,
				$json->ip_city,
				$json->ip_latitude,
				$json->ip_longitude,
				$json->ip_timezone,
				$json->ip_elevation,
				$json->ip_domain,
				$json->ip_mobile_mnc,
				$json->ip_mobile_mcc,
				$json->ip_mobile_brand,
				$json->ip_netspeed,
				$json->ip_isp_name,
				$json->ip_usage_type,
				$json->is_free_email,
				$json->is_new_domain_name,
				$json->is_proxy_ip_address,
				$json->is_bin_found,
				$json->is_bin_country_match,
				$json->is_bin_name_match,
				$json->is_bin_phone_match,
				$json->is_bin_prepaid,
				$json->is_address_ship_forward,
				$json->is_bill_ship_city_match,
				$json->is_bill_ship_state_match,
				$json->is_bill_ship_country_match,
				$json->is_bill_ship_postal_match,
				$json->is_ip_backlist,
				$json->is_email_blacklist,
				$json->is_credit_card_blacklist,
				$json->is_device_blacklist,
				$json->is_user_blacklist,
				$json->fraudlabspro_score,
				$json->fraudlabspro_distribution,
				$json->fraudlabspro_status,
				$json->fraudlabspro_id,
				$json->fraudlabspro_error_code,
				$json->fraudlabspro_message,
				$json->fraudlabspro_credits,
				Configuration::get('FLP_LICENSE_KEY')
			);

			Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'orders_fraudlabspro` VALUES(\''.implode('\',\'', $data).'\')');

			return true;
		}

		return true;
	}

	public function hookFooter()
	{
		return '
		<script>
			(function(){
				function s() {
					var e = document.createElement(\'script\');
					e.type = \'text/javascript\';
					e.async = true;
					e.src = (\'https:\' === document.location.protocol ? \'https://\' : \'http://\') + \'cdn.fraudlabspro.com/s.js\';
					var s = document.getElementsByTagName(\'script\')[0];
					s.parentNode.insertBefore(e, s);
				}
				(window.attachEvent) ? window.attachEvent(\'onload\', s) : window.addEventListener(\'load\', s, false);
			})();
		</script>';
	}

	public function hookAdminOrder($params)
	{
		if (Tools::getValue('approve-order') && Tools::getValue('transaction-id'))
		{
			if ($this->feedback('APPROVE', Tools::getValue('transaction-id')))
			{
				Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'orders_fraudlabspro` SET flp_status=\'APPROVE\' WHERE id_order='.(int)$params['id_order'].' LIMIT 1');
			}
		}

		if (Tools::getValue('reject-order') && Tools::getValue('transaction-id'))
		{
			if ($this->feedback('REJECT', Tools::getValue('transaction-id')))
			{
				Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'orders_fraudlabspro` SET flp_status=\'REJECT\' WHERE id_order='.(int)$params['id_order'].' LIMIT 1');
			}
		}

		if (Tools::getValue('blacklist-order') && Tools::getValue('transaction-id'))
		{
			if ($this->feedback('REJECT_BLACKLIST', Tools::getValue('transaction-id'), Tools::getValue('reason')))
			{
				Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'orders_fraudlabspro` SET flp_status=\'REJECT\', is_blacklisted=\'1\' WHERE id_order='.(int)$params['id_order'].' LIMIT 1');
			}
		}

		$row = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'orders_fraudlabspro` WHERE id_order = '.(int)$params['id_order']);

		if (!$row)
		{
			$html = array('<div class="panel">');
			$html[] = '	<div class="panel-heading">';
			$html[] = '		<img src="../modules/'.$this->name.'/logo.png" height="16" width="16" /> FraudLabs Pro Result';
			$html[] = '	</div>';

			$html[] = '	<div class="alert alert-warning">';
			$html[] = '	This order is not processed by FraudLabs Pro.';
			$html[] = '	</div>';
			$html[] = '</div>';
		}
		else
		{
			if (!isset($row['is_blacklisted']))
			{
				Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'orders_fraudlabspro` ADD COLUMN `is_blacklisted` CHAR(1) NOT NULL DEFAULT "0" AFTER `api_key`;');
				$row['is_blacklisted'] = 0;
			}

			$location = array($row['ip_continent'], $row['ip_country'], $row['ip_region'], $row['ip_city']);
			$location = implode(', ', array_unique(array_diff($location, array(''))));

			$html = array('<div class="panel">');
			$html[] = '	<div class="panel-heading">';
			$html[] = '		<img src="../modules/'.$this->name.'/logo.png" height="16" width="16" /> FraudLabs Pro Result';
			$html[] = '	</div>';
			$html[] = '';
			$html[] = '	<div class="table-responsive">';
			$html[] = '		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="3" style="border-collapse:collapse">';
			$html[] = '			<col width="10%">';
			$html[] = '			<col width="10%">';
			$html[] = '			<col width="15%">';
			$html[] = '			<col width="2%">';
			$html[] = '			<col width="10%">';
			$html[] = '			<col width="15%">';
			$html[] = '			<col width="2%">';
			$html[] = '			<col width="10%">';
			$html[] = '			<col width="15%">';
			$html[] = '			<tr>';
			$html[] = '				<td rowspan="10" valign="top" align="center">';
			$html[] = '					' . ((preg_match('/^\d+$/', $row['flp_score'])) ? '<img src="https://fraudlabspro.hexa-soft.com/images/fraudscore/fraudlabsproscore' . $row['flp_score'] . '.png" width="110" height="86" border="0">' : '');
			$html[] = '					<p><span style="font-size:1.5em;font-weight:bold;color:#' . (($row['flp_status'] == 'APPROVE') ? '339933' : (($row['flp_status'] == 'REVIEW') ? 'ff7f27' : 'f00')) . '">' . (($row['flp_status'] == 'APPROVE') ? 'APPROVED' : (($row['flp_status'] == 'REJECT') ? 'REJECTED' : $row['flp_status'])) . '</span></p>';
			$html[] = '					<hr/>';
			$html[] = '					<p><strong>Remaining Credits:</strong></p>';
			$html[] = '					<p>' . number_format($row['flp_credits'], 0, '', ',') . '</p>';
			$html[] = '				</td>';
			$html[] = '				<td><strong>Client IP</strong></td>';
			$html[] = '				<td>' . $row['ip_address'] . '</td>';
			$html[] = '				<td>&nbsp;</td>';
			$html[] = '				<td><strong>IP Location</strong></td>';
			$html[] = '				<td colspan="4"><a href="http://www.geolocation.com/' . $row['ip_address'] . '" target="_blank">' . $location . ' ' . (($location) ? '</a>' : '') . '<div style="font-size:12px">' . $row['ip_latitude'] . ', ' . $row['ip_longitude'] . '</div></td>';
			$html[] = '			</tr>';
			$html[] = '			<tr>';
			$html[] = '				<td><strong>ISP</strong></td>';
			$html[] = '				<td>' . $row['ip_isp_name'] . '</td>';
			$html[] = '				<td>&nbsp;</td>';
			$html[] = '				<td><strong>IP Domain</strong></td>';
			$html[] = '				<td>' . $row['ip_domain'] . '</td>';
			$html[] = '				<td>&nbsp;</td>';
			$html[] = '				<td><strong>Net Speed</strong></td>';
			$html[] = '				<td>' . $row['ip_netspeed'] . '</td>';
			$html[] = '			</tr>';
			$html[] = '			<tr>';
			$html[] = '				<td><strong>Using Proxy</strong><div style="font-size:10px;color:#4b4b4b">Whether IP address is from Anonymous Proxy Server.</div></td>';
			$html[] = '				<td>' . $this->displayYesNo($row['is_proxy_ip_address']) . '</td>';
			$html[] = '				<td>&nbsp;</td>';
			$html[] = '				<td><strong>IP Usage</strong></td>';
			$html[] = '				<td>' . $row['ip_usage_type'] . '</td>';
			$html[] = '				<td>&nbsp;</td>';
			$html[] = '				<td><strong>Time Zone</strong></td>';
			$html[] = '				<td>' . $row['ip_timezone'] . '</td>';
			$html[] = '			</tr>';
			$html[] = '			<tr>';
			$html[] = '				<td><strong>Distance</strong><div style="font-size:10px;color:#4b4b4b">Distance from IP address to Billing Location.</div></td>';
			$html[] = '				<td>' . (($row['distance_in_mile'] != '-') ? (number_format($row['distance_in_mile'], 2, '.', ',') . ' Miles') : '') . (($row['distance_in_km'] != '-') ? (' (' . number_format($row['distance_in_km'], 2, '.', ',') . ' KM)') : '') . '</td>';
			$html[] = '				<td colspan="6">&nbsp;</td>';
			$html[] = '			</tr>';
			$html[] = '			<tr>';
			$html[] = '				<td><strong>High Risk Country</strong></td>';
			$html[] = '				<td>' . $this->displayYesNo($row['is_high_risk_country']) . '</td>';
			$html[] = '				<td>&nbsp;</td>';
			$html[] = '				<td><strong>Free Email</strong><div style="font-size:10px;color:#4b4b4b">Whether email is from free email provider.</div></td>';
			$html[] = '				<td>' . $this->displayYesNo($row['is_free_email']) . '</td>';
			$html[] = '				<td>&nbsp;</td>';
			$html[] = '				<td><strong>Ship Forward</strong><div style="font-size:10px;color:#4b4b4b">Whether shipping address is in database of known mail drops.</div></td>';
			$html[] = '				<td>' . $this->displayYesNo($row['is_address_ship_forward']) . '</td>';
			$html[] = '			</tr>';
			$html[] = '			<tr>';
			$html[] = '				<td><strong>Email Blacklist</strong><div style="font-size:10px;color:#4b4b4b">Whether the email address is in our blacklist database.</div></td>';
			$html[] = '				<td>' . $this->displayYesNo($row['is_email_blacklist']) . '</td>';
			$html[] = '				<td>&nbsp;</td>';
			$html[] = '				<td><strong>Credit Card Blacklist</strong><div style="font-size:10px;color:#4b4b4b">Whether the credit card is in our blacklist database.</div></td>';
			$html[] = '				<td>' . $this->displayYesNo($row['is_credit_card_blacklist']) . '</td>';
			$html[] = '				<td>&nbsp;</td>';
			$html[] = '				<td><strong>BIN Found</strong><div style="font-size:10px;color:#4b4b4b">Whether the BIN information matches our BIN list.</div></td>';
			$html[] = '				<td>' . $this->displayYesNo($row['is_bin_found']) . '</td>';
			$html[] = '			</tr>';
			$html[] = '			<tr>';
			$html[] = '				<td><strong>IP Blacklist</strong><div style="font-size:10px;color:#4b4b4b">Whether the client IP is in our blacklist database.</div></td>';
			$html[] = '				<td>' . $this->displayYesNo($row['is_ip_blacklist']) . '</td>';
			$html[] = '				<td>&nbsp;</td>';
			$html[] = '				<td><strong>Device Blacklist</strong><div style="font-size:10px;color:#4b4b4b">Whether the client device is in our blacklist database.</div></td>';
			$html[] = '				<td>' . $this->displayYesNo($row['is_device_blacklist']) . '</td>';
			$html[] = '				<td colspan="3">&nbsp;</td>';
			$html[] = '			</tr>';
			$html[] = '			<tr>';
			$html[] = '				<td><strong>Transaction ID</strong></td>';
			$html[] = '				<td colspan="8"><a href="https://www.fraudlabspro.com/merchant/transaction-details/' . $row['flp_id'] . '" target="_blank">' . $row['flp_id'] . '</a></td>';
			$html[] = '			</tr>';
			$html[] = '			<tr>';
			$html[] = '				<td><strong>Error Message</strong></td>';
			$html[] = '				<td colspan="7">' . $row['flp_message'] . '</td>';
			$html[] = '			</tr>';
			$html[] = '		</table>';
			$html[] = '	</div>';
			$html[] = ' <br><br>';

			if ($row['flp_status'] == 'REVIEW')
			{
				$html[] = '	<div class="pull-right">';
				$html[] = '		<form method="post" role="form">';
				$html[] = '			<input type="hidden" name="reason" value="" />';
				$html[] = '			<input type="hidden" name="transaction-id" value="' . $row['flp_id'] . '" />';
				$html[] = '			<button class="btn btn-success" name="approve-order" value="true">Approve Order</button>';
				$html[] = '			<button class="btn btn-danger" name="reject-order" value="true">Reject Order</button>';

				if (!$row['is_blacklisted'])
				{
					$html[] = '			<button class="btn btn-default" name="blacklist-order" value="true" onclick="var reason = prompt(\'Please enter the reason(s) for blacklisting this order.\', \'\');if(reason != null){$(\'input[name=reason]\').val(reason);return true;}return false;
">Blacklist Order</button>';
				}

				$html[] = '		</form>';
				$html[] = '	</div>';
				$html[] = '	<div class="clearfix"></div>';
			}
			elseif (!$row['is_blacklisted'])
			{
				$html[] = '	<div class="pull-right">';
				$html[] = '		<form method="post" role="form">';
				$html[] = '			<input type="hidden" name="transaction-id" value="' . $row['flp_id'] . '" />';
				$html[] = '			<button class="btn btn-default" name="blacklist-order" value="true" onclick="var reason = prompt(\'Please enter the reason(s) for blacklisting this order.\', \'\');if(reason != null){$(\'input[name=reason]\').val(reason);return true;}return false;
">Blacklist Order</button>';
				$html[] = '		</form>';
				$html[] = '	</div>';
				$html[] = '	<div class="clearfix"></div>';
			}
			$html[] = '	</div>';
			$html[] = '</div>';
		}

		$this->html .= implode("\n", $html);

		return $this->html;
	}

	private function feedback($action, $id, $note = '')
	{
		$stream_context = stream_context_create(array('http' => array('timeout' => 10)));

		$response = Tools::file_get_contents('https://api.fraudlabspro.com/v1/order/feedback?' . http_build_query(array(
			'key'		=> Configuration::get('FLP_LICENSE_KEY'),
			'action'	=> $action,
			'id'		=> $id,
			'note'		=> $note,
			'format'	=> 'json',
		)), false, $stream_context);

		return true;
	}

	private static function displayYesNo($s)
	{
		return ($s == 'Y') ? 'Yes' : (($s == 'N') ? 'No' : '-');
	}

	private static function getIpByCart($id_cart)
	{
		return long2ip(Db::getInstance()->getValue('
		SELECT `ip_address`
		FROM '._DB_PREFIX_.'prestafraud_carts
		WHERE id_cart = '.(int)$id_cart));
	}

	private function hastIt($s, $prefix = 'fraudlabspro_')
	{
		$hash = $prefix.$s;
		for ($i = 0; $i < 65536; $i++)
			$hash = sha1($prefix.$hash);

		return $hash;
	}
}