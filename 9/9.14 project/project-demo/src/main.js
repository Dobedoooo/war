import Vue from 'vue'
import App from './App.vue'
import router from "./router/index"
import filter from "@/filter";

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css'

import 'u-reset.css';

Vue.config.productionTip = false

Vue.use(ElementUI);

Vue.filter('formatTime', filter['formatTime']);

Object.keys(filter).forEach(el => {

	Vue.filter(el, filter[el]);

})

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
