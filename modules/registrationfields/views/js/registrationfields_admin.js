/**
* RegistrationFields
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
*
* @category  FMM Modules
* @package   RegistrationFields
* @author    FME Modules
* @copyright 2018 FME Modules All right reserved
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/
function addRegistrationFields(fieldsHtml) {
	var chDiv = $('<div id="container-customer"></div>');
	chDiv.append(fieldsHtml);
	$('.info-customer-left').before(chDiv);
	
	$('#container-customer').before(chDiv);
}