<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-24 14:42:56
  from 'D:\fullstack\8\service\mvc\application\template\admin\colinfo.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f43d1f0b3df41_98721134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1a53f234e5454745a2a45520862b500f28defd7' => 
    array (
      0 => 'D:\\fullstack\\8\\service\\mvc\\application\\template\\admin\\colinfo.html',
      1 => 1598280006,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f43d1f0b3df41_98721134 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>栏目信息</title>
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
reset200802.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
bootstrap.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
base.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
admin/colinfo.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
fontawsome/css/all.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_ADD;?>
jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_ADD;?>
jquery.validate.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_ADD;?>
admin/colinfo.js"><?php echo '</script'; ?>
>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <form class="form-inline" id="addTopCol">
                    <div class="form-group">
                        <label for="topCol">新增顶级栏目</label>
                            <input type="text" class="form-control" placeholder="请输入顶级栏目名称" id="topCol" autocomplete="off" name="name">
                    </div>
                    <button type="submit" class="btn btn-default">添加</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>层级</th>
                            <th>分类名称</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody id="column-content">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value;?>

                        <?php } else { ?>
                        <tr id="empty">
                            <td>没有数据</td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="notice add-success text-success"><i class="fa fa-check-circle"></i> 添加成功</div>
    <div class="notice modify-success text-success"><i class="fa fa-check-circle"></i> 变更成功</div>
    <div class="notice del-success text-success"><i class="fa fa-check-circle"></i> 删除成功</div>
    <div class="notice add-fail  text-danger"><i class="fa fa-exclamation-circle"></i> 添加失败</div>
    <div class="notice modify-fail  text-danger"><i class="fa fa-exclamation-circle"></i> 变更失败</div>
    <div class="notice del-fail text-danger"><i class="fa fa-exclamation-circle"></i> 删除失败</div>
    <div class="sub form-show">
        <form action="" id="addSub">
            <div class="form-group">
                <label for="subname">子栏目名称</label>
                <input type="text" class="form-control" id="subname" placeholder="请输入子栏目名称" autocomplete="off" name="subname">
            </div>
            <div class="form-group">
                <label for="super">所属父栏目</label>
                <input type="text" name="belong" id="super" class="form-control" readonly></input>
            </div>
            <button type="submit" class="btn btn-primary">添加</button>
        </form>
    </div>
    <div class="modify form-show">
        <form action="" id="modifyCol">
            m
        </form>
    </div>
    <div class="cover"></div>
</body>
</html><?php }
}
