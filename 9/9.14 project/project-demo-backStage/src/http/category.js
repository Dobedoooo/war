
import instance from '@/http/http';

function categoryIndex() {

    return new Promise((resolve, reject) => {

        instance.get('/admin/category/getCname').then(res => {

            if(res.code == 200) {

                resolve(res);
                
            }
            

        }).catch(err => {

            reject(err);

        })

    })

}

export {categoryIndex};