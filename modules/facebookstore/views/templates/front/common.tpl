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
* Front tpl file
*}
<style>
    ul li {
    list-style: none;
    }
   .fb_container{
   padding:15px; 
   padding-top:0px; 
   background-color:#fff;
   padding-bottom: 0px;
   width:810px;
   }
	.cart-button {
        border: 1px solid #CCC;
        border-radius: 3px;
        padding: 5px 10px;
        background-color: #FFF;
        display: inline-block;
        font-size: 12px;
   }
   .cart-button:hover { 
        background-color: #e6e6e6;
        border-color: #adadad;
   }
   .kb_fb_home_content{
    margin-top:20px;
   }
        
   body {
   background-color:#e9eaed !important;
   }
   #subcategories {
   border-top: 1px solid #d6d4d4;
   padding: 15px 0 0px 0;
   height: auto;
   }
   #fbproducts {
   border-top: 1px solid #d6d4d4;
   padding: 15px 0 0px 0;
   height: auto;
   }
   #fbproducts p.subcategory-heading {
   font-weight: bold;
   color: #333;
   margin: 0 0 15px 0; }
   #fbproducts_small {
   border-top: 1px solid #d6d4d4;
   padding: 15px 0 0px 0;
   height: auto;
   }
   #fbproducts_small p.subcategory-heading {
   font-weight: bold;
   color: #333;
   margin: 0 0 15px 0; }
   #subcategories p.subcategory-heading {
   font-weight: bold;
   color: #333;
   margin: 0 0 15px 0; }
   #subcategories ul {
   /* margin: 0 0 0 -20px; */
   }
   #subcategories ul li {
   float: left;
   width: 245px;
   margin: 0 0 15px 8px;
   text-align: center;
   {*height: 302px;*}
   border:2px solid #e9eaed;
   }
   #fbproducts ul li {
   float: left;
   width: 237px;
   margin: 0 0 13px 10px;
   text-align: center;
   height: 332px;
   border:2px solid #e9eaed;
   }
   #fbproducts_small ul li {
    float: left;
    width: 180px;
    margin: 0 0 13px 10px;
    text-align: center;
    height: 190px;
    border: 2px solid #e9eaed;
    }
   #subcategories ul li .subcategory-image {
   margin:5px;
   /* padding: 0 0 8px 0; */
   }
   #subcategories ul li .subcategory-image a {
   display: block;
   padding: 9px;
{*   border: 1px solid #d6d4d4;
*}   }
   #subcategories ul li .subcategory-image a img {
   max-width: 100%;
   vertical-align: top; }
   #fbproducts ul li .fbproducts-image {
   margin:5px;
   }
   #fbproducts ul li .fbproducts-image a {
   display: inline-block;
    }
   #fbproducts ul li .fbproducts-image a img {
   max-width: 100%;
   vertical-align: top; }
   #fbproducts_small ul li .fbproducts_small-image {
   margin:5px;
   }
   #fbproducts_small ul li .fbproducts_small-image a {
   display: block;
    }
   #fbproducts_small ul li .fbproducts_small-image a img {
   max-width: 100%;
   vertical-align: top; }
   #subcategories ul li .subcategory-name {
   font: 600 18px/22px "Open Sans", sans-serif;
   color: #555454;
   text-transform: uppercase; }
   #subcategories ul li .subcategory-name:hover {
   color: #515151; }
   #fbproducts ul li .subcategory-name {
   font: 600 16px/12px "Open Sans", sans-serif;
   color: #555454;
   text-transform: uppercase; }
   #fbproducts ul li .subcategory-name:hover {
   color: #515151; }
   #fbproducts_small ul li .subcategory-name {
   font: 600 16px/12px "Open Sans", sans-serif;
   color: #555454;
   text-transform: uppercase; }
   #fbproducts_small ul li .subcategory-name:hover {
   color: #515151; }
   #subcategories ul li .cat_desc {
   display: block; }
   #subcategories ul li:hover .subcategory-image a {
   border: 1px solid #48649f;
   padding: 3px; }
   // Category
   .go_store {
   margin-top: 35px;
   float: right;
   background-color: #48649f;
   font-size: 12px;
   font-weight: 800;
   padding: 7px;
   color:#FFF;
   box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
   font: 600 13px/18px "Open Sans", sans-serif;
   }
   {*a:hover { 
   background-color: #c6d4ef;
   }*}
   .go_store:hover { 
   background-color: #c6d4ef;
   color:#48649f;
   }
   .topnav ul {
   list-style-type: none;
   margin-bottom: 0;
   padding: 0;
   overflow: hidden;
   background-color: #48649f;
   height:42px;

   }
   .topnav li {
   float: left;
   border-right:1px solid #bbb;
   font-family:'helvetica neue', Helvetica, Arial, sans-serif;
   }
  {* .topnav li:last-child {
   border-right: none;
   }*}
   .topnav li a {
   display: block;
   color: white;
   text-align: center;
   padding: 11px 16px;
   text-decoration: none;
   }
   .topnav li a:hover:not(.active) {
   background-color: #111;
   }
   {*.btn-default {
   color: #4b4f56;
   text-shadow: 0 1px 0 #fff;
   background-color: #f6f7f9;
   background-image: none;
   background-repeat: repeat-x;
   border: 1px solid #ccc;
   font-size: 12px;
   font-weight: 800;
   box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
   }*}
   .row #header_logo {
   width: 33.33333%;
   float:left;
   margin-top:4%;
   margin-left:2%;
   padding-bottom: 15px;
   }
   .clearfix:before, .clearfix:after {
   content: " ";
   display: table;
   }
   .clearfix:after {
   clear: both; 
   }
   //Search new
   #search {
   margin: 0;
   }
   #search .input-lg {
   height: 40px;
   line-height: 20px;
   padding: 0 10px;
   }
   #search .btn-lg {
   font-size: 15px;
   line-height: 18px;
   padding: 10px 35px;
   text-shadow: 0 1px 0 #FFF;
   }
   #search input.form-control {
   border: 1px solid #C4CDE0;
   box-shadow: none;
   border-radius: 2px;
   margin: 0px;
   border-top-right-radius: 0px;
   border-bottom-right-radius: 0px;
   border-right: 0;
   height: 38px;
   }
   #search button.btn-default {
   text-shadow: none;
   background-color: #F6F7F8;
   background-image: none;
   border-color: #C4CDE0;
   margin: 0px;
   border-left: 0px;
   color: #4e5665;
   border-top-right-radius: 4px;
   border-bottom-right-radius: 4px;
   line-height: 2;
   height: 38px;
   }
   #search {
   {*	float: right;*}
   padding:25px;
   }
   #search .navbar-form input {
   border: 1px solid #c6d4ef;
   }
   #search .navbar-form {
   padding: 0 !important;
   }
   #search .btn {
   padding: 3px 10px;
   }
   #search .btn.btn-default {
   border: 1px solid #48649f;
   background-color: #48649f;
   color: #fff !important;
   margin-left:-3px;
   }
   #search .btn.btn-default:hover {
   background-color: #c6d4ef !important;
   color: #48649f !important;
   }
   #btn-default .glyphicon-search:hover {
   background-color: #c6d4ef !important;
   color: #48649f !important;
   }
   //Search new
   .row .card1 {
   margin:20px;
   position: relative;
   display: -webkit-box;
   display: -webkit-flex;
   display: -ms-flexbox;
   display: flex;
   -webkit-box-orient: vertical;
   -webkit-box-direction: normal;
   -webkit-flex-direction: column;
   -ms-flex-direction: column;
   flex-direction: column;
   background-color: #fff;
   border: 1px solid rgba(0,0,0,.125);
   border-radius: .25rem;
   }
   .row .card-header:first-child {
   border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
   }
   .row .card-header {
   padding: 0.10rem .50rem;
   margin-bottom: 0;
   background-color: #f7f7f9;
   border-bottom: 1px solid rgba(0,0,0,.125);
   }
   .footer {
   position: relative;
   right: 0;
   bottom: 0;
   left: 0;
   padding: 1rem;
   background-color: #efefef;
   text-align: center;
   margin-top:4%;
   }
   h5 {
    text-overflow: ellipsis;
   }
   	  /*16072018 css start*/
	 
	.breadcrumb a:after, .breadcrumb a:before{    width: 14px !important;
    height: 14px !important;}
	.breadcrumb a.home {
		height: 20px !important;
	}
	.breadcrumb {
		padding: 6px 15px;
	}
	.card1 h3.card-title {
		margin: 0;
    padding: 10px 0px;
    font-size: 20px;
    border-bottom: 1px solid #e9eaed;
	}
	.card1 .card-header {
		border-bottom: 0;
		background: transparent;
	}
	.bottom-pagination-content ul.pagination {
		float: right;
	}
	.bottom-pagination-content {
		border-top: 0px solid #3e2121 !important;
	}
	.footer h2 {
		font-size: 20px;
	}
	.footer p {
		font-size: 14px;
	}
	#columns{
            padding-bottom:10px;
        }
	.content_price a:hover {
		text-decoration: none;
		background: #337ab7;
		color: #fff;
	}
	.icon-home{    line-height: 1.22;}
	/*16072018 css ends*/
