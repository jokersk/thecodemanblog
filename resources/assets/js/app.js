
import Vue from "vue"
import VueRouter from 'vue-router'
import blogsList from "./components/blogs-list.vue"
import blogDetail from "./components/blogs-detail.vue"
import tagsList from "./components/tags/list.vue"
import tagsDetail from "./components/tags/detail.vue"
import Vuetify from "vuetify";
import 'vuetify/dist/vuetify.min.css';


Vue.use(VueRouter)
Vue.use(Vuetify,{
    theme: {
        primary: '#1976D2',
        secondary: '#424242',
        accent: '#82B1FF',
        error: '#FF5252',
        info: '#2196F3',
        success: '#4CAF50',
        warning: '#FFC107'
      }
})
const routes = [
  { path: '/blogs/list', component: blogsList },
  { path: '/blogs/detail', component: blogDetail },
  { path: '/blogs/detail/:id?', component: blogDetail },
  { path: '/tags/list', component: tagsList },
  { path: '/tags/detail/:id?', component: tagsDetail }
  
]


const router = new VueRouter({
  routes, 
  mode: 'history',
})


const app = new Vue({
  router
}).$mount('#app')

