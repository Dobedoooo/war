<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-23 03:17:05
  from 'D:\fullstack\8\service\mvc\application\template\admin\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f41dfb1155380_50511725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97d9373129e3666b608b8abb8ba9dd4d6c324d4d' => 
    array (
      0 => 'D:\\fullstack\\8\\service\\mvc\\application\\template\\admin\\login.html',
      1 => 1598152624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f41dfb1155380_50511725 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>登录后台</title>
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
reset200802.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
bootstrap.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
base.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
admin/login.css">
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
admin/login.js"><?php echo '</script'; ?>
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
                <h3 class="text-center">后台管理</h3>
                <form action="/mvc/index.php/admin/index/login" method="POST" class="form-horizontal" id="login">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-2">用户名</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="用户名" name="name" id="name" class="form-control" autocomplete="off" autofocus value="admin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass" class="control-label col-sm-2">密码</label>
                        <div class="col-sm-9">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="密码" value="admin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="verifyCode" class="control-label col-sm-2">验证码</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="verifyCode" autocomplete="off" placeholder="验证码已禁用" name="verify" disabled>
                        </div>
                        <div class="col-sm-4">
                            <div class="verify-img">
                                <img src="http://localhost/mvc/index.php/admin/index/verify" alt="验证码" onclick="this.src = 'http:\/\/localhost/mvc/index.php/admin/index/verify?' + Math.random()" title="点击切换">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">登录</button>
                            <span class="col-sm-offset-1">没有账号？<a href="/mvc/index.php/admin/index/reg" id="getHeight">注册</a></span>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['height']->value != 0) {?>
    <?php echo '<script'; ?>
>
        $('.form-border').css({
            height: '<?php echo $_smarty_tpl->tpl_vars['height']->value;?>
px',
        });
    <?php echo '</script'; ?>
>
    <?php }?>
    <?php echo '<script'; ?>
>
        // 获取当前时间
        // var date = new Date();
        // var time = date.getTime() + 1000 * 10;
        // date.setTime(time);
        // domain 作用域名 path 作用路径 expires 过期时间
        // document.cookie = 'name=zhangsan';
    <?php echo '</script'; ?>
>
</body>
</html><?php }
}
