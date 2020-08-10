

<meta charset='UTF-8'>

<?php
    // php注释
    /**
     * php注释
     */

     //php 变量
    $a;

    // 输出字符串
    echo '字符串';

    // 输出字符串 有返回值
    print('输出');

    // 输出复合类型
    print_r('复合类型');

    // 输出数据详细信息
    var_dump('详细信息');

    /**
     * php数据类型(8种)
     * 1.基础类型（标量）
     *      整型integer 浮点型double 布尔型boolean 字符串型string
     * 2.复杂类型（复合类型）
     *      索引数组（下标是数字）
     *      关联数组（下标是字符串）
     * 3.资源类型（二进制类型）
     * 4.NULL
     */

    $str = '中文字符';
    echo $str;
    echo gettype($str);

    // 索引数组
    $arr = array('1', 'b');
    /**
     * 等价于
     * $arr = array(
     * 0 => '1',
     * 2 => 'b,
     * )
     */
    echo $arr[0];

    // 关联数组
    $arr2 = array(
        'name' => 'sad',
        'age' => 23,
        // 可以嵌套
        array(
            'name' => 'lisi',
        )
    );
    echo $arr2[0]['name'];

    // 数组长度 count($arr)

    // 循环
    for ($i=0; $i < count($arr); $i++) { 
        echo $arr[$i];
    }

    class a {

    }

    $a = new a();
    echo gettype($a); // object

    // 资源类型
    $b = fopen('demo.php', 'r');
    echo gettype($b); // resource

    $c = null;
    echo gettype($c)

?>