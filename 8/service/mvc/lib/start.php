<?php
    header('content-type:text/html;charset:utf-8');
    
    if(!defined('MVC')) {
        die('访问路径不合法');
    }

    // 定义常用的常量
    
    // 服务器根路径
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);

    // 入口文件的路径
    define('ENTRY_PATH', ROOT_PATH.$_SERVER['SCRIPT_NAME']);

    // 当前框架路径
    define('MAIN_PATH', dirname(ENTRY_PATH).'/');

    // 核心库路径
    define('LIB_PATH', MAIN_PATH.'lib/');

    // 插件所在路径
    define('PLUGIN_PATH', MAIN_PATH.'plugin/');

    // 模板路径
    define('TEMPLATE_PATH', APP_NAME.'template'.DIRECTORY_SEPARATOR);

    // 编译文件所在目录
    define('COMPILE_PATH', APP_NAME.'compile'.DIRECTORY_SEPARATOR);

    // 缓存文件目录
    define('CACHE_PATH', APP_NAME.'cache'.DIRECTORY_SEPARATOR);

    // smarty
    define('SMARTY_PATH', LIB_PATH.'smarty'.DIRECTORY_SEPARATOR);

    // 静态文件目录
    define('STATIC_PATH', APP_NAME.'static'.DIRECTORY_SEPARATOR);

    // 字体目录
    define('FONT_PATH', STATIC_PATH.'font'.DIRECTORY_SEPARATOR);
    // 以上为本地路径

    // 以下为网路路径
    // 主机地址
    define('HOST_ADD', 'http://'.$_SERVER['HTTP_HOST']);

    // 入口文件地址
    define('ENTRY_ADD', HOST_ADD.$_SERVER['SCRIPT_NAME']);

    // 框架入口
    define('MAIN_ADD', dirname(ENTRY_ADD).'/');

    // 当前应用地址
    define('APP_ADD', MAIN_ADD.APP_DIR_NAME.'/');

    // 静态文件地址
    define('STATIC_ADD', APP_ADD.'static/');

    // css地址
    define('CSS_ADD', STATIC_ADD.'css/');

    // js地址
    define('JS_ADD', STATIC_ADD.'js/');

    // 字体地址
    define('FONT_ADD', STATIC_ADD.'font/');

    // 图片地址
    define('IMG_ADD', STATIC_ADD.'img/');

    // 路由
    require_once LIB_PATH.'route.class.php';

    // 配置项
    $config = include_once APP_NAME.'config.php';
    // 主类
    // include_once LIB_PATH.'main.class.php';

    // 模板引擎
    // require_once 'tplEngine.class.php';
    require_once LIB_PATH.'smarty/Smarty.class.php';

    spl_autoload_register('autoLoad');

    function autoLoad($className) {
        // echo MAIN_PATH.str_replace('\\', DIRECTORY_SEPARATOR, $className).'.class.php';
        include_once MAIN_PATH.str_replace('\\', DIRECTORY_SEPARATOR, $className).'.class.php';
    }

    $router = new \lib\route();

    $router->run();
