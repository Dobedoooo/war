

var outer = document.querySelector('.outer');
var inner = outer.querySelector('.inner');
var lftBtn = outer.querySelector('.left-btn');
var rtBtn = outer.querySelector('.right-btn');
var items = inner.children;
var currentML = 0;
var num = 1;
inner.insertBefore(items[9], items[0]);
    
lftBtn.onclick = function() {
    clearInterval(t);
    inner.style.transition = 'all .5s ease-out';
    currentML = currentML + 240;
    inner.style.marginLeft = currentML + 'px';
    inner.ontransitionend = function() {
        inner.insertBefore(items[9], items[0]);
        inner.style.transition = 'none';
        currentML = currentML - 240;
        inner.style.marginLeft = currentML + 'px'
    }
}
lftBtn.onmouseout = function() {
    t = setInterval(move, 2000);
}

rtBtn.onmouseout = function() {
    t = setInterval(move, 2000);
}
rtBtn.onclick = function() {
    clearInterval(t);
    inner.style.transition = 'all .5s ease-out';
    currentML = currentML - 240;
    inner.style.marginLeft = currentML + 'px';
    inner.ontransitionend = function() {
        inner.appendChild(items[0]);
        inner.style.transition = 'none';
        currentML = currentML + 240;
        inner.style.marginLeft = currentML + 'px'
    }
}

function move() {
    inner.style.transition = 'all .5s ease-out';
    currentML = currentML - 240;
    inner.style.marginLeft = currentML + 'px';
    inner.ontransitionend = function() {
        inner.appendChild(items[0]);
        inner.style.transition = 'none';
        currentML = currentML + 240;
        inner.style.marginLeft = currentML + 'px'
    }
}

var t = setInterval(move, 2000);
