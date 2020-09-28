<?php

    namespace app\admin\controller;

    use think\Controller;
    use think\Db;

    class Category extends Controller {

        public function _initialize() {

            parent::_initialize();

            \checkToken();

        }

        /**
         * 1.验证权限
         * 2.验证请求方式
         * 3.接收前台数据
         * 4.前台数据验证
         * 5.业务逻辑
         */
        // 添加分类
        public function add() {
            // 权限验证 token

            // 验证请求方式
            if(!$this->request->isPost()) {

                return json([
                    'code' => '404',
                    'status' => 'error',
                    'msg' => '请求方式错误'
                ]);

            }

            // 接收前端数据
            $data = $this->request->post();
            
            // 验证
            $validate = \validate('Category');
            
            $flag = $validate->check($data);

            if(!$flag) {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => $validate->getError()
                ]);

            }

            // 业务逻辑
            $result = Db::table('category')->insert($data);
            // result == (int)1

            if($result) {

                return json([
                   'code' => 200,
                   'status' => 'success',
                   'msg' => '分类添加成功' 
                ]);

            } else {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => '分类添加失败'
                ]);

            }
        }

        /**
         * 查看数据、分页、搜索
         * 前台：查看符合指定条件的某一页若干条数据
         * 后台：返回当前页数据、数据总数
         */
        // 查
        public function index() {

            $data = $this->request->get();

            $page = isset($data['page'])&&!empty($data['page'])?$data['page']:1;

            $limit = isset($data['limit'])&&!empty($data['limit'])?$data['limit']:10;

            $where = [];

            if(isset($data['cname']) && !empty($data['cname'])) {

                $where['cname'] = ['like', '%'.$data['cname'].'%'];

            }

            $category = Db::table('category')->field('cid, cname, cdesc')->where($where)->limit($limit)->page($page)->select();

            $count = Db::table('category')->where($where)->count();

            return json([
                'code' => 200,
                'status' => 'success',
                'data' => [
                    'categories' => $category,
                    'count' => $count
                ]
            ]);
        }

        // 删
        public function delete() {

            // 验证请求方式
            if(!$this->request->isGet()) {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => '请求方式错误'
                ]);

            }

            $cid = $this->request->param()['cid'];

            $result = Db::table('category')->where('cid', $cid)->delete();

            if($result) {

                return json([
                    'code' => 200,
                    'status' => 'success',
                    'msg' => '删除分类成功'
                ]);

            } else {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => '删除分类失败',
                ]);

            }

        }

        // 改
        public function update() {
            
            // 验证请求方式
            if(!$this->request->isGet()) {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => '请求方式错误'
                ]);

            }

            $category = $this->request->param();

            $result = Db::table('category')->where('cid', $category['cid'])->update([
                'cname' => $category['cname'],
                'cdesc' => $category['cdesc']
            ]);

            if($result) {

                return json([
                    'code' => 200,
                    'status' => 'success',
                    'msg' => '变更成功'
                ]);

            } else {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => '变更失败'
                ]);

            }

        }

        // 查询分类名
        public function getCname() {

            if(!$this->request->isGet()) {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => '请求方式错误'
                ]);

            }

            $result = Db::table('category')->field('cid, cname')->select();

            if($result) {

                return json([
                    'code' => 200,
                    'status' => 'success',
                    'msg' => '查询成功',
                    'data' => $result
                ]);

            } else {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => '未知错误',
                ]);

            }

        }
    }