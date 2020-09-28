<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

    use think\JWT;

    /**
     * 1.获取token
     *  get
     *  post
     *  header
     * 2.解析token
     *  JWT::verrfy
     */
    function checkToken() {

        $get_token = request()->get('token');
        $post_token = request()->post('token');
        $header_token = request()->header('token');

        if($get_token) {

            $token = $get_token;

        } else if($post_token) {

            $token = $post_token;

        } else if($header_token) {

            $token = $header_token;

        } else {

            // 401代表授权失败
            json([
                'code' => 404,
                'status' => 'error',
                'msg' => 'token未定义'
            ], 401)->send();

            exit();

        }

        $result = JWT::verify($token, \config('jwtkey'));

        if(!$result) {

            json([
                'code' => 404,
                'status' => 'error',
                'msg' => 'token解析失败'
            ], 401)->send();

            exit();

        }

        request()->id = $result['id'];

        request()->username = $result['username'];

    }

    // 加密
    function encode($pass) {

        return crypt($pass, \config('salt'));

    }
