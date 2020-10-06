import instance from '@/http/http';

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

export {apiIndex, apiDetail}