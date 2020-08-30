<?php

    // 指定大小
    // $size = 1024 * 1024;
    // // 指定类型
    // $type = 'image/jpeg';
    // // var_dump($_FILES);
    // // 判断
    // if($_FILES['file']['size'] < $size) {

    //     if($_FILES['file']['type'] == $type) {

    //         if(is_uploaded_file($_FILES['file']['tmp_name'])) {

    //             move_uploaded_file($_FILES['file']['tmp_name'], 'upload/up1.jpg');
    //             echo 1;

    //         } else {
    //             echo 'not upload';
    //         }
    //     } else {
    //         echo 'type';
    //     }
    // } else {
    //     echo 'size';
    // }

    include_once 'upload.class.php';

    $upload = new upload;

    $path = $upload->up();

    echo $path;

?>