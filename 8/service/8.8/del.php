<?php
    $data = require_once 'data.php';
    $offset = (Integer)$_GET['id'];
    array_splice($data, $offset, 1);
    $result = "<?php \n return ".var_export($data, true).";";
    file_put_contents('data.php', $result);
    header('location: http://localhost/8.8/editable_table.php');
