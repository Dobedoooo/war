

var con = document.querySelector('.con');
con.style.cssText = `
    width: ${document.documentElement.clientWidth}px;
    height: ${document.documentElement.clientHeight}px;
`;
// 游戏背景
var back = con.querySelector('img');
// 主菜单
var interface = con.querySelector('.interface');
// 暂停面板
var pause = con.querySelector('.pause');
// 设置面板
var setPannel = con.querySelector('.set-pannel');
// 按钮（关闭设置面板）
var closeSetPannel = setPannel.querySelector('.back');
// 按钮（设置游戏数据）
var setData = setPannel.querySelector('.positive');
// 按钮（开始游戏）
var startBtn = interface.querySelector('.start');
// 按钮（继续游戏）
var pauseBtn = pause.querySelector('.start');
// 按钮（打开设置面板）
var settingsBtn = interface.querySelector('.settings');
// 计分板
var score = con.querySelector('.score');
// 生命值面板
var life = con.querySelector('.life');
// 分数
var scoreVal = document.getElementById('scoreVal');
// 生命值
var lifeVal = document.getElementById('lifeVal');
// 规则面板
var rulePannel = con.querySelector('.rule-pannel');
// '好的' 按钮
var know = rulePannel.querySelector('.understood');
// 按钮（打开规则面板）
var ruleBtn = setPannel.querySelector('.rule');
// 获取游戏场景
var scene = document.querySelector('.scene');
// 开始动画场景
var preScene = document.querySelector('.pre-animate');
// 速度条
var spdBar = document.game_data.spd;
// 具体数据面板
var spdSet = setPannel.querySelector('.spd-value');
// 数量条
var numBar = document.game_data.num;
// 游戏结束面板
var gameOverPannel = con.querySelector('.over');
// 按钮（返回主菜单）
var rt = gameOverPannel.querySelector('.return');
// 按钮（重新开始）
var rstr = gameOverPannel.querySelector('.restart');
// 字符集
var letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

// 掉落速度
var speed = Number(spdBar.value);
// 同一时间掉落数量
var numAtOnce = Number(numBar.value);
var boxs = [];
var rotateNum = 1;
interface.onclick = function (ev) {
    if(ev.target == settingsBtn.firstElementChild) {
        ev.target.style.transform = `rotate(${-180 * rotateNum}deg)`;
        rotateNum++;
        setPannel.style.cssText = `
            transform: scale(1);
            opacity: 1;
            z-index: 4;
        `;
        this.style.cssText = `
            opacity: 0;
            transform: scale(.2);
        `;
        rulePannel.style.display = 'block';
    } else if(ev.target == this) {
        this.style.background = 'rgba(255, 255, 255, .3)';
        this.ontransitionend = function () {
            this.style.background = '';
        }
    }
}

// 不同数值字体颜色
function fontColor(val) {
    switch (val) {
        case '1':
            spdSet.style.color = '#eee';
            break;
        case '2':
            spdSet.style.color = '#ddd';
            break;
        case '3':
            spdSet.style.color = '#ccc';
            break;
        case '4':
            spdSet.style.color = '#aaa';
            break;
        case '5':
            spdSet.style.color = '#999';
            break;
        case '6':
            spdSet.style.color = '#777';
            break;
        case '7':
            spdSet.style.color = '#555';
            break;
        case '8':
            spdSet.style.color = '#333';
            break;
        case '9':
            spdSet.style.color = '#222';
            break;
        case '10':
            spdSet.style.color = '#000';
            break;
        default:
            break;
    }
}

// 速度条鼠标按下事件
spdBar.onmousedown = function() {
    spdSet.style.cssText = `
        background: rgba(255, 255, 255, .15);
        border-radius: 12px;
        width: 200px;
        height: 50px;
        top: -180px;
    `;
    fontColor(spdBar.value);
    spdSet.innerHTML = `掉落速度：${spdBar.value}`;
}

// 速度条鼠标拖动事件
spdBar.oninput = function() {
    // console.log(spdBar.value);
    fontColor(spdBar.value);
    spdSet.innerHTML = `掉落速度：${spdBar.value}`;
}

// 速度条鼠标抬起事件
spdBar.onmouseup = function() {
    setTimeout(() => {
        spdSet.style.cssText = `
            top: -10px;
        `;    
    }, 300);
    
}

