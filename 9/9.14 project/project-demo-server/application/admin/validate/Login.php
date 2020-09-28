<?php

    namespace app\admin\validate;

    use think\Validate;

    class Login extends Validate {

        protected $rule = [
            'username' => 'require',
            'password' => 'require|length:5,16',
            'oldpass' => 'require|length:5,16',
            'newpass' => 'require|different:oldpass|length:5,16',
            'confirm' => 'require|confirm:newpass'
        ];

        protected $message = [
            'username' => '用户名为必填项',
            'password.require' => '密码为必填项',
            'password.length' => '密码长度应在5~16位之间',
            'oldpass.require' => '原密码为必填项',
            'oldpass.length' => '原密码格式错误',
            'newpass.require' => '新密码为必填项',
            'newpass.length' => '新密码长度应在5~16位之间',
            'newpass.different' => '新密码不能与原密码重复',
            'confirm.require' => '请再次输入密码',
            'confirm.confirm' => '两次密码输入不一致',
        ];

        protected $scene = [
            'login' => ['username', 'password'],
            'changePass' => ['oldpass', 'newpass', 'confirm']
        ];

    }