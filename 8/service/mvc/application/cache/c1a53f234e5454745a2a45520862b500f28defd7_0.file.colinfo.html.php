<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-29 10:27:18
  from 'D:\fullstack\8\service\mvc\application\template\admin\colinfo.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f4a2d8633d444_44522617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1a53f234e5454745a2a45520862b500f28defd7' => 
    array (
      0 => 'D:\\fullstack\\8\\service\\mvc\\application\\template\\admin\\colinfo.html',
      1 => 1598696740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4a2d8633d444_44522617 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 src="<?php echo JS_ADD;?>
base.js"><?php echo '</script'; ?>
>
</head>
<body>
    <div class="top">
        <div class="add-show btn btn-default">添加顶级栏目</div>
    </div>
    <div class="container">
        <div class="row">
            <!-- 添加表单 -->
            <div class="add-form default-box form-move">
                <form class="" id="addTopCol">
                    <h4>添加顶级栏目</h4>
                    <div class="form-group col-sm-12">
                        <label for="topCol">栏目名称</label>
                            <input type="text" class="form-control" placeholder="请输入栏目名称" id="topCol" autocomplete="off" name="name">
                    </div>
                    <input type="hidden" name="pid" id="hiddenPid">
                    <div class="form-group col-sm-6">
                        <label for="isshow">栏目在导航</label>
                        <select name="isshow" id="isshow" class="form-control">
                            <option value="1">在导航可见</option>
                            <option value="0">在导航不可见</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="temp">使用模板</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="temp" name="temp" placeholder="请输入模板名称">
                            <div class="input-group-addon">.html</div>   
                        </div>

                    </div>
                    <div class="form-group col-sm-12">
                        <label for="desc">栏目描述</label>
                        <textarea name="desc" id="desc" placeholder="请输入栏目描述" class="form-control"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary" id="topColSubmit"><span>添加</span><i class="fa"></i></button>

                    </div>
                </form>
            </div>
            <!-- 变更表单 -->
            <div class="modify-form default-box form-move">
                <form action="" id="modify">
                    <h4>详细信息</h4>
                    <div class="form-group col-sm-12">
                        <label for="moname">栏目名称</label>
                        <input type="text" class="form-control" name="moname" id="moname">
                    </div>
                    <input type="hidden" name="mocid" id="mocid">
                    <div class="form-group col-sm-6">
                        <label for="moisshow">栏目在导航</label>
                        <select name="moisshow" id="moisshow" class="form-control">
                            <option value="1">在导航可见</option>
                            <option value="0">在导航不可见</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="motemp">使用模板</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="motemp" name="motemp" placeholder="请输入模板名称">
                            <div class="input-group-addon">.html</div>   
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="modesc">栏目描述</label>
                        <textarea name="modesc" id="modesc" placeholder="请输入栏目描述" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="super">父栏目</label>
                        <select name="super" id="super" class="form-control"></select>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary" id="modifyCol"><span>变更</span><i class="fa"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>层级</th>
                            <th>栏目名称</th>
                            <th>栏目可见</th>
                            <th>栏目模板</th>
                            <th>可执行操作</th>
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
    <div class="notice del-success text-success"><i class="fa fa-check-circle"></i> 删除成功</div>
    <div class="notice del-fail text-danger"><i class="fa fa-exclamation-circle"></i> 删除失败</div>
    <!-- 遮罩 -->
    <div class="cover"></div>
</body>
</html><?php }
}
