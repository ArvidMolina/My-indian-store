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
<style>
.timer {
display: flex;
justify-content: center;
margin-top:30px;
background-color: rgba(255, 255, 255, 0.15);
padding: 15px 15px 5px;
}
.counter-box {
   min-width:58px;
   float:left;
}
.counter {
background: linear-gradient(#1F79BA 50%, #238CD7 50%);
border-radius: 4px;
font-size: 30px;
color: #FFFFFF;
text-align: center;
padding:5px 10px;
}
.counter-text{
font-size: 20px;
color: #FFFFFF;
text-align: center;
}
.seperator{
font-size: 30px;
color: #FFFFFF;
text-align: center;
width:20px;
float:left;
}
</style>
{block name='timer'}
<div id="countdowntimer"
class="timer col-sm-12 {$maintenance.timer_layout|escape:'htmlall':'UTF-8'}"
data-cdatetime="{$current_time|escape:'html':'UTF-8'}"
data-edatetime="{$maintenance.timer_date|escape:'htmlall':'UTF-8'}" data-sdatetime="{$maintenance.date_add|escape:'htmlall':'UTF-8'}" data-timelapse_display="{$maintenance.timelapse_display|intval}">
    <div class="counter-box">
        <div id="days" class="counter">00</div>
        <div class="counter-text">D</div>
    </div>
    <div class="seperator">:</div>
    <div class="counter-box">
        <div id="hours" class="counter">00</div>
        <div class="counter-text">H</div>
    </div>
    <div class="seperator">:</div>
    <div class="counter-box">
        <div id="minutes" class="counter">00</div>
        <div class="counter-text">M</div>
    </div>
    <div class="seperator">:</div>
    <div class="counter-box">
        <div id="seconds" class="counter">00</div>
        <div class="counter-text">S</div>
    </div>
</div>
{/block}
