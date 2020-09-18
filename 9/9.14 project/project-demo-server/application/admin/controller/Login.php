<?php

    namespace app\admin\controller;

    use think\Controller;
    use think\Db;
    use think\JWT;

    class Login extends Controller {

        /**
         * 1.验证权限
         * 2.验证请求方式
         * 3.接收前台数据
         * 4.前台数据验证
         * 5.业务逻辑
         */
        public function index() {

            // 验证请求方式
            $method = $this->request->method();

            if($method != 'POST') {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => '请求方式错误'
                ]);

            }

            // 接收前台数据
            $data = $this->request->post();

            // 验证
            $validate = \validate('Login');

            $flag = $validate->check($data);

            if(!$flag) {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => $validate->getError()
                ]);

            }

            // 业务逻辑
            $where = ['username' => $data['username']];
            
            // 取一条记录
            $user = Db::table('user')->where($where)->find();

            // 记录为空返回用户不存在
            if($user) {

                // 验证是否是管理员
                if(!$user['isAdmin']) {

                    return json([
                        'code' => 404,
                        'status' => 'error',
                        'msg' => '抱歉，您不是管理员'
                    ]);

                }

                // 将前台密码加密与数据库对应密码比对
                $password = crypt($data['password'], \config('salt'));

                // 比对失败返回密码错误
                if($password == $user['password']) {

                    // 比对成功将用户信息存入token 并返回
                    $payload = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        // 头像 在token里没用 在 :73 使用
                        'avatar' => $user['avatar']
                    ];

                    $token = JWT::getToken($payload, \config('jwtkey'));

                    // 由于token是加密的 所以将未加密的payload返回
                    return json([
                        'code' => 200,
                        'msg' => '登录成功',
                        'status' => 'success',
                        'token' => $token,
                        'user' => $payload,
                    ]);

                } else {

                    return json([
                        'code' => 404,
                        'status' => 'error',
                        'msg' => '密码错误'
                    ]);

                }

            } else {

                return json([
                    'code' => 404,
                    'status' => 'error',
                    'msg' => '用户不存在'
                ]);

            }

        }

    }