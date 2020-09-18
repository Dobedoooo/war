<?php

    namespace app\admin\validate;

    use think\Validate;

    class Login extends Validate {

        protected $rule = [
            'username' => 'require',
            'password' => 'require'
        ];

        protected $messages = [
            'username' => '用户名为必填项',
            'password' => '密码为必填项',
        ];

    }