window.Vue = require('vue');
window._ = require('lodash');
window.Popper = require('popper.js').default;

/** 
* Dependencies Management with vue-comtainer
* Usage: Vue.$ioc.register('Axios', Axios); to Register or this.$ioc.resolve('Axios'); to resolve de dependency
* Documentation: Vue.$ioc.register('Axios', Axios);
*/
import Vuec from 'vue-container'; 
Vue.use(Vuec);
Vue.$ioc.register('Form', require('./vendor/dainsys-form').default);
import Datepicker from 'vuejs-datepicker'
Vue.$ioc.register('Datepicker', Datepicker);

/**
 * Register Sweet Alert (sweetalert) globally.
 * Usage: this.$swal('Heading', 'Message', 'success|info|warning|error|question')
 * Documentation: https://sweetalert2.github.io/#examples
 */
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
    require('admin-lte');
    require('datatables.net-bs');
} catch (e) { }

/**
 * Vue Modal.
 * Usage: <modal name="hello-world">hello, world!</modal>
 * Documentation: https://www.npmjs.com/package/vue-js-modal
 */
import VModal from 'vue-js-modal' 
Vue.use(VModal)


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios = require('axios');

/**
 * Here we will load Vue store with it modulations. This implements
 * an API to have centralized states and mutations.
 */

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
require('./utilities/interceptors')

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

/** 
* Here global components are registered
*/
Vue.component('loading-component', require('./components/LoadingComponent.vue'));
Vue.component( 'passport-clients', require('./components/passport/Clients.vue') );
Vue.component( 'passport-authorized-clients', require('./components/passport/AuthorizedClients.vue') );
Vue.component( 'passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue') );
Vue.component('create-position', require('./components/employees/positions/Create'))
Vue.component('flash-message', require('./components/FlashMessage'))
Vue.component('employee-edit', require('./components/employees/Edit'));

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });