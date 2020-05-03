// require('./bootstrap');

import VueRouter from 'vue-router';
import routes from './router';
import Toasted from 'vue-toasted';
import axios from 'axios';

window.Vue = require('vue');

//VUE ROUTER
Vue.use(VueRouter);
Vue.component('navigation', require('./components/Navigation.vue').default);

//VUE TOASTED
Vue.use(Toasted)

// BOOTSTRAP
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

// AXIOS
window.axios = axios;
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//DEFAULT
const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
});
