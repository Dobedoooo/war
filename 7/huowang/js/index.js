
$(function() {

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
        
        if(top_1 < wdTop) {
            $('.middle-nav').addClass('move');
        }

        if($('.top-img').offset().top < wdTop) {
            $('.top-img').addClass('move');
        }

        if($('.other-img').offset().top < wdTop) {
            $('.other-img').addClass('move');
        }

        if($('.serv').offset().top < wdTop) {
            $('.serv').addClass('move');
            $('.serv-img-1').addClass('move');
            $('.serv-img-2').addClass('move');
            $('.serv-img-3-1').addClass('move');
            $('.serv-img-3-2').addClass('move');
        }

        if($('.news').offset().top < wdTop) {
            $('.news').addClass('move');
        }

        if($('.need-con h1').offset().top < wdTop) {
            $('.need-con h1').addClass('move');
        }

        if($('.need-con').offset().top < wdTop) {
            $('.need-link-con a').addClass('move');
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

    var swiper = new Swiper('.news-list .swiper-container', {
        loop: true,
        autoplay: true,
        speed: 1200,
        direction: 'vertical',
        slidesPerView: 3,
        touchAngle: 90,
        autoplayDisableOnInteration: false,
    });
})

