<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;

class Detail extends Controller
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

        // recommend 查出除了 $id 外最新的四个
        $recommendWhere = [
            'hid' => ['<>', $id],
        ];

        try {
            
            $homeStay = Db::table('homestay')->where(['hid' => $id])->find();
            
            $recommend = Db::table('homestay')->where($recommendWhere)->order('hid', 'desc')->limit(0, 4)->field('hid, hthumb, hname, hprice, hrank, harea, hcity')->select();
            
        } catch (Exception $e) {
            
            return json([
                'code' => $this->code['error'],
                'status' => 'fail',
                'msg' => '服务器错误'
            ]);

        }


        return json([
            'code' => $this->code['success'],
            'status' => 'success',
            'data' => [
                'homeStay' => $homeStay,
                'recommend' => $recommend
            ],
        ]);
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
