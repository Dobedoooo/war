<template>
    <div class="">
        <div class="login-content">
            <el-form ref="form" :model="loginForm" label-width="80px" status-icon :rules="rules">
                <h2>登录</h2>
                <el-form-item label="用户名" prop="username">
                    <el-input v-model="loginForm.username" type="text" placeholder="请输入用户名"></el-input>
                </el-form-item>
                <el-form-item label="密码" prop="password">
                    <el-input v-model="loginForm.password" type="password" placeholder="请输入密码"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click.prevent="onSubmit('form')">登录</el-button>
                    <el-button type="default" @click.prevent="sign">注册</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
import base from '@/lib/base'; // @定位到 src

export default {
    data() {
        let checkUserName = (rule, value, callback) => {
            if(value == '') {
                callback(new Error('请输入用户名'));
            } else {
                callback();
            }
        };
        let checkPassword = (rule, value, callback) => {
            if(value == '') {
                callback(new Error('请输入密码'));
            } else if(value.length < 5 || value.length > 16) {
                callback(new Error('密码格式错误'));
            } else {
                callback();
            }
        };
        return {
            loginForm: {
                username: '',
                password: '',
            },
            rules: {
                password: [
                    { validator: checkPassword },
                ],
                username: [
                    { validator: checkUserName },
                ],
            }
        }
    },
    methods: {

        // 登录按钮
        onSubmit(formName) {

            // 表单验证结果
            this.$refs[formName].validate(valid => {

                // 验证成功时向服务器发送消息
                if(valid) {

                    // 涉及到跨域(域名跨域名，域名跨ip，相同ip端口号跨端口号) 同源协议(协议、域名、端口号都一样)
                    /**
                     * 解决跨域问题
                     * 1.代理
                     * 2.服务器端允许跨域
                     * 3.jsonp使用script标签的src属性来请求
                     */

                    // 对ajax封装 promise
                    axios.post(base.URL + '/admin/login/index', this.loginForm).then(res => {
                        
                        // res 格式
                        // config: {…}
                        // data: {code: 200, msg: "登录成功", token: "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwid…YxMn0.27nVo0s4lHle-dt68e_VXCtBT7rxWMV55e8aR0UFL1s", user: {…}}
                        // headers: {…}
                        // request: XMLHttpRequest {…}
                        // status: 200
                        // statusText: "OK"
                        // __proto__: Object

                        // res.status 服务器成功相应，无论密码比对成功与否
                        // res.data.code 密码比对状态
                        if (res.status == 200 && res.data.code == 200) {
                            
                            // 将返回的token存入session
                            sessionStorage.setItem('token', res.data.token);

                            // 从哪来回哪去 没有redirect查询字符串就默认为home
                            let redirect = this.$route.query.from || 'home';

                            // 编程式导航
                            this.$router.push({name: redirect});

                            // elementUI的message提示
                            this.$message({
                                message: res.data.msg,
                                type: res.data.status,
                            });

                        } else {

                            this.$message({
                                message: res.data.msg,
                                type: res.data.status,
                            });

                        }

                    }).catch(err => {
                        console.log(err);
                    })

                    // this.$router.push('/'); 编程式导航 <router-link> 声明式导航
                // 验证失败
                } else {
                    this.$message({
                        message: '未知错误',
                        type: 'error',
                    });
                    return false;
                }
            })
        }
    }
}

</script>
<style scoped>
    h2 {
        color: #606266;
        text-align: center;
        margin-bottom: 20px;
    }
    .login-content {
        border: 1px solid #DCDFE6;
        background-color: #fff;
        padding: 20px 20px 10px 10px;
        width: 490px;
        height: 240px;
        min-width: 490px;
        border-radius: 15px;
        transition: all .2s;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: 300px auto;
    }
    .login-content:hover {
        border: 1px solid #C0C4CC;
    }
</style>