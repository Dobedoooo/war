<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-24 12:10:24
  from 'D:\fullstack\8\service\mvc\application\template\admin\home.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f43ae303889e8_41452818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6aad809aa5fcbeb813042df0ebe19d40ac9c3ed8' => 
    array (
      0 => 'D:\\fullstack\\8\\service\\mvc\\application\\template\\admin\\home.html',
      1 => 1598271023,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f43ae303889e8_41452818 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 src="<?php echo JS_ADD;?>
jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
</head>
<body>
    <header>
        <div class="lft-header pull-left">
            <div class="logo pull-left text-muted">LOGO</div>
            <div class="title pull-right text-primary">某平台后台管理系统</div>
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
                    <a href="/mvc/index.php/admin" target="main">
                        <div class="list-icon">
                            <i class="fa fa-laptop-house"></i>
                        </div> 
                        <span>系统首页</span>
                    </a>
                </li>
                <li>
                    <a href="/mvc/index.php/admin" target="main">
                        <div class="list-icon">
                            <i class="fa fa-cogs"></i>
                        </div>
                        <span>系统设置</span>
                    </a>
                </li>
                <li>
                    <a href="/mvc/index.php/admin" target="main">
                        <div class="list-icon">
                            <i class="fa fa-user-friends"></i>
                        </div> 
                        <span>用户管理</span>
                    </a>
                </li>
                <li>
                    <a href="/mvc/index.php/admin/column/colInfo" target="main">
                        <div class="list-icon">
                            <i class="fa fa-columns"></i>
                        </div>
                        <span>栏目管理</span>
                    </a>
                </li>
                <li>
                    <a href="/mvc/index.php/admin" target="main">
                        <div class="list-icon">
                            <i class="fas fa-pager"></i>
                        </div> 
                        <span>内容管理</span>
                    </a>
                </li>
                <li>
                    <a href="/mvc/index.php/admin" target="main">
                        <div class="list-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div> 
                        <span>考勤管理</span>
                    </a>
                </li>
                <li>
                    <a href="/mvc/index.php/admin" target="main">
                        <div class="list-icon">
                            <i class="far fa-credit-card"></i>
                        </div> 
                        <span>薪酬管理</span>
                    </a>
                </li>
                <li>
                    <a href="/mvc/index.php/admin" target="main">
                        <div class="list-icon">
                            <i class="fas fa-user-slash"></i>
                        </div> 
                        <span>黑名单信息</span>
                    </a>
                </li>
                <li>
                    <a href="/mvc/index.php/admin" target="main">
                        <div class="list-icon">
                            <i class="fa fa-bullhorn"></i>
                        </div> 
                        <span>公告信息</span>
                    </a>
                </li>
                <li>
                    <a href="/mvc/index.php/admin" target="main">
                        <div class="list-icon">
                            <i class="fas fa-tools"></i>
                        </div> 
                        <span>责令限期整改</span>
                    </a>
                </li>
                <li>
                    <a href="/mvc/index.php/admin" target="main">
                        <div class="list-icon">
                            <i class="fas fa-hand-paper"></i>
                        </div> 
                        <span>权益举报</span>
                    </a>
                </li>
            </ul>
            <div class="author">Power by <a href="javascript:;" target="_self">dobedoo</a><span>如有雷同纯属巧合</span></div>
        </nav>
        <section class="content">
            <iframe src="" frameborder="0" name="main"></iframe>
        </section>
    </main>
    <?php echo '<script'; ?>
>
    <?php echo '</script'; ?>
>
</body>
</html><?php }
}
