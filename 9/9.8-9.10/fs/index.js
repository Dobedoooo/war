let fs = require('fs');
const { error } = require('console');
// console.log(fs);
/**
 * 模块化编程解决问题：
    减少文件体积
    命名冲突问题
    文件依赖问题
    提高代码可复用性
 */

 // writeFile 没有返回值
// fs.writeFileSync('./dir/1.txt', 'hello text');
// fs.writeFile('./dir/2.txt', 'hello text 2', (error) => {
//     if(error) {
//         throw error;
//     } else {
//         console.log(2);
//     }
// });

// 读出来是Buffer 需要toString 转
// var content = fs.readFileSync('./dir/1.txt');
// console.log(content.toString());
// fs.readFile('./dir/1.txt', (error, data) => {
//     if(error) {
//         throw error;
//     } else {
//         console.log(data.toString());
//         console.log(error);
//     }
// });

// 删除
fs.existsSync('abc') && fs.rmdirSync('abc');

// mkdir 不能深层次创建


let {createFile, classification, remove} = require('./module/fsmodule');

// createFile('./dir', 20);

// classification('./dir');

remove('dir');