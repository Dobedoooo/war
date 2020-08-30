$(function () {

    $('.middle-nav li:eq(0)').find('img').css('opacity', 0);
    $('.middle-nav li:eq(0)').find('.img-replace').css('opacity', 1);
    $('.middle-nav li:eq(0)').find('a').css('color', '#dd000b');

    function over() {
        $(this.children[0].firstElementChild.children[0]).css('opacity', 0);
        $(this.children[0].firstElementChild.children[1]).css('opacity', 1);
    }
    function out() {
        $(this.children[0].firstElementChild.children[0]).css('opacity', 1);
        $(this.children[0].firstElementChild.children[1]).css('opacity', 0);
    }

    $('.middle-nav li:gt(0)').hover(over, out);

    $('.page-ctrl li:not(.selected)').hover(function () {
            // over
            $(this).addClass('selected');
        }, function () {
            // out
            $(this).removeClass('selected');
        }
    );

    $(window).scroll(function () { 
        var wdTop = $(window).scrollTop() + $(window).height();

        if($('.all-key').offset().top < wdTop) {
            $('.all-key').addClass('move');
        }

        if($('.products-con li').offset().top < wdTop) {
            $('.products-con li', this).addClass('move');
        }

        $.each($('.products-con li'), function (indexInArray, valueOfElement) { 
            if($(valueOfElement).offset().top < wdTop) {
                $(this).addClass('move');
            } 
        });

        if($('.page-ctrl').offset().top < wdTop) {
            $('.page-ctrl').addClass('move');
        }
    });

});