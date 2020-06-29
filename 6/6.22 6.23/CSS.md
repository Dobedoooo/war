# CSS基础

## CSS概念

**层叠样式表**(Cascading Style Sheets，缩写为**CSS**)，是一种样式表语言，用来描述HTML文档的呈现。CSS描述了在屏幕、纸质、音频等其他媒体上的元素应该如何被渲染的问题。

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

  - 格式 选择器 {样式}

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
      /* 边框圆角CSS3 */
      border-radius: ;
      border-top-left-radius: ;
      border-top-right-radius: ;
      border-bottom-left-radius: ;
      border-bottom-right-radius: ;
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
      			给父元素设置overflow: hidden;
      	属性值
      		right
      		left
      */
      float: left;
      ```

    - background 背景属性

      ```css
      /* 背景颜色 */
      background-color: red;
    /* 背景图片 */
      background-image: url();
      /* 背景图片重复方式
      	repeat 默认值 全部重复
      	no-repeat 不重复
      	repeat-x 在x轴重复
      	repeat-y 在y轴重复
      */
      background-repeat: ;
      /* 背景图片位置
      	left right top bottom center两两组合可以确定九个位置，如果只设置一个值，另一个值默认为center
      	水平偏移数值 垂直偏移数值
      	水平偏移百分比 垂直偏百分比
      */
      background-position: ;
      /* background-attachment
      	设置当前背景图片是否要固定到窗口的某个位置
      */、
      background-attachment： ；
      /* 所有的属性都可以整合到background属性中 */
      ```
      
    - opacity 不透明度

      ```css
      /* 0 ~ 1
      	元素内部的子元素和文本也会继承不透明度
      */
      opacity: ;
      ```

    - overflow

      ```css
      /* 处理超出容器范围后的显示效果
      	visible 始终可见
      	hidden 超出后隐藏
      	scroll 超出后出现滚动条（ie始终显示滚动条）
      	auto 超出后出现滚动条，不超出时不出现
      */
      overflow: ;
      /* 单独控制不同方向的overflow属性 */
      overflow-x: ;
      overflow-y: ;
      ```

    - display

      ```css
      /* 转换元素的特性
      	block
      	inline
      	inline-block
      	none
      */
    display: ;
      ```
      
    - table 相关

      ```css
      /* border-collapse用来设置表格的边框和单元格的边框的重合方式
      	separate 默认值 每个单元格拥有独立的边框
      	collapse 共享边框
      */
      border-collapse: ;
      /* table-layout定义了用于布局表格单元格，行和列的算法
      	auto 默认值 内容撑开
      	fixed 固定值
      */
      table-layout: ;
      ```

    - position 定位

      ```css
      /* position用于指定一个元素在文档中的定位方式。top，right，bottom 和 left 属性则决定了该元素的最终位置。
      	static 默认值
      	relative 相对定位
      		1.元素开启相对定位以后，如果不设置偏移量(offset)元素不会发生任何变化
              2.相对定位是相对于元素自身在文档流中的位置进行定位（它原来的位置）
              3.相对定位会提升元素的层级（覆盖其他元素）
              4. 相对定位不会是元素脱离文档流，不会改变元素性质（块、内联）
      	absolute 绝对定位
      		1.不设置偏移量，元素位置不会发生变化（注意：只是位置不变，其他元素会视他不见）
              2.开启绝对定位后，元素会从文档流中脱离
              3.绝对定位会改变元素的性质，行内变成块，块的宽高被内容撑开(没有设置宽高时)
              4.绝对定位会使元素提升一个层级
              5.绝对定位元素是相对于其包含块进行定位的
      		包含块(containing block)
              	正常情况下：
                  	包含块是离当前元素最近的祖先 块 元素
                  绝对定位的包含块：
                  	离该元素最近的开启了定位(position不是static)的祖先元素
                      如果所有祖先元素都没有开启定位，则根据根元素<html></html>进行定位,根元素就是他的包含块
      			html(根元素，初始包含块)
      	fixed 固定定位
      		固定定位也是一种绝对定位，大部分特点都和绝对定位一样
              不同的是固定定位永远参照于浏览器的视口进行定位
      */
      positon: ;
      /* z-index开启了定位的元素可以使用
      	*/
      z-index: ;
      ```

      - 使用场合
        - 如果需要某个元素相对于窗口固定，固定定位
        - 某个元素有多个子元素需要重叠显示，绝对定位 + 相对定位
        - 页面布局不适合使用文档流方式，元素比较零散，分布没有规律，绝对定位 + 相对定位

    - min-width max-width min-height max-height

      ```css
      /* 分别设置元素宽高在自动适应的情况下变化的范围 */
      min-width: ;
      max-width: ;
      min-height: ;
      max-height: ;
      ```

    - visibility

      ```css
      /* visibility 
      	visible
      	hidden 等价于opacity: 0;
      	collapse
      */
      ```

    - cursor

      ```css
      /* 设置光标的类型（如果有），在鼠标指针悬停在元素上时显示相应样式。 
      	pointer 手*/
      cursor: ;
      
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

  > 某个元素如果
  >
  > 1. 没有上边框
  > 2. 没有上内边距
  > 3. 第一个子元素没有浮动
  >
  > 那么为此子元素设置的margin-top会作用到该元素上