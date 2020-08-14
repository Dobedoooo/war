
// 方便在外部调用
function del() {
    var index = $(this).parents('tr').attr('index');
    var that = $(this);
    $.ajax({
        type: "get",
        url: "del.php",
        data: "id=" + index,
        dataType: "text",
        success: function (response) {
            if(response == 1) {
                alert('.del-success');
                that.parents('tr').remove();
                // 循环重置tr ID
                if($('tbody tr').length == 0) {
                    $('tbody').html('没有数据');
                } else {
                    $.each($('tr:gt(0)'), function (indexInArray, valueOfElement) { 
                        $(this).attr('index', indexInArray); 
                        $(this).find('td:first').html(indexInArray + 1);
                    });
                    down();
                }
                
            } else {
                alert('.del-fail');
            }
        }
    });
}

// 修改
var tr;
function modify(e) {
    $('.adjust2').css({
        top: e.pageY,
        left: e.pageX,
    });
    // 填充数据
    tr = $(this).parents('tr')[0];
    modifyID = tr.cells[0].innerHTML - 1;
    document.modify.name.value = tr.cells[1].innerHTML; 
    document.modify.age.value = tr.cells[2].innerHTML; 
    if(tr.cells[3].innerHTML == '男') {
        document.modify.gender.value = 'male';
    } else if(tr.cells[3].innerHTML == '女') {
        document.modify.gender.value = 'female';
    }
    document.modify.class.value = tr.cells[4].innerHTML;
    // 显示
    $('.adjust2').addClass('on');
}

// 提示信息
function alert(seletor) {
    $(seletor).addClass('on');
    setTimeout(() => {
        $(seletor).removeClass('on');
    }, 2000);
}

// 禁用所有按钮，3s后开放
function down() {
    // 关闭删除按钮事件
    $('tbody').off('click');
    $.each($('.delete'), function (indexInArray, valueOfElement) { 
        $(this).attr('disabled', 'true');
    });

    // 关闭修改按钮
    $('table').off('click');
    $.each($('.modify'), function (indexInArray, valueOfElement) { 
        $(this).attr('disabled', 'true');
    });

    // 关闭添加按钮
    $('.add')[0].disabled = true;

    // 关闭修改按钮
    $('.add2')[0].disabled = true;

    // 启动事件
    setTimeout(() => {
        $('.add')[0].disabled = false;

        $('.add2')[0].disabled = false;

        $('tbody').on('click', '.delete', del);
        $.each($('.delete'), function (indexInArray, valueOfElement) { 
            $(this).removeAttr('disabled');
        });

        $('table').on('click', '.modify', modify);
        $.each($('.modify'), function (indexInArray, valueOfElement) { 
            $(this).removeAttr('disabled');
        });
    }, 3000);
}

//
var modifyID;

$(document).ready(function () {

    // 添加面板
    var flag = true;
    // $('.add')[0].disabled = true;
    $('.btn1').click(function () {
        if(flag) {
            $(this).addClass('on');
            $('.adjust').addClass('on');
            flag = false;
        } else {
            $(this).removeClass('on');
            $('.adjust').removeClass('on');
            flag = true;
        }
    });

    // 修改面板
    $('table').on('click', '.modify', modify);

    $('.close').click(function (e) { 
        $('.adjust2').removeClass('on');
    });

    // 查询数据
    $.ajax({
        type: "get",
        url: "./query.php",
        dataType: 'json',
        success: function (response) {
            if(response == '') {
                $('tbody').html('没有数据');
            } else {
                $('tbody').html('');
                for (let index = 0; index < response.length; index++) {
                    const element = response[index];
                    $(`<tr index="${index}">
                        <td>${index + 1}</td>
                        <td>${element.name}</td>
                        <td>${element.age}</td>
                        <td>${element.gender=='male'?'男':'女'}</td>
                        <td>${element.class}</td>
                        <td>
                            <a href="javascript:;" class="btn btn-danger delete">删除</a>
                            <a href="javascript:;" class="btn btn-warning modify">修改</a>
                        </td>
                    </tr>`).appendTo('tbody');
                }
            }
        }
    });

    // 增 validate.js:30

    // 删
    $('tbody').on('click', '.delete', del);

    // 改 validate.js:91
});