import axios from 'axios';
import base from '@/lib/base';
import {Toast} from 'vant';

const instance = axios.create({
    baseURL: base.URL,
    timeout: 5000,
    // headers: sessionStorage.getItem('token')
})

// 拦截
// 请求拦截
instance.interceptors.request.use(config => {

    let token = sessionStorage.getItem('token');

    if(token) {

        config.headers = Object.assign(config.headers, {token, 'retry-after': 3600});

    }

    return config;

}, error => {

    return Promise.reject(error);

})

// 响应拦截
instance.interceptors.response.use(response => {

    if(response.status === 200) {

            return response.data;

    }

}, error => {

    let message = '';

    if(error && error.response) {

        switch (error.response.status) {
            case 400:
                message = '服务器无法理解请求的格式';
                break;
            case 401: 
                message = '请求未授权';
                break;
            case 403:
                message = '禁止访问';
                break;
            case 404:
                message = '找不到与 URL 相匹配的资源';
                break;
            case 500:
                message = '服务器错误';
                break;
            case 503:
                message = '服务器暂时无法处理请求';
                break;
            default:
                message = '未知错误';
                break;
        }

        Toast({
            message,
            type: 'fail'
        })

    }

    return Promise.reject(error);

});

export default instance;