<?php
    $data = require_once 'data.php';
    $len = count($data);
    $id = $_GET['id'];
    // echo $id;
    array_splice($data, $id, 1);
    $newlen = count($data);
    if($newlen == $len - 1) {
        $result = "<?php \n return ".var_export($data, true).";";
        file_put_contents('data.php', $result);
        echo 1;
    } else {
        echo 0;
    }
?>