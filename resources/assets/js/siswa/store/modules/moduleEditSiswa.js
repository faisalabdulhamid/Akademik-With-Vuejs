/**
 * Created by FAISAL ABDUL HAMID on 02/10/2017.
 */
/**
 * Created by FAISAL ABDUL HAMID on 02/10/2017.
 */

const state = {
    siswa: {},

}

const mutations = {
    SET_SISWA(state, siswaObj){
        state.siswa = siswaObj;
        //state.siswa.nis = siswaObj.nis;
    },
    SET_SISWA_NULL(state)
    {
        state.siswa = {}
    },
    updateValue(state, siswa){
        var newValue = { [siswa.field]: siswa.value }
        Object.assign(state.siswa, newValue)
    },
}

const getters = {
        siswa: state => state.siswa,
}

const actions = {
    setSiswa({commit}, siswaObj){
        commit('SET_SISWA', siswaObj)
    },
    setSiswaNull({commit}){
        commit('SET_SISWA_NULL')
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}