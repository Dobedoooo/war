<?php
    return array(
        'database' => array(
            'host' => '49.234.98.39',
            'username' => 'root',
            'password' => 'dobedoo',
            'dbname' => 'mvc',
            'port' => '3306',
        ),
        'smarty' => array(
            'templateDir' => TEMPLATE_PATH,
            'compileDIr' => COMPILE_PATH,
            'cacheDir' => CACHE_PATH,
        ),
        'verify' => array(
            'type' => 'png',
            'width' => 165,
            'height' => 35,
            'num' => 4,
            'seed' => 'abcdefhjkmnprstuvwxyzABCDEFGHIJKMLNOPQRSTUVWXYZ345678',
            'fontSize' => array('min'=>16, 'max'=>25),
            'fontAngle' => array('min'=>-15, 'max'=>15),
            'lineNum' => array('min'=>2, 'max'=>6),
            'pixelNum' => array('min'=>20, 'max'=>60),
            'isCheck' => true,
        ),
    );