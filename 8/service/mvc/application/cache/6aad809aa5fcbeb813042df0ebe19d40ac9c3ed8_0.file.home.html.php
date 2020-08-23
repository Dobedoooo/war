<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-23 03:12:09
  from 'D:\fullstack\8\service\mvc\application\template\admin\home.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f41de893ab0d7_38345204',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6aad809aa5fcbeb813042df0ebe19d40ac9c3ed8' => 
    array (
      0 => 'D:\\fullstack\\8\\service\\mvc\\application\\template\\admin\\home.html',
      1 => 1598152328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f41de893ab0d7_38345204 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>后台首页</title>
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
reset200802.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
bootstrap.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
base.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
fontawsome/css/all.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
admin/home.css">
</head>
<body>
    <header>
        <div class="lft-header pull-left">
            <div class="logo pull-left text-muted">LOGO</div>
            <div class="title pull-right text-primary">某某平台后台管理系统</div>
        </div>
        <div class="rt-header pull-right">
            <div class="user">
                <i class="far fa-user-circle head-shot"></i>
                <div class="user-name"><a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</a></div>
                <div class="triangle">
                    <span class="caret"></span>
                </div>
            </div>
        </div>
    </header>
    <main>
        <nav class="">
            <ul>
                <li>
                    <div class="list-icon">
                        <i class="fa fa-laptop-house"></i>
                    </div> 
                    <span>系统首页</span>
                </li>
                <li>
                    <div class="list-icon">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <span>系统设置</span>
                </li>
                <li>
                    <div class="list-icon">
                        <i class="fa fa-building"></i>
                    </div> 
                    <span>劳务公司管理</span>
                </li>
                <li>
                    <div class="list-icon">
                        <i class="fa fa-project-diagram"></i>
                    </div> 
                    <span>项目信息管理</span>
                </li>
                <li>
                    <div class="list-icon">
                        <i class="fas fa-user-check"></i>
                    </div> 
                    <span>劳务人员进出登记</span>
                </li>
                <li>
                    <div class="list-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div> 
                    <span>考勤管理</span>
                </li>
                <li>
                    <div class="list-icon">
                        <i class="far fa-credit-card"></i>
                    </div> 
                    <span>薪酬管理</span>
                </li>
                <li>
                    <div class="list-icon">
                        <i class="fas fa-user-slash"></i>
                    </div> 
                    <span>黑名单信息</span>
                </li>
                <li>
                    <div class="list-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div> 
                    <span>公告信息</span>
                </li>
                <li>
                    <div class="list-icon">
                        <i class="fas fa-tools"></i>
                    </div> 
                    <span>责令限期整改</span>
                </li>
                <li>
                    <div class="list-icon">
                        <i class="fas fa-hand-paper"></i>
                    </div> 
                    <span>权益举报</span>
                </li>
            </ul>
            <div class="author">Power by <a href="http://49.234.98.39" target="_blank">dobedoo</a><span>如有雷同纯属巧合</span></div>
        </nav>
    </main>
    <?php echo '<script'; ?>
>
    <?php echo '</script'; ?>
>
</body>
</html><?php }
}
