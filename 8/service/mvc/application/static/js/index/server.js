$(function () {
    
    $(window).scroll(function () { 
        var wdTop = $(window).scrollTop() + $(window).height();

        if($('.list-1').offset().top < wdTop) {
            $('.list-1').addClass('move');
        } else {
            $('.list-1').removeClass('move');
        }
        
        if($('.imgs').offset().top < wdTop) {
            $('.imgs').addClass('move');
        } else {
            $('.imgs').removeClass('move');
        }
        
        if($('.list-2').offset().top < wdTop) {
            $('.list-2').addClass('move');
        } else {
            $('.list-2').removeClass('move');
        }

    });
});