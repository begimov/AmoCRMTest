import api from '../../api'

export default {
    getLeads({ commit }) {
        commit('setIsLoading', true);
        api.leads.getLeads().then(res => {
            commit('setCount', res.data.count);
            commit('setLeads', res.data.leads.data);
            commit('setIsLoading', false);
        });
    }
}