const express = require('express');
const app = express();
const port = 21334;

app.get('/', (req, res) => {
    res.send('Hello Express');  
})

app.listen(port, () => {
    console.log('app listening at http://localhost:' + port);
})

/**
 * 路由
 * 根据请求找到不同方法
 */