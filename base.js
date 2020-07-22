/**
 * 无缝轮播
 * @param {String} container 轮播图最外层容器
 * @param {JSON} layout 各种选项
 * @param {Array} layout.imgs 图片地址
 * @param {Array} layout.imgColor 图片边缘颜色，用于全屏拼接
 * @param {Array} layout.links 图片链接地址
 * @param {Array} layout.imgSize 图片宽高 [width, height]
 * @param {String} layout.btnColor 按钮默认颜色
 * @param {String} layout.btnActive 获得焦点按钮颜色
 * @param {number} layout.activeOpacity 获得焦点按钮透明度
 * @param {Array} layout.btnPos 按钮位置 [x, y]
 * @param {number} opts.time 轮播时间间隔(s)
 * @param {number} opts.gap 动画时长(s)
 * @param {String} opts.runStyle 轮播缓动方式
 */
function carousel(container, layout = {
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

    // 参数初始化
    var container = document.querySelector(container);
    if(!(container && container.nodeType == 1)) {
        console.error('容器未发现');
        return;
    }

    var imgs = layout.imgs;
    var imgColor = layout.imgColor;
    var links = layout.links;
    var imgSize = layout.imgSize;
    var btnColor = layout.btnColor;
    var btnActive = layout.btnActive;
    var activeOpacity = layout.activeOpacity;
    var btnPos = layout.btnPos;
    var time = opts.time;
    var gap = opts.gap;
    var runStyle = opts.runStyle;

    if(imgs.length == 0) {
        console.error('轮播内容为空');
        return;
    }
    // 图片地址数组末尾添加 img[0]
    imgs.push(imgs[0]);

    // 链接初始化
    if(links == 0) {
        console.warn('链接地址为空，已默认设置为 "javascript:;"');
        for (let index = 0; index < imgs.length; index++) {
            links[index] = 'javascript:;';
        }
    }
    // 图片链接地址数组末尾添加 links[0]
    links.push(links[0]);

    // 填充色初始化
    if(imgColor.length == 0) {
        console.warn('图片两端填充色为空，已默认设置为 "#ccc"');
        for (let index = 0; index < imgs.length; index++) {
            imgColor[index] = '#ccc';
        }
    }
    // 图片边缘颜色数组末尾添加 imgColor[0]
    imgColor.push(imgColor[0]);
    

    if(!(imgSize instanceof Array)) {
        console.error('请传入合法图片尺寸');
    }
    if(imgSize.length == 0) {
        imgSize[0] = document.documentElement.clientWidth;
        imgSize[1] = 500;
        console.warn('图片尺寸为空，默认设置为 ' + imgSize[0] + ' × 500');
    } 

    // 创建HTML结构和样式
    // 外层容器样式
    container.style.cssText = `
        width: 100%;
        height: ${imgSize[1]}px;
        position: relative;
        overflow-x: hidden;
    `;
    // 内层容器及样式
    var innerContainer = document.createElement('div');
    innerContainer.style.cssText = `
        width: ${imgs.length * 100}%;
        height: 100%;
        transition: all ${gap}s ${runStyle};
    `;
    // 循环创建每一张轮播图
    for(var i = 0; i < imgs.length; i++) {
        var img = document.createElement('a');
        img.href = links[i];
        img.style.cssText = `
            display: block;
            width: ${100 / imgs.length}%;
            height: 100%;
            float: left;
            background: url(${imgs[i]}) no-repeat center center;
            background-size: ${imgSize[0]}px ${imgSize[1]}px;
            background-color: ${imgColor[i]};
            vertical-align: middle;
        `;
        innerContainer.appendChild(img);
    }

    container.appendChild(innerContainer);

    // 创建按钮及样式
    var btnContainer = document.createElement('div');
    var btns = [];
    var btnsWidth = 45 * (imgs.length - 1);
    btnContainer.style.cssText = `
        width: ${btnsWidth}px;
        position: absolute;
        left: ${(document.documentElement.clientWidth - btnsWidth) / 2}px;
        bottom: ${btnPos[1]}px;
    `;
    for (let index = 0; index < imgs.length - 1; index++) {
        var bgFilling = i==0?btnActive:btnColor;
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
        btns.push(btn);
    }
    container.appendChild(btnContainer);
    btns = btnContainer.children;

    // 轮播
    var num = 0;
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
            clearInterval(t);
            if(!flag) {
                return;
            }
            flag = false;
            num = index;
            for (let i = 0; i < btns.length; i++) {
                btns[i].style.backgroundColor = btnColor;
            }
            this.style.backgroundColor = btnActive;
            innerContainer.style.marginLeft = -(num * document.documentElement.clientWidth) + 'px';
            flag = true;
        }

        btns[index].onmouseout = function() {
            t = setInterval(change, time * 1000);
        }
    }
}
/**
 * 批量添加事件
 * @param {Object} collection 要注册事件的对象集合
 * @param {String} eventName 事件名
 * @param {Function} eventFunc 事件处理程序
 */
function add_event_in_bulk(collection, eventName, eventFunc) {
    for(let index = 0; index < collection.length; index++) {
        collection[index].addEventListener(eventName, eventFunc);
    }
}