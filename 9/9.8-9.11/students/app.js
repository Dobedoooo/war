const express = require('express');
const { Db } = require('./lib/db');
const app = express();
let mysql = require('mysql');

const port = 21333;

app.set('views', './views');

app.set('view engine', 'html');

app.use(express.static('public'));

app.engine('html', require('ejs').renderFile);

// 接收Post方式传递的数据
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

let conn = mysql.createConnection({
    host: '49.234.98.39',
    user: 'root',
    password: 'dobedoo',
    database: 'learnNode',
    port: '3306'
})

conn.connect(error => {

    if(error) {
        console.log('[query] - ' + error);
        return;
    } else {
        console.log('[connection connect] succeed!');
    }

});

// 主页
app.get('/', (req, res) => {

    conn.query('SELECT * FROM student', (error, results, fields) => {
        if(error) throw error;
    
        res.render('index', { result: results});
    
    })
    
});

app.get('/app', (req, res) => res.render('app', {}));

// 404
// app.get('*', (req, res) => res.send('404'));

// 删除
app.post('/delete', (req, res) => {

    let uid = req.body.uid;

    conn.query('DELETE FROM student WHERE id=?', [uid], (error, results) => {

        if(error) {
            throw error;
        } else {

            if(results.affectedRows) {

                res.json({
                    code: 200,
                    message: "success"
                });

            }

        }

    })

}); 

// 插入
app.post('/insert', (req, res) => {

    let data = req.body;

    let {name, age, gender, major, classes} = data;

    gender = gender=='男'?1:2;

    conn.query('INSERT INTO student (`name`, age, gender, major, class) VALUES (?, ?, ?, ?, ?)', [name, age, gender, major, classes], (error, results) => {

        if(error) {
            throw error;
        } else {

            if(results.affectedRows) {

                res.json({
                    code: 200,
                    id: results.insertId
                });
                
            } else {
                res.json({
                    code: 500,
                    data: 'fail'
                })
            }

            

        }

    })

})

// 修改
app.post('/edit', (req, res) => {

    let db = new Db('student');

    db.update(req.body).then(() => {

        res.json({
            code: 200,
        })

    }).catch(error => {
        throw error;
    });

})

app.listen(port, () => {
    console.log('app listening at http://localhost:' + port);
})

/**
 * 路由
 * 根据请求找到不同方法 
 */