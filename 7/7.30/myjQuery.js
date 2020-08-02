function myjQuery(selector) {
    // 传入选择器
    if(typeof selector == 'string') {
        if(selector.charAt(0) == '<') {
            var ele = document.createElement(selector.slice(1, -1));
            this[0] = ele;
            this.length = 1;
        } else {
            var arr = document.querySelectorAll(selector);
            for (let index = 0; index < arr.length; index++) {
                this[index] = arr[index];
            }
            this.length = arr.length;
        }
        
    } else if(selector.nodeType == 1) { // 传入DOM对象
        this[0] = selector;
        this.length = 1;
    } else if(typeof selector == 'function') {
        window.addEventListener('DOMContentLoaded', function() {
            selector();
        });
        // window.onload = function() {
        //     selector();
        // }
    }
    // 传入函数，传入的函数在页面加载完成之后进行
    
}

myjQuery.prototype = {
    each: function(callback) {
        for (let index = 0; index < this.length; index++) {
            const element = this[index];
            callback(index, element);
        }
    },
    html: function(text) {
        this.each(function(index, value) {
            value.innerHTML = text;
        });
        return this;
    },
    css: function(attr, val) {
        this.each(function(index, value) {
            if(typeof attr == 'string') {
                if(attr == 'width' || attr == 'height' || attr == 'padding' || attr == 'margin') {
                    value.style[attr] = parseInt(val) + 'px';
                } else {
                    value.style[attr] = val;
                }
            } else if(typeof attr == 'object') {
                for (const i in attr) {
                    if(i == 'width' || i == 'height' || i == 'padding' || i == 'margin') {
                        value.style[i] = parseInt(attr[i]) + 'px';
                    } else {
                        value.style[i] = attr[i];
                    }
                }
            }
        });
        // 实现链式调用
        return this;
    },
    attr: function(attr, val) {
        this.each(function(index, value) {
            value.setAttribute(attr, val);
        })
        return this;
    },
    click: function(callback) {
        this.each(function(index, value) {
            value.onclick = function() {
                callback.call(value);
            }
        })
        return this;
    },
    appendTo(ele) {
        this.each(function(index, value) {
            ele.appendChild(value);
        });
        return this;
    },
    append(tagName) {
        var newEle = document.createElement(tagName);
        this.each(function(index, value) {
            value.appendChild(newEle);
        });
        this[0] = newEle;
        return this;
    },
}

function $(selector) {
    return new myjQuery(selector);
}