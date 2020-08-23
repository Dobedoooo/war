<?php
    /**
     * 基于cookie
     * 将信息存储到服务器 给客户端返回一个加密的cookie
     * 开始之前不能有输出
     */
    session_id(md5('asd'));

    session_name('wuhu');

    session_start();

    setcookie('name', md5('sada'), time() + 2);

    echo session_id().'<br>';

    echo session_name();

    // $_SESSION['name'] = '张三';
    // $_SESSION['age'] = '12';
    // $_SESSION['gender'] = 'male';

    // unset($_SESSION['name']);

    // 全部销毁
    // session_destroy();

    var_dump($_SESSION);