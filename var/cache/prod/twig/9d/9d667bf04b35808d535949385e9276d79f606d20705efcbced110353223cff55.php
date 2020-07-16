<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__6cb8aa23d189b41d1103d5b523ca526547e302c995bbd559866d30175e970dfa */
class __TwigTemplate_efa1e2c66e85d9af7590175a4f9723a8e1032cfe666747cff7e02af802f19ea7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'extra_stylesheets' => [$this, 'block_extra_stylesheets'],
            'content_header' => [$this, 'block_content_header'],
            'content' => [$this, 'block_content'],
            'content_footer' => [$this, 'block_content_footer'],
            'sidebar_right' => [$this, 'block_sidebar_right'],
            'javascripts' => [$this, 'block_javascripts'],
            'extra_javascripts' => [$this, 'block_extra_javascripts'],
            'translate_javascripts' => [$this, 'block_translate_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=0.75\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/img/app_icon.png\" />

<title>Product • My Indian Store</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminProducts';
    var iso_user = 'en';
    var lang_is_rtl = '0';
    var full_language_code = 'en-us';
    var full_cldr_language_code = 'en-US';
    var country_iso_code = 'EE';
    var _PS_VERSION_ = '1.7.6.2';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'A new order has been placed on your shop.';
    var order_number_msg = 'Order number: ';
    var total_msg = 'Total: ';
    var from_msg = 'From: ';
    var see_order_msg = 'View this order';
    var new_customer_msg = 'A new customer registered on your shop.';
    var customer_name_msg = 'Customer name: ';
    var new_msg = 'A new message was posted on your shop.';
    var see_msg = 'Read this message';
    var token = 'b7dd92a4d3465b29ffa1025aec48fff7';
    var token_admin_orders = 'ba99f9475dfa6e3d04f5cce97b115c0d';
    var token_admin_customers = '8c3ca3a1c2192ca9bce623c1ffa8eb48';
    var token_admin_customer_threads = '9e9e9efd6538b68ee25f70fd07b0b7f9';
    var currentIndex = 'index.php?controller=AdminProducts';
    var employee_token = 'd6cec80d1a23af35601eabba2e853d28';
    var choose_language_translate = 'Choose language';
    var default_language = '1';
    var admin_modules_link = '/admin123/index.php/improve/modules/catalog/recommended?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s';
    var admin_notification_get_link = '/admin123/index.php/common/notifications?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s';
    var admin_notification_push_link = '/admin123/index.php/common/notifications/ack?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s';
    var tab_modules_list = 'prestagiftvouchers,dmuassocprodcat,etranslation,apiway,prestashoptoquickbooks';
    var update_success_msg = 'Update successful';
    var errorLogin = 'PrestaShop was unable to log in to Addons. Please check your credentials and your Internet connection.';
    var search_product_msg = 'Search for a product';
  </script>

      <link href=\"/modules/registrationfields/views/css/admin.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/admin123/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/admin123/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/gamification/views/css/gamification.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/fancybox/jquery.fancybox.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var baseAdminDir = \"\\/admin123\\/\";
var baseDir = \"\\/\";
var changeFormLanguageUrl = \"\\/admin123\\/index.php\\/configure\\/advanced\\/employees\\/change-form-language?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\";
var currency = {\"iso_code\":\"EUR\",\"sign\":\"\\u20ac\",\"name\":\"Euro\",\"format\":null};
var currency_specifications = {\"symbol\":[\".\",\",\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"currencyCode\":\"EUR\",\"currencySymbol\":\"\\u20ac\",\"positivePattern\":\"\\u00a4#,##0.00\",\"negativePattern\":\"-\\u00a4#,##0.00\",\"maxFractionDigits\":2,\"minFractionDigits\":2,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var host_mode = false;
var number_specifications = {\"symbol\":[\".\",\",\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.###\",\"negativePattern\":\"-#,##0.###\",\"maxFractionDigits\":3,\"minFractionDigits\":0,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var show_new_customers = \"1\";
var show_new_messages = false;
var show_new_orders = \"1\";
</script>
<script type=\"text/javascript\" src=\"/modules/makecommerce/views/js/makecommerce.js\"></script>
<script type=\"text/javascript\" src=\"/modules/ps_faviconnotificationbo/views/js/favico.js\"></script>
<script type=\"text/javascript\" src=\"https://myindianstore.eu/modules/securitypro/views/js/secure-random-password.min.js\"></script>
<script type=\"text/javascript\" src=\"/admin123/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" src=\"/js/admin.js?v=1.7.6.2\"></script>
<script type=\"text/javascript\" src=\"/admin123/themes/new-theme/public/cldr.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/tools.js?v=1.7.6.2\"></script>
<script type=\"text/javascript\" src=\"/admin123/public/bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/admin123/themes/default/js/vendor/nv.d3.min.js\"></script>
<script type=\"text/javascript\" src=\"/modules/gamification/views/js/gamification_bt.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/fancybox/jquery.fancybox.js\"></script>

  <script type=\"text/javascript\">
/*
 * Return total of notification per checkbox checked
 * @param  int nbNewCustomer
 * @param  int nbNewOrder
 * @param  int nbNewMessage
 * @return int result        Total of Notification
 */
function getNotification(nbNewCustomer, nbNewOrder, nbNewMessage) {
    let result = 0;
    //if radiobutton is checked
            
    return result;
}

function loadAjax(adminController) {
    \$.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: adminController,
        data: {
            ajax: true,
            action: \"GetNotifications\",
        },

        success: function(data) {

            let nbNewCustomers = parseInt(data.customer.total);
            let nbNewOrders = parseInt(data.order.total);
            let nbNewCustomerMessages = parseInt(data.customer_message.total);

            let nbTotalNotification = getNotification(nbNewCustomers, nbNewOrders, nbNewCustomerMessages);

            favicon.badge(nbTotalNotification);
        },
        error: function(err) {
            console.log(err);
            console.log(adminController);
        },
    });
}

function updateNotifications(type) {
  \$.post(
    baseAdminDir + \"ajax.php\",
    {
      \"updateElementEmployee\": \"1\",
      \"updateElementEmployeeType\": type
    }
  );
}

\$(document).ready(function() {
    adminController = adminController.replace(/\\amp;/g, '');
    //set the configuration of the favicon
    window.favicon = new Favico({
        animation: 'popFade',
        bgColor: BgColor,
        textColor: TxtColor,
    });
    loadAjax(adminController)
    setInterval(function() {
        loadAjax(adminController);
    }, 60000); //refresh notification every 60 seconds

    //update favicon when you click on the customer tab into your backoffice
    \$(document).on('click', '#subtab-AdminCustomers', function (e) {
        updateNotifications('customer');
    });
    //update favicon when you click on the customer service tab into your backoffice
    \$(document).on('click', '#subtab-AdminCustomerThreads', function (e) {
        updateNotifications('customer_message');
    });
    //update favicon when you click on the order tab into your backoffice
    \$(document).on('click', '#subtab-AdminOrders', function (e) {
        updateNotifications('order');
    });
});
</script>

<script type=\"text/javascript\">
    let BgColor = \"#ffff00\";
    let TxtColor = \"#ff0000\";
    let CheckBoxOrder = \"0\";
    let CheckBoxCustomer = \"0\";
    let CheckBoxMessage = \"0\";
    let adminController = \"https://myindianstore.eu/admin123/index.php?controller=AdminAjaxFaviconBO&amp;token=f6cc3a9ea370d32e668211025f608ec4\";
</script>



";
        // line 174
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>

<body class=\"lang-en adminproducts\">

  <header id=\"header\">

    <nav id=\"header_infos\" class=\"main-header\">
      <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

            <i class=\"material-icons js-mobile-menu\">menu</i>
      <a id=\"header_logo\" class=\"logo float-left\" href=\"https://myindianstore.eu/admin123/index.php?controller=AdminDashboard&amp;token=0db43934447f546f3089e23d277645a4\"></a>
      <span id=\"shop_version\">1.7.6.2</span>

      <div class=\"component\" id=\"quick-access-container\">
        <div class=\"dropdown quick-accesses\">
  <button class=\"btn btn-link btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"quick_select\">
    Quick Access
  </button>
  <div class=\"dropdown-menu\">
          <a class=\"dropdown-item\"
         href=\"https://myindianstore.eu/admin123/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=291161ae9194aac4822485431a60e8af\"
                 data-item=\"Catalog evaluation\"
      >Catalog evaluation</a>
          <a class=\"dropdown-item\"
         href=\"https://myindianstore.eu/admin123/index.php/improve/modules/manage?token=11d7b43602a2c39d761bf3b2d3e5e139\"
                 data-item=\"Installed modules\"
      >Installed modules</a>
          <a class=\"dropdown-item\"
         href=\"https://myindianstore.eu/admin123/index.php?controller=AdminCategories&amp;addcategory&amp;token=ae12f209493348441132aa0661f9e0b5\"
                 data-item=\"New category\"
      >New category</a>
          <a class=\"dropdown-item\"
         href=\"https://myindianstore.eu/admin123/index.php/sell/catalog/products/new?token=11d7b43602a2c39d761bf3b2d3e5e139\"
                 data-item=\"New product\"
      >New product</a>
          <a class=\"dropdown-item\"
         href=\"https://myindianstore.eu/admin123/index.php?controller=AdminCartRules&amp;addcart_rule&amp;token=74d53dc0e8c90d1a8f8cffe822b1b007\"
                 data-item=\"New voucher\"
      >New voucher</a>
          <a class=\"dropdown-item\"
         href=\"https://myindianstore.eu/admin123/index.php?controller=AdminOrders&amp;token=ba99f9475dfa6e3d04f5cce97b115c0d\"
                 data-item=\"Orders\"
      >Orders</a>
          <a class=\"dropdown-item\"
         href=\"https://myindianstore.eu/admin123/index.php?http://wholesale.myindianstore.eu/?controller=AdminModules&amp;&amp;configure=xipblog&amp;token=f7cf297591374058ae6452af9e11df6d\"
                 data-item=\"XipBlog Settings\"
      >XipBlog Settings</a>
        <div class=\"dropdown-divider\"></div>
          <a
        class=\"dropdown-item js-quick-link\"
        href=\"#\"
        data-rand=\"133\"
        data-icon=\"icon-AdminCatalog\"
        data-method=\"add\"
        data-url=\"index.php/sell/catalog/products/73\"
        data-post-link=\"https://myindianstore.eu/admin123/index.php?controller=AdminQuickAccesses&token=7d9ea4a607e4c701a1d0b09413711c00\"
        data-prompt-text=\"Please name this shortcut:\"
        data-link=\"Products - List\"
      >
        <i class=\"material-icons\">add_circle</i>
        Add current page to QuickAccess
      </a>
        <a class=\"dropdown-item\" href=\"https://myindianstore.eu/admin123/index.php?controller=AdminQuickAccesses&token=7d9ea4a607e4c701a1d0b09413711c00\">
      <i class=\"material-icons\">settings</i>
      Manage quick accesses
    </a>
  </div>
</div>
      </div>
      <div class=\"component\" id=\"header-search-container\">
        <form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form collapsed\"
      method=\"post\"
      action=\"/admin123/index.php?controller=AdminSearch&amp;token=2a75c18d1dbadcdace4982652f62db9b\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input type=\"text\" class=\"form-control js-form-search\" id=\"bo_query\" name=\"bo_query\" value=\"\" placeholder=\"Search (e.g.: product reference, customer name…)\">
    <div class=\"input-group-append\">
      <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        Everywhere
      </button>
      <div class=\"dropdown-menu js-items-list\">
        <a class=\"dropdown-item\" data-item=\"Everywhere\" href=\"#\" data-value=\"0\" data-placeholder=\"What are you looking for?\" data-icon=\"icon-search\"><i class=\"material-icons\">search</i> Everywhere</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" data-item=\"Catalog\" href=\"#\" data-value=\"1\" data-placeholder=\"Product name, SKU, reference...\" data-icon=\"icon-book\"><i class=\"material-icons\">store_mall_directory</i> Catalog</a>
        <a class=\"dropdown-item\" data-item=\"Customers by name\" href=\"#\" data-value=\"2\" data-placeholder=\"Email, name...\" data-icon=\"icon-group\"><i class=\"material-icons\">group</i> Customers by name</a>
        <a class=\"dropdown-item\" data-item=\"Customers by ip address\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.89\" data-icon=\"icon-desktop\"><i class=\"material-icons\">desktop_mac</i> Customers by IP address</a>
        <a class=\"dropdown-item\" data-item=\"Orders\" href=\"#\" data-value=\"3\" data-placeholder=\"Order ID\" data-icon=\"icon-credit-card\"><i class=\"material-icons\">shopping_basket</i> Orders</a>
        <a class=\"dropdown-item\" data-item=\"Invoices\" href=\"#\" data-value=\"4\" data-placeholder=\"Invoice Number\" data-icon=\"icon-book\"><i class=\"material-icons\">book</i> Invoices</a>
        <a class=\"dropdown-item\" data-item=\"Carts\" href=\"#\" data-value=\"5\" data-placeholder=\"Cart ID\" data-icon=\"icon-shopping-cart\"><i class=\"material-icons\">shopping_cart</i> Carts</a>
        <a class=\"dropdown-item\" data-item=\"Modules\" href=\"#\" data-value=\"7\" data-placeholder=\"Module name\" data-icon=\"icon-puzzle-piece\"><i class=\"material-icons\">extension</i> Modules</a>
      </div>
      <button class=\"btn btn-primary\" type=\"submit\"><span class=\"d-none\">SEARCH</span><i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
    \$('#bo_query').one('click', function() {
    \$(this).closest('form').removeClass('collapsed');
  });
});
</script>
      </div>

      
      
      <div class=\"component\" id=\"header-shop-list-container\">
          <div class=\"shop-list\">
    <a class=\"link\" id=\"header_shopname\" href=\"http://myindianstore.eu/\" target= \"_blank\">
      <i class=\"material-icons\">visibility</i>
      View my shop
    </a>
  </div>
      </div>

              <div class=\"component header-right-component\" id=\"header-notifications-container\">
          <div id=\"notif\" class=\"notification-center dropdown dropdown-clickable\">
  <button class=\"btn notification js-notification dropdown-toggle\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">notifications_none</i>
    <span id=\"notifications-total\" class=\"count hide\">0</span>
  </button>
  <div class=\"dropdown-menu dropdown-menu-right js-notifs_dropdown\">
    <div class=\"notifications\">
      <ul class=\"nav nav-tabs\" role=\"tablist\">
                          <li class=\"nav-item\">
            <a
              class=\"nav-link active\"
              id=\"orders-tab\"
              data-toggle=\"tab\"
              data-type=\"order\"
              href=\"#orders-notifications\"
              role=\"tab\"
            >
              Orders<span id=\"_nb_new_orders_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"customers-tab\"
              data-toggle=\"tab\"
              data-type=\"customer\"
              href=\"#customers-notifications\"
              role=\"tab\"
            >
              Customers<span id=\"_nb_new_customers_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"messages-tab\"
              data-toggle=\"tab\"
              data-type=\"customer_message\"
              href=\"#messages-notifications\"
              role=\"tab\"
            >
              Messages<span id=\"_nb_new_messages_\"></span>
            </a>
          </li>
                        </ul>

      <!-- Tab panes -->
      <div class=\"tab-content\">
                          <div class=\"tab-pane active empty\" id=\"orders-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              No new order for now :(<br>
              Did you check your conversion rate lately?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"customers-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              No new customer for now :(<br>
              Are you active on social media these days?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"messages-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              No new message for now.<br>
              No news is good news, isn't it?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                        </div>
    </div>
  </div>
