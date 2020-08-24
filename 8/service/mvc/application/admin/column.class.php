<?php

    if(!defined('MVC')) {
        die('非法访问');
    }

    use \lib\smarty;
    use \lib\db;

    class column {

        // 初始化数据库 模板引擎
        function __construct() {
            
            $smart = new smarty;

            $this->smarty = $smart->smarty;

            $database = new db;

            $this->db = $database->db;

            $this->db->query('set names utf8');

        }

        // 栏目信息
        function colInfo() {

            $str = '';

            $this->tree(0, $str);

            $this->smarty->assign('data', $str);

            $this->smarty->display('admin/colinfo.html');

        }

        // 递归组装表结构
        function tree($pid = 0, &$str, $i = 0) {

            $result = $this->db->query("select * from colm where pid = '$pid'");

            while($row = $result->fetch_assoc()) {
                $str.='
                    <tr>
                        <td>'.($i + 1).'</td>
                        <td>'.str_repeat('∟', $i).$row['name'].'</td>
                        <td>
                            <a href="javascript:;" cid="'.$row['id'].'" class="btn btn-default" id="subshow">添加子栏目</a>
                            <a href="javascript:;" cid="'.$row['id'].'" class="btn btn-danger" id="delCol">删除</a>
                            <a href="javascript:;" cid="'.$row['id'].'" class="btn btn-warning" id="modifylink">变更</a>
                        </td>
                    </tr>
                ';

                $this->tree($row['id'], $str, $i + 1);
            }

        }

        // 添加顶级栏目
        function addTopCol() {
            
            $name = $_GET['name'];

            $this->db->query("insert into colm (name, pid) values ('$name', 0)");

            if($this->db->affected_rows > 0) {

                $result = $this->db->query("select id from colm where name = '$name'");

                while($row = $result->fetch_assoc()) {

                    $id = $row['id'];

                }

                $data = array(
                    'id' => $id,
                    'name' => $name,
                );

                echo json_encode($data);
            } else {
                echo 0;
            }

        }

        function modifyCol() {

        }

        // 删除栏目
        function delCol() {

            $cid = $_GET['cid'];

            $this->db->query("delete from colm where id = '$cid'");

            if($this->db->affected_rows > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }

        // 验证栏目名重复
        function check() {

            $name = $_GET['name'];
            
            $result = $this->db->query("select * from colm where name = '$name'");

            if($result->num_rows > 0) {
                echo 'false';
            } else {
                echo 'true';
            }

        }

        // 获取栏目名
        function getName() {

            $cid = $_GET['cid'];

            $result = $this->db->query("select name from colm where id = '$cid'");

            while($row = $result->fetch_assoc()) {

                $name = $row['name'];

                echo json_encode($name);
            }
        }

        // 添加子栏目
        function addSub() {

            $name = $_GET['subname'];

            $belong = $_GET['belong'];

            $result = $this->db->query("select id from colm where name = '$belong'");

            $pid = $result->fetch_assoc()['id'];

            $this->db->query("insert into colm (name, pid) values ('$name', '$pid')");

            if($this->db->affected_rows > 0) {
                echo 1;
            } else {
                echo 0;
            }

        }
    }