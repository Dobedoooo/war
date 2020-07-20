
var Carousel = function(container, layout = {
    imgs: [],
    imgColor: [],
    links: [],
    imgSize: [],
    btnColor: 'rgba(255, 255, 255, .1)',
    btnActive: '#2691fd',
    activeOpacity: 1,
    btnPos: ['center', '20']
}, opts = {
    time: 3,
    gap: .3,
    runStyle: 'linear'
}) {
    this.init(container, layout, opts);
    this.build();
    this.run();
}

Carousel.prototype = {
    init(container, layout, opts) {
        // 参数初始化
        this.container = document.querySelector(container);
        if(!(this.container && this.container.nodeType == 1)) {
            console.error('容器未发现');
            return;
        }

        this.imgs = layout.imgs;
        this.imgColor = layout.imgColor;
        this.links = layout.links;
        this.imgSize = layout.imgSize;
        this.btnColor = layout.btnColor;
        this.btnActive = layout.btnActive;
        this.activeOpacity = layout.activeOpacity;
        this.btnPos = layout.btnPos;
        this.time = opts.time;
        this.gap = opts.gap;
        this.runStyle = opts.runStyle;

        if(this.imgs.length == 0) {
            console.error('轮播内容为空');
            return;
        }
        // 图片地址数组末尾添加 img[0]
        this.imgs.push(this.imgs[0]);

        // 链接初始化
        if(this.links.length == 0) {
            console.warn('链接地址为空，已默认设置为 "javascript:;"');
            for (let index = 0; index < this.imgs.length; index++) {
                this.links[index] = 'javascript:;';
            }
        }
        // 图片链接地址数组末尾添加 links[0]
        this.links.push(this.links[0]);

        // 填充色初始化
        if(this.imgColor.length == 0) {
            console.warn('图片两端填充色为空，已默认设置为 "#ccc"');
            for (let index = 0; index < imgs.length; index++) {
                imgColor[index] = '#ccc';
            }
        }
        // 图片边缘颜色数组末尾添加 imgColor[0]
        this.imgColor.push(this.imgColor[0]);
        

        if(!(this.imgSize instanceof Array)) {
            console.error('请传入合法图片尺寸');
        }
        if(this.imgSize.length == 0) {
            imgSize[0] = document.documentElement.clientWidth;
            imgSize[1] = 500;
            console.warn('图片尺寸为空，默认设置为 ' + imgSize[0] + ' × 500');
        } 
    },
    build() {
        // 创建HTML结构和样式
        // 外层容器样式
        this.container.style.cssText = `
        width: 100%;
        height: ${this.imgSize[1]}px;
        position: relative;
        overflow-x: hidden;
        `;
        // 内层容器及样式
        this.innerContainer = document.createElement('div');
        this.innerContainer.style.cssText = `
            width: ${this.imgs.length * 100}%;
            height: 100%;
            transition: all ${this.gap}s ${this.runStyle};
        `;
        // 循环创建每一张轮播图
        for(var i = 0; i < this.imgs.length; i++) {
            var img = document.createElement('a');
            img.href = this.links[i];
            img.style.cssText = `
                display: block;
                width: ${100 / this.imgs.length}%;
                height: 100%;
                float: left;
                background: url(${this.imgs[i]}) no-repeat center center;
                background-size: ${this.imgSize[0]}px ${this.imgSize[1]}px;
                background-color: ${this.imgColor[i]};
                vertical-align: middle;
            `;
            this.innerContainer.appendChild(img);
        }

        this.container.appendChild(this.innerContainer);

        // 创建按钮及样式
        var btnContainer = document.createElement('div');
        this.btns = [];
        var btnsWidth = 45 * (this.imgs.length - 1);
        btnContainer.style.cssText = `
            width: ${btnsWidth}px;
            position: absolute;
            left: ${(document.documentElement.clientWidth - btnsWidth) / 2}px;
            bottom: ${this.btnPos[1]}px;
        `;
        for (let index = 0; index < this.imgs.length - 1; index++) {
            var bgFilling = i==0?this.btnActive:this.btnColor;
            var btn = document.createElement('div');
            btn.style.cssText = `
                width: 25px;
                height: 5px;
                float: left;
                background: ${bgFilling};
                margin: 0 10px;
                cursor: pointer;
            `;
            btnContainer.appendChild(btn);
            this.btns.push(btn);
        }
        this.container.appendChild(btnContainer);
        console.log(this.btns);
    },
    run() {
        // 轮播
        var num = 0;
        var btns = this.btns;
        var innerContainer = this.innerContainer;
        var gap = this.gap;
        var runStyle = this.runStyle;
        var btnActive = this.btnActive;
        var activeOpacity = this.activeOpacity;
        var btnColor = this.btnColor;
        var time = this.time;
        btns[0].style.backgroundColor = btnActive;
        btns[0].style.opacity = activeOpacity;
        
        function change() {
            if(num == btns.length - 1) {
                innerContainer.style.marginLeft = -((num + 1) * document.documentElement.clientWidth) + 'px';
                btns[0].style.backgroundColor = btnActive;
                btns[btns.length - 1].style.backgroundColor = btnColor;
                innerContainer.ontransitionend = function() {
                    innerContainer.style.transition = 'none';
                    innerContainer.style.marginLeft = 0;
                }
                num = 0;
            } else {
                num++;
                innerContainer.ontransitionend = null;
                innerContainer.style.transition = 'all ' + gap + 's ' + runStyle;
                for (var index = 0; index < btns.length; index++) {
                    btns[index].style.backgroundColor = btnColor;
                }
                btns[num].style.backgroundColor = btnActive;
                btns[num].style.opacity = activeOpacity;
                innerContainer.style.marginLeft = -(num * document.documentElement.clientWidth) + 'px';
            }
        }
        var t = setInterval(change, time * 1000);

        // 鼠标放入切换 停止轮播
        var flag = true;
        for (let index = 0; index < btns.length; index++) {
            btns[index].onmouseover = function() {
                innerContainer.style.transition = 'all ' + gap + 's ' + runStyle;
                innerContainer.ontransitionend = null;
                clearInterval(t);
                if(!flag) {
                    return;
                }
                flag = false;
                num = index;
                for (let i = 0; i < btns.length; i++) {
                    btns[i].style.backgroundColor = btnColor;
                }
                btns[num].style.backgroundColor = btnActive;
                innerContainer.style.marginLeft = -(num * document.documentElement.clientWidth) + 'px';
                flag = true;
            }

            btns[index].onmouseout = function() {
                t = setInterval(change, time * 1000);
            }
        }
    }
}