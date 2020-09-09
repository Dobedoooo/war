function isNum(params) {
    // 判断变量类型
    // 1. typeof
    // 2. instanceof
    // 3. var.constructor.name 每个构造函数都有一个属性 name 记录变量类型
    return typeof params === 'number';
}

module.exports = {
    "isNum": isNum,
}

// console.log(isNum(1));