<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="./table.css">
    <title>表格儿</title>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            <?php
                $arr = require 'data.php';
            ?>
        });
    </script>
</head>
<body>
    <div href="javascript:;" class="btn1">+</div>
    <div class="row">
        <div class="col-xs-3">
        </div>
        <div class="col-xs-6">
            <table class="table ">
                <caption>一个表格</caption>
                <thead>
                    <th>#</th>
                    <th>姓名</th>
                    <th>年龄</th>
                    <th>性别</th>
                    <th>班级</th>
                    <th class="">操作</th>
                </thead>
                <tbody>
                    <?php
                        if(count($arr)) {
                            foreach ($arr as $key => $value) {
                                ?>
                                <tr>
                                    <td class="index"><?php echo $key + 1?></td>
                                    <td><?php echo $value['name']?></td>
                                    <td><?php echo $value['age']?></td>
                                    <td><?php echo $value['gender']=='male'?'男':'女'?></td>
                                    <td><?php echo $value['class']?></td>
                                    <td class="">
                                        <a href="del.php?id=<?php echo $key?>" class="btn btn-danger delete">删除</a>
                                        <a href="javascript:;" class="btn btn-warning modify">修改</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td>没有数据</td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-xs-3"></div>
    </div>
    <div class="col-xs-2 adjust">
        <div class="container">
            <form action="add.php" class="form-horizontal" name="add">
                <div class="form-group">
                    <label for="name" class="col-xs-3 control-label">姓名</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="age" class="col-xs-3 control-label">年龄</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" id="age" name="age" autocomplete="off">  
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-xs-3 control-label">性别</label>
                    <div class="col-xs-9">
                        <select name="gender" id="gender" class=" form-control">
                            <option value="male">男</option>
                            <option value="female">女</option>
                            <option value="other">其他</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="class" class="col-xs-3 control-label">班级</label>
                    <div class="col-xs-9">
                        <select name="class" id="class" class="form-control">
                            <option value="A01">A01</option>
                            <option value="A02">A02</option>
                            <option value="A03">A03</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success col-xs-offset-5">提交</button>
            </form>
        </div>
    </div>
    <div class="col-xs-2 adjust2">
        <div class="container">
            <form action="" class="form-horizontal" name="modify">
                <div class="form-group">
                    <label for="name" class="col-xs-3 control-label">姓名</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="age" class="col-xs-3 control-label">年龄</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" id="age" name="age" autocomplete="off">  
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-xs-3 control-label">性别</label>
                    <div class="col-xs-9">
                        <select name="gender" id="gender" class=" form-control">
                            <option value="male">男</option>
                            <option value="female">女</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="class" class="col-xs-3 control-label">班级</label>
                    <div class="col-xs-9">
                        <select name="class" id="class" class="form-control">
                            <option value="A01">A01</option>
                            <option value="A02">A02</option>
                            <option value="A03">A03</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success col-xs-offset-5">提交</button>
            </form>
        </div>
    </div>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="./validate.js"></script>
    <script>
        $(document).ready(function () {
            // 删除
            $('.delete').click(function (e) { 
                $($(this).parents('tr')).empty()
            });

            // 添加
            var flag = true;
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

            // 修改
            var tr;
            $('.modify').click(function (e) { 
                $('.adjust2').css({
                    top: e.pageY,
                    left: e.pageX,
                });
                tr = $(e.target).parents('tr')[0];
                document.modify.name.value = tr.cells[1].innerHTML; 
                document.modify.age.value = tr.cells[2].innerHTML; 
                if(tr.cells[3].innerHTML == '男') {
                    document.modify.gender.value = 'male';
                } else if(tr.cells[3].innerHTML == '女') {
                    document.modify.gender.value = 'female';
                }
                document.modify.class.value = tr.cells[4].innerHTML; 

                $(window).click(function (ev) { 
                    console.log(ev.target)
                    $('.modify').each(function (index, element) {
                        if(ev.target == this) {
                            console.log(this)
                            $('.adjust2').addClass('on');
                        } else {
                            $('.adjust2').removeClass('on');
                        }
                        
                    });
                    
                });
            });

            
        });

       

    </script>
</body>
</html>