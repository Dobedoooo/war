<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-07 09:23:01
  from 'D:\fullstack\8\service\mvc\application\template\admin\contentinfo.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f55fbf56fe954_74429610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32ef2ca34b56acb1525821fe540617224f07d44a' => 
    array (
      0 => 'D:\\fullstack\\8\\service\\mvc\\application\\template\\admin\\contentinfo.html',
      1 => 1599469761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f55fbf56fe954_74429610 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>内容管理</title>
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
reset200802.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
base.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
bootstrap.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
admin/contentinfo.css">
    <link rel="stylesheet" href="<?php echo CSS_ADD;?>
fontawsome/css/all.min.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_ADD;?>
base.js"><?php echo '</script'; ?>
>
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
admin/contentinfo.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_ADD;?>
tinymce/tinymce.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        tinymce.init({
            selector: '#detail',
            // language:'zh_CN',
            plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link template code codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists wordcount imagetools textpattern help emoticons autosave autoresize',
            toolbar: 'code undo redo restoredraft | cut copy paste pastetext | forecolor backcolor bold italic underline strikethrough link anchor | alignleft aligncenter alignright alignjustify outdent indent | \
            styleselect formatselect fontselect fontsizeselect | bullist numlist | blockquote subscript superscript removeformat | \
            table image charmap emoticons hr pagebreak insertdatetime print preview fullscreen |',
            height: 200, //编辑器高度
            min_height: 200,
            max_height:300,
            /*content_css: [ //可设置编辑区内容展示的css，谨慎使用
                '/static/reset.css',
                '/static/ax.css',
                '/static/css.css',
            ],*/
            fontsize_formats: '12px 14px 16px 18px 24px 36px 48px 56px 72px',
            font_formats: '微软雅黑=Microsoft YaHei,Helvetica Neue,PingFang SC,sans-serif;苹果苹方=PingFang SC,Microsoft YaHei,sans-serif;宋体=simsun,serif;仿宋体=FangSong,serif;黑体=SimHei,sans-serif;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;',
            link_list: [
                { title: '预置链接1', value: 'http://www.tinymce.com' },
                { title: '预置链接2', value: 'http://tinymce.ax-z.cn' }
            ],
            image_list: [
                { title: '预置图片1', value: 'https://www.tiny.cloud/images/glyph-tinymce@2x.png' },
                { title: '预置图片2', value: 'https://www.baidu.com/img/bd_logo1.png' }
            ],
            image_class_list: [
            { title: 'None', value: '' },
            { title: 'Some class', value: 'class-name' }
            ],
            importcss_append: true,
            //自定义文件选择器的回调内容
            file_picker_callback: function (callback, value, meta) {
                if (meta.filetype === 'file') {
                callback('https://www.baidu.com/img/bd_logo1.png', { text: 'My text' });
                }
                if (meta.filetype === 'image') {
                callback('https://www.baidu.com/img/bd_logo1.png', { alt: 'My alt text' });
                }
                if (meta.filetype === 'media') {
                callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.baidu.com/img/bd_logo1.png' });
                }
            },
            autosave_ask_before_unload: false,
        });
        tinymce.init({
            selector: '#showdetail',
            // language:'zh_CN',
            plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link template code codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists wordcount imagetools textpattern help emoticons autosave autoresize',
            toolbar: 'code undo redo restoredraft | cut copy paste pastetext | forecolor backcolor bold italic underline strikethrough link anchor | alignleft aligncenter alignright alignjustify outdent indent | \
            styleselect formatselect fontselect fontsizeselect | bullist numlist | blockquote subscript superscript removeformat | \
            table image charmap emoticons hr pagebreak insertdatetime print preview fullscreen |',
            height: 200, //编辑器高度
            min_height: 200,
            max_height:300,
            /*content_css: [ //可设置编辑区内容展示的css，谨慎使用
                '/static/reset.css',
                '/static/ax.css',
                '/static/css.css',
            ],*/
            fontsize_formats: '12px 14px 16px 18px 24px 36px 48px 56px 72px',
            font_formats: '微软雅黑=Microsoft YaHei,Helvetica Neue,PingFang SC,sans-serif;苹果苹方=PingFang SC,Microsoft YaHei,sans-serif;宋体=simsun,serif;仿宋体=FangSong,serif;黑体=SimHei,sans-serif;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;',
            link_list: [
                { title: '预置链接1', value: 'http://www.tinymce.com' },
                { title: '预置链接2', value: 'http://tinymce.ax-z.cn' }
            ],
            image_list: [
                { title: '预置图片1', value: 'https://www.tiny.cloud/images/glyph-tinymce@2x.png' },
                { title: '预置图片2', value: 'https://www.baidu.com/img/bd_logo1.png' }
            ],
            image_class_list: [
            { title: 'None', value: '' },
            { title: 'Some class', value: 'class-name' }
            ],
            importcss_append: true,
            //自定义文件选择器的回调内容
            file_picker_callback: function (callback, value, meta) {
                if (meta.filetype === 'file') {
                callback('https://www.baidu.com/img/bd_logo1.png', { text: 'My text' });
                }
                if (meta.filetype === 'image') {
                callback('https://www.baidu.com/img/bd_logo1.png', { alt: 'My alt text' });
                }
                if (meta.filetype === 'media') {
                callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.baidu.com/img/bd_logo1.png' });
                }
            },
            autosave_ask_before_unload: false,
        });
    <?php echo '</script'; ?>
>
</head>
<body>
    <!-- 指定所属栏目
        标题
        内容 -->
    <div class="top">
        <button class="add-show btn btn-default" disabled>添加产品</button>
        <form class="form-inline col-sm-offset-1" id="search">
            <div class="form-group">
                <label for="filter">筛选</label>
                <select name="filter" id="filter" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="keyword">编号</label>
                <input type="text" class="form-control" placeholder="请输入产品编号" autocomplete="off" name="keyword" id="keyword">
            </div>
            <div class="form-group">
                <label for="reverse">倒序</label>
                <input type="checkbox" name="reverse" id="reverse">
            </div>
            <button class="btn btn-default" id="searchsubmit">查询</button>
        </form>
    </div>
    <div class="cover"></div>
    <div class="add default-box">
        <form action="" id="addContent" method="POST">
            <h4>添加产品</h4>
            <div class="form-group col-sm-12">
                <label for="cid">所属栏目</label>
                <select name="cid" id="cid" class="form-control">
                </select>
            </div>
            <input type="hidden" name="url" id="url">
            <div class="form-group col-sm-6">
                <label for="productName">产品名称</label>
                <input type="text" id="productName" class="form-control" autocomplete="on" placeholder="请输入产品名称" name="proname">
            </div>
            <div class="form-group col-sm-6">
                <label for="productId">产品型号</label>
                <input type="text" id="productId" class="form-control" autocomplete="off" placeholder="请输入产品名称" name="proid">
            </div>
            <div class="form-group col-sm-12">
                <label for="desc1">产品描述</label>
                <input type="text" class="form-control" id="desc1" name="desc1" placeholder="产品描述一">
            </div>
            <div class="form-group col-sm-12">
                <input type="text" class="form-control" id="desc2" name="desc2" placeholder="产品描述二">
            </div>
            <div class="form-group col-sm-12">
                <input type="text" class="form-control" id="desc3" name="desc3" placeholder="产品描述三">
            </div>
            <div class="form-group col-xs-6">
                <label for="protemp">使用模板</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="请输入模板名称" autocomplete="off" id="protemp" name="protemp">
                    <div class="input-group-addon">.html</div>
                </div>
            </div>
        </form>
        <form action="" id="addImg" class="form-inline">
            <div class="file-style col-sm-2">
                <label for="img">产品图片</label>
                <input type="file" name="img" id="img" style="display: none;">
                <div class="new-style">
                    <button class="choose btn btn-default">选择文件</button>
                </div>
            </div>
            <button class="btn btn-default" id="upload" disabled><span>上传图片</span> <i class="fa"></i></button>
        </form>
        <div class="img-name"></div>
        <img src="" id="preview">    
        <div class="form-group col-sm-12">
            <label for="detail">详细信息</label>
            <textarea class="form-control" id="detail" name="detail" form="addContent"></textarea>
        </div>
        <div class="col-sm-12">
            <button type="submit" id="submit" class="btn btn-primary" form="addContent"><span>添加</span><i class="fa"></i></button>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>所属栏目</th>
                            <th>产品名称</th>
                            <th>产品编号</th>
                            <th>使用模板</th>
                            <th>可执行操作</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                            <tr>
                                <td pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['pid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['proname'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['proid'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['protemp'];?>
</td>
                                <td>
                                    <a href="javascript:;" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="btn btn-success show-btn disable" disabled>查看内容</a>
                                    <a href="javascript:;" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="btn btn-danger del-btn">删除</a>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 page">
                <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

            </div>
        </div>
    </div>
    <div class="show default-box">
        <form action="" id="showContent" method="POST">
            <h4>查看产品</h4>
            <div class="form-group col-sm-12">
                <label for="showpid">所属栏目</label>
                <select name="pid" id="showpid" class="form-control">
                </select>
            </div>
            <input type="hidden" name="id">
            <input type="hidden" name="url" id="showurl">
            <div class="form-group col-sm-6">
                <label for="showName">产品名称</label>
                <input type="text" id="showName" class="form-control" autocomplete="on" placeholder="请输入产品名称" name="showname">
            </div>
            <div class="form-group col-sm-6">
                <label for="showId">产品型号</label>
                <input type="text" id="showId" class="form-control" autocomplete="off" placeholder="请输入产品名称" name="showid">
            </div>
            <div class="form-group col-sm-12">
                <label for="showdesc1">产品描述</label>
                <input type="text" class="form-control" id="showdesc1" name="desc1" placeholder="产品描述一">
            </div>
            <div class="form-group col-sm-12">
                <input type="text" class="form-control" id="showdesc2" name="desc2" placeholder="产品描述二">
            </div>
            <div class="form-group col-sm-12">
                <input type="text" class="form-control" id="showdesc3" name="desc3" placeholder="产品描述三">
            </div>
            <div class="form-group col-xs-6">
                <label for="showtemp">使用模板</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="请输入模板名称" autocomplete="off" id="showtemp" name="showtemp">
                    <div class="input-group-addon">.html</div>
                </div>
            </div>
        </form>
        <form action="" id="showImg" class="form-inline">
            <div class="file-style col-sm-2">
                <label for="showimg">产品图片</label>
                <input type="file" name="img" id="showimg" style="display: none;">
                <div class="new-style">
                    <button class="showchoose btn btn-default">选择文件</button>
                </div>
            </div>
            <button class="btn btn-default" id="showupload" disabled><span>上传图片</span> <i class="fa"></i></button>
        </form>
        <div class="show-img-name"></div>
        <img src="" id="showpreview">    
        <div class="form-group col-sm-12">
            <label for="showdetail">详细信息</label>
            <textarea class="form-control" id="showdetail" name="detail" form="showContent"></textarea>
        </div>
        <div class="col-sm-12">
            <button type="submit" id="showsubmit" class="btn btn-primary" form="showContent" disabled><span>变更</span> <i class="fa"></i></button>
        </div>
    </div>
    <div class="notice del-success text-success"><i class="fa fa-check-circle"></i> 删除成功</div>
    <div class="notice del-fail text-danger"><i class="fa fa-exclamation-circle"></i> 删除失败</div>
</body>
</html><?php }
}
