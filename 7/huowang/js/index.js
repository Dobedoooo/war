
$(function() {
    console.log('dobedoo222@gmail.com');

    // 鼠标移入切换图片 鼠标移出恢复
    function over() {
        $(this.children[0].firstElementChild.children[0]).css('opacity', 0);
        $(this.children[0].firstElementChild.children[1]).css('opacity', 1);
    }
    function out() {
        $(this.children[0].firstElementChild.children[0]).css('opacity', 1);
        $(this.children[0].firstElementChild.children[1]).css('opacity', 0);
    }
    $('.product li').hover(over, out);
    $('.service li').hover(over, out);
    $('.culture li').hover(over, out);
    $('.media li').hover(over, out);
    $('.shop li').hover(over, out);
    $('.middle-nav li').hover(over, out);
    // 鼠标移入导航出现下拉列表
    $('.nav li:not(.active)').mouseenter(function(ev) {
        $('header').addClass('on-move');
        if($(this).index() == 1) {
            $('.product').css({
                opacity: 1,
                zIndex: 1
            });
            $('.service, .culture, .join, .shop, .media').css({
                opacity: 0,
                zIndex: 0,
            });
        } else if($(this).index() == 2) {
            $('.service').css({
                opacity: 1,
                zIndex: 1
            });
            $('.product, .culture, .join, .shop, .media').css({
                opacity: 0,
                zIndex: 0,
            });
        } else if($(this).index() == 3) {
            $('.culture').css({
                opacity: 1,
                zIndex: 1
            });
            $('.product, .service, .join, .shop, .media').css({
                opacity: 0,
                zIndex: 0,
            });
        } else if($(this).index() == 4) {
            $('.media').css({
                opacity: 1,
                zIndex: 1
            });
            $('.product, .service, .culture, .join, .shop').css({
                opacity: 0,
                zIndex: 0,
            });
        } else if($(this).index() == 5) {
            $('.join').css({
                opacity: 1,
                zIndex: 1
            });
            $('.product, .service, .culture, .shop, .media').css({
                opacity: 0,
                zIndex: 0,
            });
        } else if($(this).index() == 6) {
            $('.shop').css({
                opacity: 1,
                zIndex: 1
            });
            $('.product, .service, .culture, .join, .media').css({
                opacity: 0,
                zIndex: 0,
            });
        }
        $('.nav-list-con').css({
            transform: 'translate(0, 0)',
            background: '#fff',
            visibility: 'visible'
        });
        $('header').css('background', '#fff');
    });

    // 移出下拉框，下拉框消失
    var head = $('.header-con');
    $('.nav-list-con').mouseleave(function(ev) {
        var target = ev.toElement;
        if(target == head.children()[0] || target == head.children()[0].children[0] || target == head.children()[1] || target == head.children()[1].children[0] || target == head.children()[1].children[0].children[0].children[0] || target == head.children()[1].children[0].children[1].children[0] || target == head.children()[1].children[0].children[2].children[0] || target == head.children()[1].children[0].children[3].children[0] || target == head.children()[1].children[0].children[4].children[0] || target == head.children()[1].children[0].children[5].children[0] || target == head.children()[1].children[0].children[6].children[0] || target == head.children()[1].children[1] || target == head.children()[1].children[1].children[0]) {
            return;
        } else {
            setTimeout(() => {
                $('header').removeClass('on-move');
                $('.nav-list-con').css({
                    transform: 'translate(0, -97px)',
                    background: 'none',
                    visibility: 'hidden'
                });
                $('.product, .service, .culture, .join, .shop, .media').css({
                    opacity: 0,
                });
                $('header').css('background', 'none');
            }, 300);
            
        }
        
    })

    // 搜索框
    $('form').mouseenter(function () {
            // over
            $('header').addClass('on-search');
        }
    );
    $('.search-box').mouseleave(function (ev) { 
        if(ev.toElement == $('form img')[0] || ev.toElement == $('form .search-box-close')[0] || ev.toElement == $('form')[0]) {
            return;
        } else {
            setTimeout(() => {
                $('header').removeClass('on-search');
            }, 0);
        }
        
    });
    $('.search-box-close').click(function (e) { 
        e.preventDefault();
        $('header').removeClass('on-search');
    });

    var offset_1 = $('.middle-nav').offset();
    var top_1 = offset_1.top;
    if(top_1 < $(window).height()) {
        $('.middle-nav').addClass('move');
    }
    
    // 加载首屏图片
    $.each($('img'), function (indexInArray, valueOfElement) { 
        if(valueOfElement.getBoundingClientRect().top < $(window).height()) {
            $(valueOfElement).attr('src', $(valueOfElement).attr('data-src'));
        } 
    });

    $(window).scroll(function () { 
        var wdTop = $(window).scrollTop() + $(window).height();
        // console.log($('.letmove').offset().top ,wdTop);

        // 按需加载图片
        $.each($('img'), function (indexInArray, valueOfElement) {
            if(valueOfElement.getBoundingClientRect().top < wdTop + 10) {
                $(valueOfElement).attr('src', $(valueOfElement).attr('data-src'));
            }
        });
        
        if(top_1 < wdTop) {
            $('.middle-nav').addClass('move');
        }

        if($('.top-img').offset().top < wdTop) {
            $('.top-img').addClass('move');
        }

        if($('.letmove').offset().top < wdTop) {
            $('.letmove').addClass('move');
        }
    });

    var floatFlag = false;

    function floatStart(ev) {
        if(ev.propertyName == 'opacity') {
            floatFlag = true;
            $(this).get(0).removeEventListener('transitionend', floatStart);
        }
    }

    $('.serv-img-1').get(0).addEventListener('transitionend', floatStart);

    function imgFloat (ev, item, con, speed) {
        var itemOffsetLeft = $(item).offset().left,
            itemOffsetWidth = $(item).width(),
            itemOffsetCenter = itemOffsetLeft + itemOffsetWidth / 2,
            conOffsetTop = $(con).offset().top,
            conOffsetBottom = $(con).offset().top + $(con).height();

        if(conOffsetTop < ev.pageY && ev.pageY < conOffsetBottom) {
            $(item).find('.float-target').css('transform', 'translateX(' + speed * (ev.pageX - itemOffsetCenter) / itemOffsetWidth + 'px)');
        } else {
            $(item).find('.float-target').css('transform', 'translate(0)');
        }
    }

    $(window).mousemove(function (e) { 
        // values: e.clientX, e.clientY, e.pageX, e.pageY
        if(floatFlag) {
            imgFloat(e, '.serv-img-1', '.serv', 10);
            imgFloat(e, '.serv-img-2', '.serv', 30);
            imgFloat(e, '.serv-img-3', '.serv', 40);
        }
    });
})

