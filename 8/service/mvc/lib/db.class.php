<?php
    namespace lib;

    if(!defined('MVC')) {
        die('访问路径不合法');
    }

    class db {

        public $db;

        function __construct() {

            global $config;

            $host = isset($config['database']['host'])?$config['database']['host']:'localhost';
            
            $username = isset($config['database']['username'])?$config['database']['username']:'root';

            $password = isset($config['database']['password'])?$config['database']['password']:'';

            $dbname = isset($config['database']['dbname'])?$config['database']['dbname']:'';

            $port = isset($config['database']['port'])?$config['database']['port']:'3306';

            $database = @new \mysqli($host, $username, $password, $dbname, $port);

            if(mysqli_connect_errno()) {
                die('数据库连接错误');
            }

            $this->db = $database;
        }

        // function query($sql) {
        //     $this->db->
        // }

        function close() {
            mysqli_close($this->db);
        }
    }