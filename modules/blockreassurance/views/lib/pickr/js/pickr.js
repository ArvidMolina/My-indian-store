!function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e():"function"==typeof define&&define.amd?define([],e):"object"==typeof exports?exports.Pickr=e():t.Pickr=e()}(window,function(){return function(t){var e={};function n(o){if(e[o])return e[o].exports;var r=e[o]={i:o,l:!1,exports:{}};return t[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}return n.m=t,n.c=e,n.d=function(t,e,o){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:o})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)n.d(o,r,function(e){return t[e]}.bind(null,r));return o},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="dist/",n(n.s=1)}([function(t,e,n){},function(t,e,n){"use strict";n.r(e);var o={};n.r(o),n.d(o,"once",function(){return a}),n.d(o,"on",function(){return c}),n.d(o,"off",function(){return s}),n.d(o,"createElementFromString",function(){return l}),n.d(o,"removeAttribute",function(){return p}),n.d(o,"createFromTemplate",function(){return h}),n.d(o,"eventPath",function(){return d}),n.d(o,"adjustableInputNumbers",function(){return f}),n.d(o,"padStart",function(){return v});var r={};n.r(r),n.d(r,"hsvToRgb",function(){return _}),n.d(r,"hsvToHex",function(){return w}),n.d(r,"hsvToCmyk",function(){return k}),n.d(r,"hsvToHsl",function(){return A}),n.d(r,"parseToHSV",function(){return E});n(0);function i(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}var a=function(t,e,n,o){return c(t,e,function t(){n.apply(this,arguments),this.removeEventListener(e,t)},o)},c=u.bind(null,"addEventListener"),s=u.bind(null,"removeEventListener");function u(t,e,n,o){var r=arguments.length>4&&void 0!==arguments[4]?arguments[4]:{};return e instanceof HTMLCollection||e instanceof NodeList?e=Array.from(e):Array.isArray(e)||(e=[e]),Array.isArray(n)||(n=[n]),e.forEach(function(e){return n.forEach(function(n){return e[t](n,o,function(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{},o=Object.keys(n);"function"==typeof Object.getOwnPropertySymbols&&(o=o.concat(Object.getOwnPropertySymbols(n).filter(function(t){return Object.getOwnPropertyDescriptor(n,t).enumerable}))),o.forEach(function(e){i(t,e,n[e])})}return t}({capture:!1},r))})}),Array.prototype.slice.call(arguments,1)}function l(t){var e=document.createElement("div");return e.innerHTML=t.trim(),e.firstElementChild}function p(t,e){var n=t.getAttribute(e);return t.removeAttribute(e),n}function h(t){return function t(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},o=p(e,"data-con"),r=p(e,"data-key");r&&(n[r]=e);for(var i=Array.from(e.children),a=o?n[o]={}:n,c=0;c<i.length;c++){var s=i[c],u=p(s,"data-arr");u?(a[u]||(a[u]=[])).push(s):t(s,a)}return n}(l(t))}function d(t){var e=t.path||t.composedPath&&t.composedPath();if(e)return e;var n=t.target.parentElement;for(e=[t.target,n];n=n.parentElement;)e.push(n);return e.push(document,window),e}function f(t){var e=!(arguments.length>1&&void 0!==arguments[1])||arguments[1],n=function(t){return t>="0"&&t<="9"||"-"===t||"."===t};function o(o){for(var r=t.value,i=t.selectionStart,a=i,c="",s=i-1;s>0&&n(r[s]);s--)c=r[s]+c,a--;for(var u=i,l=r.length;u<l&&n(r[u]);u++)c+=r[u];if(c.length>0&&!isNaN(c)&&isFinite(c)){var p=o.deltaY<0?1:-1,h=o.ctrlKey?5*p:p,d=Number(c)+h;!e&&d<0&&(d=0);var f=r.substr(0,a)+d+r.substring(a+c.length,r.length),v=a+String(d).length;t.value=f,t.focus(),t.setSelectionRange(v,v)}o.preventDefault(),t.dispatchEvent(new Event("input"))}c(t,"focus",function(){return c(window,"wheel",o)}),c(t,"blur",function(){return s(window,"wheel",o)})}function v(t,e){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:" ";return(e-=t.length)<=0||!n.length?String(t):(e>n.length&&(n+=n.repeat(e/n.length)),n.slice(0,e)+String(t))}function y(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var n=[],o=!0,r=!1,i=void 0;try{for(var a,c=t[Symbol.iterator]();!(o=(a=c.next()).done)&&(n.push(a.value),!e||n.length!==e);o=!0);}catch(t){r=!0,i=t}finally{try{o||null==c.return||c.return()}finally{if(r)throw i}}return n}(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}()}function g(t){return function(t){if(Array.isArray(t)){for(var e=0,n=new Array(t.length);e<t.length;e++)n[e]=t[e];return n}}(t)||function(t){if(Symbol.iterator in Object(t)||"[object Arguments]"===Object.prototype.toString.call(t))return Array.from(t)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}var m=Math.min,b=Math.max;function _(t,e,n){t=t/360*6,e/=100,n/=100;var o=Math.floor(t),r=t-o,i=n*(1-e),a=n*(1-r*e),c=n*(1-(1-r)*e),s=o%6;return[255*[n,a,i,i,c,n][s],255*[c,n,n,a,i,i][s],255*[i,i,c,n,n,a][s]]}function w(t,e,n){return _(t,e,n).map(function(t){return v(Math.round(t).toString(16),2,"0")})}function k(t,e,n){var o,r=_(t,e,n),i=r[0]/255,a=r[1]/255,c=r[2]/255;return[100*(1===(o=m(1-i,1-a,1-c))?0:(1-i-o)/(1-o)),100*(1===o?0:(1-a-o)/(1-o)),100*(1===o?0:(1-c-o)/(1-o)),100*o]}function A(t,e,n){var o=(2-(e/=100))*(n/=100)/2;return 0!==o&&(e=1===o?0:o<.5?e*n/(2*o):e*n/(2-2*o)),[t,100*e,100*o]}function C(t,e,n){var o,r,i=m(t/=255,e/=255,n/=255),a=b(t,e,n),c=a-i;if(0===c)o=r=0;else{r=c/a;var s=((a-t)/6+c/2)/c,u=((a-e)/6+c/2)/c,l=((a-n)/6+c/2)/c;t===a?o=l-u:e===a?o=1/3+s-l:n===a&&(o=2/3+u-s),o<0?o+=1:o>1&&(o-=1)}return[360*o,100*r,100*a]}function S(t,e,n,o){return e/=100,n/=100,g(C(255*(1-m(1,(t/=100)*(1-(o/=100))+o)),255*(1-m(1,e*(1-o)+o)),255*(1-m(1,n*(1-o)+o))))}function O(t,e,n){return e/=100,[t,2*(e*=(n/=100)<.5?n:1-n)/(n+e)*100,100*(n+e)]}function j(t){return C.apply(void 0,g(t.match(/.{2}/g).map(function(t){return parseInt(t,16)})))}function E(t){var e,n={cmyk:/^cmyk[\D]+(\d+)[\D]+(\d+)[\D]+(\d+)[\D]+(\d+)/i,rgba:/^(rgb|rgba)[\D]+(\d+)[\D]+(\d+)[\D]+(\d+)[\D]*?([\d.]+|$)/i,hsla:/^(hsl|hsla)[\D]+(\d+)[\D]+(\d+)[\D]+(\d+)[\D]*?([\d.]+|$)/i,hsva:/^(hsv|hsva)[\D]+(\d+)[\D]+(\d+)[\D]+(\d+)[\D]*?([\d.]+|$)/i,hex:/^#?(([\dA-Fa-f]{3,4})|([\dA-Fa-f]{6})|([\dA-Fa-f]{8}))$/i},o=function(t){return t.map(function(t){return/^(|\d+)\.\d+|\d+$/.test(t)?Number(t):void 0})};for(var r in n)if(e=n[r].exec(t))switch(r){case"cmyk":var i=y(o(e),5),a=i[1],c=i[2],s=i[3],u=i[4];if(a>100||c>100||s>100||u>100)break;return{values:[].concat(g(S(a,c,s,u)),[1]),type:r};case"rgba":var l=y(o(e),6),p=l[2],h=l[3],d=l[4],f=l[5],v=void 0===f?1:f;if(p>255||h>255||d>255||v<0||v>1)break;return{values:[].concat(g(C(p,h,d)),[v]),type:r};case"hex":var m=function(t,e){return[t.substring(0,e),t.substring(e,t.length)]},b=y(e,2)[1];3===b.length?b+="F":6===b.length&&(b+="FF");var _=void 0;if(4===b.length){var w=y(m(b,3).map(function(t){return t+t}),2);b=w[0],_=w[1]}else if(8===b.length){var k=y(m(b,6),2);b=k[0],_=k[1]}return _=parseInt(_,16)/255,{values:[].concat(g(j(b)),[_]),type:r};case"hsla":var A=y(o(e),6),E=A[2],x=A[3],H=A[4],P=A[5],L=void 0===P?1:P;if(E>360||x>100||H>100||L<0||L>1)break;return{values:[].concat(g(O(E,x,H)),[L]),type:r};case"hsva":var B=y(o(e),6),D=B[2],R=B[3],F=B[4],T=B[5],M=void 0===T?1:T;if(D>360||R>100||F>100||M<0||M>1)break;return{values:[D,R,F,M],type:r}}return{values:null,type:null}}function x(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0,o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1,i=Math.ceil,a={h:t,s:e,v:n,a:o,toHSVA:function(){var t=[a.h,a.s,a.v],e=t.map(i);return t.push(a.a),t.toString=function(){return"hsva(".concat(e[0],", ").concat(e[1],"%, ").concat(e[2],"%, ").concat(a.a.toFixed(1),")")},t},toHSLA:function(){var t=A(a.h,a.s,a.v),e=t.map(i);return t.push(a.a),t.toString=function(){return"hsla(".concat(e[0],", ").concat(e[1],"%, ").concat(e[2],"%, ").concat(a.a.toFixed(1),")")},t},toRGBA:function(){var t=_(a.h,a.s,a.v),e=t.map(i);return t.push(a.a),t.toString=function(){return"rgba(".concat(e[0],", ").concat(e[1],", ").concat(e[2],", ").concat(a.a.toFixed(1),")")},t},toCMYK:function(){var t=k(a.h,a.s,a.v),e=t.map(i);return t.toString=function(){return"cmyk(".concat(e[0],"%, ").concat(e[1],"%, ").concat(e[2],"%, ").concat(e[3],"%)")},t},toHEX:function(){var t=w.apply(r,[a.h,a.s,a.v]);return t.toString=function(){var e=a.a>=1?"":v(Number((255*a.a).toFixed(0)).toString(16).toUpperCase(),2,"0");return"#".concat(t.join("").toUpperCase()+e)},t},clone:function(){return x(a.h,a.s,a.v,a.a)}};return a}function H(t){var e={options:Object.assign({lockX:!1,lockY:!1,onchange:function(){return 0}},t),_tapstart:function(t){c(document,["mouseup","touchend","touchcancel"],e._tapstop),c(document,["mousemove","touchmove"],e._tapmove),t.preventDefault(),e._tapmove(t)},_tapmove:function(t){var n=e.options,o=e.cache,r=n.element,i=e.options.wrapper.getBoundingClientRect(),a=0,c=0;if(t){var s=t&&t.touches&&t.touches[0];a=t?(s||t).clientX:0,c=t?(s||t).clientY:0,a<i.left?a=i.left:a>i.left+i.width&&(a=i.left+i.width),c<i.top?c=i.top:c>i.top+i.height&&(c=i.top+i.height),a-=i.left,c-=i.top}else o&&(a=o.x*i.width,c=o.y*i.height);n.lockX||(r.style.left="calc(".concat(a/i.width*100,"% - ").concat(r.offsetWidth/2,"px)")),n.lockY||(r.style.top="calc(".concat(c/i.height*100,"% - ").concat(r.offsetWidth/2,"px)")),e.cache={x:a/i.width,y:c/i.height},n.onchange(a,c)},_tapstop:function(){s(document,["mouseup","touchend","touchcancel"],e._tapstop),s(document,["mousemove","touchmove"],e._tapmove)},trigger:function(){e._tapmove()},update:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,o=e.options.wrapper.getBoundingClientRect();e._tapmove({clientX:o.left+t,clientY:o.top+n})},destroy:function(){var t=e.options,n=e._tapstart;s([t.wrapper,t.element],"mousedown",n),s([t.wrapper,t.element],"touchstart",n,{passive:!1})}},n=e.options,o=e._tapstart;return c([n.wrapper,n.element],"mousedown",o),c([n.wrapper,n.element],"touchstart",o,{passive:!1}),e}function P(t){return function(t){if(Array.isArray(t)){for(var e=0,n=new Array(t.length);e<t.length;e++)n[e]=t[e];return n}}(t)||function(t){if(Symbol.iterator in Object(t)||"[object Arguments]"===Object.prototype.toString.call(t))return Array.from(t)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}function L(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};t=Object.assign({onchange:function(){return 0},className:"",elements:[]},t);var e=c(t.elements,"click",function(e){t.elements.forEach(function(n){return n.classList[e.target===n?"add":"remove"](t.className)}),t.onchange(e)});return{destroy:function(){return s.apply(o,P(e))}}}function B(t){return function(t){if(Array.isArray(t)){for(var e=0,n=new Array(t.length);e<t.length;e++)n[e]=t[e];return n}}(t)||function(t){if(Symbol.iterator in Object(t)||"[object Arguments]"===Object.prototype.toString.call(t))return Array.from(t)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}function D(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}var R=function(){function t(e){var n=this;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.options=Object.assign({useAsButton:!1,disabled:!1,comparison:!0,components:{interaction:{}},strings:{},swatches:null,default:"fff",defaultRepresentation:"HEX",position:"middle",adjustableNumbers:!0,showAlways:!1,parent:void 0,closeWithKey:"Escape"},e),this.options.components.interaction||(this.options.components.interaction={}),this._initializingActive=!0,this._recalc=!0,this._color=x(),this._lastColor=x(),this._swatchColors=[],this._eventListener={swatchselect:[],change:[],save:[],init:[]},this._preBuild(),this._buildComponents(),this._bindEvents(),this._representation=this.options.defaultRepresentation,this.setColorRepresentation(this._representation),this._finalBuild(),this._rePositioningPicker();var o=this.options.swatches;o&&o.length&&o.forEach(function(t){return n.addSwatch(t)});var r=this._root.app.parentElement;requestAnimationFrame(function t(){var n=this;if(null===r.offsetParent&&r!==document.body)return requestAnimationFrame(t.bind(this));this.setColor(this.options.default),e.showAlways&&this.show(),this._initializingActive=!1,this._emit("init"),c(window,"resize",function(){return n._rePositioningPicker()})}.bind(this))}var e,n,r;return e=t,(n=[{key:"_preBuild",value:function(){var t,e,n,o,r,i,a,c=this.options;"string"==typeof c.el&&(c.el=document.querySelector(c.el)),this._root=(e=(t=c).components,n=t.strings,o=t.useAsButton,r=function(t){return t?"":'style="display:none" hidden'},i=h('\n        <div data-key="root" class="pickr">\n        \n            '.concat(o?"":'<button type="button" data-key="button" class="pcr-button"></button>','\n\n            <div data-key="app" class="pcr-app">\n                <div class="pcr-selection">\n                    <div data-con="preview" class="pcr-color-preview" ').concat(r(e.preview),'>\n                        <button type="button" data-key="lastColor" class="pcr-last-color"></button>\n                        <div data-key="currentColor" class="pcr-current-color"></div>\n                    </div>\n\n                    <div data-con="palette" class="pcr-color-palette">\n                        <div data-key="picker" class="pcr-picker"></div>\n                        <div data-key="palette" class="pcr-palette"></div>\n                    </div>\n\n                    <div data-con="hue" class="pcr-color-chooser" ').concat(r(e.hue),'>\n                        <div data-key="picker" class="pcr-picker"></div>\n                        <div data-key="slider" class="pcr-hue pcr-slider"></div>\n                    </div>\n\n                    <div data-con="opacity" class="pcr-color-opacity" ').concat(r(e.opacity),'>\n                        <div data-key="picker" class="pcr-picker"></div>\n                        <div data-key="slider" class="pcr-opacity pcr-slider"></div>\n                    </div>\n                </div>\n\n                <div class="swatches" data-key="swatches"></div> \n\n                <div data-con="interaction" class="pcr-interaction" ').concat(r(Object.keys(e.interaction).length),'>\n                    <input data-key="result" class="pcr-result" type="text" spellcheck="false" ').concat(r(e.interaction.input),'>\n\n                    <input data-arr="options" class="pcr-type" data-type="HEX" value="HEX" type="button" ').concat(r(e.interaction.hex),'>\n                    <input data-arr="options" class="pcr-type" data-type="RGBA" value="RGBa" type="button" ').concat(r(e.interaction.rgba),'>\n                    <input data-arr="options" class="pcr-type" data-type="HSLA" value="HSLa" type="button" ').concat(r(e.interaction.hsla),'>\n                    <input data-arr="options" class="pcr-type" data-type="HSVA" value="HSVa" type="button" ').concat(r(e.interaction.hsva),'>\n                    <input data-arr="options" class="pcr-type" data-type="CMYK" value="CMYK" type="button" ').concat(r(e.interaction.cmyk),'>\n\n                    <input data-key="save" class="pcr-save" value="').concat(n.save||"Save",'" type="button" ').concat(r(e.interaction.save),'>\n                    <input data-key="clear" class="pcr-clear" value="').concat(n.clear||"Clear",'" type="button" ').concat(r(e.interaction.clear),">\n                </div>\n            </div>\n        </div>\n    ")),(a=i.interaction).options.find(function(t){return!t.hidden&&!t.classList.add("active")}),a.type=function(){return a.options.find(function(t){return t.classList.contains("active")})},i),c.useAsButton&&(c.parent||(c.parent="body"),this._root.button=c.el),document.body.appendChild(this._root.root)}},{key:"_finalBuild",value:function(){var t=this.options,e=this._root;document.body.removeChild(e.root),t.parent&&("string"==typeof t.parent&&(t.parent=document.querySelector(t.parent)),t.parent.appendChild(e.app)),t.useAsButton||t.el.parentElement.replaceChild(e.root,t.el),t.disabled&&this.disable(),t.comparison||(e.button.style.transition="none",t.useAsButton||(e.preview.lastColor.style.transition="none")),this.hide()}},{key:"_buildComponents",value:function(){var t=this,e=this.options.components,n={palette:H({element:t._root.palette.picker,wrapper:t._root.palette.palette,onchange:function(e,n){var o=t._color,r=t._root,i=t.options;o.s=e/this.wrapper.offsetWidth*100,o.v=100-n/this.wrapper.offsetHeight*100,o.v<0&&(o.v=0);var a=o.toRGBA().toString();this.element.style.background=a,this.wrapper.style.background="\n                        linear-gradient(to top, rgba(0, 0, 0, ".concat(o.a,"), transparent), \n                        linear-gradient(to left, hsla(").concat(o.h,", 100%, 50%, ").concat(o.a,"), rgba(255, 255, 255, ").concat(o.a,"))\n                    "),i.comparison||(r.button.style.color=a,i.useAsButton||(r.preview.lastColor.style.color=a)),r.preview.currentColor.style.color=a,t._recalc&&t._updateOutput(),r.button.classList.remove("clear")}}),hue:H({lockX:!0,element:t._root.hue.picker,wrapper:t._root.hue.slider,onchange:function(o,r){e.hue&&(t._color.h=r/this.wrapper.offsetHeight*360,this.element.style.backgroundColor="hsl(".concat(t._color.h,", 100%, 50%)"),n.palette.trigger())}}),opacity:H({lockX:!0,element:t._root.opacity.picker,wrapper:t._root.opacity.slider,onchange:function(n,o){e.opacity&&(t._color.a=Math.round(o/this.wrapper.offsetHeight*100)/100,this.element.style.background="rgba(0, 0, 0, ".concat(t._color.a,")"),t.components.palette.trigger())}}),selectable:L({elements:t._root.interaction.options,className:"active",onchange:function(e){t._representation=e.target.getAttribute("data-type").toUpperCase(),t._updateOutput()}})};this.components=n}},{key:"_bindEvents",value:function(){var t=this,e=this._root,n=this.options,o=[c(e.interaction.clear,"click",function(){return t._clearColor()}),c(e.preview.lastColor,"click",function(){return t.setHSVA.apply(t,B(t._lastColor.toHSVA()))}),c(e.interaction.save,"click",function(){!t.applyColor()&&!n.showAlways&&t.hide()}),c(e.interaction.result,["keyup","input"],function(e){t._recalc=!1,t.setColor(e.target.value,!0)&&!t._initializingActive&&t._emit("change",t._color),e.stopImmediatePropagation()}),c([e.palette.palette,e.palette.picker,e.hue.slider,e.hue.picker,e.opacity.slider,e.opacity.picker],["mousedown","touchstart"],function(){return t._recalc=!0}),c(window,"resize",function(){return t._rePositioningPicker})];if(!n.showAlways){var r=n.closeWithKey;o.push(c(e.button,"click",function(){return t.isOpen()?t.hide():t.show()}),c(document,"keyup",function(e){return t.isOpen()&&(e.key===r||e.code===r)&&t.hide()}),c(document,["touchstart","mousedown"],function(n){t.isOpen()&&!d(n).some(function(t){return t===e.app||t===e.button})&&t.hide()},{capture:!0}))}n.adjustableNumbers&&f(e.interaction.result,!1),this._eventBindings=o}},{key:"_rePositioningPicker",value:function(){var t=this._root,e=this._root.app,n=t.button.getBoundingClientRect();e.style.marginLeft="".concat(n.left,"px"),e.style.marginTop="".concat(n.top,"px");var o=e.getBoundingClientRect(),r=e.style;o.bottom>window.innerHeight?r.top="".concat(-o.height-5,"px"):n.bottom+o.height<window.innerHeight&&(r.top="".concat(n.height+5,"px"));var i={left:-o.width+n.width,middle:-o.width/2+n.width/2,right:0},a=parseInt(getComputedStyle(e).left,10),c=i[this.options.position],s=o.left-a+c,u=o.left-a+c+o.width;"middle"!==this.options.position&&(s<0&&-s<o.width/2||u>window.innerWidth&&u-window.innerWidth<o.width/2)?c=i.middle:s<0?c=i.right:u>window.innerWidth&&(c=i.left),r.left="".concat(c,"px")}},{key:"_updateOutput",value:function(){if(this._root.interaction.type()){var t="to".concat(this._root.interaction.type().getAttribute("data-type"));this._root.interaction.result.value="function"==typeof this._color[t]?this._color[t]().toString():""}this._initializingActive||this._emit("change",this._color)}},{key:"_clearColor",value:function(){var t=this._root,e=this.options;e.useAsButton||(t.button.style.color="rgba(0, 0, 0, 0.4)"),t.button.classList.add("clear"),e.showAlways||this.hide(),this._emit("save",null)}},{key:"_emit",value:function(t){for(var e=this,n=arguments.length,o=new Array(n>1?n-1:0),r=1;r<n;r++)o[r-1]=arguments[r];this._eventListener[t].forEach(function(t){return t.apply(void 0,o.concat([e]))})}},{key:"on",value:function(t,e){return"function"==typeof e&&"string"==typeof t&&t in this._eventListener&&this._eventListener[t].push(e),this}},{key:"off",value:function(t,e){var n=this._eventListener[t];if(n){var o=n.indexOf(e);~o&&n.splice(o,1)}return this}},{key:"addSwatch",value:function(t){var e=this,n=E(t).values;if(n){var o=this._swatchColors,r=this._root,i=x.apply(void 0,B(n)),a=l('<button type="button" style="color: '.concat(i.toRGBA(),'"></button>'));return r.swatches.appendChild(a),o.push({element:a,hsvaColorObject:i}),this._eventBindings.push(c(a,"click",function(){e.setHSVA.apply(e,B(i.toHSVA()).concat([!0])),e._emit("swatchselect",i)})),!0}return!1}},{key:"removeSwatch",value:function(t){if("number"==typeof t){var e=this._swatchColors[t];if(e){var n=e.element;return this._root.swatches.removeChild(n),this._swatchColors.splice(t,1),!0}}return!1}},{key:"applyColor",value:function(){var t=arguments.length>0&&void 0!==arguments[0]&&arguments[0],e=this._root,n=e.preview,o=e.button,r=this._color.toRGBA().toString();n.lastColor.style.color=r,this.options.useAsButton||(o.style.color=r),o.classList.remove("clear"),this._lastColor=this._color.clone(),this._initializingActive||t||this._emit("save",this._color)}},{key:"destroy",value:function(){var t=this;this._eventBindings.forEach(function(t){return s.apply(o,B(t))}),Object.keys(this.components).forEach(function(e){return t.components[e].destroy()})}},{key:"destroyAndRemove",value:function(){this.destroy();var t=this._root.root;t.parentElement.removeChild(t)}},{key:"hide",value:function(){return this._root.app.classList.remove("visible"),this}},{key:"show",value:function(){if(!this.options.disabled)return this._root.app.classList.add("visible"),this._rePositioningPicker(),this}},{key:"isOpen",value:function(){return this._root.app.classList.contains("visible")}},{key:"setHSVA",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:360,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0,o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1,r=arguments.length>4&&void 0!==arguments[4]&&arguments[4],i=this._recalc;if(this._recalc=!1,t<0||t>360||e<0||e>100||n<0||n>100||o<0||o>1)return!1;var a=this.components,c=a.hue,s=a.opacity,u=a.palette,l=c.options.wrapper.offsetHeight*(t/360);c.update(0,l);var p=s.options.wrapper.offsetHeight*o;s.update(0,p);var h=u.options.wrapper,d=h.offsetWidth*(e/100),f=h.offsetHeight*(1-n/100);return u.update(d,f),this._color=x(t,e,n,o),this._recalc=i,this._recalc&&this._updateOutput(),r||this.applyColor(),!0}},{key:"setColor",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]&&arguments[1];if(null===t)return this._clearColor(),!0;var n=E(t),o=n.values,r=n.type;if(o){var i=r.toUpperCase(),a=this._root.interaction.options,c=a.find(function(t){return t.getAttribute("data-type")===i});if(!c.hidden){var s=!0,u=!1,l=void 0;try{for(var p,h=a[Symbol.iterator]();!(s=(p=h.next()).done);s=!0){var d=p.value;d.classList[d===c?"add":"remove"]("active")}}catch(t){u=!0,l=t}finally{try{s||null==h.return||h.return()}finally{if(u)throw l}}}return this.setHSVA.apply(this,B(o).concat([e]))}}},{key:"setColorRepresentation",value:function(t){return t=t.toUpperCase(),!!this._root.interaction.options.find(function(e){return e.getAttribute("data-type")===t&&!e.click()})}},{key:"getColorRepresentation",value:function(){return this._representation}},{key:"getColor",value:function(){return this._color}},{key:"getRoot",value:function(){return this._root}},{key:"disable",value:function(){return this.hide(),this.options.disabled=!0,this._root.button.classList.add("disabled"),this}},{key:"enable",value:function(){return this.options.disabled=!1,this._root.button.classList.remove("disabled"),this}}])&&D(e.prototype,n),r&&D(e,r),t}();R.utils={once:a,on:c,off:s,eventPath:d,createElementFromString:l,adjustableInputNumbers:f,removeAttribute:p,createFromTemplate:h},R.create=function(t){return new R(t)},R.version="0.4.4";e.default=R}]).default});
//# sourceMappingURL=pickr.es5.min.js.map