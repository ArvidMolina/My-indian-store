
{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer tohttp://www.prestashop.com for more information.
* We offer the best and most useful modules PrestaShop and modifications for your online store.
*
* @category  PrestaShop Module
* @author    knowband.com <support@knowband.com>
* @copyright 2017 Knowband
* @license   see file: LICENSE.txt
*
* Description
*
* Admin tpl file
*}
<script>
    var fb_config_action = '{$action|escape:'quotes':'UTF-8'}';
    var select_product_msg = "{l s='Please select Product.' mod='facebookstore'}";
    var no_match_found = "{l s='No matches found' mod='facebookstore'}";
    var fb_app_id = "{$fb_app_id|escape:'quotes':'UTF-8'}";
    {*    var controller_path = '{$auth_action|escape:'quotes':'UTF-8'}';/*Variable contains URL*/*}
    velovalidation.setErrorLanguage({
        empty_fname: "{l s='Please enter First name.' mod='facebookstore'}",
        maxchar_fname: "{l s='First name cannot be greater than # characters.' mod='facebookstore'}",
        minchar_fname: "{l s='First name cannot be less than # characters.' mod='facebookstore'}",
        empty_mname: "{l s='Please enter middle name.' mod='facebookstore'}",
        maxchar_mname: "{l s='Middle name cannot be greater than # characters.' mod='facebookstore'}",
        minchar_mname: "{l s='Middle name cannot be less than # characters.' mod='facebookstore'}",
        only_alphabet: "{l s='Only alphabets are allowed.' mod='facebookstore'}",
        empty_lname: "{l s='Please enter Last name.' mod='facebookstore'}",
        maxchar_lname: "{l s='Last name cannot be greater than # characters.' mod='facebookstore'}",
        minchar_lname: "{l s='Last name cannot be less than # characters.' mod='facebookstore'}",
        alphanumeric: "{l s='Field should be alphanumeric.' mod='facebookstore'}",
        empty_pass: "{l s='Please enter Password.' mod='facebookstore'}",
        maxchar_pass: "{l s='Password cannot be greater than # characters.' mod='facebookstore'}",
        minchar_pass: "{l s='Password cannot be less than # characters.' mod='facebookstore'}",
        specialchar_pass: "{l s='Password should contain atleast 1 special character.' mod='facebookstore'}",
        alphabets_pass: "{l s='Password should contain alphabets.' mod='facebookstore'}",
        capital_alphabets_pass: "{l s='Password should contain atleast 1 capital letter.' mod='facebookstore'}",
        small_alphabets_pass: "{l s='Password should contain atleast 1 small letter.' mod='facebookstore'}",
        digit_pass: "{l s='Password should contain atleast 1 digit.' mod='facebookstore'}",
        empty_field: "{l s='Field cannot be empty.' mod='facebookstore'}",
        number_field: "{l s='You can enter only numbers.' mod='facebookstore'}",
        positive_number: "{l s='Number should be greater than 0.' mod='facebookstore'}",
        maxchar_field: "{l s='Field cannot be greater than # characters.' mod='facebookstore'}",
        minchar_field: "{l s='Field cannot be less than # character(s).' mod='facebookstore'}",
        empty_email: "{l s='Please enter Email.' mod='facebookstore'}",
        validate_email: "{l s='Please enter a valid Email.' mod='facebookstore'}",
        empty_country: "{l s='Please enter country name.' mod='facebookstore'}",
        maxchar_country: "{l s='Country cannot be greater than # characters.' mod='facebookstore'}",
        minchar_country: "{l s='Country cannot be less than # characters.' mod='facebookstore'}",
        empty_city: "{l s='Please enter city name.' mod='facebookstore'}",
        maxchar_city: "{l s='City cannot be greater than # characters.' mod='facebookstore'}",
        minchar_city: "{l s='City cannot be less than # characters.' mod='facebookstore'}",
        empty_state: "{l s='Please enter state name.' mod='facebookstore'}",
        maxchar_state: "{l s='State cannot be greater than # characters.' mod='facebookstore'}",
        minchar_state: "{l s='State cannot be less than # characters.' mod='facebookstore'}",
        empty_proname: "{l s='Please enter product name.' mod='facebookstore'}",
        maxchar_proname: "{l s='Product cannot be greater than # characters.' mod='facebookstore'}",
        minchar_proname: "{l s='Product cannot be less than # characters.' mod='facebookstore'}",
        empty_catname: "{l s='Please enter category name.' mod='facebookstore'}",
        maxchar_catname: "{l s='Category cannot be greater than # characters.' mod='facebookstore'}",
        minchar_catname: "{l s='Category cannot be less than # characters.' mod='facebookstore'}",
        empty_zip: "{l s='Please enter zip code.' mod='facebookstore'}",
        maxchar_zip: "{l s='Zip cannot be greater than # characters.' mod='facebookstore'}",
        minchar_zip: "{l s='Zip cannot be less than # characters.' mod='facebookstore'}",
        empty_username: "{l s='Please enter Username.' mod='facebookstore'}",
        maxchar_username: "{l s='Username cannot be greater than # characters.' mod='facebookstore'}",
        minchar_username: "{l s='Username cannot be less than # characters.' mod='facebookstore'}",
        invalid_date: "{l s='Invalid date format.' mod='facebookstore'}",
        maxchar_sku: "{l s='SKU cannot be greater than # characters.' mod='facebookstore'}",
        minchar_sku: "{l s='SKU cannot be less than # characters.' mod='facebookstore'}",
        invalid_sku: "{l s='Invalid SKU format.' mod='facebookstore'}",
        empty_sku: "{l s='Please enter SKU.' mod='facebookstore'}",
        validate_range: "{l s='Number is not in the valid range. It should be betwen # and ##' mod='facebookstore'}",
        empty_address: "{l s='Please enter address.' mod='facebookstore'}",
        minchar_address: "{l s='Address cannot be less than # characters.' mod='facebookstore'}",
        maxchar_address: "{l s='Address cannot be greater than # characters.' mod='facebookstore'}",
        empty_company: "{l s='Please enter company name.' mod='facebookstore'}",
        minchar_company: "{l s='Company name cannot be less than # characters.' mod='facebookstore'}",
        maxchar_company: "{l s='Company name cannot be greater than # characters.' mod='facebookstore'}",
        invalid_phone: "{l s='Phone number is invalid.' mod='facebookstore'}",
        empty_phone: "{l s='Please enter phone number.' mod='facebookstore'}",
        minchar_phone: "{l s='Phone number cannot be less than # characters.' mod='facebookstore'}",
        maxchar_phone: "{l s='Phone number cannot be greater than # characters.' mod='facebookstore'}",
        empty_brand: "{l s='Please enter brand name.' mod='facebookstore'}",
        maxchar_brand: "{l s='Brand name cannot be greater than # characters.' mod='facebookstore'}",
        minchar_brand: "{l s='Brand name cannot be less than # characters.' mod='facebookstore'}",
        empty_shipment: "{l s='Please enter Shimpment.' mod='facebookstore'}",
        maxchar_shipment: "{l s='Shipment cannot be greater than # characters.' mod='facebookstore'}",
        minchar_shipment: "{l s='Shipment cannot be less than # characters.' mod='facebookstore'}",
        invalid_ip: "{l s='Invalid IP format.' mod='facebookstore'}",
        invalid_url: "{l s='Invalid URL format.' mod='facebookstore'}",
        empty_url: "{l s='Please enter URL.' mod='facebookstore'}",
        valid_amount: "{l s='Field should be numeric.' mod='facebookstore'}",
        valid_decimal: "{l s='Field can have only upto two decimal values.' mod='facebookstore'}",
        max_email: "{l s='Email cannot be greater than # characters.' mod='facebookstore'}",
        specialchar_zip: "{l s='Zip should not have special characters.' mod='facebookstore'}",
        specialchar_sku: "{l s='SKU should not have special characters.' mod='facebookstore'}",
        max_url: "{l s='URL cannot be greater than # characters.' mod='facebookstore'}",
        valid_percentage: "{l s='Percentage should be in number.' mod='facebookstore'}",
        between_percentage: "{l s='Percentage should be between 0 and 100.' mod='facebookstore'}",
        maxchar_size: "{l s='Size cannot be greater than # characters.' mod='facebookstore'}",
        specialchar_size: "{l s='Size should not have special characters.' mod='facebookstore'}",
        specialchar_upc: "{l s='UPC should not have special characters.' mod='facebookstore'}",
        maxchar_upc: "{l s='UPC cannot be greater than # characters.' mod='facebookstore'}",
        specialchar_ean: "{l s='EAN should not have special characters.' mod='facebookstore'}",
        maxchar_ean: "{l s='EAN cannot be greater than # characters.' mod='facebookstore'}",
        specialchar_bar: "{l s='Barcode should not have special characters.' mod='facebookstore'}",
        maxchar_bar: "{l s='Barcode cannot be greater than # characters.' mod='facebookstore'}",
        positive_amount: "{l s='Field should be positive.' mod='facebookstore'}",
        maxchar_color: "{l s='Color could not be greater than # characters.' mod='facebookstore'}",
        invalid_color: "{l s='Color is not valid.' mod='facebookstore'}",
        specialchar: "{l s='Special characters are not allowed.' mod='facebookstore'}",
        script: "{l s='Script tags are not allowed.' mod='facebookstore'}",
        style: "{l s='Style tags are not allowed.' mod='facebookstore'}",
        iframe: "{l s='Iframe tags are not allowed.' mod='facebookstore'}",
        not_image: "{l s='Uploaded file is not an image.' mod='facebookstore'}",
        image_size: "{l s='Uploaded file size must be less than #.' mod='facebookstore'}",
        html_tags: "{l s='Field should not contain HTML tags.' mod='facebookstore'}",
        number_pos: "{l s='You can enter only positive numbers.' mod='facebookstore'}",
        invalid_separator: "{l s='Invalid comma (#) separated values.' mod='facebookstore'}",
    });
