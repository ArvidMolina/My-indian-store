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
#timer-circle {
    position: relative;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    overflow: visible;
}
svg {
    height: 250px;
    transform: translate(0.5px, 0.5px) rotate(-90deg);
    width: 250px;
    overflow: visible !important;
}
.countdown__background {
    fill: none;
    stroke: #7999E6;
    stroke-width: 1;
}
.countdown__progress {
    fill: none;
    stroke: #AFC4F0;
    stroke-width: 1;
    stroke-dashoffset: 100;
    stroke-dasharray: 100;
}
#countdown-progress-label-container {
    position: absolute;
    top: 4px;
    left: 118px;
    width: auto;
    transform-origin: 8px 121px 0px;
}
#countdown-progress-label {
    position: relative;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background-color: #fff;
    text-align: center;
    line-height: 1.5;
    font-size: 12px;
    color: #e77504;
    font-weight: 600;
    left: 0;
}
.timer {
display: flex;
justify-content: center;
margin-top:30px;
}
.counter-container{
    position: absolute;
    top: 90px;
}
.counter-box {
   min-width:35px;
   float:left;
}
.seperator {
    font-size: 30px;
    color: #FFFFFF;
    text-align: center;
    width: 20px;
    float: left;
}
.counter {
    font-size: 30px;
    color: #FFFFFF;
    text-align: center;
}
.counter-text{
    font-size: 20px;
    color: #FFFFFF;
    text-align: center;
}
</style>
{block name='timer'}
<div id="countdowntimer"
class="col-sm-12 {$maintenance.timer_layout|escape:'htmlall':'UTF-8'}"
data-cdatetime="{$current_time|escape:'html':'UTF-8'}"
data-edatetime="{$maintenance.timer_date|escape:'htmlall':'UTF-8'}" data-sdatetime="{$maintenance.date_add|escape:'htmlall':'UTF-8'}" data-timelapse_display="{$maintenance.timelapse_display|intval}">
    <div class="timer col-sm-12">
        <div id="timer-circle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34">
              <circle cx="17" cy="17" r="15.5" class="countdown__background"></circle>
              <circle cx="17" cy="17" r="15.5" class="countdown__progress"></circle>
            </svg>
            <div id="countdown-progress-label-container">
                <div id="countdown-progress-label"></div>
            </div>
        </div>
        <div class="counter-container">
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
    </div>
</div>
{/block}
