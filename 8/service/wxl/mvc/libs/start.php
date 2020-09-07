<?php
//服务器所在的根路径
if(!defined("MVC")){
    die("访问路径不合法");
}
//服务器所在路径
define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"]);
//入口文件所在路径
define("ENTRY_PATH",ROOT_PATH.$_SERVER["SCRIPT_NAME"]);
//框架所在路径
define("MAIN_PATH",dirname(ENTRY_PATH).DIRECTORY_SEPARATOR);
//核心库所在路径
define("LIBS_PATH",MAIN_PATH."libs".DIRECTORY_SEPARATOR);
//插件所在的路径
define("PLU_PATH",MAIN_PATH."plugins".DIRECTORY_SEPARATOR);
//模板所在路径
define("TPL_PATH",APP_NAME."template".DIRECTORY_SEPARATOR);
//编译文件所在目录
define("COMP_PATH",APP_NAME."compile".DIRECTORY_SEPARATOR);
//缓存文件目录
define("CACHE_PATH",APP_NAME."cache".DIRECTORY_SEPARATOR);
//smarty路径
define("SMARTY_PATH",LIBS_PATH."smarty".DIRECTORY_SEPARATOR);
//字体路径
define("FONT_PATH",APP_NAME.".static/font/");




//http协议访问路径
define("HOST_ADD","http://".$_SERVER["HTTP_HOST"]);
//单入口文件地址
define("ENTRY_ADD",HOST_ADD.$_SERVER["SCRIPT_NAME"]);
//框架入口地址
define("MAIN_ADD",dirname(HOST_ADD.$_SERVER["SCRIPT_NAME"]).DIRECTORY_SEPARATOR);
//当前应用地址
define("APP_ADD",MAIN_ADD.APP_DIR_NAME.DIRECTORY_SEPARATOR);
//静态文件地址
define("STATIC_ADD",APP_ADD."static".DIRECTORY_SEPARATOR);
//css地址
define("CSS_ADD",STATIC_ADD."css".DIRECTORY_SEPARATOR);
//js地址
define("JS_ADD",STATIC_ADD."js".DIRECTORY_SEPARATOR);
//img地址
define("IMG_ADD",STATIC_ADD."img".DIRECTORY_SEPARATOR);
//font地址
define("FONT_ADD",STATIC_ADD."font".DIRECTORY_SEPARATOR);
//$config=include_once APP_NAME."config.php";
include_once SMARTY_PATH."/libs/Smarty.class.php";
include_once LIBS_PATH."route.class.php";
//include_once LIBS_PATH."engin.class.php";

//function auto($classname){
//
//    include_once MAIN_PATH.str_replace("\\",DIRECTORY_SEPARATOR,$classname).".class.php";
//
//}
//
//spl_autoload_register("auto");
$router=new \libs\route();
$router->run();
//路由的概念
// m v c
//php里面有控制器，路由来控制
//index.php/manerge/role/add
//echo "<pre>";

//echo $_COOKIE["name"];

