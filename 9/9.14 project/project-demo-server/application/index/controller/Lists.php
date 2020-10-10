<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;

class Lists extends Controller
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
        // 
        $data = $this->request->get();

        $page = isset($data['page']) && !empty($data['page'])?$data['page']:1;

        $limit = isset($data['limit']) && !empty($data['limit'])?$data['limit']:\config('paginate.list_rows');

        // 搜索条件
        $where = [];

        if(isset($data['hname']) && !empty($data['hname'])) {

            $where['hanme'] = ['like', '%'.$data['hname'].'%'];

        }

        if(isset($data['hcity']) && !empty($data['hcity'])) {

            $where['hcity'] = ['like', '%'.$data['hcity'].'%'];

        }

        $orderField = 'hid';

        if(isset($data['field']) && !empty($data['field'])) {

            $orderField = $data['field'];

        }

        $orderType = 'desc';

        if(isset($data['type']) && !empty($data['type'])) {

            $orderType = $data['type'];

        }

        $result = Db::table('homestay')->field('hid, hthumb, hname, hprice, hrank, harea, hcity')->where($where)->order($orderField, $orderType)->paginate($limit, false, [
            'page' => $page
        ]);

        if($result) {

            return json([
                'code' => $this->code['success'],
                'status' => 'success',
                'total' => $result->total(),
                'items' => $result->items(),
            ]);

        } else {

            return json([
                'code' => $this->code['error'],
                'status' => 'fail',
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
