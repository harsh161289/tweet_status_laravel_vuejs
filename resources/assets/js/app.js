/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.VueRouter = require('vue-router').default;

window.VueAxios = require('vue-axios').default;

window.Axios = require('axios').default;


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const AppLayout = require('./components/App.vue');

const HomeComponent = Vue.component('HomeComponent', require('./components/HomeComponent.vue'));

const routes = [{
    name: 'HomeComponent',
    path: '/',
    component: HomeComponent
}];

Vue.use(VueRouter, VueAxios, Axios);

const router = new VueRouter({ mode: 'history', routes: routes});

const app = new Vue(
    Vue.util.extend(
        { router },
        AppLayout
    )
).$mount('#app');