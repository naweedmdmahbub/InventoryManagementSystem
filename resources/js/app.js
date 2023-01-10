/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
import './styles/custom.css';


Vue.use(ElementUI, { locale })
axios.defaults.headers.post['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('order-list', require('./components/Orders/List.vue').default);
Vue.component('order-create', require('./components/Orders/Create.vue').default);
// Vue.component('order-edit', require('./components/Orders/Edit.vue').default);
Vue.component('order-form', require('./components/Orders/Form.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from './router.js'
console.log('App router:', router, router.app);
const app = new Vue({
    el: '#app',
    router
});