numBar.onmousedown = function() {
    spdSet.style.cssText = `
        background: rgba(255, 255, 255, .15);
        border-radius: 12px;
        width: 200px;
        height: 50px;
        top: -180px;
        color: #ddd;
    `;
    spdSet.innerHTML = `掉落数量：${numBar.value}`;
    fontColor(spdBar.value);
}

numBar.oninput = function() {
    fontColor(numBar.value);
    spdSet.innerHTML = `掉落数量：${numBar.value}`;

}
numBar.onmouseup = function() {
    setTimeout(() => {
        spdSet.style.cssText = `
            top: -10px;
        `;    
    }, 300);
    
}

// 查看游戏规则按钮点击事件
ruleBtn.onclick = function() {
    rulePannel.style.cssText = `
        transform: scale(1);
        opacity: 1;
        z-index: 4;
        display: block;
    `;
    setPannel.style.cssText = `
        transform: scale(.2);
        opacity: 0;
        z-index: 1;
    `;
}

// 游戏规则面板确定按钮点击事件
know.onclick = function() {
    rulePannel.style.cssText = `
        transform: scale(.2);
        display: block;
    `;
    setPannel.style.cssText = `
        transform: scale(1);
        opacity: 1;
        z-index: 4;
    `;
}

// 关闭设置面板按钮点击事件
closeSetPannel.onclick = function() {
    this.style.transform = `rotate(${-180 * rotateNum}deg)`;
    setPannel.style.cssText = `
        transform: scale(.2);
        opacity: 0;
        z-index: 1;
    `;
    interface.style.cssText = `
        opacity: 1;
        transform: scale(1);
    `;
    rulePannel.style.display = 'none';
}

// 设置游戏数据(设置面板确定按钮)按钮点击事件
setData.onclick = function() {
    speed = Number(spdBar.value);
    numAtOnce = Number(numBar.value);
    setPannel.style.cssText = `
        transform: scale(.2);
        opacity: 0;
        z-index: 1;
    `;
    interface.style.cssText = `
        transform: scale(1);
        opacity: 1;
    `;
}

function append(num=numAtOnce) {
    for (let index = 0; index < num; index++) {
        var ltrBox = document.createElement('div');
        ltrBox.style.cssText = `
            font-size: 60px;
            position: absolute;
            top: 20px;
            left: ${Math.random() * 1840}px;
            z-index: 9999;
            cursor: default;
        `;
        var currentLtr = Math.floor(Math.random() * letters.length);
        var letter = letters[currentLtr];
        ltrBox.innerHTML = letter;
        scene.appendChild(ltrBox);
        boxs.push(ltrBox);
    }
}

var t1;
var t2;

function move() {
    if(Number(lifeVal.innerHTML) < 90) {
        gameOverPannel.style.opacity = 1;
        gameOverPannel.style.zIndex = 4;
        gameOverPannel.style.filter = 'none';
        back.style.transform = 'scale(1.1)';
        interface.style.display = 'block';
        interface.style.transform = 'scale(.2)';
        clearInterval(t1);
        clearInterval(t2);
    } else if(Number(lifeVal.innerHTML) >= 90) {
        for(var i = 0; i < boxs.length; i++) {
            boxs[i].style.top = boxs[i].offsetTop + speed + 'px';
            if(boxs[i].offsetTop + boxs[i].offsetHeight >= scene.offsetHeight) {
                lifeVal.innerHTML = Number(lifeVal.innerHTML) - 2;
                scene.removeChild(boxs[i]);
                boxs.splice(i, 1);
            }
        }
    }
    
}

