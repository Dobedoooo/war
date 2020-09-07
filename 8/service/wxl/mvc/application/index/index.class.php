<?php
//class index{
//function int(){
////$en=new engine();
////$en->settemplatedir(TPL_PATH);
////$en->setcompiledir(COMP_PATH);
////    $en->setcachedir(CACHE_PATH);
////    $en->cache=true;
//    $smarty=new Smarty();
//    $smarty->setTemplateDir(TPL_PATH);
//   $smarty->setCompileDir(COMP_PATH);
////数据库，关系型数据库、非关系型数据库 数据仓库（分布式数据库）
////php操作数据库   对象的方式访问
//    $db=new mysqli("localhost","root","123456","wui2006","3306");
//    if(mysqli_connect_error()){
//        die("数据库连接错误");
//    }
////    echo "<pre>";
////    var_dump($db);
//    $db->query("set names utf8");
////    $db->query("insert into demo(name,age,sex) value ('小刚',12,'man')");
////    $db->query("update demo set sex='man' where name='王五'");
////    $db->query("delete from demo where name='小刚'");
//
////    echo $db->affected_rows;
////    if($db->affected_rows>0){
////        echo "操作成功";
////    }
//
//    //结果集对象
//  $result=$db->query("select * from demo");
//  //关联数组
////   var_dump($result->fetch_assoc());
////    var_dump($result->fetch_assoc());
//    //   索引数组$result->fetch_row()；
//    //既有关联又有索引数组$result->fetch_array();
//
//    //对于数据库操作语言
//   // $db->affected_rows>0  操作记录
//   $data=array();
//   while($row=$result->fetch_assoc()){
//       $data[]=$row;
//   }
//
//
//    //$en->assgin("data",$arr);
////$en->display("index.html");
//$smarty->assign("data",$data);
//    $smarty->display("index.html");
//}
//
//function del(){
//    echo "删除";
//}
//}
if(!defined("MVC")){
    die("访问路径不合法");
}
class index{
    function int(){
        echo "qiantai";
    }
//    function int(){
//          $smarty=new Smarty();
//          $smarty->setTemplateDir(TPL_PATH);
//          $smarty->setCompileDir(COMP_PATH);
//          $smarty->setCacheDir(CACHE_PATH);
////        $en=new engin();
////        $en->setTemplateDir(TPL_PATH);
////        $en->setCompileDir(COMP_PATH);
////        $en->setCacheDir(CACHE_PATH);
////        $en->cache=true;
//
////        $arr=array(
////            array(
////                "name"=>"zhangsan",
////                "age"=>12,
////                "sex"=>"man",
////            ),
////            array(
////                "name"=>"lisi",
////                "age"=>12,
////                "sex"=>"man",
////            ),
////            array(
////                "name"=>"wangwu",
////                "age"=>12,
////                "sex"=>"man",
////            ),
////        );
//
//        //php操作数据库：过程化，废弃；对象的方式访问；pdo；
//        //连接数据库
//        $db=@new mysqli("localhost","root","123456","wuif2006","3308");
//        if(mysqli_connect_error()){
//            die("数据库连接错误");
//        }
//        //对数据库查询
//        $db->query("set names utf8");
//        $result=$db->query("select * from demo");
//
//        //将数据从结果里面取出来
//        $data=array();
//        while ($row=$result->fetch_assoc()){
//            $data[]=$row;
//        }
//
//        $smarty->assign("data",$data);
////        $en->assign("name","zhangsan");
////        $en->assign("age","12");
////        $en->assign("sex","man");
//        $smarty->display("index.html");
//    }
}