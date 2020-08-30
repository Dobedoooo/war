$(function () {
    

    var wdTop;

    $('.banner-1').addClass('move');

    $(window).scroll(function () { 
        wdTop = $(window).scrollTop() + $(window).height();

        // 顶部导航
        if($(this).scrollTop() > 97) {
            $('.top-nav').addClass('on');
        } else {
            $('.top-nav').removeClass('on');
        }

        // banner
        if($('.banner-2').offset().top < wdTop) {
            $('.banner-2').addClass('move');
        }

        if($('.banner-3').offset().top < wdTop) {
            $('.banner-3').addClass('move');
        }

        // point
        $.each($('.point-item'), function (indexInArray, valueOfElement) { 
            if($(this).offset().top < wdTop) {
                $(this).addClass('move');
            }
        });

        // idea
        if($('.idea-title').offset().top < wdTop) {
            $('.idea-title').addClass('move');
        }

        $.each($('.idea-list li'), function (indexInArray, valueOfElement) { 
            if($(this).offset().top < wdTop) {
                $(this).addClass('move');
            }
        });
    });
});