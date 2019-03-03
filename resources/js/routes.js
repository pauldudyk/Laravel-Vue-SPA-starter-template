import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/HomeComponent'
import User from './components/UserComponent'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'homepage',
            component: Home,
        },
        {
            path: '/user',
            name: 'user',
            component: User,
            meta: {
                requiresAuth: true
            }
        }
    ]    
});


export default router;