function game() {
    life.style.right = '140px';
    setTimeout(() => {
        score.style.right = '20px';
    }, 300);
    preScene.style.display = 'block';
    scene.style.display = 'block';
    preScene.innerHTML = 3;
    preScene.style.cssText = `
        filter: none;
        font-size: 150px;
    `;
    setTimeout(() => {
        preScene.innerHTML = 2;
        setTimeout(() => {
            preScene.innerHTML = 1;
            setTimeout(() => {
                preScene.innerHTML = 'GO!';
                setTimeout(() => {
                    preScene.style.cssText = `
                        fliter: blur(20px);
                        font-size: 190px;
                        opacity: 0;
                    `;
                    preScene.ontransitionend = function () {
                        preScene.style.display = 'none';
                    }
                    t1 = setInterval(append, 1000);
                    t2 = setInterval(move, 40);
                    var btnVlidate = true;
                    function down (ev) {
                        var key = String.fromCharCode(ev.keyCode);
                        for(var i = 0; i < boxs.length; i++) {
                            if(boxs[i].innerHTML == key) {
                                scoreVal.innerHTML = Number(scoreVal.innerHTML) + 1;
                                scene.removeChild(boxs[i]);
                                boxs.splice(i, 1);
                            }
                        }
                        if(ev.keyCode == 32) {
                            btnVlidate = true;
                            for (let index = 0; index < boxs.length; index++) {
                                const element = boxs[index];
                            }
                            clearInterval(t1);
                            clearInterval(t2);
                            document.onkeydown = null;
                            pause.style.cssText = `
                                display: block;
                                filter: none;
                                opacity: 1;
                                width: 500px;
                                height: 309px;
                                z-index: 5;
                            `;
                            // back.style.filter = 'blur(5px) brightness(0.7)';
                            pauseBtn.style.cursor = 'pointer';
                            back.style.transform = 'scale(1.1)';
                        }
                    }
                    document.onkeydown = down;
                    pauseBtn.onclick = function() {
                        if(btnVlidate) {
                            t1 = setInterval(append, 1000);
                            t2 = setInterval(move, 40);
                            pause.style.width = '520px';
                            pause.style.height = '329px';
                            pause.style.filter = 'blur(20px)';
                            pause.style.opacity = 0;
                            pause.style.zIndex = 1;
                            pauseBtn.style.cursor = 'default';
                            // back.style.filter = 'none';
                            back.style.transform = 'none';
                            document.onkeydown = down;
                            btnVlidate = false;
                        }
                    }
                }, 500)

            }, 1000)
        }, 1000);
    }, 1000);
}

// 开始按钮
startBtn.onclick = function () {
    rulePannel.style.display = 'none';
    gameOverPannel.style.display = 'block';
    gameOverPannel.style.opacity = 0;
    gameOverPannel.style.transform = 'none';
    interface.style.width = '510px';
    interface.style.height = '319px';
    interface.style.filter = 'blur(20px)';
    interface.style.opacity = 0;
    setPannel.style.display = 'none';
    setTimeout(() => {
        interface.style.width = '500px';
        interface.style.height = '309px';
        interface.style.filter = 'none';
        interface.style.display = 'none';
    }, 300);
    game();
}

// console.log(typeof scoreVal.innerHTML);

// 再来一场按钮点击事件
rstr.onclick = function() {
    scoreVal.innerHTML = '0';
    lifeVal.innerHTML = '100';
    boxs = [];
    while(scene.hasChildNodes()) {
        scene.removeChild(scene.firstChild);
    }
    gameOverPannel.style.opacity = 0;
    gameOverPannel.style.width = '510px';
    gameOverPannel.style.height = '319px';
    gameOverPannel.style.filter = 'blur(20px)';
    setTimeout(() => {
        gameOverPannel.style.width = '500px';
        gameOverPannel.style.height = '309px';
        gameOverPannel.style.filter = 'none';
    }, 300);
    game();
    // gameOverPannel.style.display = 'block';
    // gameOverPannel.style.opacity = 1;
}

// 返回主菜单按钮点击事件
rt.onclick = function() {
    scoreVal.innerHTML = '0';
    lifeVal.innerHTML = '100';
    boxs = [];
    while(scene.hasChildNodes()) {
        scene.removeChild(scene.firstChild);
    }
    score.style.right = '-110px';
    setTimeout(() => {
        life.style.right = '-110px';
    }, 300);
    back.style.transform = 'none';
    interface.style.transform = 'scale(1)';
    interface.style.opacity = 1;
    gameOverPannel.style.opacity = 0;
    gameOverPannel.style.transform = 'scale(.2)';
    setTimeout(() => {
        gameOverPannel.style.display = 'none';
    }, 300)
}

score.onclick = function () {
    this.style.background = 'rgba(255, 255, 255, .2)';
    this.ontransitionend = function () {
        this.style.background = 'rgba(255, 255, 255, .1)';
    }
}

life.onclick = function () {
    this.style.background = 'rgba(255, 255, 255, .2)';
    this.ontransitionend = function () {
        this.style.background = 'rgba(255, 255, 255, .1)';
    }
}