</script>
<script>
    var action_profile_general = "{$action_profile_general|escape:'quotes':'UTF-8'}";
    var select_product_msg = "{l s='Please select Product.' mod='facebookstore'}";
    var no_match_found = "{l s='No matches found' mod='facebookstore'}";
    var fb_app_id = "{$fb_app_id|escape:'quotes':'UTF-8'}";
    var page_tab_exists = "{l s='Tab already added for this Page.' mod='facebookstore'}";
    var config_link = 'index.php?controller=AdminKbFacebookConfigure';
</script> 
<div class="bootstrap">
    <div class="alert alert-success" style="display:none;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {l s='Settings saved successfully.' mod='facebookstore'}
    </div>
</div>
<div class='row'>
    <div class="profileTabs col-lg-2 col-md-3">
        <div class="list-group">
            {$i=1}
            {foreach $profile_tabs key=numStep item=tab}
                <a class="list-group-item {if $tab.selected|escape:'htmlall':'UTF-8'}active{/if}" id="link-{$tab.id|escape:'htmlall':'UTF-8'}" onclick="change_tabs(this,{$i|escape:'htmlall':'UTF-8'});">{$tab.name|escape:'htmlall':'UTF-8'}<i class="icon-exclamation-circle" style="display:none;"></i></a>
                    {$i=$i+1}
                {/foreach}
        </div>
    </div>
    {$form}{*Variable contains HTML content, escape not required*}
    {$form1}{*Variable contains HTML content, escape not required*}
    


