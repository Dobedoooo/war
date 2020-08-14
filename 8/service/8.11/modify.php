<?php
    $data = require_once 'data.php';
    $record = $_GET;
    $id = $record['id'];
    $arr = array(
        0 => array(
            'name' => $record['name'],
            'age' => $record['age'],
            'gender' => $record['gender'],
            'class' => $record['class'],
        )
    );
    array_splice($data, $id, 1, $arr);
    $result = "<?php \n return ".var_export($data, true).";";
    file_put_contents('data.php', $result);
    echo json_encode($record);