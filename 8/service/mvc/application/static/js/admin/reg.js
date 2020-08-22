$(function () {
    $('#reg').validate({
        rules: {
            name: {
                required: true,
                minlength: 5,
                remote: {
                    url: '/mvc/index.php/admin/index/check',
                    type: 'post',
                    data: {
                        username: function() {
                            return $('input[name=name]').val();
                        }
                    }
                }
            },
            pass: {
                required: true,
                rangelength: [5, 10],
            },
            pass2: {
                required: true,
                equalTo: '#pass',   
            },
        },
        messages: {
            name: {
                required: '请输入用户名',
                minlength: '用户名至少5位',
                remote: '用户名已经存在',
            },
            pass: {
                required: '请输入密码',
                rangelength: '密码5~10位'
            },
            pass2: {
                required: '请确认密码',
                equalTo: '两次密码输入不一致',
            },
        }
    });
    
    $('.form-border').addClass('move');

    setTimeout(() => {
        $('.form-border').addClass('end');
    }, 400);

    $('#getHeight').click(function (e) { 
        // e.preventDefault();
        var height = $('.form-border').height() + 32;
        var href = $(this).attr('href') + '?h=' + height;
        $(this).attr('href', href);
    });
});