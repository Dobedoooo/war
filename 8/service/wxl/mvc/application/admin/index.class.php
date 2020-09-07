<?php
if(!defined("MVC")){
    die("非法入侵");
}
class index{
    function int(){
        $smarty=new Smarty();
        $smarty->setTemplateDir(TPL_PATH);
        $smarty->setCompileDir(COMP_PATH);
        $smarty->display("admin/login.html");
    }
    function login(){
        $uname=$_POST["uname"];
        $pass=$_POST["pass"];
        if(strlen($uname<5||empty($pass))){
            echo "用户名或密码不符合规范";
            return;
        }
        $db=new mysqli("localhost","root","123456","wuif2006","3308");
        if(mysqli_connect_errno()){
            die("数据库连接失败");
        }
        $db->query("set names utf8");
        $result=$db->query("select * from user where uname='{$uname}'and pass='$pass'");
        if($result->num_rows<1){
            echo "用户名不存在";
        }else{
            header("location:/2006/mvc/index.php/admin/index/first");
        }
    }
    function first(){
        echo "首页";
    }
    //MD5加密：会把任何类型的字符串加密成一个32字节表示16进制的字符串
    //crypt，传入随机的种子
    //sha1，四十个用十六进制表示的字符串，比MD5更安全

}