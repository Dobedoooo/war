<?php
namespace libs;
if(!defined("MVC")){
    die("访问路径不合法");
}
//index.php/模块/控制/动作
class route{
    //模块
    private static $m;
    //类
    private static $c;
    //方法
    private static $a;
  private  function getinfo(){
       $path=isset($_SERVER["PATH_INFO"])?substr($_SERVER["PATH_INFO"],1):"index/index/int";
       $patharr=(explode("/",$path));
       self::$m=empty($patharr[0])?"index":$patharr[0];
        self::$c=empty($patharr[1])?"index":$patharr[1];
        self::$a=empty($patharr[2])?"int":$patharr[2];
//        echo self::$m."/".self::$c."/".self::$a;


    }
    function run(){
        $this->getinfo();
        $mpath=APP_NAME.self::$m;
       if(is_dir($mpath)){
           $curl=$mpath.DIRECTORY_SEPARATOR.self::$c.".class.php";
           if (is_file($curl)){
               include_once $curl;
               if(class_exists(self::$c)){
                   $classname=self::$c;
                   $obj=new $classname;
                   if(method_exists($obj,self::$a)){
                       $method=self::$a;
                      $obj-> $method();
                   }else{
                       die("this action not exists");
                   }
               }else{
                   die("this class not exists");
               }


           }else{
               die( "this class file not exists");
           }

       }else{
           die( "this module not exits");
       }
    }
}