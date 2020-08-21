<?php
    if(!defined('MVC')) {
        die('非法访问');
    }

    /**
     * 后台管理：广义 一个应用服务器部分的内容；狭义 一个应用的管理中心
     */

    class index {
        function undyne() {

            echo 'Welcome';

            // $engine = new engine();

            // $engine->setTemplateDir(TEMPLATE_PATH);

            // $engine->setCompileDir(COMPILE_PATH);

            // $smarty = new smarty;

            // $smarty->setTemplateDir(TEMPLATE_PATH);

            // $smarty->setCompileDir(COMPILE_PATH);

            // 连接数据库
            // @屏蔽错误
            // $db = new mysqli('49.234.98.39', 'root', 'dobedoo', 'test', '3306');
            // if(mysqli_connect_errno()) {
            //     die('数据库连接错误');
            // }

            // 查询
            // $db->query('set names utf8');

            // $result = $db->query('select * from stu');

            /**
             * 关联数组 fetch_assoc()
             * 索引数组 fetch_row()
             * 既有关联又有索引 fetch_array()
             */

            // 取数据
            // $data = [];
            // while($row = $result->fetch_assoc()) {
            //     $data[] = $row;
            // }

            // $engine->assign('data', $data);
            // $smarty->assign('data', $arr);

            // $engine->display('index.html');
            // $smarty->display('index.html');
        }

        function del() {
            echo '删除';
        }
    }
?>