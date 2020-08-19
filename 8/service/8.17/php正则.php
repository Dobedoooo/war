<?php
    $reg = '/\w/';
    
    $str = 'abcd';

    // 匹配
    preg_match($reg, $str, $match);

    preg_match_all($reg, $str, $result);

    // var_dump($match);

    // var_dump($result);

    $str2 = array(
        'abcd', '222', 'AAA'
    );

    // 替换 返回替换后的内容
    var_dump(preg_replace('/[a-z]/', 1, $str2));

    preg_replace_callback();

    //
    var_dump(preg_filter($reg, 1, $str2));