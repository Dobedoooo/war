<?php
    // php 数学函数

    // 获取最大可能生成的随机数
    // echo getrandmax();

    // 包括边界 mt_rand() 运算速度更块
    // echo rand(0, 10).'<br>';
    // echo mt_rand(0, 10);

    // 播种
    // mt_srand(time());
    // echo mt_rand();

    // php 日期处理

    // 1.设置时间
    // date_default_timezone_set('asia/shanghai');
    // $date = date_create();
    // var_dump($date);

    // 设置时间戳
    // date_timestamp_set($date, 11111111111);

    // 格式化输出时间
    // echo date_format($date, 'Y-m-d h:i:s');
    
    // 2.获取时间
    // 获得秒数
    // echo time();

    // 微秒
    // echo microtime();

    // 当前时间
    // echo date('Y-m-d h:i:s');

    // 获取时间戳
    // echo date_timestamp_get(date_create());

    // echo gmmktime(10, 10, 10, 10, 10, 2020);

    // 3.计算时间

    // 时间差
    var_dump(date_diff(date_create('2020-10-10 10:10:10'), date_create('2020-10-10 10:10:11')));