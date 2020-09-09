# CSS3

## CSS3新增选择器

- 通用选择器

  ```css
  /* 选择所有元素 */
  * {
      
  }
  ```

- 属性选择器

  ```css
  /* 选择拥有当前属性的元素 */
  [attr] {
      
  }
  
  /* 选择拥有当前属性，并且属性值为特定值的元素 */
  [attr=val] {
      
  }
  
  /* 选择拥有当前属性，并且属性值包括特定值的元素 */
  [attr*=val] {
      
  }
  
  /* 选择拥有当前属性，并且属性值以特定值开头的元素 */
  [attr^=val] {
      
  }
  
  /* 选择拥有当前属性，并且属性值以特定值结尾得元素 */
  [attr$=val] {
      
  }
  ```

- 子元素选择器

  ```css
  /* 选择 selector1 选中的所有元素的子元素中能被 selector2 选中的元素 */ 
  .selector1 > .selector2 {
      
  }
  ```

- 相邻兄弟选择器

  ```css
  /* 选择 selector1 选中所有元素紧邻的兄弟元素中能被 selector2 选中的元素 */
  .selector1 + .selector2 {
      
  }
  
  /* 选择 selector1 选中所有元素后面的兄弟元素中能被 selector2 选中的元素 */
  .selector1 ~ .selector2 {
      
  }
  ```

- 伪类

  ```css
  /* 选择当前所有兄弟元素中的第一个元素 */
  :first-child {
      
  }
  
  /* 选择当前所有兄弟元素中的最后一个元素 */
  :last-child {
      
  }
  
  /* 选择当前所有兄弟元素中的第n个元素 */
  :nth-child(n) {
      
  }
  
  /* 选择当前所有兄弟元素中的倒数第n个元素 */
  :nth-last-child(n) {
      
  }
  
  /* 选择没有兄弟元素的元素 */
  :only-child {
      
  }
  
  /* 同类 */
  /* 选择当前所有同类兄弟元素中的第一个元素 */
  :first-of-type {
      
  }
  
  /* 选择当前所有同类兄弟元素中的最后一个元素 */
  :last-of-type {
      
  }
  
  /* 选择当前所有同类兄弟元素中的第n个元素 */
  :nth-of-type(n) {
      
  }
  
  /* 选择当前所有同类兄弟元素中的倒数第n个元素 */
  :nth-last-of-type(n) {
      
  }
  
  /* 选择没有同类兄弟元素的元素 */
  :only-of-type {
      
  }
  
  /* 选择没有任何子元素或者文本内容的元素 */
  :empty {
      
  }
  
  /* 未被访问过的链接 */
  a:link {
      
  }
  
  /* 鼠标经过 */
  :hover {
      
  }
  
  /* 鼠标按下 */
  :active {
      
  }
  
  /* 访问过的链接 */
  a:visited {
      
  }
  
  /* 基于表单特性选择 */
  /* 选择获得焦点的表单控件 */
  input:focus {
      
  }
  
  /* 选择所有禁用的表单控件 */
  input:disable {
      
  }
  
  /* 选择所有未被禁用的表单控件 */
  input:enable {
      
  }
  
  /* 选择不被 selector 选中的元素 */
  :not(selector) {
      
  }
  ```
  
- 伪元素（默认为块元素）

  ```css
  /* 选择文本内容 */
  /* 选择第一行文本 */
  p::first-line {
      
  }
  
  /* 选择第一个字母/文字 */
  p::first-letter {
      
  }
  
  /* 选择内容中被选中区域的样式 */
  ::selection {
      
  }
  
  /* 在当前元素之前插入内容/在当前元素之后插入内容 */
  ::before {
      content: '添加的内容';/* 必须设置content */
  }
  
  ::after {
      content: '添加的内容';
  }
  ```

## CSS选择器优先级计算规则

- 选择器优先级是靠A, B, C, D四个值进行计算，依次比较A、B、C、D四个值大小
  - A 如果有内联样式则 A = 1 否则为0    1, 0, 0, 0
  - B 根据当前id选择器出现的次数n B = n      0, n, 0, 0
  - C 根据当前的类选择器、属性选择器、伪类选择器出现的次数m C = m   0, 0, m, 0
  - D 根据标签选择器和伪元素出现的次数p D = p    0, 0, 0, p
- 通用选择器没有优先级
- `!important` 在某个样式后设置，那么该样式具备最高优先级
  - 如果在优先级更高的选择器内为样式设置了`!important`，则会覆盖优先级较低的选择器内同样设置了`!important`的样式；或者之间在当前样式后面覆盖。


## CSS3新增属性

