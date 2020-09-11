

let fs = require('fs');
let http = require('http');
let path = require('path');
let mime = require('mime');

let server = http.createServer((req, res) => {
    let url = req.url;

    if(url != '/favicon.ico') {

        url = url === '/'?'/index.html':url;

        let extname = path.extname(url);

        let filePath = './view' + url;

        if(!fs.existsSync(filePath)) {

            fs.readFile('./view/404.html', (error, data) => {

                if(error) {
                    throw error;
                } else {

                    res.setHeader('content-type', 'text/html');

                    res.end(data);
                }

            })

        } else {

            fs.readFile(filePath, (error, data) => {

                if(error) {
                    throw error;
                }

                let extension = mime.getType(extname.substring(1));

                res.setHeader('content-type', extension);

                res.end(data);

            })

        }

    }
})

server.listen(8080, () => {

    console.log('Listend On: 8080');

});