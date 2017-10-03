/**
 * Created by FAISAL ABDUL HAMID on 26/08/2017.
 */
import Index from './index.vue';

import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'

import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css'
require('eonasdan-bootstrap-datetimepicker');

//Select2
//import 'select2/dist/css/select2.css';
require('select2');

require('../bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);


const config = {
    errorBagName: 'errors', // change if property conflicts.
    fieldsBagName: 'fields',
    delay: 0,
    locale: 'en',
    dictionary: null,
    strict: true,
    classes: false,
    classNames: {
        touched: 'touched', // the control has been blurred
        untouched: 'untouched', // the control hasn't been blurred
        valid: 'valid', // model is valid
        invalid: 'invalid', // model is invalid
        pristine: 'pristine', // control has not been interacted with
        dirty: 'dirty' // control has been interacted with
    },
    events: 'input|blur',
    inject: true,
    validity: true,
    aria: true
};
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate, config);

Vue.use(VueFormWizard)

Vue.component('index', Index);
Vue.component('pulse-loader', require('vue-spinner/src/PulseLoader.vue'));

const app = new Vue({
    el: '#app-main',
});
