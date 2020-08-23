<?php
    namespace lib;

    class smarty {

        function __construct() {

            global $config;

            $templateDir = isset($config['smarty']['templateDir'])?$config['smarty']['templateDir']:'template';

            $compileDir = isset($config['smarty']['compileDir'])?$config['smarty']['compileDir']:'compile';

            $cacheDir = isset($config['smarty']['cacheDir'])?$config['smarty']['cacheDir']:'cache';

            // 调用全局的类
            $smart = new \Smarty;

            $smart->setTemplateDir($templateDir);

            $smart->setCompileDir($compileDir);

            $smart->setCompileDir($cacheDir);

            $this->smarty = $smart;

        }

        // function assign($attr, $val) {
        //     $this->smarty->assign($attr, $val);
        // }

        // function display($file) {
        //     $this->smarty->display($file);
        // }
    }