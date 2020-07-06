# HTML5

## HTML5 概念

- 狭义：HTML发展到今天的第五代版本
- 广义：包括HTML、CSS、js以及浏览器机制等一系列新技术集合的描述

## HTML5 特性

- 文档声明方式相对于之前的版本更简单，因为HTML5不再基于SGML来编写。

  ```html
  <!DOCTYPE html>
  ```

- 语义化标签 类似于`<div></div>`这样的布局标签，从使用上来说和`<div></div>`没有任何区别，但是可以让代码的可读性更强。有利于开发人员的阅读和搜索引擎的读取(SEO)

  > SEO 搜索引擎优化 网络运营人员从事

  ```html	
  <!-- 头部 -->
  <header></header>
  <!-- 导航 -->
  <nav></nav>
  <!-- 主体 -->
  <main>
  	<!-- 标题容器 -->
      <hgroup>
      	<h1></h1>
          <h4></h4>
      </hgroup>
  	<!-- 文章主体 -->
      <article>
  		<!-- 分节 -->
          <section></section>
      	<section></section>
  		<!-- 独立于主内容流的一段内容，经常是在主文中引用的图片，插图，表格，代码段等等 -->
          <figure>
          	<img src="" alt="">
  			<!-- 标题/说明 -->
              <figcaption></figcaption>
          </figure>
  		<!-- 侧边栏/标注框 -->
          <aside></aside>
      </article>
  	<!-- 地址信息 -->
      <address>
      </address>
  	<!-- 时间 -->
      <time></time>
  	<!-- 进度 -->
      <progress></progress>
  </main>
  <!-- 底部 -->
  <footer></footer>
  ```

- 功能标签

  ```html	
  <!-- 音频标签 -->
  <audio></audio>
  <!-- 视频标签 -->
  <video></video>
  <!-- 画布 -->
  <canvas></canvas>
  ```

- 新增全局属性

  ```html
  <!-- 隐藏元素 -->
  <div hidden>
      lorem
  </div>
  <!-- 设置元素能否被拖拽(true/false) -->
  <div draggable="true">
      lorem
  </div>
  <!-- 设置元素能否被编辑(true/false) -->
  <div contenteditable="true">
      lorem
  </div>
  <!-- data-* 自定义属性，供css和js使用 -->
  <div data-id>
  </div>
  ```

- 表单类型

  ```html	
  <form action="#">
          <input type="email" name="email">
          <input type="url" name="url">
          <input type="date" name="date">
          <input type="time" name="time">
          <input type="week" name="week">
          <input type="month" name="month">
          <input type="datetime-local" name="datetime-local">
          <input type="search" name="search">
          <input type="color" name="color">
          <input type="number" name="number">
          <input type="range" name="range">
          <input type="submit" value="提交">
    </form>
  ```
  
- 表单属性

  ```html
  <!-- form属性 指定当前控件所在的表单 -->
  <!-- 表单和表单控件不必嵌套 -->
  <form action="#" name="form1">
  </form>
  <input type="text" name="user" form="form1">
  <input type="submit">
  <!-- placeholder 设置提示文字 -->
  <input type="email" placeholder="请输入邮箱">
  <!-- autofocus 自动获得焦点 -->
  <input type="text" autofocus>
  <!-- required 表示当前的表单控件是必填项 -->
  <input type="text" required>
  <!-- pattern 用正则的方式进行验证 -->
  <input type="text" pattern="\d{18}">
  <!-- number和range类型独有
  	min 最小值
  	max 最大值
  	step 步进值
  -->
  <input type="number" min="50" max="60" step="2">
  <!-- autocomplete(on/off) 自动填充 -->
  <input type="text" autocomplete="off">
  <!-- novalidate 忽略提交表单时控件的验证 -->
  <form novalidate>
  </form>
  <!-- submit 独有 
  	重写表单属性
  	formaction 重写提交地址
  	formmethod 重写提交方式
  	formenctype 重写表单内容编码
  	formnovalidate 重写是否开启表单验证
  	formtarget 重写打开新页面的方式
  -->
  <input type="submit" value="提交到1">
  <input type="submit" value="提交到2" formaction="#1">
  ```

  

