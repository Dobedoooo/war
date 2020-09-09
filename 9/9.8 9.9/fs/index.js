let fs = require('fs');
// console.log(fs);
/**
 * 模块化编程解决问题：
    减少文件体积
    命名冲突问题
    文件依赖问题
    提高代码可复用性
 */

 // writeFile 没有返回值
fs.writeFileSync('./dir/1.txt', 'hello text');
fs.writeFile('./dir/2.txt', 'hello text 2', () => {});
console.log(1);