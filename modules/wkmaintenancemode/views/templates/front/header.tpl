{*
*
* 2010-2019 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2019 Webkul IN
*  @license   https://store.webkul.com/license.html
*}
<!doctype html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    {block name='head_seo'}
      <title>{l s='We\'ll be back soon.' d='wkmaintenancemode'}</title>
      <meta name="description" content="{block name='head_seo_description'}{/block}">
      <meta name="keywords" content="{block name='head_seo_keywords'}{/block}">
    {/block}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {block name='head_icons'}
      <link rel="icon" type="image/vnd.microsoft.icon" href="{$shop.favicon|escape:'html':'UTF-8'}?{$shop.favicon_update_time|escape:'html':'UTF-8'}">
      <link rel="shortcut icon" type="image/x-icon" href="{$shop.favicon|escape:'html':'UTF-8'}?{$shop.favicon_update_time|escape:'html':'UTF-8'}">
    {/block}
    {block name='stylesheets'}
        {foreach $stylesheets.external as $stylesheet}
          <link rel="stylesheet" href="{$stylesheet.uri|escape:'html':'UTF-8'}" type="text/css" media="{$stylesheet.media|escape:'html':'UTF-8'}">
        {/foreach}
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    {/block}
    {if $maintenance.text_color}
    <style>
        .headline,.headline *, .description-text, .description-text *, .subscription-text, .subscription-text *,.timer3 .counter-text, .timer3 .seperator, .timer1 .seperator, .timer1 .counter-text, .timer4 .counter-text,.timer2 .counter, .timer2 .seperator, .timer2 .counter-text {
            color: {$maintenance.text_color|escape:'htmlall':'UTF-8'} !important;
        }
    </style>
    {/if}
  </head>
  <body>
