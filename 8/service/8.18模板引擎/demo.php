<?php

    $name = 'zhangsan';
    $age = '12';
    $gender = 'male';

    $str = file_get_contents('template/demo.html');

    $reg = '/\{(\$[a-zA-Z]\w*)\}/';

    $result = preg_replace_callback($reg, function($val) {
        // var_dump($val[1]);
        return '<?php echo '.$val[1].' ?>';
    }, $str);

    // echo $result;

    file_put_contents('compile/demo.php', $result);

    include_once 'compile/demo.php';


