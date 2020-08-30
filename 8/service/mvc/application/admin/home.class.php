<?php

    if(!defined('MVC')) {
        die('非法访问');
    }

    use \lib\smarty;
    use \lib\db;

    class home {
        function undyne() {
            echo '首页';
        }
    }