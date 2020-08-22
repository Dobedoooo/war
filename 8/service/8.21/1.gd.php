<?php
    // var_dump(gd_info());
    // 指定输出格式
    // header('content-type:image/png');
    // 创建画布
    $img = imagecreatetruecolor(20, 20); # 资源类型
    var_dump(gettype($img));
    // 作画

    // 输出到浏览器
    // imagepng($img);

    // 销毁 释放内存
    // imagedestroy($img);