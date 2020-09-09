$(function () {


    // 搜索下拉框
    $.ajax({
        type: "get",
        url: "/mvc/index.php/admin/content/getCol",
        success: function (response) {

            $('#filter').empty();

            $('#filter').append(response);

        }
    });

    setTimeout(() => {
        $('.show-btn').removeAttr('disabled');
        $('.show-btn').removeClass('disable');
    }, 500);

    // 激活显示按钮
    setTimeout(() => {
        $('.add-show').removeAttr('disabled');
    }, 500);
    // 遮罩
    $('.cover').click(function (e) { 
        e.preventDefault();
        $(this).removeClass('on');
        $('.add').removeClass('on');
        $('.show').removeClass('on');
    });

    // 显示添加表单
    $('.add-show').click(function (e) { 
        e.preventDefault();
        $('.add').addClass('on');
        $('.cover').addClass('on');
        $('#cid').focus();

        $.ajax({
            type: "get",
            url: "/mvc/index.php/admin/content/getCol",
            success: function (response) {

                $('#cid').empty();

                $('#cid').append(response);

                // $('body').append(response);
                // console.log(response);

            }
        });

    });

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
    $('.add').on('input', '#img', function () {

        $('#upload').removeAttr('disabled');

        // console.log($('#img')[0].files[0]['name']);

        if($('#img')[0].files[0]['name']) {

            $('#preview').css('display', 'inline-block');
            $('.img-name').html($('#img')[0].files[0]['name']);
            $('#preview').attr('src', URL.createObjectURL($(this)[0].files[0]));
            $('#preview').attr('title', '点击删除');
            // console.log($(this));

        }
    });
    $('.show').on('input', '#showimg', function () {
        $('#showupload').removeAttr('disabled');
        if($('#showimg')[0].files[0]['name']) {
            $('#showpreview').css('display', 'inline-block');
            $('.show-img-name').html($('#showimg')[0].files[0]['name']);
            $('#showpreview').attr('src', URL.createObjectURL($(this)[0].files[0]));
            $('#showpreview').attr('title', '点击删除');
        }
    });

    // 移除预览
    function removeImg() {
        $('#preview, #showpreview').removeAttr('src');
        $('#preview, #showpreview').removeAttr('title');
        $('#upload, #showupload').attr('disabled', '');
        $('.img-name, .show-img-name').html('');
        $('#preview, #showpreview').css('display', 'none');
    }

    // 删除选择的文件
    $('#preview').click(function (e) { 
        e.preventDefault();
        removeImg();
    });

    $('#showpreview').click(function(e) {
        removeImg();
    })

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

    // 重置添加成功按钮状态
    $('#addContent input').focus(function (e) { 
        e.preventDefault();
        
        clear('submit', '添加');
        $('#submit').addClass('btn-primary');
    });
    $('#showContent input').focus(function() {
        clear('showsubmit', '变更');
        $('#showsubmit').addClass('btn-primary');
    })

    // 上传文件
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

    // 添加表单验证及提交
    $('#addContent').validate({
        rules: {
            proname: {
                required: true,
            },
            proid: {
                required: true,
            }

        },
        messages: {
            proname: {
                required: '请输入产品名称',
            },
            proid: {
                required: '请输入产品编号',
            }
        },
        submitHandler: function() {
            
            var data = $('#addContent').serialize() + '&pid=' + $('#cid :selected').attr('pid');

            $.ajax({
                type: "post",
                url: "/mvc/index.php/admin/content/addContent",
                data: data,
                success: function (response) {
                    
                    if(response != 0) {

                        success('submit');

                        // 清空表单
                        $('#addContent input').val('');
                        removeImg();

                        clear('upload', '上传图片');
                        $('#upload').addClass('btn-default');

                    } else {
                        fail('submit');
                    }

                }
            });

        }
    });

    function delAlert(selector) {
        $(selector).addClass('on');
        setTimeout(() => {
            $(selector).removeClass('on');
        }, 3000);
    }

    // 删除
    $('#content').on('click', '.del-btn', function () {
        
        var id = 'id=' + $(this).attr('id');

        var tr = $(this).parents('tr');

        $.ajax({
            type: "get",
            url: "/mvc/index.php/admin/content/del",
            data: id,
            success: function (response) {
                
                if(response != 0) {

                    tr.remove();

                    delAlert('.del-success');

                } else {
                    delAlert('.del-fail');
                }

            }
        });

    });

    // 激活变更按钮
    $('#showContent input').on('change', function () {
        $('#showsubmit').removeAttr('disabled');
    });
    $('#showImg :file').on('change', function () {
        $('#showsubmit').removeAttr('disabled');
    });

    // 显示查看表单
    $('#content').on('click', '.show-btn', function () {

        
        var id = 'id=' + $(this).attr('id');

        $('#showContent input[name=id]').val($(this).attr('id'));

        $('.show').addClass('on');
        $('.cover').addClass('on');
        $('#showpid').focus();
        $('.show-img-name').html('');

        $.ajax({
            type: "get",
            url: "/mvc/index.php/admin/content/showSingle",
            data: id,
            dataType: "json",
            success: function (response) {

                $('#showpid').empty();

                $('#showpid').append(response['options']);

                $('#showpid').val(response['result']['pid']);

                $('#showName').val(response['result']['proname']);
                $('#showId').val(response['result']['proid']);
                $('#showdesc1').val(response['result']['prodesc1']);
                $('#showdesc2').val(response['result']['prodesc2']);
                $('#showdesc3').val(response['result']['prodesc3']);
                $('#showtemp').val(response['result']['protemp']);
                $('#showurl').val(response['result']['proimgurl']);
                $('#showdetail').val(response['result']['prodetail']);
                $('#showpreview').attr('src', response['result']['proimgurl']);

                // console.log(typeof response['options']);
                // console.log(response);
                // $('body').append(response);

                
            }
        });

    });

    // 查看表单验证及提交
    $('#showContent').validate({
        rules: {
            showname: {
                required: true,
            },
            showid: {
                required: true,
            }
        },
        messages: {
            showname: {
                required: '请输入产品名称',
            },
            showid: {
                required: '请输入产品编号',
            }
        },
        submitHandler: function() {

            var data = $('#showContent').serialize();

            // console.log(data);

            $.ajax({
                type: "post",
                url: "/mvc/index.php/admin/content/update",
                data: data,
                success: function (response) {
                    // $('body').append(response);
                    // console.log(response);
                    if(response == 1) {
                        success('showsubmit');
                    } else {
                        fail('showsubmit');
                    }

                }
            });

        }
    });

    // 搜索框表单提交
    $('#searchsubmit').click(function(e) {
        e.preventDefault();
        var data = $('#search').serialize();
        console.log(data);

        $.ajax({
            type: "get",
            url: "/mvc/index.php/admin/content/search",
            data: data,
            dataType: "json",
            success: function (response) {
                
                $('#content').empty();

                console.log(response);

                for (let index = 0; index < response.length; index++) {
                    const element = response[index];
                    $('#content').append(`
                        <tr>
                            <td pid="${element['pid']}">${element['name']}</td>
                            <td>${element['proname']}</td>
                            <td>${element['proid']}</td>
                            <td>${element['protemp']}</td>
                            <td>
                                <a href="javascript:;" id="${element['id']}" class="btn btn-success show-btn">查看内容</a>
                                <a href="javascript:;" id="${element['id']}" class="btn btn-danger del-btn">删除</a>
                            </td>
                        </tr>
                    `);
                }

            }
        });

    })

});