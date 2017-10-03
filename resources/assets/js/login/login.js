/**
 * Created by FAISAL ABDUL HAMID on 31/08/2017.
 */
//require('./bootstrap');
import id from 'vee-validate/dist/locale/id';
import VeeValidate, { Validator } from 'vee-validate';
import {config_vee} from '../siswa/store/globalStore.js';

window.Vue = require('vue');
require('../bootstrap');
Validator.addLocale(id);

Vue.use(VeeValidate, config_vee);

const app = new Vue({
    el: '#app-login',
    data: function(){
        return {
            username: '',
            password: ''
        }
    }
});