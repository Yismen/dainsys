import Vue from 'vue/dist/vue'
try {
    window.VueSite = Vue;
    window.$ = window.jQuery = require('jquery');
    window._ = require('lodash');
    // window.bootstrap = require('bootstrap');
} catch (e) { console.log(e) }


VueSite.component('dainsys-logo', require('./components/DainsysLogo.vue').default);
VueSite.component('back-to-top', require('./components/BackToTop').default);

const appSite = new VueSite({
    el: '#app'
});

import ObserveActiveLink from './site/ObserveActiveLink';
import ObserveAnimate from './site/ObserveAnimate';
import ScrollOnClick from './site/ScrollOnClick';

ObserveAnimate('.animatable');
ObserveActiveLink('section', '.nav-links a');
ScrollOnClick('.nav-links a, a.brand', '.navbar-fixed-top');

