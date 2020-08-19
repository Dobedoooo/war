<?php
    // 全局魔术方法
    // __autoload 在实例化一个找不到的类时候调用 不推荐使用
    use \lib\core\login;

    // function __autoload($className) {
    //     $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    //     include_once $path.'.php';
    // }


    // 不同操作系统下的路径分割符
    // echo DIRECTORY_SEPARATOR;

    // 常用
    spl_autoload_register('auto');

    function auto($className) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        include_once $path.'.php';
    }

    new login();
