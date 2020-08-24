<?php
    namespace lib;

    if(!defined('MVC')) {
        die('访问路径不合法');
    }

    class verify {

        function __construct() {

            global $config;

            $this->type = isset($config['verify']['type'])?$config['verify']['type']:'png';

            $this->width = isset($config['verify']['width'])?$config['verify']['width']:160;

            $this->height = isset($config['verify']['height'])?$config['verify']['height']:50;

            $this->num = isset($config['verify']['num'])?$config['verify']['num']:4;

            $this->seed = isset($config['verify']['seed'])?$config['verify']['seed']:'abcdefhjkmnprstuvwxyzABCDEFGHIJKMLNOPQRSTUVWXYZ345678';

            $this->fontSize = isset($config['verify']['fontSize'])?$config['verify']['fontSize']:array('min'=>20, 'max'=>35);

            $this->fontAngle = isset($config['verify']['fontAngle'])?$config['verify']['fontAngle']:array('min'=>-15, 'max'=>15);

            $this->lineNum = isset($config['verify']['lineNum'])?$config['verify']['lineNum']:array('min'=>2, 'max'=>6);

            $this->pixelNum = isset($config['verify']['pixelNum'])?$config['verify']['pixelNum']:array('min'=>20, 'max'=>60);

            $this->fontFile = isset($config['verify']['fontFile'])?$config['verify']['fontFile']:'D:\fullstack\8\service\mvc\application\static\font\SanFranciscoDisplay-Regular-2.ttf';

        }

        private function createCanvas() {

            $this->image = imagecreatetruecolor($this->width, $this->height);

            \imagefill($this->image, 0, 0, $this->setColor());
        }

        private function setColor($type = 'background') {

            $r = $type=='background'?mt_rand(0, 125):mt_rand(126, 255);

            $g = $type=='background'?mt_rand(0, 125):mt_rand(126, 255);

            $b = $type=='background'?mt_rand(0, 125):mt_rand(126, 255);

            return \imagecolorallocate($this->image, $r, $g, $b);
        }

        private function getText() {
            $str = '';

            for ($i=0; $i < $this->num; $i++) { 
                $str.=$this->seed[mt_rand(0, \strlen($this->seed) - 1)];
            }

            return $str;
        }

        private function setText() {

            $str = $this->getText();

            $this->str = strtolower($str);

            for ($i=0; $i < $this->num; $i++) { 

                $size = mt_rand($this->fontSize['min'], $this->fontSize['max']);

                $angle = mt_rand($this->fontAngle['min'], $this->fontAngle['max']);

                \imagettftext($this->image, $size, $angle, (1 + $i) / 5 * $this->width, 2 / 3 * $this->height, $this->setColor('text'), $this->fontFile, $str[$i]);
            }
            
        }

        private function setLine() {

            $num = mt_rand($this->lineNum['min'], $this->lineNum['max']);

            for ($i=0; $i < $num; $i++) { 

                $x1 = mt_rand(0, $this->width / 3);

                $y1 = mt_rand(0, $this->height);

                $x2 = mt_rand($this->width / 2, $this->width);

                $y2 = mt_rand(0, $this->height);

                \imageline($this->image, $x1, $y1, $x2, $y2, $this->setColor('line'));
            }

        }

        private function setPixel() {

            $num = mt_rand($this->pixelNum['min'], $this->pixelNum['max']);

            for ($i=0; $i < $num; $i++) { 

                \imagesetpixel($this->image, mt_rand(0, $this->width), mt_rand(0, $this->height), $this->setColor('pixel'));

            }
        }

        function out() {

            \header('content-type:image/'.$this->type);

            // 创建画布
            $this->createCanvas();

            // 输出类型
            $outType = 'image'.$this->type;

            // 填充文字
            $this->setText();

            // 线条
            $this->setLine();

            // 像素点
            $this->setPixel();

            // 输出
            $outType($this->image);

            // 销毁
            \imagedestroy($this->image);
        }
    }