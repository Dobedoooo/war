$(function () {

    var scrollBar = $('.nav-1 ul');
    var offsetX = 0;

    scrollBar.hammer().bind('panstart', (e) => {
        offsetX = parseInt($('.nav-1 ul').css('left'));
    });

    scrollBar.hammer().bind('panleft', (e) => {
        if(offsetX + e.gesture.deltaX < -(scrollBar.width() - $(window).width() + parseInt(scrollBar.css('margin-left')) * 2)) {
            return;
        } else {
            scrollBar.css('left', offsetX + e.gesture.deltaX + 'px');
        }   
    });

    scrollBar.hammer().bind('panright', (e) => {
        if(offsetX + e.gesture.deltaX > 0) {
            return;
        } else {
            scrollBar.css('left', offsetX + e.gesture.deltaX + 'px');
        }
    });

    var scrollBox = $('.new-product-con');
    var offsetX_2 = 0;

    scrollBox.hammer().bind('panstart', (e) => {
        offsetX_2 = parseInt($('.new-product-con').css('left'));
    });

    scrollBox.hammer().bind('panleft', (e) => {
        if(offsetX_2 + e.gesture.deltaX < -(scrollBox.width() - $(window).width() + parseInt(scrollBox.css('margin-left')) * 2)) {
            return;
        } else {
            scrollBox.css('left', offsetX_2 + e.gesture.deltaX + 'px');
        }   
    });

    scrollBox.hammer().bind('panright', (e) => {
        if(offsetX_2 + e.gesture.deltaX > 0) {
            return;
        } else {
            scrollBox.css('left', offsetX_2 + e.gesture.deltaX + 'px');
        }
    });

    var mySwiper = new Swiper ('.swiper-container', {
        autoplay: true,
        loop: true, // 循环模式选项
        pagination: {
          el: '.swiper-pagination',
        },
      })     

});