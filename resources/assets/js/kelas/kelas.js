/**
 * Created by FAISAL ABDUL HAMID on 26/08/2017.
 */
import Validator from 'vee-validate';

import Index from './index.vue';
import Create from './create.vue';
import Edit from './edit.vue';
import Show from './show.vue';
import Destroy from './destroy.vue';

require('../bootstrap');
window.Vue = require('vue');

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
Vue.use(Validator, config);

Vue.component('index', Index);
Vue.component('create', Create);
Vue.component('edit', Edit);
Vue.component('show', Show);
Vue.component('destroy', Destroy);

const app = new Vue({
    el: '#app-main',
});