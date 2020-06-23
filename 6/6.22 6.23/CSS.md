# CSS基础

## CSS概念

**层叠样式表**(Cascading Style Sheets，缩写为**CSS**)，是一种

## CSS创建

- 文本文档后缀名设置为 .css
- 通过文本编辑器直接创建

## CSS打开

- css的运行是基于HTML的，一般只需要在HTML文件中引入或者嵌入css代码，在浏览器中打开HTML，浏览器就会自动解析识别css代码

## CSS编写

- css引入方式

  - 外部引入

    ```html
    <linK rel="stylesheet" href="./css/index.css">
    ```

  - 页面内部嵌入

    ```html
    <style>
        div{
            
        }
    </style>
    ```

  - 标签内部设置行内/内联样式

    ```html
    <div style="color: red;">
        hello world
    </div>
    ```

  - 从css代码中导入

    ```html
    @import url(base.css);
    ```

    

- css选择器

  > 选择当前样式规则要控制的标签

  - 格式

  - 选择器分类

    - 元素选择器

      ```css
      div{
          
      }
      ```

    - 类选择器

      ```html
      <style>
          .box1 {
              
          }
      </style>
      <div class="box1 box2"></div>
      ```

    - id选择器

      ```html
      <style>
          #one {
              
          }
      </style>
      <div id="one"></div>
      ```
      
    - 交叉选择器
    
      ```css
      div.box#ele {/*不隔开*/
          
      }
      ```
    
    - 选择器分组
    
      ```css
      .box1, .box2, .box3 {/*逗号隔开选择器*/
          
      }
      ```
    
    - 后代选择器
    
      ```css
      ul li {/*空格隔开选择器*/
          
      }
      ```
    
  - 层叠性

    - 多个选择器是可以同时对一个元素进行样式控制的

  - 优先级

    > 层叠性可能会造成样式冲突

    - id选择器 > 类选择器 > 元素选择器
    - 选的越精确，优先级越高
    - 选择器组合使用比单独使用优先级高

- css样式

  - 格式 样式名: 样式值;

  - 文字样式

    - color 前景色
    
      ```css
      color: #bfa;
      /*
      color属性值：
      		颜色名 red blue
      		十六进制 #000000
      		数值 rgb(0~255, 0~255, 0~255)
      		    rgba(0~255, 0~255, 0~255,0~1) 透明度
      */
      ```
      
    - font 
    
      ```css
      font: [font-weight] [font-style] font-size [/line-height] font-family;
      /*字重
      	normal 默认 不加粗
      	bold 加粗
      	100 ~ 900 九个级别
      */
      font-weight: bold;
      /*字体风格
      	normal 默认
      	italic 斜体
      	oblique 倾斜体
      */
      font-style: italic;
      /*字体大小*/
      font-size: 12px;
      /*文本修饰
      	underline 上划线
      	line-through 删除线
      	overline 下划线*/
      text-decoration: underline;
      /*水平对齐方式
      	center 居中
      	left 左对齐
       	right 右对齐
      */
      text-align: center;
      /*可以将行高设置为和父元素高度一样的值，使单行文字在一个元素内垂直居中*/
      line-height: ;
      ```
    
  - 布局样式

    - width 宽度

    - height 高度

    - border 边框

      ```css
      /*属性值
      	数值
    		百分比 相对于父元素
      	auto 自适应父元素的宽度（宽度 加 边框 加 内边距 等于 容器的宽度）*/
      width: 100px;
      /*属性值
      	数值
      	百分比 相对于父元素
      	auto 高度被子元素撑开*/
      height: 200px;
      /*不同方向边框样式*/
      border-top: 1px red solid;
      border-right: ;
      border-bottom: ;
      border-left: ;
      /*边框宽度*/
      border-width: ;
      border-top-width: ;
      border-right-width: ;
      border-bottom-width: ;
      border-left-width: ;
      /*边框颜色*/
      border-color: ;
      border-top-color: ;
      border-right-color: ;
      border-bottom-color: ;
      border-left-color: ;
      border: 1px red solid;
      ```
      
    - margin 外边距

      ```css
      /*上 右 下 左*/
      margin: 0 0 0 0;
      /*上 左右 下*/
      margin: 0 0 0;
      /*上下 左右*/
      margin: 0 0;
      /*同时设定*/
      margin: 0;
      margin-top: ;
      margin-right: ;
      margin-bottom: ;
      margin-left: ;
      /*margin的top和bottom属性对非替换内联元素无效，例如<span>和<code>*/
      /*容器自动居中*/
      margin: 0 auto;
      /*不仅可以用于兄弟元素之间，也可以用于子元素与父元素之间*/
      ```

    - padding 内边距

      ```css
      /*只用于父元素和子元素/文本之间，只设置给父元素*/
      padding: ;
      padding-top: ;
      padding-right: ;
      padding-bottom: ;
      padding-left: ;
      ```

    - float 浮动

      ```css
      /*用来让多个块元素在一行显示
      	设置了浮动的元素会脱离文档流，依次向左/右排列
      	浮动元素是受到父元素限制的
      	如果当前容器的宽度不足以防止全部的浮动元素，会换行显示
      	内联元素/行内块元素设置浮动后会具备块元素的特性，可以设置宽高、不再识别标签间空格
      	浮动元素不会把没有设置高度或高度为auto的父元素撑开
      		解决：
      			给父元素设置高度
      			父元素添加元素设置属性 clear: both;
      	属性值
      		right
      		left
      */
      float: left;
      ```

    - background-color 背景颜色

      ```css
      background-color: red;
      ```

      

  - 所有的文本样式都具有继承性 继承样式的优先级比默认样式的优先级低

    - 除了文字样式以外的样式

  - 所有的css属性并不是在每种标签中都通用的，可以通过inherit实现继承效果

    - width height text-align 在内联元素中是不起作用的

- css注释

  ```css
  /* 
  
  */
  ```

- margin-top bug 