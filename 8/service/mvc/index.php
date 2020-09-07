<?php
    session_start();

    // 记录一个口令
    define('MVC', true);
    // 应用文件夹 
    /**
     * php 常用的魔术常量
     * __DIR__ 当前目录
     * __FILE__ 当前文件
     * __CLASS__ 当前类
     * __METHOD__ 当前方法
     * __LINE__ 当前行
     * DIRECTORY_SEPARATOR
     */
    define('APP_DIR_NAME', 'application');

    define('APP_NAME', __DIR__.DIRECTORY_SEPARATOR.APP_DIR_NAME.DIRECTORY_SEPARATOR);

    require_once 'lib/start.php';

    