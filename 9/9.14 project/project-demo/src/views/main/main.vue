<template>
	<el-container class="outer">
		<el-header>
			<div class="logo">
				<!-- <img width="70px" src="../../assets/favicon.ico.png" alt=""> -->
				<h1>一家民宿后台管理</h1>
			</div>
			<nav class="nav">
				<el-menu mode="horizontal" background-color="#545c64" text-color="#f1f1f1" active-text-color="#ffd04b"> 
					<el-menu-item index="1">消息中心</el-menu-item>
					<el-submenu index="2">
						<template slot="title"> {{ this.username }} </template>
						<el-menu-item inedx="2-1" @click="showChangePanel">修改密码</el-menu-item>
						<el-menu-item inedx="2-2" @click="onSignOut">退出登录</el-menu-item>
					</el-submenu>
				</el-menu>
			</nav>
		</el-header>
		<el-container>
			<el-aside width="200px">
				<el-menu background-color="#545c64" text-color="#f1f1f1" active-text-color="#ffd04b">
					<el-submenu index="1">
						<template slot="title">
							<i class="el-icon-menu"></i>
							分类管理
						</template>
						<router-link to="/showCategory">
							<el-menu-item index="1-1" def>
								查看分类
							</el-menu-item>	
						</router-link>
						<router-link to="/addCategory">
							<el-menu-item index="1-2">
								添加分类
							</el-menu-item>
						</router-link>
					</el-submenu>
					<el-submenu index="2">
						<template slot="title">
							<i class="el-icon-house"></i>
							民宿管理
						</template>
						<router-link to="/showHouse">
							<el-menu-item index="2-1" def>
								查看民宿
							</el-menu-item>	
						</router-link>
						<router-link to="/addHouse">
							<el-menu-item index="2-2" def>
								添加民宿
							</el-menu-item>	
						</router-link>
					</el-submenu>
					<el-submenu index="3">
						<template slot="title">
							<i class="el-icon-user-solid"></i>
							用户管理
						</template>
						<router-link to="/">
							<el-menu-item index="3-1"></el-menu-item>
						</router-link>
					</el-submenu>
				</el-menu>
				<footer><a href="javascript:;">Copyright <span>dobedoo</span> inc.</a></footer>
			</el-aside>
			<el-main>
				<div class="change-pass-panel" v-show="showChange">
					<el-form :model="newPass" :rules="rules" ref="changeForm">
						<h1 class="panel-title">变更密码</h1>
						<el-form-item label="用户名">
							<el-input readonly :value="this.username"></el-input>
						</el-form-item>
						<el-form-item label="原密码" prop="oldpass">
							<el-input type="password" v-model="newPass.oldpass"></el-input>
						</el-form-item>
						<el-form-item label="新密码" prop="newpass">
							<el-input type="password" v-model="newPass.newpass"></el-input>
						</el-form-item>
						<el-form-item label="确认密码" prop="confirm">
							<el-input type="password" v-model="newPass.confirm"></el-input>
						</el-form-item>
						<el-form-item>
							<el-button :loading="loading" class="submit" @click.prevent="changePass">提交</el-button>
						</el-form-item>
					</el-form>
				</div>
				<div class="content">
					<div class="outerCover" v-show="showCover" @click="vanish"></div>
					<router-view @getSignal="singal" :setSignal="showCover"></router-view>
				</div>
			</el-main>
		</el-container>
	</el-container>
</template>

<script>

import instance from '@/http/http';