</div>

  <script type=\"text/html\" id=\"order-notification-template\">
    <a class=\"notif\" href='order_url'>
      #_id_order_ -
      from <strong>_customer_name_</strong> (_iso_code_)_carrier_
      <strong class=\"float-sm-right\">_total_paid_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"customer-notification-template\">
    <a class=\"notif\" href='customer_url'>
      #_id_customer_ - <strong>_customer_name_</strong>_company_ - registered <strong>_date_add_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"message-notification-template\">
    <a class=\"notif\" href='message_url'>
    <span class=\"message-notification-status _status_\">
      <i class=\"material-icons\">fiber_manual_record</i> _status_
    </span>
      - <strong>_customer_name_</strong> (_company_) - <i class=\"material-icons\">access_time</i> _date_add_
    </a>
  </script>
        </div>
      
      <div class=\"component\" id=\"header-employee-container\">
        <div class=\"dropdown employee-dropdown\">
  <div class=\"rounded-circle person\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">account_circle</i>
  </div>
  <div class=\"dropdown-menu dropdown-menu-right\">
    <div class=\"employee-wrapper-avatar\">
      
      <span class=\"employee_avatar\"><img class=\"avatar rounded-circle\" src=\"https://profile.prestashop.com/tech%40myindianstore.eu.jpg\" /></span>
      <span class=\"employee_profile\">Welcome back My indian</span>
      <a class=\"dropdown-item employee-link profile-link\" href=\"/admin123/index.php/configure/advanced/employees/1/edit?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\">
      <i class=\"material-icons\">settings</i>
      Your profile
    </a>
    </div>
    
    <p class=\"divider\"></p>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/resources/documentations?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=resources-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">book</i> Resources</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/training?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=training-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">school</i> Training</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/experts?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=expert-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">person_pin_circle</i> Find an Expert</a>
    <a class=\"dropdown-item\" href=\"https://addons.prestashop.com?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=addons-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">extension</i> PrestaShop Marketplace</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/contact?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=help-center-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">help</i> Help Center</a>
    <p class=\"divider\"></p>
    <a class=\"dropdown-item employee-link text-center\" id=\"header_logout\" href=\"https://myindianstore.eu/admin123/index.php?controller=AdminLogin&amp;logout=1&amp;token=515a054d7f0e9c3d90226f909ebb0897\">
      <i class=\"material-icons d-lg-none\">power_settings_new</i>
      <span>Sign out</span>
    </a>
  </div>
