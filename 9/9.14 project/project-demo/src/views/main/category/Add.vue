<template>
    <div class="form">
        <div class="add">
            <el-form :model="category" :rules="categoryRules" ref="categoryForm">
                <el-form-item label="分类名称" prop="cname">
                    <el-input v-model="category.cname" placeholder="分类名长度在2~6之间，包含数字、字母和汉字"></el-input>
                </el-form-item>
                <el-form-item label="分类描述" prop="cdesc">
                    <el-input v-model="category.cdesc" placeholder="分类描述长度在3~10之间"></el-input>
                </el-form-item>
                <el-button class="submit" :loading="loading" @click.prevent="onSubmit('categoryForm')">提交</el-button>
            </el-form>
        </div>
        
    </div>
</template>

<script>

import axios from 'axios';
import base from '@/lib/base';

export default {
    props: {
    },
    data () {
        let checkCname = (rule, value, callback) => {

            if(value === '') {

                callback(new Error('请输入分类名称'));

            } else if(value.length < 2 || value.length > 6) {

                callback(new Error('分类名长度在2~6之间'));

            } else if(!/[a-zA-Z0-9\u4e00-\u9fa5]+/.test(value)) {
                
                callback(new Error('分类名只能包含数字、字母和汉字'));

            } else {
                callback();
            }

        };
        return {
            loading: false,
            category: {
                cname: '',
                cdesc: ''
            },
            categoryRules: {
                cname: [
                    // { required: true, trigger: 'blur' }
                    { validator: checkCname },
                ],
                cdesc: [
                    { required: true, message: '请输入分类描述', trigger: 'blur' },
                    { min: 3, max: 10, message: '分类描述长度在3~10之间' }
                ],
            }
            
        }
    },
    created () {},
    mounted () {},
    watch: {},
    computed: {},
    methods: {
        onSubmit(formName) {

            this.$refs[formName].validate(valid => {

                if(valid) {

                    this.loading = true;

                    let url = base.URL + '/admin/category/add';

                    axios({
                        url,
                        method: 'post',
                        data: this.category,
                        headers: {'token': sessionStorage.getItem('token'),}
                    }).then(res => {

                        this.$message({
                            message: res.data.msg,
                            type: res.data.status,
                        });

                        this.loading = false;

                        this.$refs[formName].resetFields();

                    }).catch(res => {
                        
                        this.$message({
                            message: res.data.msg,
                            type: res.data.status,
                        });

                    })

                }
                
            });

        }
    },
    components: {},
}
</script>
    
<style scoped>

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

    .form {
        width: 61.8%;
        margin: 50px auto;
    }

    .add {
        width: 1000px;
        height: 300px;
        position: absolute;
        box-sizing: border-box;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: 200px 350px auto auto;
        background-color: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 0 10px 0 rgba(0,0,0,.2);
        transition: all .2s;
    }

    .add:hover {
        box-shadow: 0 0 10px 1px rgba(0,0,0,.2);
    }

    .submit, .submit:active {
        font-size: 14px;
        background-color: rgb(84,92,100);
        border: 1px solid rgb(84,92,100);
        box-shadow: none;
        border-radius: 4px;
        color: #f1f1f1;
        cursor: pointer;
        padding: 12px 20px;
        line-height: 1;
        transition: background .3s;
    }

    .submit:hover {
        color: #f1f1f1;
        background-color: rgb(67,74,80);
        border-color: rgb(67,74,80);
    }
</style>