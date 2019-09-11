
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.VueAxios = require ('vue-axios').default;
window.Axios = require ('axios').default;

import VueRouter from 'vue-router';

Vue.use(VueRouter,VueAxios,Axios);


import boardDetailRoute from './components/BoardDetailRoute.vue';
// Vue.component('nyoba', require('./components/BoardDetailRoute.vue'));


const app = new Vue({
    el: '#nyoba',
    render: h => h(boardDetailRoute)
});
