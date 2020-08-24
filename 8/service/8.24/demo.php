<?php

    $str = 'abc';

    // 传址
    $str1 =& $str;

    $str = 1;

    echo $str;