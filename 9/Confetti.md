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