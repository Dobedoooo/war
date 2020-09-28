import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';

Vue.prototype.$http = axios;

Vue.use(VueRouter);

import Login from '@/views/login';
import Home from '@/views/main/main.vue';
import AddCate from '@/views/main/category/Add.vue';
import ShowCate from '@/views/main/category/Show.vue';
import ShowHouse from '@/views/main/house/Show.vue';
import AddHouse from '@/views/main/house/Add.vue';
import EditHouse from '@/views/main/house/Edit.vue';

let router = new VueRouter({
    routes: [
        // 登录组件
        { path: '/login', component: Login, name: 'login',
            meta: {
                auth: false, title: '一家-后台登录'
            }    
        },
        // 首页组件
        { path: '/', component: Home, name: 'home',
            meta: {
                auth: true, title: '一家-后台首页'
            },
            children: [
                { path: 'addCategory', component: AddCate, name: 'addCate',
                    meta: { auth: true, title: '一家-添加分类' } 
                },
                { path: 'showCategory', component: ShowCate, name: 'showCate',
                    meta: { auth: true, title: '一家-查看分类' } 
                },
                { path: 'showHouse', component: ShowHouse, name: 'showHouse',
                    meta: { auth: true, title: '一家-查看民宿' }
                },
                { path: 'addHouse', component: AddHouse, name: 'addHouse',
                    meta: { auth: true, title: '一家-添加民宿' }
                },
                { path: 'editHouse/hid', component: EditHouse, name: 'editHouse',
                    meta: { auth: true, title: '一家-民宿编辑' }
                }
            ]
        },
        // 
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