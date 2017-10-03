/**
 * Created by FAISAL ABDUL HAMID on 02/10/2017.
 */

import Vue from 'vue'
import Vuex from 'vuex'
import moduleLoading from './modules/moduleLoading.js'
import moduleEditSiswa from './modules/moduleEditSiswa.js'
Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new  Vuex.Store({
    modules:{
        loading: moduleLoading,
        Siswa: moduleEditSiswa
    }
})