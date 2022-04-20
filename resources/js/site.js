try {
    window.VueSite = require('vue');
    window.$ = window.jQuery = require('jquery');
    window._ = require('lodash');
    // require('bootstrap');
} catch (e) { console.log(e) }


VueSite.component('dainsys-logo', require('./components/DainsysLogo.vue').default);
VueSite.component('back-to-top', require('./components/BackToTop').default);

const appSite = new VueSite({
    el: '#app'
});
