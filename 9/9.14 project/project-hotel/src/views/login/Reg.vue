<template>
    <div class="outer reg">
        <section class="reg-banner">
            <img :src="regBanner" alt="远方既故乡">
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
                        <van-field autocomplete="off" v-model="regForm.phone" name="手机号" placeholder="小主，留个电话吧"></van-field>
                    </div>
                    <div class="code-input flex-between-center">
                        <div class="code-icon"></div>
                        <van-field autocomplete="off" v-model="regForm.code" name="验证码" placeholder="我们的秘密">
                            <template #button>
                                <button class="code-btn disabled" disabled type="primary" @click.prevent="onCount">{{countText}}{{suffix}}</button>
                            </template>
                        </van-field>
                    </div>
                    <div class="pass-input flex-between-center">
                        <div class="pass-icon">
                            <i class="iconfont icon-suo1"></i>
                        </div>
                        <van-field v-model="regForm.password" type="password" name="密码" placeholder="我们来交换秘密"></van-field>
                    </div>
                </div>
                <van-field>
                    <template #input>
                        <van-checkbox icon-size="0.3rem" checked-color="#eb666b" v-model="checked"></van-checkbox>
                        <span class="notice">已阅读并同意<span @click="showProtocol">《软件许可及服务协议》</span></span>
                    </template>
                </van-field>
                <div class="submit-btn">
                    <van-button disabled type="primary" native-type="onSubmit">立即注册</van-button>
                </div>
            </van-form>
        </section>
        <section>
            <van-action-sheet v-model="showSheet" title="软件许可及服务协议" cancel-text="知道了" @cancel="noticed">
                <div class="protocol-content">
                    软件许可及服务协议vvvv软件许可及服务协议软件许可及服务协议软件许可及服务协议软件许可及服务协议
                </div>
            </van-action-sheet>
        </section>
    </div>
</template>

<script>

import regBanner from '@/assets/img/reg-banner.jpg';
import {Form, Field, Button, Checkbox, Toast} from 'vant';
import 'vant/lib/form/style';
import 'vant/lib/field/style';
import 'vant/lib/button/style';
import 'vant/lib/checkbox/style';

import {apiReg} from '@/http/api';

export default {
    name: 'reg',
    props: {
    },
    data () {
        return {
            regBanner,
            regForm: {
                phone: '',
                code: '',
                password: '',
            },
            checked: false,
            showSheet: false,
            countText: '获取秘密',
            suffix: '',
        }
    },
    created () {},
    mounted () {},
    watch: {
        'regForm.phone'() {

            let btn = document.querySelector('.code-input button');

            if(this.regForm.phone == '') {

                btn.setAttribute('disabled', 'disabled');

                btn.classList.add('disabled');

            } else {

                if(this.countText == '获取秘密') {

                    btn.removeAttribute('disabled');

                    btn.classList.remove('disabled');

                }

            }
        },
        checked() {

            let btn = document.querySelector('.submit-btn button');

            if(this.checked) {

                btn.removeAttribute('disabled');

            } else {

                btn.setAttribute('disabled', 'disabled');

            }

            btn.classList.toggle('van-button--disabled');

        }
    },
    computed: {},
    methods: {
        showProtocol() {

            this.showSheet = !this.showSheet;

        },
        noticed() {

            this.checked = true;

        },
        onSubmit() {

            apiReg(this.regForm).then(res => {

                console.log(res);
                Toast({
                    message: res.msg,
                    position: 'bottom'
                })   

            }).catch(err => {

                console.log(err);

            })

        },
        onCount() {

            clearInterval(t);

            this.suffix = 's'

            this.countText = 30;

            let btn = document.querySelector('.code-input button');

            btn.setAttribute('disabled', 'disabled');

            btn.classList.add('disabled');

            let t = setInterval(() => {

                this.countText--;

                if(this.countText <= 0) {

                    this.countText = '再次获取';

                    this.suffix = '';

                    clearInterval(t);

                    btn.removeAttribute('disabled');

                    btn.classList.remove('disabled');
                    
                }

            }, 1000);

        }
    },
    components: {
        VanForm: Form,
        VanField: Field,
        VanButton: Button,
        VanCheckbox: Checkbox,
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

.van-checkbox__label {
    color: rgba(0, 0, 0, .8);
    font-family: PingFang SC Bold;
}

.notice {
    margin-left: .2rem;
}

.notice span {
    color: #6794e9;
    line-height: 1;
}

.white-bg + .van-field {
    padding-left: .46rem;
    background-color: #fafafa;
    margin-top: .6rem;
}

.white-bg + .van-field::after {
    border: none;
}

.reg .van-checkbox__icon .van-icon {
    border-color: rgba(186, 96, 82, .2);
}
</style>

<style src="../../style/reg.css" scoped>
</style>