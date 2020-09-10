let fs = require('fs');
let path = require('path')
const { create } = require('domain');
const { ETIME } = require('constants');
const { dir } = require('console');
const { dirname } = require('path');

/**
 * 创建文件
 * @param {String} dirname 目录名
 * @param {Number} filecount 文件数量
 */
// 设置缺省值 分支 三元表达式 形参 逻辑或
function createFile(dirname, filecount = 5) {
    // 逻辑或设置缺省值 缺陷：传0时有问题
    // filecount = filecount || 10;

    console.log('开始创建...');

    if(!fs.existsSync(dirname)) {
        return dirname + '目录不存在';
    }

    for (let index = 0; index < filecount; index++) {
        
        let extname = ['html', 'css', 'js', 'txt', 'php', 'doc', 'ppt', 'xls'];

        let path = dirname + '/' + index + '.' + Date.now() + '.' + extname[Math.floor(Math.random() * extname.length)]

        fs.writeFileSync(path, 'index');

    }
    console.log('创建完毕');
}


/**
 * 分类
 * @param {String} path 目录
 */
function classification(path) {

    console.log('开始分类...');

    // 判断目录是否存在
    if(!fs.existsSync(path)) {
        console.log('目录不存在');
        return;
    }

    //
    var fileArr = [];

    // 读取文件夹下所有文件
    fileArr = fs.readdirSync(path);

    // 判断是否非空
    // 存在性用some 全部用every
    let flag = fileArr.some((el) => {

        let stats = fs.statSync(path + '/' + el)

        return stats.isFile()

    })

    if(!flag) {
        return;
    }

    // 循环
    for (let index = 0; index < fileArr.length; index++) {

        const element = fileArr[index];

        var ext = element.split('.').slice(-1);
        // var ext = path.extname(element);

        let stats = fs.statSync(path + '/' + element)

        if(!stats.isFile()) {

            continue;

        }

        !fs.existsSync(path + '/' + ext) && fs.mkdirSync(path + '/' + ext);

        fs.renameSync(path + '/' + element, path + '/' + ext + '/' + element);

    }
    
    console.log('分类完毕');
}

/**
 * 创建深层目录
 * @param {String} path 目录
 */
function createDeepDir(path) {

    var dirArr = path.split('/');

    var currentdir = [];

    while(dirArr.length != 0) {

        currentdir.push(dirArr.shift())

        fs.mkdirSync(currentdir.join('/'));

    }

}

/**
 * 全部删除
 * @param {String} path 目录
 */
function remove(path) {

    // 判断目录是否存在
    if(!fs.existsSync(path)) {
        console.log('目录不存在');
        return;
    }

    let stats = fs.statSync(path);

    if(!stats.isDirectory()) {

        console.log('不是目录');

        return;

    }

    var fileArr = fs.readdirSync(path);

    if(fileArr.length > 0) {

        fileArr.forEach((value) => {

            let stats = fs.statSync(path + '/' + value);

            if(stats.isFile()) {

                fs.unlinkSync(path + '/' + value);

            } else {

                remove(path + '/' + value);

                fs.rmdirSync(path + '/' + value);

            }

        })

    }

}
// createDeepDir('a/b/c/d/e/f/e/s/asd/as/fa');

module.exports = {
    createFile,
    classification,
    remove
}