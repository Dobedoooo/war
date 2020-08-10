
$(function () {
    jQuery.validator.addMethod('cn', function(value, element) {
        var reg = /[\u4e00-\u9fa5]{2,}/;
        return this.optional(element) || (reg.test(value));
    }, "请输入中文字符");
    
    $('form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                cn: true,
            },
            age: {
                required: true,
                range: [20, 25],
            }
        },
        messages: {
            name: {
                required: '请输入姓名',
                minlength: '输入至少两个字符',
            },
            age: {
                required: '请输入年龄',
                range: '年龄须在20~25之间',
            }
        }
    });
});

