<?php
    header("content-type:text/html;charset=utf-8");
    // 形参多于实参时，报错miss argument
    // 实参多于形参时，不报错 func_get_args() 获取传入的值
    function func($message = 1) {
        var_dump(func_get_args());

        // 通过下标获取某个参数
        var_dump(func_get_arg(2));

        // 获取参数数量
        echo count(func_get_args());
        echo func_num_args();
        
        echo $message;
    }

    // func();

    // 作用域
    // php没有作用域链，不会向外找
    // 局部变量不能为外部所访问
    $var_1 = 'var_1'; // 全局变量
    function func_2($arg_1 = 'arg1') {
        echo $arg_1;
        // 使用glocal指定内部要访问的全局变量
        global $var_1;
        // $var_1 = '局部var1';
        echo $var_1; // 访问的是局部的变量
    }

    // func_2();

    function func_3() {
        // 指定作用域 便于外部访问 会造成变量污染
        global $var_2;
        $var_2 = '10';
        echo $var_2;
    }

    // func_3();
    // echo $var_2;

    // 静态变量（相当于js闭包）会造成内存泄漏
    function func_4() {
        // $index = 0;
        static $index;
        $index++;
        echo $index;
    }

    // func_4();
    // func_4();
    // func_4();
    // func_4();

    // 函数都是全局的
    function func_5() {
        function func_5_1() {
            echo '5';
        }
        func_5_1();
    }

    // func_5();
    // func_5_1();

    // 回调函数
    function func_6($callback) {
        $callback();
    }

    // func_6(function() {
    //     echo '回调函数';
    // });

    function func_7() {
        echo '7';
    }

    // 字符串将函数传入
    // func_6('func_7');

    $func_8 = 'func_7';

    // $func_8();

    // 判断函数是否存在
    // var_dump(function_exists('func_7'));

    // 
    function func_9() {
        return '9';
    }

    echo func_9();

    // 超全局变量 $_POST $_GET $_SERVER $_REQUEST $_ENV $_FILES $_COOKIE $_SESSION
    
?>

<script>

    // 闭包 内部函数访问外部函数的变量
    function func() {
        var num = 0;
        return function() {
            num++;
            console.log(num);
        }
    }

    var f = func();
    f();
    f();
    f();
    f();
</script>