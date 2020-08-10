<?php

    // 接收表单信息 get方式 $_GET post方式 $_POST 
    // 统统获取 $_REQUEST
    // var_dump($_GET);

    $data = require_once 'data.php';
    $data[] = $_GET;
    if (count($_GET) == 0) {
        echo '数据有误';
        return;
    }
    foreach ($_GET as $key => $value) {
        if(!$value) {
            echo '数据有误';
            return;
        }
    }
    $result = "<?php \n return ".var_export($data, true).";";
    file_put_contents('data.php', $result);
    // header('location: http://localhost/8.8/editable_table.php');

?>