/**
 * Created by FAISAL ABDUL HAMID on 29/08/2017.
 */
import VeeValidate, { Validator } from 'vee-validate';
import id from 'vee-validate/dist/locale/id';
import {config_vee} from '../config/vee_validate.js';

import Index from './index.vue';
import Create from './create.vue';

require('../bootstrap');
window.Vue = require('vue');

Validator.addLocale(id);
Vue.use(VeeValidate, config_vee);

Vue.component('index', Index);
Vue.component('create', Create);

const app = new Vue({
    el: '#app-main',
});