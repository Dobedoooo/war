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

            $this->assembly($str);

            $this->smarty->assign('data', $str);

            $this->smarty->display('admin/colinfo.html');

        }

        // 递归组装表结构(需求不明确的情况下使用)
        // 逻辑改变，弃用
        function tree($pid = 0, &$str, $i = 0) {

            $result = $this->db->query("select * from colm where pid = '$pid'");

            while($row = $result->fetch_assoc()) {
                $str.='
                    <tr>
                        <td>'.($i + 1).'</td>
                        <td>'.str_repeat('∟', $i).$row['name'].'</td>
                        <td>
                            <a href="javascript:;" cid="'.$row['id'].'" class="btn btn-default subshow">添加子栏目</a>
                            <a href="javascript:;" cid="'.$row['id'].'" class="btn btn-danger delCol">删除</a>
                            <a href="javascript:;" cid="'.$row['id'].'" class="btn btn-warning modifylink">变更</a>
                        </td>
                    </tr>
                ';

                $this->tree($row['id'], $str, $i + 1);
            }

        }

        // 双层 while 组装(assembly)表结构（需求明确，栏目深度为2）
        function assembly(&$str) {

            $result = $this->db->query("select * from colm where pid = 0");

            while($row = $result->fetch_assoc()) {

                $visible = $row['isshow']==1?'可见':'不可见';

                $str.='
                    <tr>
                        <td>1</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$visible.'</td>
                        <td>'.$row['temp'].'</td>
                        <td>
                            <a href="javascript:;" cid="'.$row['id'].'" class="btn btn-default subshow">添加子栏目</a>
                            <a href="javascript:;" cid="'.$row['id'].'" class="btn btn-danger delCol">删除</a>
                            <a href="javascript:;" cid="'.$row['id'].'" class="btn btn-warning modifylink">详细信息</a>
                        </td>
                    </tr>
                ';

                $result_2 = $this->db->query('SELECT * FROM colm WHERE pid = '.$row['id']);

                while($row_2 = $result_2->fetch_assoc()) {
                    $visible_2 = $row_2['isshow']==1?'可见':'不可见';
                    $str.='
                    <tr>
                        <td>2</td>
                        <td>∟'.$row_2['name'].'</td>
                        <td>'.$visible_2.'</td>
                        <td>'.$row_2['temp'].'</td>
                        <td>
                            <a href="javascript:;" cid="'.$row_2['id'].'" class="btn btn-default subshow disabled">添加子栏目</a>
                            <a href="javascript:;" cid="'.$row_2['id'].'" class="btn btn-danger delCol">删除</a>
                            <a href="javascript:;" cid="'.$row_2['id'].'" class="btn btn-warning modifylink">详细信息</a>
                        </td>
                    </tr>
                ';
                }
            }
        }

        // 添加顶级栏目
        function addTopCol() {
            
            $name = $_GET['name'];

            $pid = $_GET['pid'];

            $isshow = $_GET['isshow'];

            $temp = $_GET['temp'];

            $desc = $_GET['desc'];

            $this->db->query("INSERT INTO colm (`name`, `pid`, `isshow`, `temp`, `desc`) VALUES ('$name', '$pid', '$isshow', '$temp', '$desc')");

            if($this->db->affected_rows > 0) {

                $str = '';

                $this->assembly($str);

                echo $str;
                
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

            mysqli_close($this->db);

        }


        // 获取栏目信息
        function getSuper() {

            $cid = $_GET['cid'];

            $result = $this->db->query("select * from colm where id = '$cid'");

            if($row = $result->fetch_assoc()) {

                $name = $row['name'];

                $pid = $row['pid'];
    
                $isshow = $row['isshow'];
    
                $temp = $row['temp'];
    
                $desc = $row['desc'];
    
                $info = array(
                    'name' => $name,
                    'isshow' => $isshow,
                    'temp' => $temp,
                    'desc' => $desc,
                );
    
                $super = array();
    
                if($pid != 0) {
    
                    $result_2 = $this->db->query("select id, name from colm where pid = 0");
    
                    while($row_2 = $result_2->fetch_assoc()) {
    
                        $super[] = $row_2;
    
                    }
    
                } else {
    
                    $super[] = 0;
    
                }
    
                $data = array('super'=>$super, 'info'=>$info);
    
                echo json_encode($data);

            } else {
                echo 0;
            }

            mysqli_close($this->db);

        }

        // 更新栏目
        function updateCol() {

            $cid = $_GET['mocid'];

            $name = $_GET['moname'];

            $pid = $_GET['super'];

            $isshow = $_GET['moisshow'];

            $temp = $_GET['motemp'];

            $desc = $_GET['modesc'];

            $this->db->query("update colm set `name` = '$name', `pid` = '$pid', `isshow` = '$isshow', `temp` = '$temp', `desc` = '$desc' where id = '$cid'");

            if($this->db->affected_rows > 0) {

                $str = '';

                $this->assembly($str);

                echo $str;

            } else {
                echo 0;
            }

        }
    }