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
export default {
    data() {
        return {
            loginForm: {
                username: '',
                password: '',
            },
            rules: {
                password: [
                    { required: true, message: '请输入密码', trigger: 'blur' },
                    { min: 6, max: 18, message: '密码格式错误'}
                ],
                username: [
                    { required: true, message: '请输入用户名', trigger: 'blur'},    
                ],
            }
        }
    },
    methods: {
        onSubmit(formName) {
            this.$refs[formName].validate(valid => {
                if(valid) {
                    this.$router.push('/');
                } else {
                    console.log('error');
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
        /* box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3); */
        padding: 20px 20px 10px 10px;
        border-radius: 15px;
        margin: 200px 700px 0;
        transition: all .2s;
    }
    .login-content:hover {
        /* box-shadow: 0 0 20px rgba(0, 0, 0, .3); */
        border: 1px solid #C0C4CC;
    }
</style>