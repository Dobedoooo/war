$(function (){
    $(".form-horizontal").validate({
        rules:{
            uname:{
                required:true,
                minlength:5,
            },
            pass:{
                required:true,
                minlength:5,
            }
        },
        messages:{
            uname:{
                required:"用户名没有填写",
                minlength:"要符合用户名规则",
            },
            pass: {
                required:"密码没有填写",
            }
        }
    })
})