import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    // 唯一的数据来源 类似于data
    state: {
        city: '太原',
        count: 0
    },
    // 类似于computed
    getters: {

    },
    // 修改state的唯一方法 同步的
    mutations: {
        increment(state) {
            state.count++;
        }
    },
    // 提交mutation 异步的
    actions: {

    },
    modules: {

    }
})

export default store;