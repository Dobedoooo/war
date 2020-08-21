$(function () {
    $('#login').validate({
        rules: {
            name: {
                required: true,
                minlength: 5,
            },
            pass: 'required',
        },
        messages: {
            name: {
                required: '请输入用户名',
                minlength: '用户名至少5位',
            },
            pass: '请输入密码',
        }
    });

    $('.form-border').addClass('move');

    setTimeout(function() {
        $('.form-border').css('height', 'auto');
    }, 400)
});