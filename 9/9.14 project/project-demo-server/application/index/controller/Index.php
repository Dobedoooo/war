<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;

class Index extends Controller
{

    public $code;

    public function __construct(Request $request = null) {

        parent::__construct($request);

        $this->code = \config('code');

    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        // 轮播图
        $banner = Db::table('homestay')->field('hid,hname,hdesc')->order('hid', 'desc')->select();

        // 分类
        $cate = Db::table('category')->field('cid,cname,cdesc')->order('cid', 'desc')->select();

        return json([
            'code' => $this->code['success'],
            'banner' => $banner,
            'category' => $cate,
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
