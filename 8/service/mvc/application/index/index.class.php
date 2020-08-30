<?php
    if(!defined('MVC')) {
        die('非法访问');
    }

    /**
     * 后台管理：广义 一个应用服务器部分的内容；狭义 一个应用的管理中心
     */

     /**
      * 标准的前端显示逻辑
      * 导航（栏目）-> 分类页 -> 列表页 -> 详情页
      */

    use \lib\smarty;
    use \lib\db;

    class index {

        function __construct() {

            $smart = new smarty;

            $this->smarty = $smart->smarty;

            $database = new db;

            $this->db = $database->db;

            $this->db->query('set names utf8');
        }

        private function getHeader() {

            $result = $this->db->query("SELECT `id`, `name`, `temp`, `isshow` FROM colm WHERE pid = 0");

            // 顶级栏目数据
            $data = array();

            $pid = array();

            while($row = $result->fetch_assoc()) {

                $data[] = $row;

            }

            $data_2 = array();

            foreach($data as $k=>$v) {

                $result_2 = $this->db->query('SELECT `id`, `name`, `temp`, `isshow` FROM colm WHERE pid ='.$v['id']);

                while($row_2 = $result_2->fetch_assoc()) {

                    // 将不同分类的子栏目装载到对应的下标
                    $data_2[$v['id']][] = $row_2;
                }

            }

            $this->smarty->assign('subHeader', $data_2);
            $this->smarty->assign('header', $data);

        }

        function undyne() {

            $this->getHeader();

            $this->smarty->display('index/index.html');

            mysqli_close($this->db);

            
        }

        function diversion() {

            $cid = $_GET['cid'];

            $result = $this->db->query("SELECT * FROM colm WHERE id = ".$cid);

            $row = $result->fetch_assoc();

            $this->getHeader();

            if($cid == 1) {
                
                $product = array();

                $result_2 = $this->db->query("SELECT `id`, `pid`, `proname`, `proid`, `prodesc1`, `prodesc2`, `prodesc3`, `protemp`, `proimgurl` FROM product WHERE pid = 7");

                while($row_2 = $result_2->fetch_assoc()) {

                    $product[] = $row_2;

                }

                ;
                
                $this->smarty->assign('product', $product);

            }

            $this->smarty->display('index/'.$row['temp'].'.html');

        }

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
?>