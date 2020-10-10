import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from '@/store';
import { Swipe, SwipeItem, Image as VanImage, Tab, Tabs, PullRefresh, List, Loading, Icon, ActionSheet } from 'vant';
import 'vant/lib/index.css'

Vue.use(Swipe);
Vue.use(SwipeItem);
Vue.use(VanImage);
Vue.use(Tab);
Vue.use(Tabs);
Vue.use(PullRefresh);
Vue.use(List);
Vue.use(Loading);
Vue.use(Icon);
Vue.use(ActionSheet);

Vue.config.productionTip = false

new Vue({
	store,
	router,
	render: h => h(App)
}).$mount('#app')
