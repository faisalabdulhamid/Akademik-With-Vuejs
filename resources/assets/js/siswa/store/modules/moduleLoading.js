/**
 * Created by FAISAL ABDUL HAMID on 02/10/2017.
 */

const state = {
    loading: false
}

const mutations = {
    SET_LOADING_TRUE(state){
        state.loading = true;
    },
    SET_LOADING_FALSE(state){
        state.loading = false
    }
}

const getters = {
    loading: state => state.loading
}

const actions = {
    setLoadingTrue({commit}){
        commit('SET_LOADING_TRUE')
    },
    setLoadingFalse({commit}){
        commit('SET_LOADING_FALSE')
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}