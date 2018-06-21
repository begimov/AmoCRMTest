import { mapActions, mapGetters } from 'vuex';

export default {
    methods: {
        ...mapActions('leadslist', [
            //
        ]),
        getLeads() {
            axios.get('/leads').then(res => {
                console.log(res.data)
            }).catch(err => {
                //
            });
        }
    },
    computed: {
        ...mapGetters('leadslist', [
            'isLoading',
        ])
    },
    mounted() {
        this.getLeads();
    }
}