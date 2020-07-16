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
}
.timer-circle {
   position: relative;
   overflow: visible;
   margin: 0 10px;
}
svg {
   height: 80px;
   transform: translate(0.5px, 0.5px) rotate(-90deg);
   width: 80px;
   overflow: visible !important;
}
.countdown__background {
   fill: none;
   stroke: #D6D6D6;
   stroke-width: 2;
}
.countdown__progress {
   fill: none;
   stroke: #ACADAD;
   stroke-width: 2;
   stroke-dashoffset: 100;
   stroke-dasharray: 100;
}
.countdown-progress-label-container {
   position: absolute;
   top: -1px;
   left: 35px;
   width: auto;
   transform-origin: 6px 42px 0px;
}
.countdown-progress-label {
   position: relative;
   width: 12px;
   height: 12px;
   border-radius: 50%;
   background-color: #D7D7D7;
   border:1px solid #ACADAD;
   text-align: center;
   line-height: 1.5;
   font-size: 12px;
   font-weight: 600;
   left: 0;
}
.counter {
   position: absolute;
   top: 23px;
   left: 27px;
   font-size: 25px;
   font-weight: bold;
   color: #238CD7;
}
.counter-text {
   padding-top: 10px;
   text-align: center;
   font-size: 22px;
   font-weight: bold;
}
</style>
{block name='timer'}
<div id="countdowntimer"
class="timer col-sm-12 {$maintenance.timer_layout|escape:'htmlall':'UTF-8'}" data-cdatetime="{$current_time|escape:'html':'UTF-8'}" data-edatetime="{$maintenance.timer_date|escape:'htmlall':'UTF-8'}" data-sdatetime="{$maintenance.date_add|escape:'htmlall':'UTF-8'}" data-timelapse_display="{$maintenance.timelapse_display|intval}">
    <div class="timer-circle" id="days">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34">
          <circle cx="17" cy="17" r="15.5" class="countdown__background"></circle>
          <circle cx="17" cy="17" r="15.5" stroke-dashoffset="100" class="countdown__progress"></circle>
      </svg>
      <div class="countdown-progress-label-container"><div class="countdown-progress-label"></div></div>
      <div class="counter">00</div>
      <div class="counter-text">D</div>
    </div>
    <div class="timer-circle" id="hours">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34">
          <circle cx="17" cy="17" r="15.5" class="countdown__background"></circle>
          <circle cx="17" cy="17" r="15.5" stroke-dashoffset="100" class="countdown__progress"></circle>
      </svg>
      <div class="countdown-progress-label-container"><div class="countdown-progress-label"></div></div>
      <div class="counter">00</div>
      <div class="counter-text">H</div>
    </div>
    <div class="timer-circle" id="minutes">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34">
          <circle cx="17" cy="17" r="15.5" class="countdown__background"></circle>
          <circle cx="17" cy="17" r="15.5" stroke-dashoffset="100" class="countdown__progress"></circle>
      </svg>
      <div class="countdown-progress-label-container"><div class="countdown-progress-label"></div></div>
      <div class="counter">00</div>
      <div class="counter-text">M</div>
    </div>
    <div class="timer-circle" id="seconds">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34">
          <circle cx="17" cy="17" r="15.5" class="countdown__background"></circle>
          <circle cx="17" cy="17" r="15.5" stroke-dashoffset="100" class="countdown__progress"></circle>
      </svg>
      <div class="countdown-progress-label-container"><div class="countdown-progress-label"></div></div>
      <div class="counter">00</div>
      <div class="counter-text">S</div>
    </div>
</div>
{/block}
