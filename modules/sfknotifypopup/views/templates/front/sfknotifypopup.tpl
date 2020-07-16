{*
* SFK Notification Scrolling Text in Marquee Style on Home Page
*
* NOTICE OF LICENSE
* 
* Each copy of the software must be used for only one production website, it may be used on additional
* test servers. You are not permitted to make copies of the software without first purchasing the
* appropriate additional licenses. This license does not grant any reseller privileges.
* 
* @author    Shahab
* @copyright 2007-2019 ShahabFK Enterprises
* @license   Prestashop Commercial Module License
*}

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="{$SITEURL|escape:'html':'UTF-8'}modules/sfknotifypopup/views/js/rsalert.min.js"></script>
<script src="{$SITEURL|escape:'html':'UTF-8'}modules/sfknotifypopup/views/js/rsalert.js"></script>

<link rel="stylesheet" type="text/css" href="{$SITEURL|escape:'html':'UTF-8'}modules/sfknotifypopup/views/css/rsalert.min.css">
    
<script>
    RSAlert("{$SFK_TEXT_CSS|escape:'html':'UTF-8'}","{$SFK_TEXT|escape:'html':'UTF-8'}", 1000);
</script>


