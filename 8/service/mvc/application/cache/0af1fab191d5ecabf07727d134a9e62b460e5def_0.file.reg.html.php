<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-21 02:35:24
  from 'D:\全栈\8\service\mvc\application\template\admin\reg.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3f32ec2b0d61_69491120',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0af1fab191d5ecabf07727d134a9e62b460e5def' => 
    array (
      0 => 'D:\\全栈\\8\\service\\mvc\\application\\template\\admin\\reg.html',
      1 => 1597977317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3f32ec2b0d61_69491120 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>注册</title>
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
reset200802.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
bootstrap.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
base.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
admin/reg.css">
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
admin/reg.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_ADD;?>
base.js"><?php echo '</script'; ?>
>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 form-border">
                <h3 class="text-center">注册</h3>
                <form action="/mvc/index.php/admin/index/addUser" method="POST" class="form-horizontal" id="reg">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-2">用户名</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="用户名" name="name" id="name" class="form-control" autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass" class="control-label col-sm-2">密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass2" class="control-label col-sm-2">确认密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="pass2" id="pass2" class="form-control" placeholder="确认密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">提交信息</button>
                            <a href="/mvc/index.php/admin/index/undyne?signal=1" class="btn btn-default">返回登录</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['reg']->value == 1) {?>
    <?php echo '<script'; ?>
>
        $('.form-border').addClass('init-login')
    <?php echo '</script'; ?>
>
    <?php }?>
</body>
</html><?php }
}
