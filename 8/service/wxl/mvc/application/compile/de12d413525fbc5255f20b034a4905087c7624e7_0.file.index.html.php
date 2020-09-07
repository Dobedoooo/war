<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-30 20:08:31
  from 'D:\WampSever\www\2006\1\application\template\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f4c073f209369_00980343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de12d413525fbc5255f20b034a4905087c7624e7' => 
    array (
      0 => 'D:\\WampSever\\www\\2006\\1\\application\\template\\index.html',
      1 => 1598815457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4c073f209369_00980343 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
这是我的首页1
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
<ul>
    <li>姓名：<?php echo $_smarty_tpl->tpl_vars['v']->value["name"];?>
</li>
    <li>年龄：<?php echo $_smarty_tpl->tpl_vars['v']->value["age"];?>
</li>
    <li>性别：<?php echo $_smarty_tpl->tpl_vars['v']->value["sex"];?>
</li>
</ul>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</body>
</html><?php }
}
