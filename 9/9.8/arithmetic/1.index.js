function arithmetic(num1, num2, operation) {
    switch (operation) {
        case '+':
            return add(num1, num2);
            break;
        case '-':
            return num1 - num2;
            break;
        case '*':
            return num1 * num2;
            break;
        case '/':
            return num1 / num2;
        default:
            return '运算符错误';
            break;
    }
}

// let add = require('./2.add.js');
let { add } = require('./2.add'); // 不写后缀默认引入js 默认引入文件夹下的index模块
// console.log(add);
// console.log(arithmetic(1, 2, '+'));

// console.log(typeof module.exports);
// console.log(typeof exports);
// console.log(exports == module.exports); // true | module.exports 和 exports 用法相同

module.exports = {
    arithmetic,
}
