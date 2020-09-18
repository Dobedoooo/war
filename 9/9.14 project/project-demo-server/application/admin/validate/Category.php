<?php

    namespace app\admin\validate;

    use think\Validate;

    class Category extends Validate {

        protected $rule = [
            'cname' => 'require|chsAlphaNum',
            'cdesc' => 'require|chsAlphaNum',
        ];

        protected $messages = [
            'cname.require' => '分类名称为必填项',
            'cname.chsAlphaNum' => '分类名称只能包含字母、数字或汉字',
            'cdesc.require' => '分类描述为必填项',
            'cdesc.chsAlphaNum' => '分类描述只能包含字母、数字或汉字',
        ];

    }