import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import 'u-reset.css';   

Vue.use(VueRouter)

const routes = [
	{
		path: '/',
		name: 'Home',
		component: Home
	},
	{
		path: '/about',
		name: 'About',
		// route level code-splitting
		// this generates a separate chunk (about.[hash].js) for this route
		// which is lazy-loaded when the route is visited.
		component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
	},
	{
		path: '/detail',
		name: 'detail',
		component: () => import('../views/detail/Detail.vue'),
		meta: {
			title: '民宿详情'
		}
	},
	{
		path: '/list',
		name: 'list',
		component: () => import('@/views/list/List.vue'),
	},
	{
		path: '/login',
		name: 'login',
		component: () => import('../views/login/Login.vue'),
	},
	{
		path: '/reg',
		name: 'reg',
		component: () => import('../views/login/Reg.vue'),
	}
]

const router = new VueRouter({
	routes
})

export default router
