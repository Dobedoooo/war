<?php

    namespace app\common\model;

    use think\Model;

    class User extends Model {

        protected $table = 'hotel_user';

        protected $autoWriteTimestamp = true;

        public function add($data) {

            // allowFiled 删除非数据库表字段
            return $this->allowField(true)->save($data);

        }

        public function queryOne($where) {

            return $this->where($where)->find();

        }

    }