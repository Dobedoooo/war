$(function () {
    $('#login').validate({
        rules: {
            name: {
                required: true,
                minlength: 5,
            },
            pass: 'required',
            verify: 'required',
        },
        messages: {
            name: {
                required: '请输入用户名',
                minlength: '用户名至少5位',
            },
            pass: '请输入密码',
            verify: '请输入验证码',
        }
    });

    $('.form-border').addClass('move');

    setTimeout(function() {
        $('.form-border').addClass('end');
    }, 400)

    $('#getHeight').click(function (e) { 
        // e.preventDefault();
        var height = $('.form-border').height() + 32;
        var href = $(this).attr('href');
        $(this).attr('href', href + '?h=' + height);
    });
});