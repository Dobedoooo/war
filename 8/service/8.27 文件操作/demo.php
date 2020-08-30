<?php

    // file_get_contents();
    // file_put_contents();

    /**
     * 操作文件
     * 4种模式
     * r r+
     * w w+ 先清空，在写入
     * a a+ 追加
     * x 写入数据流（二进制）
     */
    // 打开文件，返回资源类型
    // $file = fopen('test.txt', 'r');

    // fwrite($file, '123');

    // 将光标放到文件开始的位置
    // rewind($file);

    // 从光标处，读取指定长度的内容
    // echo fread($file, 2);

    // 返回文件指针读/写的位置
    // ftell($file);

    // 在文件指针中定位
    // fseek($file, 2);
    // echo fread($file, 1);

    // 从文件指针中读取一行
    // echo fgets($file);

    // 循环读取
    // while($row = fgets($file)) {
    //     echo $row."<br>";
    // }

    // 返回文件字节数
    // $size = filesize('test.txt');
    // echo fread($file, $size);
    // 关闭文件
    // fclose($file);

    // 删除文件
    // unlink('test.txt');

    // 拷贝文件
    // copy('test.txt', 'test_2.txt');

    // 重命名 可以实现文件移动
    // rename('test_2.txt', '../8.24/test.txt');

    /**
     * 操作目录
     * 权限
     *  读 1
     *  写 2
     *  执行 4
     *  3 读写
     *  5 读执行
     *  6 写执行
     *  7 全部
     * 7 用户 7 用户组 7 其他
     */

    // 创建目录 第三个参数 是否可以递归创建
    // mkdir('a');
    // mkdir('a/b/c', '0777', true);

    // 重命名
    // rename('a', 'b');

    // 删除目录 只能删除空目录
    // rmdir('a');

    // 递归删除
    function delDir($dirname) {
        
        $dir = opendir($dirname);

        while($file = readdir($dir)) {

            if($file != '.' && $file != '..') {

                $path = $dirname.'/'.$file;

                if(is_dir($path)) {

                    delDir($path);

                } else {

                    unlink($path);

                }

            }

        }

        closedir($dir);
        // 删除空的
        rmdir($dirname);

    }

    // delDir('b');

    // php没有拷贝目录函数
    function copyDir($src, $target) {

        if(!is_dir($target)) {
            mkdir($target, 0777, true);
        }

        $dir = opendir($src);

        while($file = readdir($dir)) {

            if($file != '.' && $file != '..') {

                $path = $src.'/'.$file;

                $targetPath = $target.'/'.$file;

                if(is_dir($path)) {
                    copyDir($path);
                } else {
                    copy($path, $targetPath);
                }

            }

        }

    }

    // 当前目录
    // echo getcwd();

    // 打开目录 返回资源
    // $dir = opendir('../8.24');
    // var_dump($dir)

    // 读目录
    // while($r = readdir($dir)) {
    //     echo $r.'<br>';
    // }

    // 扫描目录
    // var_dump(scandir('../8.24'));

    // 关闭目录
    // closedir($dir);

    // 判断
    // is_file();
    // is_dir();

    // file_exists(); # 文件或目录是否存在 不常用

    // is_uploaded_file() # 判断是否是一个上传文件
    
    // 查询文件信息

    // 获取路径部分
    // echo dirname('../8.10');

    // 获取文件名
    // echo basename('../8.24/etiquette.png', '.png');

    // 文件大小
    // echo filesize()

    // 磁盘可用空间
    // echo disk_free_space('D:')/1024/1024/1024;
    // 磁盘总空间
    // echo disk_total_space('D:')/1024/1024/1024;

    // 访问时间
    // echo fileatime('test.txt').'<br>';
    // 修改时间 filemtime()
    // 创建时间
    // echo filectime('test.txt');

    // 文件信息
    var_dump(stat('test.txt'));
?>  