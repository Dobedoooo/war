<?php
class reg{
    function add(){
        $smarty=new Smarty();
        $smarty->setTemplateDir(TPL_PATH);
        $smarty->setCompileDir(COMP_PATH);
        $smarty->display("admin/reg.html");
    }
    function addUser(){
        $uname=$_POST["uname"];
        $pass=$_POST["pass"];
        $pass1=$_POST["pass1"];
        if($pass!==$pass1){
            echo "密码不一致";
            return;
        }
        $db=new mysqli("localhost","root","123456","wuif2006","3308");
        if(mysqli_connect_error()){
            die("数据库连接失败");
        }
        $db->query("set names utf8");
        $result=$db->query("select uname from user where uname='{$uname}'");
        if($result>0){
            echo "用户名已存在";
            return;
        }
        $db->query("insert into user (uname,pass) VALUES ('$uname','$pass')");
        if($db->affected_rows>0){
            echo "注册成功";
        }
    }

    function checkName(){
        $uname=$_GET["uname"];

        $db=new mysqli("49.234.98.39","root","dobedoo","mvc","3306");
        $db->query("set names utf8");
        $result=$db->query("select name from user where name='{$uname}'");
        if($result->num_rows < 1){
            echo "true";
        }else{
            echo "false";
        }
    }


}
?>