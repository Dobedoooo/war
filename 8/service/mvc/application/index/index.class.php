<?php
    class index {
        function undyne() {

            // echo '你访问到了缺省功能';

            $engine = new engine();

            $engine->setTemplateDir(TEMPLATE_PATH);

            $engine->setCompileDir(COMPILE_PATH);

            // $smarty = new smarty;

            // $smarty->setTemplateDir(TEMPLATE_PATH);

            // $smarty->setCompileDir(COMPILE_PATH);

            $arr = array(
                array(
                    'name'=>'zhangsan',
                    'age'=>12,
                    'gender'=>'female',
                ),
                array(
                    'name'=>'lisi',
                    'age'=>12,
                    'gender'=>'male',
                ),
                array(
                    'name'=>'wangwu',
                    'age'=>12,
                    'gender'=>'male',
                ),
                array(
                    'name'=>'zhaoliu',
                    'age'=>12,
                    'gender'=>'male',
                ),
                array(
                    'name'=>'zhaoliu',
                    'age'=>12,
                    'gender'=>'male',
                ),
                
            );

            $engine->assign('data', $arr);
            // $smarty->assign('data', $arr);

            $engine->display('index.html');
            // $smarty->display('index.html');
        }
    }
?>