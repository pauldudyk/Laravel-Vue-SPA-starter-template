import './bootstrap';
import Vue from 'vue';
import Vuex from 'vuex';
import Vuetify from 'vuetify';
import Routes from '@/js/routes.js';
import App from '@/js/views/App';
import Menu from '@/js/views/Menu';
import axios from 'axios';
import VueAxios from 'vue-axios';
import {store} from '@/js/store/store'

Vue.use(Vuetify);
Vue.use(VueAxios, axios, Vuex);
Vue.use(Menu);

axios.defaults.baseURL = window.location.origin + '/api'; 

Routes.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const authorisedUser = store.state.authorisedUser;
    if(requiresAuth && !authorisedUser) {
        next('/')
    } else next();
});

const app = new Vue({
    el: '#app',
    store,
    router: Routes,
    render: h => h(App),
});

export default app;