import instance from '@/http/http';


// 首页
function apiIndex() {

    return new Promise((resolve, reject) => {

        instance.get('/index/index').then(res => {

            if(res.code == 200) {

                resolve(res);

            }

        }).catch(err => {

            reject(err);

        })

    })

}

// 详情页
function apiDetail(hid) {

    return new Promise((resolve, reject) => {

        instance.get('/index/detail/' + hid).then(res => {

            if(res.code == 200) {

                resolve(res);

            }

        }).catch(err => {

            reject(err);

        })

    })

}

// 列表页
function apiList(params) {

    return new Promise((resolve, reject) => {

        instance.get('/index/list', {
            params
        }).then(res => {

            if(res.code == 200) {

                resolve(res);

            }

        }).catch(err => {

            reject(err);

        });

    })

}

// 注册
function apiReg(params) {

    return new Promise((resolve, reject) => {

        instance.post('index/user', params).then(res => {

            resolve(res);

        }).catch(err => {

            reject(err);

        });

    })

}

// 登录
function apiLogin(payload) {

    return new Promise((resolve, reject) => {

        instance.post('/index/login', payload).then(res => {

            resolve(res);

        }).catch(err => {

            reject(err);

        });

    })

}

export {apiIndex, apiDetail, apiList, apiLogin, apiReg}