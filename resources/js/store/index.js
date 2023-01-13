import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import loading from './modules/loading';
import employee from './modules/employee';

const store = new Vuex.Store({
    modules: {
        loading,
        employee
    },
    strict: process.env.NODE_ENV !== 'production'
});

export default store;