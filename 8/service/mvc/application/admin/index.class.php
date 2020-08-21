<?php
    if(!defined('MVC')) {
        die('非法访问');
    }

    use \lib\smarty;
    use \lib\db;

    class index{
        function undyne() {

            $smart = new smarty;

            $smarty = $smart->smarty;

            $signal = false;

            if(!empty($_GET)) {
                $signal = true;
            }

            $smarty->assign('signal', $signal);

            $smarty->display('admin/login.html');
        }

        // 登录
        function login() {
            $name = $_POST['name'];
            $pass = $_POST['pass'];

            if(strlen($name) < 5 || empty($pass)) {
                echo '嘿嘿';
                return;
            }

            $database = new db;

            $db = $database->db;

            $db->query('set names utf8');

            $encrypt = md5(md5($pass));

            $sql = "select * from user where name = '$name' and pass = '$encrypt'";

            $result = $db->query($sql);

            if($result->num_rows < 1) {
                echo '用户名或密码错误';
            } else {
                echo '登录';
            }


        }

        // 注册页面
        function reg() {
            $smart = new smarty;

            $reg = isset($_GET['reg'])?$_GET['reg']:'0';

            $smart->smarty->assign('reg', $reg);

            $smart->smarty->display('admin/reg.html');
        }

        // 添加用户
        function addUser() {
            $name = $_POST['name'];
            $pass = $_POST['pass'];
            $pass1 = $_POST['pass2'];

            if($pass != $pass1) {
                echo '两次密码输入不一致';
                return;
            }
 
            $database = new db;

            $db = $database->db;

            $db->query('set names utf8');

            $result = $db->query("select name from user where name = '$name'");

            if($result->num_rows != 0) {
                echo '用户名已存在';
                return;
            }

            $encrypt = md5(md5($pass));

            $sql = "insert into user (name, pass) values ('$name', '$encrypt')";

            $db->query($sql);

            if($db->affected_rows > 0) {
                header('location:/mvc/index.php/admin/index/undyne');
            }
        }

        // 远程验证
        function check() {
            $name = $_POST['name'];

            $database = new db;

            $db = $database->db;

            $db->query('set names utf8');

            $result = $db->query("select name from user where name = '$name'");

            if($result->num_rows < 1) {
                echo 'true';
            } else {
                echo 'false';
            }
        }
    }