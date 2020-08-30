<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-28 07:14:39
  from 'D:\fullstack\8\service\mvc\application\template\index\header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f48aedf03d4a1_42831369',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cb4b03c25df3047b2db9535dccc620d461ecaf1' => 
    array (
      0 => 'D:\\fullstack\\8\\service\\mvc\\application\\template\\index\\header.html',
      1 => 1598598875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f48aedf03d4a1_42831369 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 头部开始 -->
<header>
    <div class="header-con">
        <a class="logo" href="javascript:;">
                <img src="" data-src="http://www.huowang.com.cn/static/home/images/top-logo.png">
        </a>
        <nav class="nav">
            <ul>
                <li class="active"><a href="/mvc/index.php/">首页</a></li>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['header']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['isshow'] == 1) {?>
                        <li cid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><a href="/mvc/index.php/index/index/diversion?cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a></li>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <form action="#">
                <img src="" data-src="http://www.huowang.com.cn/static/home/images/top-search.png">
                <div class="search-box">
                    <input type="text" placeholder="请输入产品名称" name="keyword" autocomplete="off">
                    <div class="search-box-close"></div>
                </div>
            </form>
        </nav>
    </div>
    <div class="nav-list-con">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subHeader']->value, 'v2', false, 'k2');
$_smarty_tpl->tpl_vars['v2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k2']->value => $_smarty_tpl->tpl_vars['v2']->value) {
$_smarty_tpl->tpl_vars['v2']->do_else = false;
?>
            <nav pid="<?php echo $_smarty_tpl->tpl_vars['k2']->value;?>
" class="subnav">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v2']->value, 'v3');
$_smarty_tpl->tpl_vars['v3']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v3']->value) {
$_smarty_tpl->tpl_vars['v3']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['v3']->value['isshow'] == 1) {?>
                        <li cid="<?php echo $_smarty_tpl->tpl_vars['v3']->value['id'];?>
">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['v3']->value['temp'];?>
">
                                <div class="img-con">
                                    <img src="" data-src="http://www.huowang.com.cn/static/home/images/pro-img-3.png">
                                    <img class="img-replace" src="" data-src="http://www.huowang.com.cn/static/home/images/pro-img-h-3.png">
                                </div>
                                <div class="text-con">
                                    <span><?php echo $_smarty_tpl->tpl_vars['v3']->value['name'];?>
</span>
                                </div>
                            </a>
                        </li>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </nav>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            
    </div>
    <div class="fix-bar">
        <a href="javascript:;" class="call">
            <img src="" data-src="http://www.huowang.com.cn/static/home/images/fix-bar-call.png">
        </a>
        <a href="javascript:;" class="top">
            <img src="" data-src="http://www.huowang.com.cn/static/home/images/fix-bar-top.png">
            <img class="img-replace" src="" data-src="http://www.huowang.com.cn/static/home/images/fix-bar-top-h.png">
        </a>
    </div>
</header>
<!-- 头部结束 --><?php }
}
