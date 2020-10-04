<template>
    <div class="">
        <el-form class="modify" :model="modify" :rules="rules" ref="modifyForm" v-show="cover">
            <input v-model="modify.cid" type="hidden">
            <h1 class="panel-title">分类变更</h1>
            <el-form-item label="分类名称" prop="cname">
                <el-input v-model="modify.cname" placeholder="分类名长度在2~6之间，包含数字、字母和汉字" @input="checkCname"></el-input>
            </el-form-item>
            <el-form-item label="分类描述" prop="cdesc">
                <el-input class="modifyCdesc" v-model="modify.cdesc" placeholder="分类描述长度在3~10之间" @input="checkCdesc"></el-input>
            </el-form-item>
            <el-form-item>
                <button :loading="loading" class="submit subable disabled" @click.prevent="onChange" disabled>提交</button>
            </el-form-item>
        </el-form>
        <el-form :inline="true" :model="search" class="search">
            <el-form-item label="分类名称">
                <el-input v-model="search.cname" placeholder="请输入分类名称"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button :loading="loading" class="submit" @click.prevent="onSearch">查询</el-button>
            </el-form-item>
        </el-form>
        <div class="table" v-loading="loading">
            <el-table :data="categories">
                <el-table-column prop="cid" label="ID"></el-table-column>
                <el-table-column prop="cname" label="分类名称"></el-table-column>
                <el-table-column prop="cdesc" label="分类描述"></el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <el-button type="warning" @click="onModify(scope.row)">修改</el-button>
                        <el-button @click="onDelete(scope.row)" type="danger">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>
        </div>
        <el-pagination class="pagination" background layout="total, prev, pager, next" :total="count" :page-size="pagination.limit" @current-change="onCurrentChange"></el-pagination>
    </div>
</template>


<script>

import axios from 'axios';
import base from '@/lib/base';

/**
 * 查看符合指定条件的某一页的若干条数据
 * 数据总数
 */
export default {
    props: ['setSignal'],
    data () {
        // 分类名称校验规则
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
            // 加载动画开关
            loading: false,
            // 搜索条件
            search: {
                cname: '',
            },
            // 分页
            pagination: {
                page: 1,
                limit: 9    
            }, 
            categories: [],
            count: 0,
            modify: {
                cid: '',
                cname: '',
                cdesc: ''
            },
            temp: {
                cid: '',
                cname: '',
                cdesc: ''
            },
            cover: false,
            rules: {
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
    mounted () {
        this.initCategory();
    },
    watch: {
        setSignal: function(val) {

            this.cover = val;

            if(!val) {

                let button = document.querySelector('.subable');
                button.setAttribute('disabled', 'disabled');    
                button.classList.add('disabled');

            }

        }
    },
    computed: {},
    methods: {
        // 初始化数据
        initCategory() {

            // 启动加载动画
            this.loading = true;

            axios({
                url: base.URL + '/admin/category/index',
                method: 'get',
                headers: {
                    token: sessionStorage.getItem('token'),
                },
                params: Object.assign(this.search, this.pagination),
            }).then(res => {

                if(res.status == 200 && res.data.code == 200) {

                    this.categories = res.data.data.categories;

                    this.count = res.data.data.count;

                    this.loading = false;

                } else {

                    this.$message({
                        type: res.data.status,
                        message: res.data.msg
                    })

                }

            }).catch(() => {

                this.$message = ({
                    type: 'error',
                    message: '未知错误'
                });
            })

        },
        // 页码变化
        onCurrentChange(val) {
            
            this.pagination.page = val;

            this.initCategory()
        },
        // 搜索
        onSearch() {

            this.pagination.page = 1;

            this.initCategory();
        },
        // 删除
        onDelete(row) {
            
            axios({
                url: base.URL + '/admin/category/delete',
                method: 'get',
                params: {
                    cid: row.cid
                },
                headers: {
                    token: sessionStorage.getItem('token')
                }
            }).then(res => {

                if(res.status === 200 && res.data.code === 200) {

                    this.$notify({
                        type: res.data.status,
                        title: res.data.msg,
                    });

                    // 刷新组件
                    this.initCategory();

                }

            }).catch(res => {

                this.$notify({
                    type: res.data.status,
                    title: res.data.msg,
                });

            })

        },
        // 显示修改表单
        onModify(row) {

            // 显示遮罩和表单
            this.cover = true;
            this.$emit('getSignal', true);

            // 绑定数据
            this.modify.cname = row.cname;
            this.modify.cid = row.cid;
            this.modify.cdesc = row.cdesc;
            this.temp.cname = row.cname;
            this.temp.cid = row.cid;
            this.temp.cdesc = row.cdesc;
        },
        
        // 启动提交按钮
        checkCname() {
            let button = document.querySelector('.subable');

            if(this.modify.cname != this.temp.cname) {
                
                button.removeAttribute('disabled');

                button.classList.remove('disabled');

            } else {

                button.setAttribute('disabled', 'disabled');

                button.classList.add('disabled');

            }
        },
        checkCdesc() {
            let button = document.querySelector('.subable');

            if(this.modify.cdesc != this.temp.cdesc) {
                
                button.removeAttribute('disabled');

                button.classList.remove('disabled');

            } else {

                button.setAttribute('disabled', 'disabled');

                button.classList.add('disabled');

            }
        },
        // 提交修改表单
        onChange() {
            
            this.$refs['modifyForm'].validate(valid => {

                if(valid) {

                    this.loading = true;

                    this.$http({
                        method: 'get',
                        url: base.URL + '/admin/category/update',
                        params: this.modify,
                        headers: {
                            token: sessionStorage.getItem('token')
                        }
                    }).then(res => {

                        if(res.status === 200 && res.data.code === 200) {

                            this.$notify({
                                type: res.data.status,
                                title: res.data.msg,
                            });
                            
                            // 刷新组件
                            this.initCategory();

                            // 隐藏修改表单
                            this.cover = false;
                            this.$emit('getSignal', false);

                            this.loading = false;

                        } else {
                            this.$notify({
                                type: res.data.status,
                                title: res.data.msg,
                            });
                            this.loading = false;
                        }

                    }).catch(res => {

                        this.$notify({
                            type: res.data.status,
                            title: res.data.msg,
                        });

                    })
                }

            })

           

        }
    },
    components: {},
}
</script>

<style>

    .table {
        background-color: #fff;
        height: 686px;
        padding: 20px 10px 0;
        border-radius: 20px;
        margin-bottom: 10px;
        overflow: hidden;
        transition: box-shadow .2s;
        box-shadow: 0 0 10px 0 rgba(0,0,0,.2);
    }

    .search {
        margin: 10px 30px;
    }

    .table:hover {
        box-shadow: 0 0 10px 1px rgba(0,0,0,.2);
    }

    .pagination {
        position: absolute;
        right: 20px;
    }
</style>

<style scoped>

    .modify {
        width: 1000px;
        height: 360px;
        position: absolute;
        box-sizing: border-box;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: 200px auto;
        background-color: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 0 10px 0 rgba(0,0,0,.2);
        z-index: 9999;
    }

    .submit, .submit:active {
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

    button:disabled {
        cursor: not-allowed !important;
        background-color: rgb(114 124 133) !important;
        border-color: rgb(114 124 133) !important;
    }

    
</style>