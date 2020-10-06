import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from '@/store';
import { Swipe, SwipeItem, Image as VanImage, Tab, Tabs } from 'vant';
import 'vant/lib/index.css'
// import vconsole from 'vconsole';

// new vconsole;

Vue.use(Swipe);
Vue.use(SwipeItem);
Vue.use(VanImage);
Vue.use(Tab);
Vue.use(Tabs);

Vue.config.productionTip = false

new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app')
