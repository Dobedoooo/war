import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Login from '@/views/login';
import Home from '@/views/main.vue';

let router = new VueRouter({
    routes: [
        { path: '/login', component:  Login},
        { path: '/', component:  Home},
    ]
})

export default router;