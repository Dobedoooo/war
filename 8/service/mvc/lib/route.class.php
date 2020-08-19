<?php
    namespace lib;

    if(!defined('MVC')) {
        die('访问路径不合法');
    }

    // 模块/控制/动作
    class route {
        private static $module;
        private static $control;
        private static $action;

        function __construct() {

        }

        function getInfo() {
            $path = isset($_SERVER['PATH_INFO'])?substr($_SERVER['PATH_INFO'], 1):'index/index/undyne';
            $pathArr = explode('/', $path);
            // var_dump($pathArr);
            self::$module = empty($pathArr[0])?'index':$pathArr[0];
            self::$control = empty($pathArr[1])?'index':$pathArr[1];
            self::$action = empty($pathArr[2])?'undyne':$pathArr[2];
            // echo self::$module.'/'.self::$control.'/'.self::$action;
        }

        function run() {
            $this->getInfo();

            // 模块路径
            $modulePath = APP_NAME.self::$module;

            // 判断模块是否存在
            if(is_dir($modulePath)) {

                // 控制器路径
                $controlPath = $modulePath.DIRECTORY_SEPARATOR.self::$control.'.class.php';
                // var_dump($controlPath);

                // 判断控制器文件是否存在
                if(is_file($controlPath)) {

                    // 导入控制器文件
                    require_once $controlPath;

                    // 判断控制器类是否存在
                    if(class_exists(self::$control)) {

                        // 控制器名
                        $className = self::$control;

                        // 实例化控制器
                        $obj = new $className();

                        // 判断功能/方法是否存在
                        if(\method_exists($obj, self::$action)) {

                            // 方法名
                            $method = self::$action;

                            // 执行方法
                            $obj->$method();
                        } else {
                            die('Method Not Found');
                        }
                    } else {
                        die('Class Not Found');
                    }
                } else {
                    die('File Not Found');
                }
            } else {
                die('Module Not Found');
            }
        }
    }
?>