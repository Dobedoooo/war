<template>
	<el-container class="outer">
		<el-header>
			<div class="logo">
				<!-- <img width="70px" src="../assets/logo.png" alt=""> -->
				<h1>LOGO</h1>
			</div>
			<nav class="nav">
				<el-menu mode="horizontal" background-color="#545c64" text-color="#f1f1f1" active-text-color="#ffd04b"> 
					<el-menu-item index="1">某操作</el-menu-item>
					<el-submenu index="2">
						<template slot="title">admin</template>
						<el-menu-item inedx="2-1">个人信息</el-menu-item>
						<el-menu-item inedx="2-2">退出登录</el-menu-item>
					</el-submenu>
				</el-menu>
			</nav>
		</el-header>
		<el-container>
			<el-aside width="200px">Aside</el-aside>
			<el-main>Main</el-main>
		</el-container>
		<el-footer>Copyright dobedoo inc.</el-footer>
	</el-container>
</template>

<script>
export default {
  props: {
  },
  data () {
    return {
    }
  },
  created () {},
  mounted () {},
  watch: {},
  computed: {},
  methods: {},
  components: {},
}
</script>
<style scoped>

	.outer {
		position: absolute;
		left: 0;
		top: 0;
		bottom: 0;
		right: 0;
	}

	.el-header {
		display: flex;
		justify-content: space-between;
	}

	.el-header, .el-footer {
		background-color: rgb(84,92,100);
		color: #f1f1f1;
		text-align: center;
		line-height: 60px;
	}
	
	.el-aside {
		background-color: rgb(84,92,100);
		color: #333;
		text-align: center;
		line-height: 200px;
	}
	
	.el-main {
		background-color: #E9EEF3;
		color: #333;
		text-align: center;
		line-height: 160px;
	}
</style>