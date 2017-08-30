/**
 * Created by FAISAL ABDUL HAMID on 29/08/2017.
 */
import Validator from 'vee-validate';

import Index from './index.vue';
import Create from './create.vue';

require('../bootstrap');
window.Vue = require('vue');

Vue.component('index', Index);
Vue.component('create', Create);

const app = new Vue({
    el: '#app-main',
});