</div>
      </div>
    </nav>

      </header>

  <nav class=\"nav-bar d-none d-md-block\">
  <span class=\"menu-collapse\" data-toggle-url=\"/admin123/index.php/configure/advanced/employees/toggle-navigation?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\">
    <i class=\"material-icons\">chevron_left</i>
    <i class=\"material-icons\">chevron_left</i>
  </span>

  <ul class=\"main-menu\">

          
                
                
        
          <li class=\"link-levelone \" data-submenu=\"1\" id=\"tab-AdminDashboard\">
            <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminDashboard&amp;token=0db43934447f546f3089e23d277645a4\" class=\"link\" >
              <i class=\"material-icons\">trending_up</i> <span>Dashboard</span>
            </a>
          </li>

        
                
                                  
                
        
          <li class=\"category-title -active\" data-submenu=\"2\" id=\"tab-SELL\">
              <span class=\"title\">Sell</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"3\" id=\"subtab-AdminParentOrders\">
                  <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminOrders&amp;token=ba99f9475dfa6e3d04f5cce97b115c0d\" class=\"link\">
                    <i class=\"material-icons mi-shopping_basket\">shopping_basket</i>
                    <span>
                    Orders
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"4\" id=\"subtab-AdminOrders\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminOrders&amp;token=ba99f9475dfa6e3d04f5cce97b115c0d\" class=\"link\"> Orders
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"5\" id=\"subtab-AdminInvoices\">
                              <a href=\"/admin123/index.php/sell/orders/invoices/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Invoices
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"6\" id=\"subtab-AdminSlip\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminSlip&amp;token=6bb6bdccfe8a87492b5fc2d0f7fb5064\" class=\"link\"> Credit Slips
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"7\" id=\"subtab-AdminDeliverySlip\">
                              <a href=\"/admin123/index.php/sell/orders/delivery-slips/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Delivery Slips
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"8\" id=\"subtab-AdminCarts\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminCarts&amp;token=06442b33cdc81b115031f83ee2829d47\" class=\"link\"> Shopping Carts
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                                                    
                <li class=\"link-levelone has_submenu -active open ul-open\" data-submenu=\"9\" id=\"subtab-AdminCatalog\">
                  <a href=\"/admin123/index.php/sell/catalog/products?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\">
                    <i class=\"material-icons mi-store\">store</i>
                    <span>
                    Catalog
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_up
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo -active\" data-submenu=\"10\" id=\"subtab-AdminProducts\">
                              <a href=\"/admin123/index.php/sell/catalog/products?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Products
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"11\" id=\"subtab-AdminCategories\">
                              <a href=\"/admin123/index.php/sell/catalog/categories?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Categories
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"12\" id=\"subtab-AdminTracking\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminTracking&amp;token=2af172103aef35457cc98728ab339a11\" class=\"link\"> Monitoring
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"13\" id=\"subtab-AdminParentAttributesGroups\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminAttributesGroups&amp;token=4766e0ba5ab9b5f7755871f86f967515\" class=\"link\"> Attributes &amp; Features
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"16\" id=\"subtab-AdminParentManufacturers\">
                              <a href=\"/admin123/index.php/sell/catalog/brands/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Brands &amp; Suppliers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"19\" id=\"subtab-AdminAttachments\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminAttachments&amp;token=b0610f8a37db27253d92c243137bc16f\" class=\"link\"> Files
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"20\" id=\"subtab-AdminParentCartRules\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminCartRules&amp;token=74d53dc0e8c90d1a8f8cffe822b1b007\" class=\"link\"> Discounts
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"23\" id=\"subtab-AdminStockManagement\">
                              <a href=\"/admin123/index.php/sell/stocks/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Stocks
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"24\" id=\"subtab-AdminParentCustomer\">
                  <a href=\"/admin123/index.php/sell/customers/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\">
                    <i class=\"material-icons mi-account_circle\">account_circle</i>
                    <span>
                    Customers
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"25\" id=\"subtab-AdminCustomers\">
                              <a href=\"/admin123/index.php/sell/customers/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Customers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"26\" id=\"subtab-AdminAddresses\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminAddresses&amp;token=d201beb23e5548ece102f3eefa5a4130\" class=\"link\"> Addresses
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"233\" id=\"subtab-AdminCustomerRegistrationFields\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminCustomerRegistrationFields&amp;token=b39e8dcdea86c1735849e27df95c304d\" class=\"link\"> Registration Fields
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"28\" id=\"subtab-AdminParentCustomerThreads\">
                  <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminCustomerThreads&amp;token=9e9e9efd6538b68ee25f70fd07b0b7f9\" class=\"link\">
                    <i class=\"material-icons mi-chat\">chat</i>
                    <span>
                    Customer Service
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"29\" id=\"subtab-AdminCustomerThreads\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminCustomerThreads&amp;token=9e9e9efd6538b68ee25f70fd07b0b7f9\" class=\"link\"> Customer Service
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"30\" id=\"subtab-AdminOrderMessage\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminOrderMessage&amp;token=13227519fbfd52cce5e4b0cc02426a38\" class=\"link\"> Order Messages
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"31\" id=\"subtab-AdminReturn\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminReturn&amp;token=a0b3b8abcd4c8dbd46f31d330b6dbac0\" class=\"link\"> Merchandise Returns
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"32\" id=\"subtab-AdminStats\">
                  <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminStats&amp;token=291161ae9194aac4822485431a60e8af\" class=\"link\">
                    <i class=\"material-icons mi-assessment\">assessment</i>
                    <span>
                    Stats
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"42\" id=\"tab-IMPROVE\">
              <span class=\"title\">Improve</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"43\" id=\"subtab-AdminParentModulesSf\">
                  <a href=\"/admin123/index.php/improve/modules/manage?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Modules
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"44\" id=\"subtab-AdminModulesSf\">
                              <a href=\"/admin123/index.php/improve/modules/manage?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Module Manager
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"48\" id=\"subtab-AdminParentModulesCatalog\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminPsMboModule&amp;token=f995e0a42c9fa695deb0d0f90fbd9463\" class=\"link\"> Module Catalog
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"205\" id=\"subtab-AdminActionsOPC\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminActionsOPC&amp;token=6c1a60c1ff12f30ef52e9a349aa43cf7\" class=\"link\"> One Page Checkout PrestaShop
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"52\" id=\"subtab-AdminParentThemes\">
                  <a href=\"/admin123/index.php/improve/design/themes/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\">
                    <i class=\"material-icons mi-desktop_mac\">desktop_mac</i>
                    <span>
                    Design
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-52\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"195\" id=\"subtab-AdminThemesParent\">
                              <a href=\"/admin123/index.php/improve/design/themes/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Theme &amp; Logo
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"134\" id=\"subtab-AdminPsMboTheme\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminPsMboTheme&amp;token=ded4c50b7c3780c61539d190a1f39385\" class=\"link\"> Theme Catalog
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"55\" id=\"subtab-AdminMailThemeParent\">
                              <a href=\"/admin123/index.php/improve/design/mail_theme/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Email Theme
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"57\" id=\"subtab-AdminCmsContent\">
                              <a href=\"/admin123/index.php/improve/design/cms-pages/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Pages
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"58\" id=\"subtab-AdminModulesPositions\">
                              <a href=\"/admin123/index.php/improve/design/modules/positions/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Positions
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"59\" id=\"subtab-AdminImages\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminImages&amp;token=ad02e8548dd3407b60b4bd8d1e730f51\" class=\"link\"> Image Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"125\" id=\"subtab-AdminLinkWidget\">
                              <a href=\"/admin123/index.php/modules/link-widget/list?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Link Widget
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"60\" id=\"subtab-AdminParentShipping\">
                  <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminCarriers&amp;token=0ca9273c20cab6d35cc479ccb632ba58\" class=\"link\">
                    <i class=\"material-icons mi-local_shipping\">local_shipping</i>
                    <span>
                    Shipping
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-60\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"61\" id=\"subtab-AdminCarriers\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminCarriers&amp;token=0ca9273c20cab6d35cc479ccb632ba58\" class=\"link\"> Carriers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"62\" id=\"subtab-AdminShipping\">
                              <a href=\"/admin123/index.php/improve/shipping/preferences?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Preferences
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"208\" id=\"subtab-AdminVenipak\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminVenipak&amp;token=4bf1e3ba99e2f587509206a0b843fcec\" class=\"link\"> Venipak
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"63\" id=\"subtab-AdminParentPayment\">
                  <a href=\"/admin123/index.php/improve/payment/payment_methods?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\">
                    <i class=\"material-icons mi-payment\">payment</i>
                    <span>
                    Payment
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-63\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"64\" id=\"subtab-AdminPayment\">
                              <a href=\"/admin123/index.php/improve/payment/payment_methods?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Payment Methods
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"65\" id=\"subtab-AdminPaymentPreferences\">
                              <a href=\"/admin123/index.php/improve/payment/preferences?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Preferences
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"66\" id=\"subtab-AdminInternational\">
                  <a href=\"/admin123/index.php/improve/international/localization/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\">
                    <i class=\"material-icons mi-language\">language</i>
                    <span>
                    International
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-66\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"67\" id=\"subtab-AdminParentLocalization\">
                              <a href=\"/admin123/index.php/improve/international/localization/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Localization
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"72\" id=\"subtab-AdminParentCountries\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminZones&amp;token=2535aa48d2aec2d5c216a2824a9058fb\" class=\"link\"> Locations
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"76\" id=\"subtab-AdminParentTaxes\">
                              <a href=\"/admin123/index.php/improve/international/taxes/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Taxes
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"79\" id=\"subtab-AdminTranslations\">
                              <a href=\"/admin123/index.php/improve/international/translations/settings?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Translations
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"143\" id=\"subtab-Adminxprtdashboard\">
                  <a href=\"https://myindianstore.eu/admin123/index.php?controller=Adminxippost&amp;token=5997a8bae78a4134c0c878f7e28f7ff7\" class=\"link\">
                    <i class=\"material-icons mi-\"></i>
                    <span>
                    Xpert Blog
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-143\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"144\" id=\"subtab-Adminxippost\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=Adminxippost&amp;token=5997a8bae78a4134c0c878f7e28f7ff7\" class=\"link\"> Blog Posts
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"145\" id=\"subtab-Adminxipcategory\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=Adminxipcategory&amp;token=623658c62b75c326057d5c6f15a841d5\" class=\"link\"> Blog Categories
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"146\" id=\"subtab-Adminxipcomment\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=Adminxipcomment&amp;token=7513fb9b31fabe73e43b5466aa06e091\" class=\"link\"> Blog Comments
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"147\" id=\"subtab-Adminxipimagetype\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=Adminxipimagetype&amp;token=de6591e9b279f443caadce645156190d\" class=\"link\"> Blog Image Type
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"80\" id=\"tab-CONFIGURE\">
              <span class=\"title\">Configure</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"81\" id=\"subtab-ShopParameters\">
                  <a href=\"/admin123/index.php/configure/shop/preferences/preferences?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\">
                    <i class=\"material-icons mi-settings\">settings</i>
                    <span>
                    Shop Parameters
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-81\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"82\" id=\"subtab-AdminParentPreferences\">
                              <a href=\"/admin123/index.php/configure/shop/preferences/preferences?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> General
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"85\" id=\"subtab-AdminParentOrderPreferences\">
                              <a href=\"/admin123/index.php/configure/shop/order-preferences/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Order Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"88\" id=\"subtab-AdminPPreferences\">
                              <a href=\"/admin123/index.php/configure/shop/product-preferences/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Product Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"89\" id=\"subtab-AdminParentCustomerPreferences\">
                              <a href=\"/admin123/index.php/configure/shop/customer-preferences/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Customer Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"93\" id=\"subtab-AdminParentStores\">
                              <a href=\"/admin123/index.php/configure/shop/contacts/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Contact
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"96\" id=\"subtab-AdminParentMeta\">
                              <a href=\"/admin123/index.php/configure/shop/seo-urls/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Traffic &amp; SEO
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"100\" id=\"subtab-AdminParentSearchConf\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminSearchConf&amp;token=6f4a45b8b973988a8eb7f90f2e6d44ce\" class=\"link\"> Search
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"130\" id=\"subtab-AdminGamification\">
                              <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminGamification&amp;token=12a1b3f47dcfc11fda04c9fe4786b8a2\" class=\"link\"> Merchant Expertise
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"103\" id=\"subtab-AdminAdvancedParameters\">
                  <a href=\"/admin123/index.php/configure/advanced/system-information/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\">
                    <i class=\"material-icons mi-settings_applications\">settings_applications</i>
                    <span>
                    Advanced Parameters
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-103\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"104\" id=\"subtab-AdminInformation\">
                              <a href=\"/admin123/index.php/configure/advanced/system-information/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Information
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"105\" id=\"subtab-AdminPerformance\">
                              <a href=\"/admin123/index.php/configure/advanced/performance/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Performance
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"106\" id=\"subtab-AdminAdminPreferences\">
                              <a href=\"/admin123/index.php/configure/advanced/administration/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Administration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"107\" id=\"subtab-AdminEmails\">
                              <a href=\"/admin123/index.php/configure/advanced/emails/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> E-mail
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"108\" id=\"subtab-AdminImport\">
                              <a href=\"/admin123/index.php/configure/advanced/import/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Import
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"109\" id=\"subtab-AdminParentEmployees\">
                              <a href=\"/admin123/index.php/configure/advanced/employees/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Team
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"113\" id=\"subtab-AdminParentRequestSql\">
                              <a href=\"/admin123/index.php/configure/advanced/sql-requests/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Database
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"116\" id=\"subtab-AdminLogs\">
                              <a href=\"/admin123/index.php/configure/advanced/logs/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Logs
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"117\" id=\"subtab-AdminWebservice\">
                              <a href=\"/admin123/index.php/configure/advanced/webservice-keys/?_token=iCaLJfqNrDUowcrlK5ZwASq7igrH3Al4S3AQ6BLVN2s\" class=\"link\"> Webservice
                              </a>
                            </li>

                                                                                                                                                                            </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"121\" id=\"tab-DEFAULT\">
              <span class=\"title\">More</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"230\" id=\"subtab-AdminSfknotifypopup\">
                  <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminSfknotifypopup&amp;token=42e0387ccd00efdaa03d0b0d1bf10d89\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Notifications Popup Text 
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"136\" id=\"tab-AdminPosMenu\">
              <span class=\"title\">PosExtentions</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"137\" id=\"subtab-AdminPosLogo\">
                  <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminPosLogo&amp;token=1a92959f4fe5be802635e0f9a9d5c2d0\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Manage Logo
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"231\" id=\"tab-AdminRegistration\">
              <span class=\"title\">Registration Fields</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"232\" id=\"subtab-AdminRegistrationFields\">
                  <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminRegistrationFields&amp;token=91f5d8ce5dd7705f97c305dd50ac781f\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Manage Registration Fields
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                          
        
            </ul>
  
