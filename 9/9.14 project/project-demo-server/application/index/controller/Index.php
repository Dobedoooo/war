<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller {

    // web应用开发 api开发（只处理逻辑，前后端分离）
    public function index() {
        
        $pass = crypt('admin', \config('salt'));

        return json([
            'code' => 200,
            'pass' => $pass
        ]);

    }

    public function lists() {
        
        // find() 获取一条 select() 获取全部
        $result = Db::table('student')->select();

        $data = array('name' => 'zhangsan', 'age' => 20);

        $skill = ['html', 'css', 'js'];

        $this->assign('skill', $skill);

        $this->assign('person', $data);

        $this->assign('students', $result);

        return $this->fetch();

    }
}
