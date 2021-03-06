/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');

import store from './store'
require('./plugins')
Vue.config.productionTip = false

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('operations-home-component', require('./components/home/Form.vue').default);

Vue.component('transfer-form', require('./components/operations/transfer/Form.vue').default);
Vue.component('payment-form', require('./components/operations/payment/Form.vue').default);
Vue.component('deposit-payment-form', require('./components/operations/deposit/Payment.vue').default);
Vue.component('deposit-transfer-form', require('./components/operations/deposit/Transfer.vue').default);

Vue.component('operation-button', require('./components/operations/Button.vue').default);


/* ADMIN */
Vue.component('admin-bank-list', require('./components/admin/bank/List.vue').default);
Vue.component('admin-account-list', require('./components/admin/account/List.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
  store,
  // render: h => h(App)
// }).$mount('#app')
}).$mount('#main-wrapper')