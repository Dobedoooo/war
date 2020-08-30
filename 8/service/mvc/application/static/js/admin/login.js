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

    var flag = false;
    $('#triggle').click(function (e) { 
        e.preventDefault();
        if(flag) {
 
            $('#login').attr('action', '/mvc/index.php/admin/index/login');
            $('#triggle').addClass('fa-toggle-off');
            $('#triggle').removeClass('fa-toggle-on');
            $('#triggle').removeClass('on');
            $('#login input').val('');
            $('#verifyCode').removeAttr('disabled');
            $('#verifyCode').attr('placeholder', '请输入验证码');
            flag = false;

        } else {
            $('#login').attr('action', '/mvc/index.php/admin/index/loginWithoutVerify');
            $('#triggle').addClass('fa-toggle-on');
            $('#triggle').removeClass('fa-toggle-off');
            $('#triggle').addClass('on');
            $('#pass').val('admin');
            $('#name').val('admin');
            $('#verifyCode').attr('disabled', '');
            $('#verifyCode').attr('placeholder', '验证码已禁用');
            flag = true;
            
        }
        
    });
});