- 容器修饰

  ```css
  /* border-radius 边框圆角 会影响边框显示但不会影响布局
  	一值属性 四角半径相同
  	二值属性 主对角线 次对角线
  	三值属性 左上 次对角线 右下
  	四值属性 左上开始顺时针
  */
  border-radius: 10px;
  border-radius: 10px 20px;
  border-radius: 10px 20px 30px;
  border-radius: 10px 20px 30px 40px;
  /* 椭圆 横向半径/纵向半径 */
  border-radius: 10px/20px;
  /* 宽度的50%作为横向半径 高度的50%作为纵向半径 */
  border-radius: 50%;
  
  /* box-shadow 不会影响布局
  	x偏移 y偏移 模糊半径 阴影扩散半径（可以为负值） 阴影颜色 插页(阴影向内)
  */
  box-shadow:10px 10px 10px 10px color inset;
  /* 可以同时设置多组值，用逗号隔开
  	利用该特性，可以实现多重边框
  */
  box-shadow:10px 10px 10px 10px color inset, 10px 10px 10px 10px color;
  box-shadow: 0 0 0 2px red, 0 0 0 3px blue;
  /* text-shadow
  	x偏移 y偏移 模糊半径 阴影扩散半径（可以为负值） 阴影颜色
  */
  text-shadow: 10px 10px 10px 10px color;
  
  /* outline 轮廓线 不会对布局产生影响 不会跟随圆角变化
  	outline-style outline-width outline-color
  	outline-offset 轮廓线扩散
  	和border类似
  */
  outline: 1px red solid;
  outline-offset: ;
  
  /* 背景属性补充
  	background-clip 调整背景图片/背景颜色的显示区域
  		border-box 默认值
  		padding-box 显示在内边距区
   		content-box	显示在内容区
  	background-origin 调整背景图片定位原点
  		padding-box 默认值 以内边距区为原点
  		border-box 以边框区为原点
  		content-box 以内容区为原点
  	background-size 背景图片大小
  		数值
  		百分比
  		cover 等比例缩放直到把容器铺满
  		contain 等比例缩放直到完整显示
  	可以设置多组值
  */
  background-clip: border-box;
  background-origin: padding-box;
  background-size: ;
  /* 简写属性 background
  	 顺序要求
      background-size 写在 background-position 后面并用 / 隔开
      background-position/background-size
      background-clip 写在 background-origin 后边并用space隔开
      background-origin background-clip
  */
  
  /* 图片边框 不会对布局产生影响
    	将图片分成九块 分块的尺寸由slice决定 四角四边中间舍弃
    	border-image-source 图片地址
    	border-image-width 边框图片的宽度
    	border-image-slice 对图片截取的方式
    	border-image-outset 图片边框向外的偏移量
    	border-image-repeat 边框部分图片的重复方式
    		stretch 默认值 拉伸图片以填充边框
    		repeat 平铺图片以填充边框
    		space 平铺图像。当不能整数次平铺时，根据情况放大或缩小图像
    		round 平铺图像 。当不能整数次平铺时，会用空白间隙填充在图像周围（不会放大或缩小图像）
    */
    border-image-source: ;
    border-image-width: ;
    border-image-slice: ;
    border-image-outset: ;
    border-image-repeat: ;
  
    /* 渐变 */
    /* 线性渐变 */
    background-image: linear-gradient();
    background-image: repeating-linear-gradient();
    /* 径向渐变 */
    background-image: radial-gradient();
    background-image: repeating-radial-gradient();
  ```

- 过渡动画

  ```css
    /* transition  
    	transition-property 表示那些动画需要有过渡效果
    	transition-duration 动画持续时间
    	transition-timing-function 速率函数
    		linear 匀速
    		ease 
    		ease-in	加速	
    		ease-out 减速
    		ease-in-out	
    		cubic-bezier(x1, y1, x2, y2) 贝塞尔曲线
    			四个点p0(0, 0) p1 p2 p3(1, 1)
    	transition-delay 过度延迟时间
    */
    transition: all .5s ease .05s
  ```

- 变形转换

  ```css
  /* transform 
  	transform-origin 位移基准点
  		默认 50% 50%
  	2D转换	
  		位移
  			translateX()
  			translateY()
  			translate()
  		旋转
  			rotate()
  				角度 deg
  				弧度 rad
  		缩放
  			scaleX()
  			scaleY()
  			scale()
  		斜切
  			skewX()
  			skewY()
  			skew()
  		同时要设置多个转换效果，用空格隔开转换函数
  */
  transform: translate();
  transform: rotate();
  transform: scale();
  transform: skew();
  
  /* 3D转换 需要场景(父容器)
  		父容器设置 perspective 景深
  		单独设置 perspective
  			transform: perspective() rotateY();
  	位移
  		translateZ()
  		translate3d()
  	旋转
  		rotateX()
  		rotateY()
  		rotateZ()
  		rotate3d()
  	缩放
  		scaleZ()
  		scale3d()
  	transform-style
  		flat 默认值 平面
  		preserve-3d 立体
  	perspective-origin 观察原点
  	backface-visibility 设置背面是否可见
  */
  transfrom: translateZ()
  ```

- 帧动画

  - 定义动画

    ```css
    /* 关键帧 */
    @keyframes animation-name {
        from {
            
        }
        to {
            
        }
    }
    
    @keyframes name {
        0% {
            
        }
        
        ...
        
        100% {
            
        }
    }
    ```

  - 调用动画

    ```css
    /* ! 动画名称 */
    animation-name: ;
    /* ! 持续时间 */
    animation-duration: ;
    /* 速率函数 */
    animation-timing-function: ; 
    /* 首次动画的延迟 */
    animation-delay: ; 
    /* 动画演示次数 
    	infinite 无限次
    */
    animation-iteration-count: ; 
    /* 方向 */
    animation-direction: ;
    /* 动画完成时的状态 */
    animation-fill-mode: ;
    /* 动画播放状态
    	paused
    	running
    */
    animation-play-state: ;
    /* 简写属性 */
    animation: name duration timing-function delay iteration-count direction fill-mode;
    ```

