$(function () {
    $.each($('img'), function (indexInArray, valueOfElement) { 
        if(valueOfElement.getBoundingClientRect().top < $(window).height()) {
            $(valueOfElement).attr('src', $(valueOfElement).attr('data-src'));
        } 
    });

    var wdTop = 0;

    $(window).scroll(function () { 

        wdTop = $(window).scrollTop() + $(window).height();

        $.each($('img'), function (indexInArray, valueOfElement) {
            if(valueOfElement.getBoundingClientRect().top < wdTop + 10) {
                $(valueOfElement).attr('src', $(valueOfElement).attr('data-src'));
            }
        });
    });
});