export default {
	props: {
	},
	data () {
		let confirmPass = (rule, value, callback) => {
			if(value === '') {

				callback(new Error('请再次输入密码'));

			} else if(value != this.newPass.newpass) {

				callback(new Error('两次密码输入不一致'));

			} else {
				callback();
			}
		}
		let isRepeat = (rule, value, callback) => {

			if(value === '') {
				callback(new Error('请输入新的密码'));
			} else if(value.length < 5 || value.length > 16) {
				callback(new Error('密码长度在5~16位之间'));
			} else if(value == this.newPass.oldpass) {
				callback(new Error('新密码不能与原密码重复'));
			} else {
				callback();
			}

		}
		return {
			loading: false,
			newPass: {
				uid: '',
				oldpass: '',
				newpass: '',
				confirm: ''
			},
			showChange: false,
			showCover: false,
			uid: sessionStorage.getItem('uid'),
			username: sessionStorage.getItem('username'),
			avatar: sessionStorage.getItem('avatar'),
			rules: {
				oldpass: [
					{ required: true, message: '请输入原密码'},
					{ min: 5, max: 16, message: '密码格式错误' }
				],
				newpass: [
					{ validator: isRepeat}
				],
				confirm: [
					{ validator: confirmPass }
				]
				
			}
		}
	},
	created () {},
	mounted () {

		this.newPass.uid = this.uid;

	},
	watch: {},
	computed: {},
	methods: {
		// 接收子组件信号
		singal(signal) {

			this.showCover = signal;

		},

		// 退出登录
		onSignOut() {

			// 清除token
			sessionStorage.clear();

			this.$router.push({path: '/login'});

		},

		// 显示修改密码面板
		showChangePanel() {

			this.showChange = true;
			this.showCover = true;

		},

		// 隐藏修改密码面板
		vanish() {

			this.showChange = false;
			this.showCover = false;

		},

		// 修改密码
		changePass() {

			this.$refs['changeForm'].validate(valid => {

				if(valid) {

					this.loading = true;

					instance.post('/admin/login/changePass', this.newPass).then(res => {

						if(res.code === 200) {

							this.$message({
								message: res.msg,
								type: res.status
							});

							this.loading = false;

							this.onSignOut();

						}

					}).catch(err => {

						console.log(err);

						this.loading = false;

					})

				}

			})

		}

	},
	components: {},
}
</script>

<style>

	.el-message ,
	.el-message--success {
		background-color: #fff !important;
		border-color: #fff !important;
		border-radius: 13px !important;
        box-shadow: 0 0 10px 0 rgba(0,0,0,.2) !important;
	}	

	.submit, .submit:active, .submit:focus {
        background-color: rgb(84,92,100) !important;
        border: 1px solid rgb(84,92,100) !important;
        box-shadow: none !important;
        border-radius: 4px !important;
        color: #f1f1f1 !important;
        cursor: pointer !important;
        padding: 12px 20px !important;
        line-height: 1;
        transition: background .3s !important;
    }

    .submit:hover {
        color: #f1f1f1 !important;
        background-color: rgb(67,74,80) !important;
        border-color: rgb(67,74,80) !important;
    }

	.panel-title {
		padding-left: 400px;
        margin-bottom: 20px;
	}

	::-webkit-scrollbar-thumb:horizontal { /*水平滚动条的样式*/
        width: 4px;
        background-color: #CCCCCC;
        -webkit-border-radius: 6px;
    }

    ::-webkit-scrollbar-thumb:vertical { /*垂直滚动条的样式*/
        background-color: #999;
		border-radius: 8px;
        outline-offset: -2px;
        border: 2px solid #f1f1f1;
		transition: background-color .3s;
    }
    ::-webkit-scrollbar-thumb:hover { /*滚动条的hover样式*/
        background-color: #666;
	}
    ::-webkit-scrollbar-track-piece {
        background-color: #f1f1f1; /*滚动条的背景颜色*/
    }
    ::-webkit-scrollbar {
        width: 10px; /*滚动条的宽度*/
        height: 8px; /*滚动条的高度*/
    }
	
    a {
		color: #f1f1f1;
	}

</style>

<style scoped>

	.change-pass-panel {
		position: absolute;
		box-sizing: border-box;
		background-color: #fff;
        padding: 30px;
		width: 1000px;
		border-radius: 20px;
        box-shadow: 0 0 10px 0 rgba(0,0,0,.2);
		right: 360px;
		top: 200px;
		z-index: 2000;
	}

	.outer {
		position: absolute;
		left: 0;
		top: 0;
		bottom: 0;
		right: 0;
	}

	.el-header {
		background-color: rgb(84,92,100);
		color: #f1f1f1;
		text-align: center;
		line-height: 60px;
		display: flex;
		justify-content: space-between;
	}
	
	.el-aside {
		background-color: rgb(84,92,100);
		color: #f1f1f1;
		overflow-x: hidden;
		padding-top: 20px;
	}
	
	.el-menu {
		width: 100%;
	}

	footer {
		position: absolute;
		bottom: 5px;
		left: 30px;
		font-size: 12px;
	}

	footer > a > span {
		text-decoration: underline;
	}

	.el-main {
		background-color: #fff;
		color: #333;
		padding: 0;
		background-color: rgb(84,92,100);
	}

	.content {
		width: 100%;
		height: 100%;
		box-sizing: border-box;
		background-color: #f1f1f1;
		border-top-left-radius: 20px;
		border-bottom-left-radius: 20px;
		padding: 20px;
		width: calc(100% - 200px);
		height: calc(100% - 60px);
		position: fixed;
		overflow: auto;
	}

	.outerCover {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, .2);
        backdrop-filter: blur(1px);
        z-index: 9998;
    }

	
</style>