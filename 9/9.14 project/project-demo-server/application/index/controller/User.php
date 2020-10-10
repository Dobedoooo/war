<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
// use think\Db;

class User extends Controller
{

    public $code;

    public function __construct(Request $request = null) {

        parent::__construct($request);

        $this->code = config('code');

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
     * 注册
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        /**
         * 不用验证请求方式
         */ 

        $data = $this->request->post();

        // 验证
        $validate = \validate('User');

        $isValid = $validate->check($data);

        if($isValid) {

            // phone 是否重复
            $where = ['phone' => $data['phone']];

            $model = model('User');

            $isRepeat = $model->queryOne($where);

            if(!$isRepeat) {

                $data['password'] = \encode($data['password']);
                $data['nickname'] = '用户_'.time();
                $data['create_time'] = time();
                $data['update_time'] = time();
        
                $result = $model->add($data);

                if($result) {

                    return json([
                        'code' => $this->code['success'],
                        'msg' => '注册成功',
                    ]);

                }

            } else {

                return json([
                    'code' => $this->code['error'],
                    'msg' => '手机号重复',
                ]);

            }

        } else {

            return json([
                'code' => $this->code['error'],
                'msg' => $validate->getError(),
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
