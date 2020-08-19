<?php
    define('flag', 'true');
    $action = isset($_GET['action'])?$_GET['action']:'';
    if($action) {
        if(is_file($action.'.php')) {
            include_once $action.'.php';
        } else {
            echo 'PAGE NOT FOUND';
        }
    } else {
        echo 'INDEX';
    }
    
    
?>