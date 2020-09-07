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

    // 开关
    $('.switch').css({
        width: '30px',
        height: '19px',
        border: '1px solid #ccc',
        background: '#ccc',
        'border-radius': '10px',
        display: 'flex',
        'align-items': 'center',
        transition : 'all .3s',
        'margin-left': '5px',
        cursor: 'pointer',
    });
    $('.switch .circle').css({
        width: '15px',
        height: '15px',
        background: '#fff',
        'border-radius': '50%',
        'margin-left': '1px',
        transition: 'all .3s',
    });
    var switch_flag = false;
    $('.switch').click(function (e) { 
        e.preventDefault();
        if(switch_flag) {
            $('.switch').css({
                background: '#ccc',
                'border-color': '#ccc',
            });
            $('.switch .circle').css({
                transform: 'translateX(0px)',
            });
            $('#login').attr('action', '/mvc/index.php/admin/index/login');
            $('#login input').val('');
            $('#verifyCode').removeAttr('disabled');
            $('#verifyCode').attr('placeholder', '请输入验证码');

            switch_flag = false;
        } else {
            $('.switch').css({
                background: '#27ae60',
                'border-color': '#27ae60',
            });
            $('.switch .circle').css({
                transform: 'translateX(11px)',
            });
            $('#login').attr('action', '/mvc/index.php/admin/index/loginWithoutVerify');
            $('#pass').val('admin');
            $('#name').val('admin');
            $('#verifyCode').attr('disabled', '');
            $('#verifyCode').attr('placeholder', '验证码已禁用');

            switch_flag = true;
        }
    });
});