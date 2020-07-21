

var Drag = function(selector, opts = {
    effectiveX: true,
    effectiveY: true,
    xBoundaryStart: '',
    xBoundaryEnd: '',
    yBoundaryStart: '',
    yBoundaryEnd: '',
}) {
    this.init(selector, opts);
    this.dragable();
}

Drag.prototype = {
    init(selector, opts) {
        this.dragObj = document.querySelector(selector);
        this.opts = opts;
        this.opts.effectiveX = opts.effectiveX;
        this.opts.effectiveY = opts.effectiveY;
        this.opts.xBoundaryStart = opts.xBoundaryStart;
        this.opts.xBoundaryEnd = opts.xBoundaryEnd;
        this.opts.yBoundaryStart = opts.yBoundaryStart;
        this.opts.yBoundaryEnd = opts.yBoundaryEnd;
    },
    dragable() {
        var dragObj = this.dragObj;
        var opts = this.opts;
        dragObj.onmousedown = function(ev_1) {
            var previousLeft = dragObj.offsetLeft;
            var previousTop = dragObj.offsetTop;
            console.log(opts);
            document.onmousemove = function(ev_2) {
                var yDisplacement = ev_2.clientY - (ev_1.clientY - previousTop);
                var xDisplacement = ev_2.clientX - (ev_1.clientX - previousLeft);
                dragObj.style.zIndex = 9999;
                if(opts.xBoundaryStart !== '') {
                    if(xDisplacement < opts.xBoundaryStart) {
                        xDisplacement = opts.xBoundaryStart;
                    }
                }
                if(opts.xBoundaryEnd !== '') {
                    if(xDisplacement > opts.xBoundaryEnd) {
                        xDisplacement = opts.xBoundaryEnd;
                    }
                }
                if(opts.yBoundaryStart !== '') {
                    if(yDisplacement < opts.yBoundaryStart) {
                        yDisplacement = opts.yBoundaryStart;
                    }
                }
                if(opts.yBoundaryEnd !== '') {
                    if(yDisplacement > opts.yBoundaryEnd) {
                        yDisplacement = opts.yBoundaryEnd;
                    }
                }
                if(opts.effectiveY) {
                    dragObj.style.top = yDisplacement + 'px';
                }
                if(opts.effectiveX) {
                    dragObj.style.left = xDisplacement + 'px';
                }
            }
        }
        //鼠标抬起 注销鼠标移动事件
        document.onmouseup = function() {
            dragObj.style.zIndex = 1;
            document.onmousemove = null;
        }
    }
}