</nav>

<div id=\"main-div\">
                
      <div class=\"content-div -notoolbar \">

        

                                                        
        <div class=\"row \">
          <div class=\"col-sm-12\">
            <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>


  ";
        // line 1256
        $this->displayBlock('content_header', $context, $blocks);
        // line 1257
        echo "                 ";
        $this->displayBlock('content', $context, $blocks);
        // line 1258
        echo "                 ";
        $this->displayBlock('content_footer', $context, $blocks);
        // line 1259
        echo "                 ";
        $this->displayBlock('sidebar_right', $context, $blocks);
        // line 1260
        echo "
             
<div class=\"modal fade\" id=\"modules_list_container\">
\t<div class=\"modal-dialog\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
\t\t\t\t<h3 class=\"modal-title\">Recommended Modules and Services</h3>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div id=\"modules_list_container_tab_modal\" style=\"display:none;\"></div>
\t\t\t\t<div id=\"modules_list_loader\"><i class=\"icon-refresh icon-spin\"></i></div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
          </div>
        </div>

      </div>
    </div>

  <div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>Oh no!</h1>
  <p class=\"mt-3\">
    The mobile version of this page is not available yet.
  </p>
  <p class=\"mt-2\">
    Please use a desktop computer to access this page, until is adapted to mobile.
  </p>
  <p class=\"mt-2\">
    Thank you.
  </p>
  <a href=\"https://myindianstore.eu/admin123/index.php?controller=AdminDashboard&amp;token=0db43934447f546f3089e23d277645a4\" class=\"btn btn-primary py-1 mt-3\">
    <i class=\"material-icons\">arrow_back</i>
    Back
  </a>
