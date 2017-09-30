/**
 * Created by FAISAL ABDUL HAMID on 26/08/2017.
 */
import VueFormGenerator from "vue-form-generator";
//import "vue-form-generator/dist/vfg-core.css";
import 'vue-form-wizard/dist/vue-form-wizard.min.css';

import Index from './index.vue';
import Create from './create.vue';
import Edit from './edit.vue';
import Show from './show.vue';
import Destroy from './destroy.vue';
import modalSiswa from './siswa.vue';
import modalMapel from './mapel.vue';

//Form-Wizard {Generator}
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'

require('../bootstrap');
window.Vue = require('vue');

Vue.use(VueFormGenerator);
Vue.use(VueFormWizard)

Vue.component('index', Index);
Vue.component('create', Create);
Vue.component('edit', Edit);
Vue.component('show', Show);
Vue.component('destroy', Destroy);
Vue.component('modalSiswa', modalSiswa);
Vue.component('modalMapel', modalMapel);

const app = new Vue({
    el: '#app-main',
});