</style>
<link rel="stylesheet" href="{$root_url}modules/facebookstore/views/css/front/fbglobal.css" type="text/css" media="all" />{*Variable contains url, escape not required*}
<link rel="stylesheet" href="{$root_url}themes/default-bootstrap/css/global.css" type="text/css" media="all" />{*Variable contains url, escape not required*}
<link rel="stylesheet" href="{$root_url}themes/default-bootstrap/css/autoload/highdpi.css" type="text/css" media="all" />{*Variable contains url, escape not required*}
<link rel="stylesheet" href="{$root_url}themes/default-bootstrap/css/autoload/responsive-tables.css" type="text/css" media="all" />{*Variable contains url, escape not required*}
<link rel="stylesheet" href="{$root_url}themes/default-bootstrap/css/autoload/uniform.default.css" type="text/css" media="all" />{*Variable contains url, escape not required*}
<link rel="stylesheet" href="{$root_url}js/jquery/plugins/fancybox/jquery.fancybox.css" type="text/css" media="all" />{*Variable contains url, escape not required*}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{$root_url}js/jquery/jquery-1.11.0.min.js"></script>{*Variable contains url, escape not required*}
<script type="text/javascript" src="{$root_url}js/jquery/jquery-migrate-1.2.1.min.js"></script>{*Variable contains url, escape not required*}
<script type="text/javascript" src="{$root_url}js/jquery/plugins/jquery.easing.js"></script>{*Variable contains url, escape not required*}
<script type="text/javascript" src="{$root_url}js/tools.js"></script>{*Variable contains url, escape not required*}
<script type="text/javascript" src="{$root_url}themes/default-bootstrap/js/global.js"></script>{*Variable contains url, escape not required*}
<script type="text/javascript" src="{$root_url}themes/default-bootstrap/js/autoload/10-bootstrap.min.js"></script>{*Variable contains url, escape not required*}
<script type="text/javascript" src="{$root_url}themes/default-bootstrap/js/autoload/15-jquery.total-storage.min.js"></script>{*Variable contains url, escape not required*}
<script type="text/javascript" src="{$root_url}themes/default-bootstrap/js/autoload/15-jquery.uniform-modified.js"></script>{*Variable contains url, escape not required*}
<script type="text/javascript" src="{$root_url}js/jquery/plugins/fancybox/jquery.fancybox.js"></script>{*Variable contains url, escape not required*}

