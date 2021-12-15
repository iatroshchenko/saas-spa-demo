/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./custom');

window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import router from './router'
import store from './store'

import VueSweetalert2 from 'vue-sweetalert2';
import LoadingOverlay from 'vue-swal2-loading-overlay';
import VuePaginate from 'vue-paginate';

Vue.use(VueSweetalert2);
Vue.use(LoadingOverlay);
Vue.use(VuePaginate);

import VueCodemirror from 'vue-codemirror'

// import base style
import 'codemirror/lib/codemirror.css'
import 'codemirror/theme/base16-dark.css'
// import language js
import 'codemirror/mode/htmlmixed/htmlmixed.js'

// import more codemirror resource...

// you can set default global options and events when Vue.use
Vue.use(VueCodemirror, /* {
  options: { theme: 'base16-dark', ... },
  events: ['scroll', ...]
} */);

import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask);

import money from 'v-money'
Vue.use(money);

import Tabs from 'vue-tabs-component';
Vue.use(Tabs);

import vClickOutside from 'v-click-outside'
Vue.use(vClickOutside);

import VueFormulate from '@braid/vue-formulate'
Vue.use(VueFormulate, {
  rules: {
    notEqual: (context, ...args) => {
      const { value, getFormValues } = context;
      const formValues = getFormValues();

      return value !== formValues[args[0]];
    }
  }
});

Vue.component('app', require('./components/App').default);

import { ValidationProvider, ValidationObserver } from 'vee-validate';

Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  router,
  store,
  el: '#app'
});
