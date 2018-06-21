import api from '../../api'

export default {
    getLeads({ commit }) {
        // commit('setIsLoading', true);
        api.leads.getLeads().then(res => {
            console.log(res.data);
            // commit('setPages', res.data)
            // commit('setIsLoading', false);
        });
    }
}