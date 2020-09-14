
$(function () {
    
    // 删除
    $('tbody').on('click', '.del-btn', function () {
        
        let uid = $(this).attr('uid');

        var that = this;

        $.ajax({
            type: "post",
            url: "/delete",
            data: {uid},
            dataType: "json",
            success: function (response) {
                
                if(response.code === 200) {

                    $(that).closest('tr').remove();

                }

            }
        });

    });

    // 清空表单
    function clearForm(formSelector) {

        // console.log($(formSelector));

    }

    clearForm('.add-form form');

    // 添加
    $('.add-form form').validate({
        rules: {
            name: {
                required: true
            },
            age: {
                required: true
            },
            gender: {
                required: true
            },
            major: {
                required: true
            },
            class: {
                required: true
            }
        },
        messages: {
            name: {
                required: '请输入姓名'
            },
            age: {
                required: '请输入年龄'
            },
            gender: {
                required: '请输入性别'
            },
            major: {
                required: '请输入专业'
            },
            class: {
                required: '请输入班级'
            }
        },
        submitHandler: function() {

            let data = $('.add-form form').serialize();
            
            asyncData({url: '/insert', data: data, type: 'post', dataType: 'json'}).then(response => {

                let student = {};

                let info = $('.add-form form').serializeArray();

                info.forEach(el => {
                    
                    student[el.name] = el.value;

                });

                let id = response.id;

                appendTr(Object.assign({}, student, {id}));

                hideAddForm();

            }).catch(error => {

            })

            // $.ajax({
            //     type: "post",
            //     url: "/insert",
            //     data: data,
            //     dataType: "json",
            //     success: function (response) {
                    
            //         if(response.code === 200) {

            //             let student = {};

            //             let info = $('.add-form form').serializeArray();

            //             info.forEach(el => {
                            
            //                 student[el.name] = el.value;

            //             });

            //             let id = response.id;

            //             appendTr(Object.assign({}, student, {id}));

            //             hideAddForm();

            //         }

            //     }
            // });

        }
    })

    // 插入一行tr
    function appendTr({id, name, age, gender, major, classes}) {

        let tr = `
            <tr>
                <td>${id}</td>
                <td mayChange>${name}</td>
                <td mayChange>${age}</td>
                <td mayChange>${gender}</td>
                <td mayChange>${major}</td>
                <td mayChange>${classes}</td>
                <td>
                    <button class="btn btn-info info-btn" uid="${id}" disabled><span>变更</span><i class="glyphicon"></button>
                    <button class="btn btn-danger del-btn" uid="${id}">删除</button> 
                </td>
            </tr>
        `;

        $('#content').html((index, value) => {
            return value + tr;
        });

    }

    // 异步
    function asyncData({url, data, type, dataType}) {

        return new Promise((resolve, reject) => {

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: dataType,
                success: function (response) {
                    
                    if(response.code === 200) {
                        resolve(response);
                    } else {
                        reject(response);
                    }

                }
            });

        })
    }

    // 修改
    $('#content').on('click', '.info-btn', function () {
        
        let id = $(this).attr('uid');

        let tds = $(this).parent().prevAll('td[mayChange]');

        let button = this;

        let data = {
            id: id,
            name: $(tds[4]).html(),
            age: $(tds[3]).html(),
            gender: $(tds[2]).html()=='男'?1:2,
            major: $(tds[1]).html(),
            classes: $(tds[0]).html(),
        }

        let ajaxConfig = {
            url: '/edit',
            data: data,
            type: 'post',
            dataType: 'json'
        };

        asyncData(ajaxConfig).then(res => {

            $('td[mayChange]').blur();

            success(button);

        }).catch(err => {

            fail(button);

        });

    });

    // 成功状态
    function success(btnObj) {

        $($(btnObj).children()[0]).html('成功');
        $($(btnObj).children()[1]).addClass('glyphicon-ok');
        $(btnObj).addClass('btn-success');
        $(btnObj).removeClass('btn-info');

        setTimeout(() => {
            $($(btnObj).children()[0]).html('变更');
            $($(btnObj).children()[1]).removeClass('glyphicon-ok');
            $(btnObj).addClass('btn-info');
            $(btnObj).removeClass('btn-success');
            $(btnObj).attr('disabled', 'disabled');
        }, 1500)

    }

    // 失败
    function fail(btnObj) {

        $($(btnObj).children()[0]).html('错误');
        $($(btnObj).children()[1]).addClass('glyphicon-remove');
        $(btnObj).addClass('btn-success');
        $(btnObj).removeClass('btn-danger');

        setTimeout(() => {
            $($(btnObj).children()[0]).html('变更');
            $($(btnObj).children()[1]).removeClass('glyphicon-remove');
            $(btnObj).addClass('btn-info');
            $(btnObj).removeClass('btn-danger');
            $(btnObj).attr('disabled', 'disabled');
        }, 1500)

    }

    let td;

    // 单元格单击事件
    $("#content").on('click', 'td[mayChange]', function () {
        
        this.contentEditable = true;

        $(this).focus();

        td = $(this).html();

    });

    // 单元格失焦事件
    $('#content').on('blur', 'td', function () {

        this.contentEditable = false;
        
    });

    // 单元格值改变事件
    $('#content').on('input', 'td', function () {

        if($(this).html() == td) {

            $(this).siblings().last().children('.info-btn').attr('disabled', 'disabled');

        } else {

            $(this).siblings().last().children('.info-btn').removeAttr('disabled');

        }


    });

});