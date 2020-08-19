<?php

    // 接口
    interface person {
        function say();
    }

    class stu implements person {

    }

    // 抽象类
    /**
     * 包含抽象方法的类 不能实例化
     * 子类必须实现父类的抽象类 
     */
    abstract class phone {
        abstract function call();
    }