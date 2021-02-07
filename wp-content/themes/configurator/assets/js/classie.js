/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

!function(e){"use strict";function n(e){return new RegExp("(^|\\s+)"+e+"(\\s+|$)")}var s,t,i;function a(e,n){(s(e,n)?i:t)(e,n)}"classList"in document.documentElement?(s=function(e,n){return e.classList.contains(n)},t=function(e,n){e.classList.add(n)},i=function(e,n){e.classList.remove(n)}):(s=function(e,s){return n(s).test(e.className)},t=function(e,n){s(e,n)||(e.className=e.className+" "+n)},i=function(e,s){e.className=e.className.replace(n(s)," ")});var o={hasClass:s,addClass:t,removeClass:i,toggleClass:a,has:s,add:t,remove:i,toggle:a};"function"==typeof define&&define.amd?define(o):e.classie=o}(window),function(){var e=document.getElementById("overlay-menu-wrap"),n=document.querySelector("div.overlay"),s=document.querySelector("button.overlay-close");function t(){if(classie.has(n,"open")){classie.remove(n,"open"),classie.add(n,"close"),classie.remove(e,"hide");var s=function(e){if(support.transitions){if("visibility"!==e.propertyName)return;this.removeEventListener(transEndEventName,s)}classie.remove(n,"close")};support.transitions?n.addEventListener(transEndEventName,s):s()}else classie.has(n,"close")||(classie.add(n,"open"),classie.add(e,"hide"))}transEndEventNames={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",msTransition:"MSTransitionEnd",transition:"transitionend"},transEndEventName=transEndEventNames[Modernizr.prefixed("transition")],support={transitions:Modernizr.csstransitions},e&&e.addEventListener("click",t),s&&s.addEventListener("click",t)}();