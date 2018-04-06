import Vuetify from 'vuetify'
Vue.use(Vuetify)
    new Vue({
        el:"#blogDetail",
        data :{
            status : blog_status,
            blogId : blog_id
        },
        watch :{
            status(val){
                var input = val? "1":"0";
                axios.get(`${site_url}/updateStatus/${this.blogId}/${input}`)
            }
        }
})