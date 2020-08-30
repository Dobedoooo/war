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

    // 添加栏目表单验证
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
            },
            // temp: {
            //     required: true,
            // },
        },
        messages: {
            name: {
                required: '请输入栏目名称',
                remote: '栏目名已存在',
            },
            // temp: {
            //     required: '请输入模板名称',
            // },
        },
        submitHandler: function() {

            var data = $('#addTopCol').serialize();

            $.ajax({
                type: "get",
                url: "/mvc/index.php/admin/column/addTopCol",
                data: data,
                success: function (response) {

                    if(response != 0) {

                        $('#column-content').empty();

                        $('#column-content').append(response);

                        // 提示信息
                        $('#topColSubmit span').html('成功 ');

                        $('#topColSubmit i').addClass('fa-check');

                        $('#topColSubmit').removeClass('btn-primary');

                        $('#topColSubmit').addClass('btn-success');

                        isAlone();

                        $('#topCol').val('');
                        $('#temp').val('');
                        $('#desc').val('');

                        $('#topCol').blur();
                        
                    } else {

                        $('#topColSubmit span').html('错误 ');

                        $('#topColSubmit i').addClass('fa-exclamation');

                        $('#topColSubmit').removeClass('btn-primary');

                        $('#topColSubmit').addClass('btn-danger');
                    }
                }
            });
        }
    });

    // 重置 成功状态
    function reset(selector, type) {
        $(selector + ' :input').focus(function (e) {

            $(selector + ' button').removeClass('btn-success');
            $(selector + ' button').removeClass('btn-danger');
            $(selector + ' button').addClass('btn-primary');

            $(selector + ' button i').removeClass('fa-check');
            $(selector + ' button i').removeClass('fa-exclamation');

            if(type == 'add') {

                $(selector + ' span').html('添加');

            } else {

                $(selector + ' span').html('变更');

            }

        })
    }

    reset('#addTopCol', 'add');
    reset('#modify', 'm');

    // 删除栏目
    $('#column-content').on('click', '.delCol', function () {

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

       isAlone();

    });

    function showForm() {
        $('#topCol').focus();
        $('.add-form').addClass('on');
        $('.cover').addClass('on');
    }    

    // 显示添加顶级栏目表单
    $('.add-show').click(function (e) { 
        e.preventDefault();
        
        showForm();

        $('#hiddenPid').attr('value', '0');

    });

    // 显示添加子栏目表单
    $('#column-content').on('click', '.subshow', function () {

        var cid = $(this).attr('cid');

        // 隐藏域值
        $('#hiddenPid').attr('value', cid);

        $('#addTopCol h4').html('添加子栏目');

        showForm();
    });

    // 遮罩
    $('.cover').click(function (e) { 
        e.preventDefault();
        $('.modify-form').removeClass('on');
        $('.cover').removeClass('on');
        $('.add-form').removeClass('on');
    });

    // 显示变更表单
    $('#column-content').on('click', '.modifylink', function () {

        var cid = $(this).attr('cid');

        $('#mocid').attr('value', cid);

        var select = $('#super');

        $('#super').empty();

        $.ajax({
            type: "get",
            url: "/mvc/index.php/admin/column/getSuper",
            data: 'cid=' + cid,
            dataType: "json",
            success: function (response) {

                if(response != 0) {

                    $('#moname').val(response['info']['name']);
                    $('#moisshow').val(response['info']['isshow']);
                    $('#motemp').val(response['info']['temp']);
                    $('#modesc').val(response['info']['desc']);

                    if(response['super'] == 0) {

                        var option = $('<option selected value="0"></option>');

                        option.html('顶级栏目');

                        select.append(option);

                    } else {

                        for (let index = 0; index < response['super'].length; index++) {
                        
                            const element = response['super'][index];
    
                            var option = $(`<option value="${element['id']}">${element['name']}</option>`);
    
                            select.append(option);
    
                        }
                    }

                }

            }
        });

        $('#moname').focus();
        $('.modify-form').addClass('on');
        $('.cover').addClass('on');

    });

    // 变更框表单验证
    $('#modify').validate({
        rules: {
            moname: {
                required: true,
            }
        },
        messages: {
            moname: {
                required: '请输入栏目名称',
            }
        },
        submitHandler: function () {

            var data = $('#modify').serialize();

            $.ajax({
                type: "get",
                url: "/mvc/index.php/admin/column/updateCol",
                data: data,
                // dataType: "json",
                success: function (response) {

                    if(response != 0) {

                        $('#column-content').empty();

                        $('#column-content').append(response);

                        $('#modify button span').html('成功 ');

                        $('#modify button').removeClass('btn-primary');
                        $('#modify button').addClass('btn-success');

                        $('#modify button i').addClass('fa-check');

                        isAlone();

                    } else {

                        $('#modify button span').html('错误 ');

                        $('#modify button').removeClass('btn-primary');
                        $('#modify button').addClass('btn-danger');

                        $('#modify button i').addClass('fa-exclamation');

                    }
                    
                }
            });

        }
    });

    // 判断是否可被删除
    function isAlone() {

        $.each($('.delCol'), function (indexInArray, valueOfElement) { 

            var tr = $(this).parents('tr');

            if(tr.find(':first-child').html() == 1) {

                if(tr.next().find(':first-child').html() == 2) {

                    $(this).addClass('disabled');

                } else {
                    $(this).removeClass('disabled');
                }
            }

            // console.log(tr.find(':first-child').html());
        });
    }

    isAlone();
});