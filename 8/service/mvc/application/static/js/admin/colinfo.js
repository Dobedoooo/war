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

    $('#addTopCol :input').on('input', function () {
        console.log(1);
        $('#topColSubmit').removeClass('btn-success');
        $('#topColSubmit').removeClass('btn-danger');
        $('#topColSubmit').addClass('btn-primary');

        $('#topColSubmit i').removeClass('fa-check');
        $('#topColSubmit i').removeClass('fa-exclamation');

        $('#topColSubmit span').html('添加');
    });

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

        $('.show-img-name').html('');

        $('#showpreview').attr('src', '');
        $('#showpreview').attr('title', '');
    });

    // 显示变更表单
    $('#column-content').on('click', '.modifylink', function () {

        var cid = $(this).attr('cid');

        $('#mocid').attr('value', cid);

        var select = $('#super');

        $('#super').empty();

        $('#modifyCol span').html('变更 ');
        $('#showupload span').html('上传图片');

        $('#modifyCol, #showupload').removeClass('btn-success');
        $('#modifyCol, #showupload').removeClass('btn-danger');
        $('#modifyCol').addClass('btn-primary');
        $('#showupload').addClass('btn-default');
        

        $('#modifyCol i, #showupload i').removeClass('fa-check');
        $('#modifyCol i, #showupload i').removeClass('fa-exclamation');

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
                    $('#showurl').val(response['info']['url']);
                    $('#showpreview').attr('src', response['info']['url'])

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

                        $('#modifyCol span').html('成功 ');

                        $('#modifyCol').removeClass('btn-primary');
                        $('#modifyCol').addClass('btn-success');

                        $('#modifyCol i').addClass('fa-check');

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

    // 成功状态
    function success(btnId){
        $('#' + btnId).removeClass('btn-default');
        $('#' + btnId).removeClass('btn-primary');
        $('#' + btnId).removeClass('btn-danger');
        $('#' + btnId).addClass('btn-success');
        $('#' + btnId + ' span').html('成功');
        $('#' + btnId + ' i').removeClass('fa-exclamation');
        $('#' + btnId + ' i').addClass('fa-check');
        $('#' + btnId).css('pointer-events', 'none');
    }

    // 失败
    function fail(btnId){
        $('#' + btnId).removeClass('btn-default');
        $('#' + btnId).removeClass('btn-primary');
        $('#' + btnId).removeClass('btn-success');
        $('#' + btnId).addClass('btn-danger');
        $('#' + btnId + ' span').html('错误');
        $('#' + btnId + ' i').removeClass('fa-check');
        $('#' + btnId + ' i').addClass('fa-exclamation');
    }

    // 清空状态
    function clear(btnId, holder) {
        $('#' + btnId).removeClass('btn-default');
        $('#' + btnId).removeClass('btn-primary');
        $('#' + btnId).removeClass('btn-success');
        $('#' + btnId).removeClass('btn-danger');
        $('#' + btnId + ' span').html(holder);
        $('#' + btnId + ' i').removeClass('fa-check');
        $('#' + btnId + ' i').removeClass('fa-exclamation');
        $('#' + btnId).css('pointer-events', 'auto');
    }

    // 选择文件
    $('.choose').click(function (e) { 
        e.preventDefault();
        $('#img').click();
        clear('upload', '上传图片');
        $('#upload').addClass('btn-default');
    });
    $('.showchoose').click(function (e) { 
        e.preventDefault();
        $('#showimg').click();
        clear('showupload', '上传图片');
        $('#showupload').addClass('btn-default');
    });

    // 激活上传按钮 预览
    $('.add-form').on('input', '#img', function () {

        $('#upload').removeAttr('disabled');

        // console.log($('#img')[0].files[0]['name']);

        $('.img-name').html($('#img')[0].files[0]['name']);
        $('#preview').attr('src', URL.createObjectURL($(this)[0].files[0]));
        $('#preview').attr('title', '点击删除');
    });
    $('#showImg').on('input', '#showimg', function () {
        $('#showupload').removeAttr('disabled');
        $('#showpreview').css('display', 'inline-block');
        $('.show-img-name').html($('#showimg')[0].files[0]['name']);
        $('#showpreview').attr('src', URL.createObjectURL($(this)[0].files[0]));
        $('#showpreview').attr('title', '点击删除');
    });

    // 移除预览
    function removeImg() {
        $('#preview, #showpreview').attr('src', '');
        $('#preview, #showpreview').removeAttr('title');
        $('#upload, #showupload').attr('disabled', '');
        $('.img-name, .show-img-name').html('');
    }

    // 删除选择的文件
    $('#preview').click(function (e) { 
        e.preventDefault();
        removeImg();
    });
    $('#showpreview').click(function(e) {
        removeImg();
    })

    // 上传图片
    $('#upload').click(function (e) { 
        e.preventDefault();
        
        var img = $('#img').prop('files');

        var data = new FormData();

        data.append('file', img[0]);

        $.ajax({
            type: "POST",
            url: "/mvc/index.php/admin/content/upload",
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                
                if(response != 0) {

                    $('#url').attr('value', 'http://localhost/mvc/' + response);
                    // console.log(response);
                    success('upload');

                } else {
                    fail('upload');
                }

            
            }
        });

    });
    $('#showupload').click(function (e) { 
        e.preventDefault();
        
        var img = $('#showimg').prop('files');

        var data = new FormData();

        data.append('file', img[0]);

        $.ajax({
            type: "POST",
            url: "/mvc/index.php/admin/content/upload",
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                
                if(response != 0) {

                    $('#showurl').attr('value', 'http://localhost/mvc/' + response.replace('/\\/', '/'));

                    success('showupload');

                } else {
                    fail('showupload');
                }

            
            }
        });

    });
});