</div>
<div id="kb_buy_link" style="text-align: center; padding: 25px; height: 140px; background: #ffffff;">
    <div><span style="font-size:18px;">{l s='You are using the Free version of the module. Click here to buy the Paid version which is having the advanced features. ' mod='facebookstore'}</span>
        <br>
        <br>
        <a target="_blank" href="https://www.knowband.com/prestashop-fb-store"><span style="margin-left:30%;max-width:40% !important;font-size:18px;" class="btn btn-block btn-success action-btn">{l s='Buy Now' mod='facebookstore'}</span></a><div>
        </div>
    </div>
</div>
    <div id="facebookstore_information_block_free_version" class="alert alert-info">
     <div>
         <div class="">
             {l s='You are currently using the free version.' mod='facebookstore'}
         </div>
         <div>
             {l s='Why should you need paid version?' mod='facebookstore'}
         </div>
         <div>
             <ol>
                 <li>{l s='Display your own text on the Facebook page' mod='facebookstore'}</li>
                 <li>{l s='Display unlimited Features Categories' mod='facebookstore'}</li>
                 <li>{l s='Display New Products, and Best sellers' mod='facebookstore'}</li>
                 <li>{l s='Customize the Features Products' mod='facebookstore'}</li>
                 <li>{l s='Configure Facebook page color from back office' mod='facebookstore'}</li>
                 <li>{l s='Add footer Content on the facebook page' mod='facebookstore'}</li>
                 
             </ol>
         </div>
     </div>
 </div>

<div class="modal"></div>




