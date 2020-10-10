import Vue from 'vue';
import Vuex from 'vuex';

import {apiLogin} from '@/http/api';

Vue.use(Vuex);

const store = new Vuex.Store({
    // 唯一的数据来源 类似于data
    state: {
        token: '',
        collection: [12],
    },
    // 类似于computed
    getters: {
        isCollection: (state) => (hid) => {

            return state.collection.some(el => el == hid);

        },
        getCollection: state => (hid) => {
            hid;
            return state.collection;

        }
    },
    // 修改state的唯一方法 同步的
    mutations: {
        increment(state) {
            state.count++;
        },
        setToken(state, payload) {

            state.token = payload;

        }
    },
    // 提交mutation 异步的
    actions: {
        handleLogin({commit}, payload) {

            apiLogin(payload).then(res => {

                commit('setToken', res.token);

            }).catch(err => {

                err;

            })

        }
    },
    modules: {

    }
})

export default store;