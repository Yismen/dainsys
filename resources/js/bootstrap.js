window.Vue = require('vue');
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
    window._ = require('lodash');
    window.moment = require('moment');
    window.Form = require('./vendor/dainsys-form').default
    require('bootstrap');
    require('datatables.net-bs');
    require('admin-lte');
    require('select2');
    require('./dainsysJQuery')
} catch (e) { console.log(e) }

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
require('./config/interceptors')

/**
* Here global components are registered
*/
Vue.component('dainsys-logo', () => import(/*webpackChunkName: "js/chunks/dainsysLogo" */ './components/DainsysLogo.vue'));
Vue.component('back-to-top', () => import(/*webpackChunkName: "js/chunks/backToTop" */ './components/BackToTop'));
Vue.component('loading-component', () => import(/*webpackChunkName: "js/chunks/loadingComponent" */ './components/LoadingComponent.vue'));
Vue.component('passport-clients', () => import(/*webpackChunkName: "js/chunks/passportClients" */ './components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', () => import(/*webpackChunkName: "js/chunks/passportAuthorizedClients" */ './components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', () => import(/*webpackChunkName: "js/chunks/passportPersonalAccessTokens" */ './components/passport/PersonalAccessTokens.vue'));
Vue.component('positions-select', () => import(/*webpackChunkName: "js/chunks/positionsSelect" */ './components/positions/SelectList'));
Vue.component('departments-select', () => import(/*webpackChunkName: "js/chunks/departmentsSelect" */ './components/selects/Departments'));
// Vue.component('create-position', () => import(/*webpackChunkName: "js/chunks/createPosition" */ './components/employees/positions/Create'));
// Vue.component('modal', () => import(/*webpackChunkName: "js/chunks/modal" */ './components/Modal'))
Vue.component('add-button', () => import(/*webpackChunkName: "js/chunks/addButton" */ './components/links/AddButton'));
Vue.component('delete-request-button', () => import(/*webpackChunkName: "js/chunks/deleteRequestButton" */ './components/DeleteRequest'));
Vue.component('create-afp-form', () => import(/*webpackChunkName: "js/chunks/createAfpForm" */ './components/forms/CreateAfp'));
Vue.component('flash-message', () => import(/*webpackChunkName: "js/chunks/flashMessages" */ './components/FlashMessage'));

Vue.component('edit-employee', () => import(/*webpackChunkName: "js/chunks/editEmployee" */ './components/employees/Edit'));
Vue.component('create-employee', () => import(/*webpackChunkName: "js/chunks/createEmployee" */ './components/employees/CreateEmployee'));
Vue.component('employee-row', () => import(/*webpackChunkName: "js/chunks/employeeRow" */ './components/employees/partials/RowCheckBox'));
Vue.component('employee-check-box', () => import(/*webpackChunkName: "js/chunks/employeeCheckbox" */ './components/employees/partials/DinamicCheckbox'));
Vue.component('employee-checkbox-list', () => import(/*webpackChunkName: "js/chunks/eployeeCheckboxList" */ './components/employees/partials/DinamicCheckboxList'));

Vue.component('dropzone-form', () => import(/*webpackChunkName: "js/chunks/dropzoneForm" */ './components/DropzoneForm'));

// Vue.component('headcounts', () => import(/*webpackChunkName: "js/chunks/headcounts" */ './components/human_resources/HeadCountsComponent'));
// Vue.component('hc-rotations', () => import(/*webpackChunkName: "js/chunks/hcRotations" */ './components/human_resources/RotationsComponent'));
// Vue.component('monthly-rotation', () => import(/*webpackChunkName: "js/chunks/monthlyRotation" */ './components/human_resources/MonthlyRotation'));
// Vue.component('monthly-attrition', () => import(/*webpackChunkName: "js/chunks/monthlyAttrition" */ './components/human_resources/MonthlyAttrition'));
Vue.component('sites-metric', () => import(/*webpackChunkName: "js/chunks/sitesMetric" */ './components/dashboards/SitesOverview'));
Vue.component('sites-sph', () => import(/*webpackChunkName: "js/chunks/sitesSph" */ './components/dashboards/sites/Sph'));

Vue.component('date-picker', () => import(/*webpackChunkName: "js/chunks/datePicker" */ './components/DatePicker'));
Vue.component('animation-scale', () => import(/*webpackChunkName: "js/chunks/animationScale" */ './components/animations/ScaleComponent'));

Vue.component('app-notifications', () => import(/*webpackChunkName: "js/chunks/appNotification" */ './components/AppNotifications'));
Vue.component('line-base-chart', () => import(/*webpackChunkName: "js/chunks/lineBaseChart" */ './components/charts/LineBaseChart'));
Vue.component('doughnut-base-chart', () => import(/*webpackChunkName: "js/chunks/doughnutBaseChart" */ './components/charts/DoughnutBaseChart'));
Vue.component('bar-base-chart', () => import(/*webpackChunkName: "js/chunks/barBaseChart" */ './components/charts/BarBaseChart'));
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo";
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});
