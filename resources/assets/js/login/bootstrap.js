/**
 * Created by FAISAL ABDUL HAMID on 31/08/2017.
 */

//window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap-sass');

    //window.Vue = require('vue')

} catch (e) {}

//window.axios = require('axios');
//
//window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
//
//let token = document.head.querySelector('meta[name="csrf-token"]');
//
//if (token) {
//    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
//} else {
//    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
//}
