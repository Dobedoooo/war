<?php
    // include 引入文件有错误会警告 但不会终止程序

    // 引入其他文件，并且会多次引入
    // include '1.php';
    // include '1.php';
    // include '1.php';
    // include '1.php';

    // 只引入一次
    // include_once '1.php';
    // include_once '1.php';
    // include_once '1.php';
    // include_once '1.php';

    // require 引入文件有错误 直接终止程序

    // require '1.php';
    // require '1.php';
    // require '1.php';

    // require_once '1.php';
    // require_once '1.php';
    // require_once '1.php';

    // $val = require '1.php';
    // var_dump($val)

    // 读取和写入文件
    // file_get_contents('1.php');
    // file_put_contents('1.php', '123');

    // php 单双引号区别
    // 单引号运行效率高 双引号运行效率低 
    // 双引号会解析变量，解析正则
?>