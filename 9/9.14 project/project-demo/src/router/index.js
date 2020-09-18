import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Login from '@/views/login';
import Home from '@/views/main.vue';

let router = new VueRouter({
    routes: [
        { path: '/login', component: Login, name: 'login',
            meta: {
                auth: false, title: '登录'
            }    
        },
        { path: '/', component: Home, name: 'home',
            meta: {
                auth: true, title: '首页'
            }
        },
        { path: '/list', component: Home, name: 'list',
            meta: {
                auth: true,
            }
        },
    ]
})

// 全局前置守卫
/**
 * 1.监听路由变化
 * 2.路由元信息
 */
router.beforeEach((to, from, next) => {
    
    let title = to.meta.title || '首页';

    document.title = title;

    if(to.meta.auth) {

        let token = sessionStorage.getItem('token');

        token = token && token.trim();

        if(token) {
            next();
        } else {
            next({name: 'login', query: {from: to.name}});
        }

    } else {
        next();
    }

    // console.log('to\n' ,to);
    // console.log('from\n', from);

});

export default router;