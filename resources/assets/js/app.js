
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



import board from './components/routeVue.vue';


import FiturTodo from './components/BoardDetailComponent.vue';

const routes = [
  { path: '/todoapp/:id', name: 'FiturTodo',component: FiturTodo },
]

const router = new VueRouter({
	mode : 'history',
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
	 router,
    render: h => h(board)
});
