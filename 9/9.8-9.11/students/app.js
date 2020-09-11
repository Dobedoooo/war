const express = require('express');
const app = express();
let mysql = require('mysql');
const port = 21334;

app.set('views', './views');

app.set('view engine', 'html');

app.use(express.static('public'));

app.engine('html', require('ejs').renderFile);

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
        console.log('[conn connect] succeed!');
    }

});

var result;

conn.query('SELECT * FROM student', (error, results, fields) => {
    if(error) throw error;

    result = results;

})

conn.end(error => {
    if(error) {
        return;
    } else {
        console.log('[conn end] succeed!');
    }
});

app.get('/', (req, res) => {
    res.render('index', { name: 'Hello ejs', msg: '模板引擎', result});
});

app.get('/app', (req, res) => res.render('app', {}));

app.get('*', (req, res) => res.send('404'));

app.listen(port, () => {
    console.log('app listening at http://localhost:' + port);
})

/**
 * 路由
 * 根据请求找到不同方法 
 */