<?php
    $data = require_once 'data.php';
    $len = count($data);
    $record = $_GET;
    foreach ($data as $key => $value) {
        if($value['name'] == $record['name']) {
            echo 3;
            return;
        }
    }
    $data[] = $record;
    $newlen = count($data);
    if($newlen == $len + 1) {
        $result = "<?php \n return ".var_export($data, true).";";
        file_put_contents('data.php', $result);
        echo json_encode($record);
    } else {
        echo 0;
    }
