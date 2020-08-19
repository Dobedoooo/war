<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-19 03:35:04
  from 'D:\全栈\8\service\mvc\application\template\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3c9de86d1955_49474418',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10be2d3b8229d5b2d0ae466f2d148024f2f85aa0' => 
    array (
      0 => 'D:\\全栈\\8\\service\\mvc\\application\\template\\index.html',
      1 => 1597808103,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3c9de86d1955_49474418 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Document</title>
</head>
<body>
    <p>这是首页</p>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
    <ul>
        <li>Name: <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</li>
        <li>Age: <?php echo $_smarty_tpl->tpl_vars['v']->value['age'];?>
</li>
        <li>Gender: <?php if ($_smarty_tpl->tpl_vars['v']->value['gender'] == 'male') {?>
            男
            <?php } else { ?>
            女
            <?php }?>
        </li>
    </ul>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <a href="index.php/teach/log/add">添加日志</a>
</body>
</html><?php }
}
