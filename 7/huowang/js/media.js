$(document).ready(function () {
    $('.page-ctrl li:not(.selected)').hover(function () {
        // over
        $(this).addClass('selected');
        }, function () {
            // out
            $(this).removeClass('selected');
        }
    );

    $('.news-nav').addClass('move');

    $(window).scroll(function () { 
        var wdTop = $(window).scrollTop() + $(window).height();
        
        

        $.each($('.news-list li'), function (indexInArray, valueOfElement) { 
             if($(this).offset().top < wdTop) {
                 $(this).addClass('move');
             }
        });

        if($('.page-ctrl').offset().top < wdTop) {
            $('.page-ctrl').addClass('move');
        }
    });
});