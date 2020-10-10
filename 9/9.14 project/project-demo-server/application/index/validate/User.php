<?php

    namespace app\index\validate;

    use think\Validate;

    class User extends Validate {

        protected $rule = [
            'phone' => 'require|number|length:11',
            'password' => 'require|length:5,16',
        ];

        protected $message = [
            'phone.require' => '手机号为必填项',
            'phone.number' => '手机号应为数字',
            'phone.length' => '手机号长度应为11位',
            'password.require' => '密码为必填项',
            'password.length' => '密码长度应在5~16位之间',
        ];

        

    }