import axios from 'axios';
export default {
    namespaced: true,
    state: {
        loading: false,
       
    },
    mutations:
    {
        SET_LOADING(state, payload) {
            state.loading = payload;
        },
     
    },
    actions: {

        async login({ commit }, payload) {
            
            var url = "/login";
            commit('noti/SET_ERROR', null, { root: true })
            commit('noti/SET_SUCCESS', null, { root: true })
            commit('SET_LOADING', true);

            var response = await axios.post(url, payload);
            response=response.data;
            if (response.success) {
                commit('noti/SET_SUCCESS', response.message, { root: true })
            }
            else {

                commit('noti/SET_ERROR', response.message, { root: true })
            }
            commit('SET_LOADING', false);


           
        },
       

    },
    getters: {

        loading(state) {
            return state.loading;
        },
     }
}