</div>
  <div class=\"mobile-layer\"></div>

      <div id=\"footer\" class=\"bootstrap\">
    <audio id=\"alarmAudio\" src=\"/modules/neworderalarm/media/noise.mp3\" preload=\"none\">
Your browser does not support the audio element
</audio>
<script type=\"text/javascript\">
  var orderAlarmUrl = 'index.php?controller=AdminModules&token=f7cf297591374058ae6452af9e11df6d&configure=neworderalarm&tab_module=administration&module_name=neworderalarm';
</script>
<script type=\"text/javascript\" src=\"/modules/neworderalarm/js/alarm.js\"></script>
</div>
  

      <div class=\"bootstrap\">
      <div class=\"modal fade\" id=\"modal_addons_connect\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\"><i class=\"icon-puzzle-piece\"></i> <a target=\"_blank\" href=\"https://addons.prestashop.com/?utm_source=back-office&utm_medium=modules&utm_campaign=back-office-EN&utm_content=download\">PrestaShop Addons</a></h4>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t<!--start addons login-->
\t\t\t<form id=\"addons_login_form\" method=\"post\" >
\t\t\t\t<div>
\t\t\t\t\t<a href=\"https://addons.prestashop.com/en/login?email=tech%40myindianstore.eu&amp;firstname=My+indian&amp;lastname=Store&amp;website=http%3A%2F%2Fmyindianstore.eu%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/admin123/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
\t\t\t\t\t<h3 class=\"text-center\">Connect your shop to PrestaShop's marketplace in order to automatically import all your Addons purchases.</h3>
\t\t\t\t\t<hr />
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Don't have an account?</h4>
\t\t\t\t\t\t<p class='text-justify'>Discover the Power of PrestaShop Addons! Explore the PrestaShop Official Marketplace and find over 3 500 innovative modules and themes that optimize conversion rates, increase traffic, build customer loyalty and maximize your productivity</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Connect to PrestaShop Addons</h4>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-user\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"username_addons\" name=\"username_addons\" type=\"text\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-key\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"password_addons\" name=\"password_addons\" type=\"password\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"btn btn-link float-right _blank\" href=\"//addons.prestashop.com/en/forgot-your-password\">I forgot my password</a>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row row-padding-top\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/en/login?email=tech%40myindianstore.eu&amp;firstname=My+indian&amp;lastname=Store&amp;website=http%3A%2F%2Fmyindianstore.eu%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\">
\t\t\t\t\t\t\t\tCreate an Account
\t\t\t\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button id=\"addons_login_button\" class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">
\t\t\t\t\t\t\t\t<i class=\"icon-unlock\"></i> Sign in
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"addons_loading\" class=\"help-block\"></div>

