<?php

    if(!defined('MVC')) {
        die('非法访问');
    }

    use \lib\smarty;
    use \lib\db;
    use \lib\upload;

    class content {

        // 初始化数据库 模板引擎
        function __construct() {
            
            $smart = new smarty;

            $this->smarty = $smart->smarty;

            $database = new db;

            $this->db = $database->db;

            $this->db->query('set names utf8');

        }

        // 获取内容
        function getContent() {

            $result = $this->db->query("SELECT `product`.`id`, `product`.`pid`, `product`.`proname`, `product`.`proid`, `product`.`protemp`,  `colm`.`name` FROM colm RIGHT JOIN product ON `colm`.`id` = `product`.pid");

            $data = [];

            while($row = $result->fetch_assoc()) {

                $data[] = $row;

            }

            mysqli_close($this->db);

            return $data;

        }

        // 显示内容
        function contentInfo() {

            $data = $this->getContent();

            $this->smarty->assign('data', $data);

            $this->smarty->display('admin/contentinfo.html');

        }

        // 获取栏目
        function getParent() {
            $str = '';

            $result = $this->db->query('select id, name, pid from colm where `id` = 1');

            while($row = $result->fetch_assoc()) {

                $str .= '<option disabled >'.$row['name'].'</option>';

                $result_2 = $this->db->query('select id, name, pid from colm where pid = '.$row['id']);

                while($row_2 = $result_2->fetch_assoc()) {
                    
                    $str .= '<option value="'.$row_2['id'].'" pid="'.$row['id'].'">&nbsp;-&nbsp;'.$row_2['name'].'</option>';

                } 

            }

            return $str;
        }
        function getCol() {

            echo $this->getParent();

        }

        // 添加内容
        function addContent() {

            // 产品
            if($_POST['pid'] == 1) {

                $pid = $_POST['cid'];
                $proname = $_POST['proname'];
                $proid = $_POST['proid'];
                $desc1 = $_POST['desc1'];
                $desc2 = $_POST['desc2'];
                $desc3 = $_POST['desc3'];
                $protemp = $_POST['protemp'];
                $proimgurl = $_POST['url'];
                $prodetail = $_POST['detail'];

                $this->db->query("INSERT INTO product (`pid`, `proname`, `proid`, `prodesc1`, `prodesc2`, `prodesc3`, `protemp`, `proimgurl`, `prodetail`) VALUES ('{$pid}', '{$proname}', '{$proid}', '{$desc1}', '{$desc2}', '{$desc3}', '{$protemp}', '{$proimgurl}', '{$prodetail}')");

                if($this->db->affected_rows > 0) {

                    echo 1;
 
                } else {
                    echo 0;
                }

            }

        }

        // 删除内容
        function del() {

            $id = $_GET['id'];

            $this->db->query('DELETE FROM `product` WHERE id='.$id);

            if($this->db->affected_rows > 0) {
                echo 1;
            } else {
                echo 0;
            }

        }

        // 上传图片
        function upload() {

            $upload = new upload;

            $result = $upload->up();

            if($result) {
                echo str_replace('\\', '/', $upload->path);
            } else {
                echo 0;
            }

        }

        // 查看单条
        function showSingle() {

            $id = $_GET['id'];

            $result = $this->db->query("SELECT * FROM product WHERE id=".$id)->fetch_assoc();

            if($result) {

                $arr = array(
                    'options' => $this->getParent(),
                    'result' => $result,
                );
                echo json_encode($arr);

            } else {
                echo 0;
            }
        }

        // 更新
        function update() {

            $id = $_POST['id'];
            $pid = $_POST['pid'];
            $url = $_POST['url'];
            $showname = $_POST['showname'];
            $showid = $_POST['showid'];
            $desc1 = $_POST['desc1'];
            $desc2 = $_POST['desc2'];
            $desc3 = $_POST['desc3'];
            $showtemp = $_POST['showtemp'];
            $detail = $_POST['detail'];

            $this->db->query("UPDATE product SET `pid`='$pid', `proname`='$showname', `proid`='$showid', `prodesc1`='$desc1', `prodesc2`='$desc2', `prodesc3`='$desc3', `protemp`='$showtemp', `proimgurl`='$url', `prodetail`='$detail' WHERE id = ".$id);

            if($this->db->affected_rows > 0) {
                echo 1;
            } else {
                echo 0;
            }

        }

    }