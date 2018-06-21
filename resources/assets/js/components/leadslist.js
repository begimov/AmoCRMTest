import { mapActions, mapGetters } from 'vuex';

export default {
    methods: {
        ...mapActions('leadslist', [
            'getLeads'
        ])
    },
    computed: {
        ...mapGetters('leadslist', [
            'isLoading',
            'leads',
            'count'
        ])
    },
    mounted() {
        this.getLeads();
    }
}