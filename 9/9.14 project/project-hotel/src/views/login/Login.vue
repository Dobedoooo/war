<template>
    <div class="outer login">
        <section class="login-banner">
            <img :src="loginBanner" alt="远方既故乡">
        </section>
        <div class="back">
            <i class="iconfont icon-fanhui"></i>
        </div>
        <section class="container">
            <van-form @submit="onSubmit">
                <div class="white-bg">
                    <div class="phone-input flex-between-center">
                        <div class="phone">
                            <i class="iconfont icon-shouji"></i>
                        </div>
                        <van-field autocomplete="off" v-model="loginForm.phone" name="手机号" placeholder="小主，留个电话吧"></van-field>
                    </div>
                    <div class="code-input flex-between-center">
                        <div class="code-icon"></div>
                        <van-field autocomplete="off" v-model="loginForm.code" name="验证码" placeholder="我们的秘密">
                            <template #button>
                                <button class="code-btn disabled" disabled type="primary" @click.prevent="onCount">{{countText}}{{suffix}}</button>
                            </template>
                        </van-field>
                    </div>
                   
                </div>
                <div class="submit-btn">
                    <van-button disabled type="primary" native-type="onSubmit">欢迎回家</van-button>
                </div>
            </van-form>
        </section>
    </div>
</template>

<script>

// import 
import loginBanner from '@/assets/img/reg-banner.jpg';
import {Form, Field, Button} from 'vant';
import 'vant/lib/form/style';
import 'vant/lib/field/style';
import 'vant/lib/button/style';

export default {
    props: {
    },
    data () {
        return {
            loginBanner,
            loginForm: {
                phone: '',
                code: '',
            },
        }
    },
    created () {},
    mounted () {
        // this.onSubmit();
    },
    watch: {},
    computed: {},
    methods: {
        onSubmit() {

            this.$store.dispatch('handleLogin', {
                phone: '1234567890',
                code: '122',
            });

        }
    },
    components: {
        VanForm: Form,
        VanField: Field,
        VanButton: Button,
    },
}
</script>

<style>
    .submit-btn {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: .2rem;
    }

    .submit-btn .van-button {
        width: 5.58rem;
        height: .7rem;
        border-radius: .08rem;
        border-color: #eb666b;
        background-color: #eb666b;
        box-shadow: 0px 6px 15px 0px rgba(204, 100, 100, 0.5);
    }

    .reg .van-field {
        font-size: .26rem !important;
        font-family: PingFang SC Bold;
    }

    html, body {
        width: 100%;
        height: 100%;
    }
    .phone-input .van-field, .pass-input .van-field {
        width: calc(100% - .52rem);
        border-bottom: .02rem solid #f7f7f7;
    }

    .code-input .van-field__button {
        /* margin-right: -.3rem;
        margin-bottom: -20px;
        position: relative; */
        position: absolute;
        bottom: -.1rem;
        right: -.25rem;
    }

    input {
        color: rgba(0, 0, 0, .8);
        font-family: PingFang SC Bold;
    }
</style>

<style src="../../style/login.css" scoped>
</style>