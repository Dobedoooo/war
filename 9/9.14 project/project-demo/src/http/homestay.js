import instance from '@/http/http';

// 返回资源列表
function homestayIndex(params) {

    return new Promise((resolve, reject) => {

        instance.get('/admin/Homestay', params).then(res => {

            if(res.code == 200) {

                resolve(res);

            }

        }).catch(err => {

            reject(err);

        })

    })

}

// 删除指定的资源
function homestayDelete(hid) {
    
    return new Promise((resolve, reject) => {

        instance.delete('/admin/homestay/' + hid).then(res => {

            if(res.code == 200) {
    
                resolve(res);
    
            }
    
        }).catch(err => {

            reject(err);

        })

    })
    

}

// 显示指定的资源
function homestayRead(hid) {

    return new Promise((resolve, reject) => {

        instance.get('/admin/Homestay/' + hid).then(res => {

            if(res.code == 200) {

                resolve(res);

            }

        }).catch(err => {

            reject(err);

        })

    })

}

export {homestayIndex, homestayDelete, homestayRead};