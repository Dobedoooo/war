
$(function () {
    jQuery.validator.addMethod('cn', function(value, element) {
        var reg = /[\u4e00-\u9fa5]{2,}/;
        return this.optional(element) || (reg.test(value));
    }, "请输入中文字符");
    
    $('form:first').validate({
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
        },
        submitHandler: function () {
            // console.log($('form:first').serialize());
            var data = $('form:first').serialize(); 
            $.ajax({
                type: "get",
                url: "add.php",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response == 3) {
                        alert('.name-rpt');
                    } else if(response != 0) {
                        alert('.add-success');
                        var index = $('tbody > tr').length;
                        if(index == 0) {
                            $('tbody').html('');
                        }
                        $(`
                            <tr index="${index}">
                                <td>${index + 1}</td>
                                <td>${response.name}</td>
                                <td>${response.age}</td>
                                <td>${response.gender=='male'?'男':'女'}</td>
                                <td>${response.class}</td>
                                <td>
                                    <a href="javascript:;" class="btn btn-danger delete" disabled="disabled">删除</a>
                                    <a href="javascript:;" class="btn btn-warning modify" disabled="disabled">修改</a>
                                </td>
                            </tr>
                        `).appendTo('tbody');
                        down();

                    } else {
                        alert('.add-fail');
                    }
                }
            });
        }
    });

    $('form:eq(1)').validate({
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
        },
        submitHandler: function () {
            var data = 'id=' + modifyID + '&' + $('form:eq(1)').serialize();
            $.ajax({
                type: "get",
                url: "modify.php",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response != '') {
                        alert('.modify-success');
                        var tr = $('tbody tr:eq(' + modifyID + ')')[0];
                        tr.cells[1].innerHTML = response.name;
                        tr.cells[2].innerHTML = response.age;
                        tr.cells[3].innerHTML = response.gender=='male'?'男':'女';
                        tr.cells[4].innerHTML = response.class;
                        down();
                    } else {
                        alert('.modify-fail');
                    }
                }
            });
        }
    });
});

