# HTML基础

## HTML含义

- Hyper Text Markup Language(超文本标记语言)

## HTML创建

- 任意的文本类型的文件只有把后缀名变为 .html .htm 就可以变成一个html文件
- 通过编辑器直接创建

## HTML运行

- 直接双击就可以在当前电脑的默认浏览器打开
- 通过编辑器进行网页运行
  - vscode 需要安装插件 open in browser
- 打开以后就在修改网页并保存以后就可以直接刷新浏览器了、

## HTML编写

- 标签（标记） 以尖括号的方式，包裹的一对或者是一个单词，让普通文本能够具备更多的特性的结构

  - 常用标签（一般通过单词或者用途来称呼每一个标签）
    - `<b></b>` 可以让当前包裹的文本加粗

    - `<i></i>`  可以让当前文本倾斜

    - `<h1></h1> ~ <h6></h6>` 可以把当前的文本变为一级到六级标题 

    - `<s></s>` 删除线

    - `<u></u>` 下划线

    - `<p></p>` 段落

    - `<pre></pre>` 预格式文本标签 可以识别文本内容中的多个空格和换行

    - `<hr>` 水平分割线

    - `<br>` 进行文本换行

    - `<a></a>` 超链接

      ```html
      <!--href 目标网页url-->
      <!--target 连接打开的位置
      	默认值 在本标签页打开连接 _self
      	      在新标签页打开连接 _blank 
      	其他值 指定的窗口中打开
      -->
      <a href="https://start.me/" target="_blank"></a>
      ```

      - 锚链接 在进行页面跳转时额外携带页面滚动信息

        - 当前页面内 

          ```html
          <!--设置锚点--> 
          <a name="top"></a>
          <!--跳转到锚点-->
          <a href="#top"></a>
          ```

        - 从其他页面进入

          ```html
          <!--目标网页demo_1.html-->
          <a name="middle"></a>
          <!--从另一个网页demo_2.html定位到demo_1.html-->
          <a href="./demo_2.html#middle"></a>
          ```

    - `<img>` 图片标签 向网页内引入一张图片

      ```html
      <!--src图片路径 alt图片替代文本-->
      <!--width图片宽度 height图片高度-->
      <!--border图片边框宽度-->
      <img src="./img.jpg" alt="图片描述" width="100px" height="100px" border="1px">
      ```

    - 列表

      ```html
      <!--无序列表-->
      <!--type 符号形状
      	默认值 disc 实心圆
      	      circle 空心圆
      	      square 方块
      -->
      <ul type="circle">
          <li></li>
          <li></li>
          <li></li>
      </ul>
      <!--有序标签-->
      <ol>
          <li></li>
          <li></li>
          <li></li>
      </ol>
      <!--自定义列表-->
      <!--dt 定义列表中的项目
      	dd 描述列表中的项目
      -->
      <dl>
          <dt></dt>
          <dd></dd>
          <dt></dt>
          <dd></dd>
      </dl>
      ```
    
    - 表格
    
      ```html
      <!--caption 表格标题
      	thead 表头
      	tbody 主体
      	tfoot 表尾
      	tr 行
      	th 表头的单元格
      	td 单元格
      	width 表格/单元格宽度
      	height 表格/行高度
      	border 边框
      	bgcolor 表格/单元格背景颜色
      	align 水平对齐方式
      		left 左对齐
      		right 右对齐
      		center 居中
      	cellspacing 单元格之间的空白
      	cellpadding 单元格内边距
      -->
      
      <table width height border bgcolor align>
          <caption>title</caption>
          <thead>
              <!--align 单元格中文本水平对齐方式
      					left center right 
      				valign 单元格中文本垂直对齐方式
      					top middle bottom
      		-->
          	<tr align valign>
              	<th>head_1</th>
                  <th>head_2</th>
                  <th>head_3</th>
              </tr>
          </thead>
          <tbody>
          	<tr>
                  <!--colspan 合并同一行单元格，需要把被合并的单元格删掉
      				rowspan 合并不同行的单元格，需要把被合并的单元格删掉
      				属性值为要合并的单元格数
      			-->
              	<td>cell_1</td>
                  <td colspan=2>cell_2</td>
              </tr>
              <tr>
              	<td>cell_1</td>
                  <td>cell_2</td>
                  <td rowspan=2>cell_3</td>
              </tr>
              <tr>
              	<td>cell_1</td>
                  <td>cell_2</td>
              </tr>
          </tbody>
          <tfoot></tfoot>
      </table>
      ```
    
    - $\cdots$
  - 开始标签 结束标签 对于特定的内容需要设置特殊样式，可以把内容放置到开始标签和结束标签的中间，结束标签在单词前会多一个斜杠
  - 编辑器的快捷键 标签名+tab键可以快速创建标签结构
  - 普通标签对于文本内容的多个空格和换行是不识别的
  - 标签分类
    - 按照写法
      - 单标签  `<hr>`
      - 双标签 `<a></a>`
    - 按照特性
      - 内联元素inline
        - `<span></span>`
      - 块元素block
        - `<div></div>`
      - inline-block
        - `<img>`
  - 标签的嵌套
    - 标签内容可以是其他标签
    - 块标签一般可以互相嵌套 块标签中可以嵌套行标签 行标签中不能直接嵌套块标签 行标签可以随意嵌套
    - 部分特殊的标签不能随意嵌套
      - p标签中一般只嵌套行标签

- 属性  用于开始标签内部，用来指定当前标签某些方面的特定原则

  - <标签 属性名1=属性值 属性名2=属性值2>内容</标签>

- 注释 对于当前代码的注解和说明，只有开发人员需要查看

  - `<!-- 注释内容 -->`

- 实体 部分不方便直接在html中作为内容输出的符号会通过特殊的方式来表示

  - 用`&lt;`来表示小于号（左尖括号）
  - 用`&gt;`来表示大于号（右尖括号）
  - `&amp;`表示&
  - `&quot;`表示引号
  - `&nbsp;` 表示空格

- 网页的主体结构

  - ```html
    <!-- 文档声明（告诉浏览器当前正在解析的是什么文档）-->
    <!DOCTYPE html>
    <html lang="zh">
        <!-- 基础设置 标题 编码 关键词 -->
        <head>
            <!-- 元数据 -->
            <meta>
            <!-- 标题 -->
            <title></title>
        </head>
        <body>
            
        </body>
    </html>
    ```

    
  