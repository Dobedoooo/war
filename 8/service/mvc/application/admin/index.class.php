<?php
    if(!defined('MVC')) {
        die('非法访问');
    }

    use \lib\smarty;
    use \lib\db;
    use \lib\verify;

    class index{

        // 后台登陆页
        function undyne() {

            $smart = new smarty;

            $smarty = $smart->smarty;

            if(!empty($_GET)) {
                $smarty->assign('height', $_GET['h']);
            } else {
                $smarty->assign('height', 'auto');
            }

            $smarty->display('admin/login.html');
        }

        // 登录逻辑
        function login() {
            $name = $_POST['name'];
            $pass = $_POST['pass'];

            global $config;

            if($config['verify']['isCheck']) {

                if($_POST['verify'] != $_SESSION['verify']) {

                    echo '验证码有误';

                    return;

                }

            }
            

            if(strlen($name) < 5 || empty($pass)) {
                echo '你小子干啥呢';
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
                $_SESSION['login'] = 'yes';
                $_SESSION['user'] = $name;
                header('location:/mvc/index.php/admin/index/home');
            }

            $db->close();

        }

        // 注册页面
        function reg() {
            $smart = new smarty;

            $reg = isset($_GET['reg'])?$_GET['reg']:'0';

            $height = isset($_GET['h'])?$_GET['h']:'0';

            $smart->smarty->assign('reg', $reg);

            $smart->smarty->assign('height', $height);

            $smart->smarty->display('admin/reg.html');
        }

        // 注册逻辑
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

        // 注册用户名远程验证
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

        // 验证码
        function verify() {

            $verifyImg = new verify;

            $verifyImg->out();

            // setcookie('verify', $verifyImg->str);
            $_SESSION['verify'] = $verifyImg->str;

        }

        // 后台首页
        function home() {

            if(isset($_SESSION['login']) && $_SESSION['login'] == 'yes') {

                $smart = new smarty;

                $smarty = $smart->smarty;

                $smarty->assign('user', $_SESSION['user']);

                $smarty->display('admin/home.html');

            } else {
                header('location:/mvc/index.php/admin');
            }
        }
    }