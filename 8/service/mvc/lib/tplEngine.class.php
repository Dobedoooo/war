<?php
    class engine {

        /**
         * 1.获取原始数据
         * 2.编译
         * 3.显示到页面
         * 4.分配变量
         */

        private $templateDir = 'template';
        private $compileDir = 'compile';
        private $cacheDir = 'cache';

        private $arr = array();

        // 设置模板路径
        public function setTemplateDir($path) {
            $this->templateDir = $path;
        }

        // 设置编译文件路径
        public function setCompileDir($path) {
            $this->compileDir = $path;
        }

        // 设置缓存文件路径
        public function setCache($path) {
            $this->cacheDir = $path;
        }

        // 获取原始页面数据
        private function getData($file) {
            // 目标文件地址
            $destFile = $this->templateDir.DIRECTORY_SEPARATOR.$file;

            if(is_file($destFile)) {
                return file_get_contents($destFile);
            } else {
                die('Template Not Found');
            }
        }

        // 编译
        private function compile($file) {
            $content = $this->getData($file);

            // 解析变量
            $reg = '/\{(\$[a-zA-Z][^\}]*)\}/';

            $var =  preg_replace_callback($reg, function($val) {
                return '<?php echo '.$val[1].' ?>';
            }, $content);

            // 解析循环头
            $reg2 = '/\{foreach([^\}]*)\}/';

            $loopHead = preg_replace_callback($reg2, function($val) {
                return '<?php foreach('.$val[1].') { ?>';
            }, $var);

            // 解析循环尾
            $reg3 = '/\{\/foreach\}/';

            $loopTail = preg_replace_callback($reg3, function($val) {
                return '<?php } ?>';
            }, $loopHead);

            // 解析条件头
            $reg4 = '//';
            
            $conditionTail = preg_replace_callback($reg4, function() {

            }, $loopTail);
        
            return $loopTail;
            
        }

        // 显示
        function display($file) {
            $result = $this->compile($file);

            // basename
            $output = $this->compileDir.basename($file, '.html').'.php';

            file_put_contents($output, $result);

            /**
             * $k = 'name';
             * $$k = $name;
             * 将数组中的索引设置为同名变量
             */
            foreach($this->arr as $k=>$v) {
                $$k = $v;
            }

            require_once $output;
        }

        // 分配变量
        function assign($attr, $val) {
            $this->arr[$attr] = $val;
        }
        
    }