- 弹性布局

  ```css
  /* 
  	对容器设置 
          display: flex;
          justify-content 调整项目在主轴方向上的分布方式 
              flex-start 对齐到主轴起点
              flex-end 对齐到主轴的终点
              center 居中到主轴的中间
              space-around 均匀分布主轴上的项目 项目之间的间距是项目和容器间距的两倍
              space-between 均匀分布主轴上的项目 项目和容器之间没有间距
          align-items 调整一行内容在交叉轴方向上的对齐方式
              flex-start 对齐到交叉轴起点
              flex-end 对齐到交叉轴的终点
              center 居中到交叉轴中间
              stretch 如果项目没有高度则在交叉轴方向拉伸直到占满交叉轴
              baseline 
          flex-wrap
              nowrap 默认值 不换行 宽度缩小 在一行中显示
              wrap 换行
              wrap-reverse 换行 行序颠倒
          flex-direction  主轴方向
              row 默认 水平 方向从左到右
              column 垂直 方向从上到下
              row-reverse 水平 方向从右到左
              column-reverse 垂直 方向从下到上
          align-content 调整多行项目在交叉轴方向上的分布方式
              flex-start 对齐到交叉轴起点
              flex-end 对齐到交叉轴的终点
              center 居中到交叉轴的中间
              space-around 均匀分布交叉轴上的项目 项目之间的间距是项目和容器间距的两倍
              space-between 均匀分布交叉轴上的项目 项目和容器之间没有间距
              stretch 如果项目没有高度则在交叉轴方向拉伸直到占满交叉轴
  		flex-flow flex-warp 和 flex-direction 的简写
  	对项目设置
  		order 指定当前项目在所有项目中的排序 默认值为 0 从小到大排序
  		flex-grow 当前项目在主轴方向上剩余空间分配中要占据的几份 分配的空间会被当前项目占据
  		flex-shrink 当前项目在主轴方向上空间不足时缩小的比例 默认值 1 每个项目默认缩小
  		flex-basis 元素未设置宽高时，在主轴方向上要占据的大小
  		flex 对以上三个属性的简写
  		align-self 单独设置当前项目在交叉轴方向上的对齐方式
  */
  display: flex;
  justify-content: ;
  align-items: ;
  flex-wrap: ;
  flex-direction: ;
  align-content: ;
  flex-flow: ;
  
  order: ;
  flew-grow: ;
  flex-basis: ;
  flex: ;
  align-self: ;
  ```

- 多栏/多列布局

  ```css
  /* 控制文字显示效果
  	column-width 指定当前每一栏的宽度
  	column-count 指定当前要划分成几栏
  	column-gap 指定两栏之间的间距
  	column-rule 指定两栏之间的分割线样式
  	column-fill 指定内容的对齐方式，默认均匀分布
  		balance 默认值 每一列的高度都一样
  		auto 自动将每一列的高度占满才换到下一列
  	column-span 设置某个元素的内容跨越多列
  */
  ```

- box-sizing

  ```css	
  /* width 和 height 要生效的范围
  	content-box 默认值
  	border-box 边框盒子 width 和 height 指定的是 border-width + padding + content 的宽高
  */
  box-sizing: ;
  ```

- 字体引入和图标字体

  ```css
  /* 直接引入一个指定的字体文件 */
  @font-face {
      font-family: "";
      src: url() format();
  }
  /* 利用此特性 可以将项目需要的图标封装到字体文件中使用
  	借助于AI软件 导出字体文件
  	借助在线平台在线生成自定义的图标字体库 iconfont fontawesome
  */
  ```
  
- 图片精灵/雪碧图 spirite

  - 将要展示的多个小图标、小图片放在一张大图片中。目的是为了提高网页加载速度

    ```css
    /* 用 background-position 指定图片具体的位置 */
    background-position: ;
    ```

- 响应式布局

  - 写一套代码，让页面在不同终端上有不同的显示效果，能够以最合理的方式去适应当前的分辨率

  - 实现响应式布局的原理

    - 百分比实现流式布局

    - 媒体查询 media query 让部分css代码在特定的设备和分辨率范围下起作用

      ```css
      /* 旧版
      	device_name 设备名
      		screen 屏幕设备
      		print 打印设备
      		all 全部
      	condition 条件
      		and 包括
      		or 或者
      		not 排除
      	查询范围
      		min-wdith 最小宽度 即分辨率大于当前值的时候
      		max-width 最大宽度 分辨率小于当前值的时候
      */
      @media device_name conditon{
          .class {
              
          }
      }
      ```

  - 栅格化/12栅格化

    - 在网页响应式变化的过程中，对一行浮动元素要显示的方式进行方便的控制
