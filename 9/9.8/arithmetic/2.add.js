let { isNum } = require('./3.isNum');

function add(num1, num2) {
    if(isNum(num1) && isNum(num2)) {
        return num1 + num2;
    }
}

module.exports = {
    "add": add,
}