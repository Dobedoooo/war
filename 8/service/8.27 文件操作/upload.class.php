<?php

    // namespace up;

    class upload {

        // 定义属性 在外部可修改的
        // 文件大小 默认5M
        public $fileSize = 5242880;
        // 文件类型
        public $fileType = array(
            'image/png',
            'image/jpeg',
            'image/gif',
        );
        // 上传文件的表单名
        public $fileName = 'file';
        // 目录
        public $defaultDir = 'upload';

        public $path = '';

        function __construct() {

            // 上传文件的服务器和项目服务器不是同一个
            // ini_set();

        }

        // 取数据
        private function fetch() {

            $this->data = $_FILES[$this->fileName];

        }
        
        // 数据检验
        private function check() {

            if(is_uploaded_file($this->data['tmp_name'])) {

                if($this->data['size'] < $this->fileSize) {

                    if(in_array($this->data['type'], $this->fileType)) {

                        return true;

                    } else {

                        echo '文件类型错误';

                        return false;
                    
                    }


                } else {

                    echo '文件过大';

                    return false;
                }

            } else {

                echo '文件不合法';

                return flase;

            }

        }

        // 创建文件夹，用于放入上传的文件
        private function createDir() {

            if(!is_dir($this->defaultDir)) {

                mkdir($this->defaultDir, 0777, true);

            }

            $currentDir = $this->defaultDir.DIRECTORY_SEPARATOR.date('Y-m-d');

            if(!is_dir($currentDir)) {

                mkdir($currentDir, 0777, true);

            }

            $filename = time().mt_rand(1000, 20000).'-'.$this->data['name'];

            $this->path = $currentDir.DIRECTORY_SEPARATOR.$filename;

        }

        // 移动到指定的目录
        private function move() {

            move_uploaded_file($this->data['tmp_name'], $this->path);

        }

        function up() {
            // 接收
            $this->fetch();
            // 检验
            if($this->check()) {
                // 创建文件夹
                $this->createDir();
                // 移动
                $this->move();

                return $this->path;

            };

        }

    }
