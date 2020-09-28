<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;

class Homestay extends Controller
{

    public $code;
    public $validate;

    // 构造方法
    public function __construct(Request $request = null) {

        parent::__construct($request);
        $this->code = \config('code');
        // $this->validate = \validate('Homestay');

    }

    public function _initialize() {

        parent::_initialize();

        \checkToken();

    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        // 接收数据
        $data = $this->request->get();

        $page = isset($data['page'])&&!empty($data['page'])?$data['page']:1;

        $limit = isset($data['limit'])&&!empty($data['limit'])?$data['limit']:\config('limit');

        $where = [];

        if(isset($data['hname']) && !empty($data['hname'])) {

            $where['hname'] = $data['hname'];

        } 

        if(isset($data['hcity']) && !empty($data['hcity'])) {

            $where['hcity'] = $data['hcity'];

        }

        if(isset($data['cid']) && !empty($data['cid'])) {

            $where['homestay.cid'] = $data['cid'];

        }

        $result = Db::view('homestay', 'hid, hname, htime, hprice, hcity, harea, haddr, htag, hrank, hprovince, cid, hstatus')
                    ->view('category', 'cname', 'category.cid=homestay.cid')
                    ->where($where)
                    ->paginate($limit, false, [
                        'page' => $page,
                    ]);

        if($result) {

            return json([
                'code' => $this->code['success'],
                'status' => 'success',
                'msg' => '查询成功',
                'data' => $result->items(),
                'count' => $result->total(),
            ]);

        } else {

            return json([
                'code' => $this->code['success'],
                'status' => 'success',
                'msg' => '查询失败'
            ]);

        }


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
        // 接收数据
        $data = $this->request->post();

        // 校验
        // $this->validate->sence()->check($data);

        $hname = $data['hname'];

        $count = Db::table('homestay')->where(['hname' => $hname])->count();

        if($count) {

            return json([
                'code' => $this->code['error'],
                'status' => 'error',
                'msg' => '该民宿名称已被注册'
            ]);

        }

        $data['htime'] = \time();

        $result = Db::table('homestay')->insert($data);

        if($result) {

            return json([
                'code' => $this->code['success'],
                'status' => 'success',
                'msg' => '添加成功'
            ]);

        } else {

            return json([
                'code' => $this->code['error'],
                'status' => 'error',
                'msg' => '添加失败'
            ]);

        }

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
        $result = Db::table('homestay')->where('hid', $id)->find();

        if($result) {

            return \json([
                'code' => $this->code['success'],
                'status' => 'success',
                'msg' => '获取成功',
                'data' => $result
            ]);

        } else {

            return \json([
                'code' => $this->code['error'],
                'status' => 'error',
                'msg' => '获取失败'
            ]);

        }

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
        $result = Db::table('homestay')->where('hid', $id)->delete();

        if($result) {

            return json([
                'code' => $this->code['success'],
                'status' => 'success',
                'msg' => '删除成功'
            ]);

        } else {

            return json([
                'code' => $this->code['error'],
                'status' => 'error',
                'msg' => '删除失败'
            ]);

        }
        
    }
}
