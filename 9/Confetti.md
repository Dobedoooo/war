- class声明的类中 static声明的方法只能由类调用，不会继承到实例上
- function声明的类中 原型中的方法由实例化后的对象调用，否则由类直接调用
- 三个点儿(...) 扩展运算符，放在形参上就是剩余参数
- Vue两大核心思想：组件化、数据驱动
- call() 改变指针并执行 bind()改变指针但不执行

#### Webpack 前端自动化工具

- 核心：入口、出口、loader、插件

### Vue

#### Vue CLI

- 创建Vue CLI的两种方式
  - 图形化界面 vue ui
  - 命令行 vue create project
- 步骤
  - 选择vue版本 2.x
  - 选择预设
    - babel ES6 -> ES5
    - TypeScript
    - PWA
    - VueRouter
    - VueX
    - CSS预处理器
    - 语法风格校验 ESLint
    - 测试（单元测试、端对端测试）

#### 开发步骤

- 插件
  - 引入 `import from `
  - 使用 `Vue.use()`
- 配置路由
  - 路由解决的问题
    1. 路由将和组件映射
    2. 指定匹配组件显示位置
  - 前端路由和后端路由最主要的区别--前端路由不发请求

#### 移动端

默认宽度980px



#### 将已有项目推送至远程仓库 10.6

```git
$ git remote add origin http://-----.git
$ git push -u origin master
```

#### 克隆远程仓库

```git
$ git clone http://------.git
```

#### watch

深层监听

deep: true

#### 定位

元素相对于开启了定位属性的父辈元素的padding区定位（border里面）

#### 10.7

public声明的变量或方法 类、子类、类的实例、子类的实例都可以访问

protected声明的 类、子类内部可以访问，类的实例、子类的实例不能访问

private 类的内部可以访问

**只要有表单就要有验证**

#### 用前台验证的原因

1. 单页面应用不发请求，后台验证没用
2. cookie和session不能跨域
3. 减轻服务器压力

#### 10.8

为什么用浮动而不用inline-block

- 为了让块级元素在一行无间隙的排列（inline-block元素之间会存在间隙）

文档流：浏览器默认的排版，块元素从上往下排列，行内和行内块从左往右排，遇到边界换行

#### 10.9

this指向（谁调用指向谁）

- 普通函数中的this指向window
- 事件处理程序中的this指向事件源
- 对象方法中的this指向调用该方法的对象

![Vuex](https://vuex.vuejs.org/vuex.png)

arr.indexOf(value) 比对的时候用的是 ===