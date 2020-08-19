<?php
    header('content-type:text/html;charset=utf-8');
    /**
     * 
     */
    class phone{
        // 属性
        // public $name = 'phone';
        // private $name = 'phone';
        protected $name = 'phone';

        // 方法
        function call() {
            echo '打电话';
        }

        // 构造方法 生命周期函数
        function __construct() {
            $this->start = '父类开始';
            echo '构造方法<br>';
        }

        // 析构方法
        function __destruct() {
            echo '<br>析构方法';
        }

        // getter
        // function getName() {
        //     return $this->name;
        // }
        // 默认调用
        // function __get($name) {
        //     // echo '这是私有的，不能访问';
        //     return $this->name;
        // }

        // setter
        // 默认调用
        function __set($name, $value) {
            $this->name = $value;
        }
    }

    // $iphone = new phone();
    // echo $iphone->getName();
    // echo $iphone->name;

    // $iphone->name = 'huawei';
    // echo $iphone->name;

    // $iphone->call();

    // 访问控制
    /**
     * public 
     * private 
     * protected 能在子类中使用
     */ 

    // 继承
    /**
     * 子类构造函数会覆盖父类的构造函数
     */
    // class iphone extends phone {
    //     private $name = 'iphone';

    //     function takePhoto() {
    //         echo $this->name.'照相';
    //     }

    //     function __construct() {
    //         // 子类构造函数调用父类构造函数
    //         // parent::__construct();

    //         echo $this->start;
    //     }
    // }

    // $iphone = new iphone();

    // $iphone->takePhoto();

    // 静态变量
    class person {
        static $name = 'zhangsan';

        function say() {
            // 内部访问静态变量
            self::$name;
        }

    }

    echo person::$name;
?>