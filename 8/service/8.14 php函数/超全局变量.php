<?php
    // $_POST $_GET $_REQUEST 接收客户端请求
    // $_GET 传递的数据较小 不安全 速度较快
    // $_POST 数据无限制 安全 速度稍慢
    // var_dump($_POST);

    /**
     * $_SERVER
     *  */ 
    // var_dump($_SERVER);

    // $_COOKIE
    // setcookie('name', 'zhangsan');
    // var_dump($_COOKIE);

    // $_SESSION

    // $_ENV
    var_dump($_ENV);

    // $_FILES 接受上传文件
    // 上传文件要将表单method改为POST enctype改为mutipart/form-data
    // var_dump($_FILES);
?>