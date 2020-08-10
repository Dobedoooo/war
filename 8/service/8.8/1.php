<?php
    // 常量
    // const 用于类成员变量 define 用于全局常量
    // const a = 1;
    // echo a;

    // define('b', 'sad');
    // echo b;

    // 检查某个常量名是否存在
    // var_dump(defined('a'));

    // echo __FILE__;

    // foreach 循环
    $arr = array(
        'name' => 'zahngsan',
        'age' => 12
    );

    // foreach($arr as $i => $j) {
    //     echo $i.' '.$j;
    // }

    // 数组 == 数组 键值相同，顺序可以不同 === 键值、顺序相同

    // 数组 + 数组  将数组进行合并

    // 数组追加 $arr[] = 'value' 索引自动增加
    // $arr['key'] = 'value';
    // array_push($arr, ''value'); 此方法只能添加索引数组

    // array_pop($arr) 

    // array_shift($arr); 

    // array_unshift($arr, 'val'); # 此方法只能添加索引数组

    // 万能
    // array_splice($arr, 1, 0, 'val'); array_splice(array, offset, length, [replacement]);

    // 卸载
    // unset($arr['name']);

    var_export($arr, true);

    // var_dump($arr);

    // php 文件可以返回一个值
    return array(
        'name' => 'zhangsan',
        'age' => 44
    );
?>
