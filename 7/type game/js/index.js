

var con = document.querySelector('.con');
con.style.cssText = `
    width: ${document.documentElement.clientWidth}px;
    height: ${document.documentElement.clientHeight}px;
`;
var back = con.querySelector('img');
var interface = con.querySelector('.interface');
var pause = con.querySelector('.pause');
var setPannel = con.querySelector('.set-pannel');
var closeSetPannel = setPannel.querySelector('.back');
var setData = setPannel.querySelector('.positive');
var startBtn = interface.querySelector('.start');
var pauseBtn = pause.querySelector('.start');
var settingsBtn = interface.querySelector('.settings');
var score = con.querySelector('.score');
var life = con.querySelector('.life');
var scoreVal = document.getElementById('scoreVal');
var lifeVal = document.getElementById('lifeVal');
var text = con.querySelector('.text');
// 获取游戏场景
var scene = document.querySelector('.scene');
// 开始动画场景
var preScene = document.querySelector('.pre-animate');

var letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

var speed = 100;
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
    } else if(ev.target == this) {
        this.style.background = 'rgba(255, 255, 255, .3)';
        this.ontransitionend = function () {
            this.style.background = '';
        }
    }
}

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
}

setData.onclick = function() {
    setPannel.style.cssText = `
        // transform-origin: 360px 260px;
        transform: scale(.2);
        opacity: 0;
        z-index: 1;
    `;
    interface.style.cssText = `
        // transform-origin: 360px 260px;
        transform: scale(1);
        opacity: 1;
    `;
}

function append() {
    var ltrBox = document.createElement('div');
    ltrBox.style.cssText = `
        font-size: 60px;
        position: absolute;
        top: 20px;
        left: ${Math.random() * 1840}px;
        transition: all 1s;
    `;
    var currentLtr = Math.floor(Math.random() * letters.length);
    var letter = letters[currentLtr];
    ltrBox.innerHTML = letter;
    scene.appendChild(ltrBox);
    boxs.push(ltrBox);
}

function move() {
    for(var i = 0; i < boxs.length; i++) {
        boxs[i].style.top = boxs[i].offsetTop + speed + 'px';
        if(boxs[i].offsetTop + boxs[i].offsetHeight >= scene.offsetHeight) {
            lifeVal.innerHTML = Number(lifeVal.innerHTML) - 2;
            scene.removeChild(boxs[i]);
            boxs.splice(i, 1);
        }
    }
}

startBtn.onclick = function () {
    interface.style.width = '510px';
    interface.style.height = '319px';
    interface.style.filter = 'blur(20px)';
    interface.style.opacity = 0;
    text.style.opacity = 1;
    setTimeout(() => {
        interface.style.width = '500px';
        interface.style.height = '309px';
        interface.style.filter = 'none';
        interface.style.display = 'none';
    }, 300);
    life.style.right = '140px';
    life.ontransitionend = function () {
        score.style.right = '20px';
    }
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
                    var t1 = setInterval(append, 1000);
                    var t2 = setInterval(move, 40);
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
                            clearInterval(t1);
                            clearInterval(t2);
                            document.onkeydown = null;
                            pause.style.cssText = `
                                display: block;
                                filter: none;
                                opacity: 1;
                                width: 500px;
                                height: 309px;
                            `;
                            // back.style.filter = 'blur(5px) brightness(0.7)';
                            pauseBtn.style.cursor = 'pointer';
                            back.style.transform = 'scale(1.1)';
                        }
                    }
                    document.onkeydown = down;
                    pauseBtn.onclick = function() {
                        t1 = setInterval(append, 1000);
                        t2 = setInterval(move, 40);
                        pause.style.width = '520px';
                        pause.style.height = '329px';
                        pause.style.filter = 'blur(20px)';
                        pause.style.opacity = 0;
                        pauseBtn.style.cursor = 'default';
                        // back.style.filter = 'none';
                        back.style.transform = 'none';
                        document.onkeydown = down;
                    }
                }, 500)

            }, 1000)
        }, 1000);
    }, 1000);
}

// console.log(typeof scoreVal.innerHTML);

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