\t\t\t</form>
\t\t\t<!--end addons login-->
\t\t\t</div>


\t\t\t\t\t</div>
\t</div>
</div>

    </div>
  
";
        // line 1387
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>
</html>";
    }

    // line 174
    public function block_stylesheets($context, array $blocks = [])
    {
    }

    public function block_extra_stylesheets($context, array $blocks = [])
    {
    }

    // line 1256
    public function block_content_header($context, array $blocks = [])
    {
    }

    // line 1257
    public function block_content($context, array $blocks = [])
    {
    }

    // line 1258
    public function block_content_footer($context, array $blocks = [])
    {
    }

    // line 1259
    public function block_sidebar_right($context, array $blocks = [])
    {
    }

    // line 1387
    public function block_javascripts($context, array $blocks = [])
    {
    }

    public function block_extra_javascripts($context, array $blocks = [])
    {
    }

    public function block_translate_javascripts($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "__string_template__6cb8aa23d189b41d1103d5b523ca526547e302c995bbd559866d30175e970dfa";
    }

    public function getDebugInfo()
    {
        return array (  1477 => 1387,  1472 => 1259,  1467 => 1258,  1462 => 1257,  1457 => 1256,  1448 => 174,  1440 => 1387,  1311 => 1260,  1308 => 1259,  1305 => 1258,  1302 => 1257,  1300 => 1256,  214 => 174,  39 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__6cb8aa23d189b41d1103d5b523ca526547e302c995bbd559866d30175e970dfa", "");
    }
}
