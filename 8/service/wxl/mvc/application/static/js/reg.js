$(function (){
    $("#reg").validate({
        rules:{
            uname:{
                required:true,
                minlength:5,
                remote: "/wxl/mvc/index.php/admin/reg/checkName"
                // remote:{
                //     url:"/2006/mvc/index.php/admin/reg/checkName",
                //     type:"post",
                //     data:{
                //         uname:function (){
                //             return $("input[name=uname]").val();
                //         }
                //     }
                // }
            },
            pass:{
                required:true,
                rangelength:[5,10],
                equalTo:"#inputPassword4"
            },
            pass1:{
                required:true,
                rangelength:[5,10],
                equalTo: "#inputPassword3"
            }
        },
        messages:{
            uname:{
                required:"用户名没有填写",
                minlength:"用户名至少5位",
                remote: "abc",
            },
            pass: {
                required:"密码没有填写",
                rangelength:"密码在5-10位之间",
                equalTo:"两次输入密码保持一致"
            },
            pass1: {
                required:"密码没有填写",
                rangelength:"密码在5-10位之间",
                equalTo:"两次输入密码保持一致"
            },
        }
    })
})
