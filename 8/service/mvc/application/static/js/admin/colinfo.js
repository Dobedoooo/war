$(function () {

    // 提示消息
    function alert(selector) {
        $(selector).addClass('on');
        var target = document.querySelector(selector);
        target.addEventListener('transitionend', function() {
            $(target).addClass('down');
        });
        setTimeout(() => {
            $(selector).removeClass('on');
            target.addEventListener('transitionend', function() {
                $(target).removeClass('down');
            });
        }, 3000);
    }

    // 顶级栏目表单验证
    $('#addTopCol').validate({
        rules: {
            name: {
                required: true,
                remote: {
                    url: '/mvc/index.php/admin/column/check',
                    type: 'get',
                    data: {
                        name: function() {
                            return $('#topCol').val();
                        }
                    }
                }
            }
        },
        messages: {
            name: {
                required: '请输入栏目名称',
                remote: '栏目名已存在',
            }
        },
        submitHandler: function() {

            var data = $('#addTopCol').serialize();

            $.ajax({
                type: "get",
                url: "/mvc/index.php/admin/column/addTopCol",
                data: data,
                dataType: "json",
                success: function (response) {

                    if(response != 0) {
                        alert('.add-success');
                        var tr = $('<tr>').html(`
                            <td>1</td>
                            <td>${response['name']}</td>
                            <td>
                                <a href="javascript:;" cid="${response['id']}" class="btn btn-default" id="subshow">添加子栏目</a>
                                <a href="javascript:;" cid="${response['id']}" class="btn btn-danger" id="delCol">删除</a>
                                <a href="javascript:;" cid="${response['id']}" class="btn btn-warning" id="modifylink">变更</a>
                            </td>
                        `);

                        if($('#column-content').find('#empty').length != 0) {
                            $('#empty').remove();
                        }

                        tr.appendTo('#column-content');

                        $('#topCol').val('');
                        
                    } else {
                        alert('.add-fail');
                    }
                }
            });
        }
    });

    // 删除栏目
    $('#column-content').on('click', '#delCol', function () {

        var cid = 'cid=' + $(this).attr('cid');

        var tr = $(this).parents('tr');

        $.ajax({
            type: "get",
            url: "/mvc/index.php/admin/column/delCol",
            data: cid,
            success: function (response) {
                if(response == 1) {

                    tr.remove();

                    if($('#column-content').children().length == 0) {
                        $('#column-content').append('<tr id="empty"><td>没有数据</td><tr>');
                    }

                    alert('.del-success');
                } else {
                    alert('.del-fail');
                }
            }
        });
    });

    // 显示添加表单
    $('#column-content').on('click', '#subshow', function () {

        var cid = 'cid=' + $(this).attr('cid');

        $.ajax({
            type: "get",
            url: "/mvc/index.php/admin/column/getName",
            data: cid,
            dataType: 'json',
            success: function (response) {
                $('#addSub input[name=belong]').val(response);
            }
        });

        $('.sub').addClass('on');

        $('.cover').addClass('on');
    });

    // 遮罩
    $('.cover').click(function (e) { 
        e.preventDefault();
        $('.sub').removeClass('on');
        $('.modify').removeClass('on');
        $('.cover').removeClass('on');
    });

    // 显示变更表单
    $('#column-content').on('click', '#modifylink', function () {
        $('.modify').addClass('on');
        $('.cover').addClass('on');
    });

    // 添加框表单验证
    $('#addSub').validate({
        rules: {
            subname: {
                required: true,
                remote: {
                    url: '/mvc/index.php/admin/column/check',
                    type: 'get',
                    data: {
                        name: function() {
                            return $('input[name=subname]').val();
                        }
                    } 
                }
            }
        },
        messages: {
            subname: {
                required: '请输入栏目名称',
                remote: '栏目名已存在',
            }
        },
        submitHandler: function() {

            var data = $('#addSub').serialize();
            
            $.ajax({
                type: "get",
                url: "/mvc/index.php/admin/column/addSub",
                data: data,
                success: function (response) {
                    if(response == 1) {
                        alert('.add-success');
                    } else {
                        alert('.add-fail');
                    }
                }
            });
        }
    })

    // 变更框表单验证
});