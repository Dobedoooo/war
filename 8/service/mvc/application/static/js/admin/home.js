$(function () {
    
    $('nav li:not(.with-box)').click(function (e) { 
        $.each($('nav li'), function (indexInArray, valueOfElement) { 
            $(this).removeClass('on'); 
            $('.box div').removeClass('on');
        });
        $(this).addClass('on');
    });

    $('.box div').click(function (e) { 
        $.each($('.box div'), function (indexInArray, valueOfElement) { 
            $(this).removeClass('on'); 
            $('nav li').removeClass('on'); 
        });
        $(this).addClass('on');
    });

    $('.triangle').click(function (e) { 
        e.preventDefault();
        $('.user-box').addClass('on');
        $('.cover').addClass('on');
    });

    $('.cover').click(function (e) { 
        e.preventDefault();
        $('.user-box').removeClass('on');
        $(this).removeClass('on');
    });

    var flag = false;
    $('.with-box').click(function (e) { 
        e.preventDefault();
        if(flag) {
            $('.box').hide('fast');
            $('.triangle2').removeClass('on');
            flag = false;
        } else {
            $('.box').show('fast');
            $('.triangle2').addClass('on');
            flag = true;
        }
    });

});