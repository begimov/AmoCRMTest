export default {
    methods: {
        getLeads() {
            axios.get('/leads').then(res => {
                console.log(res.data)
            }).catch(err => {
                //
            });
        }
    },
    mounted() {
        this.getLeads();
    }
}