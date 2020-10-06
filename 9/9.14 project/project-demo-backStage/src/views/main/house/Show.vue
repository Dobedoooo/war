<template>
    <div class="">
        <el-form :inline="true" class="search" :model="search">
            <el-form-item label="所属分类">
                <el-select v-model="search.cid" placeholder="请选择民宿所属分类">
                    <el-option v-for="item in categories" :key="item.cid" :label="item.cname" :value="item.cid"></el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="民宿名称">
                <el-input placeholder="请输入民宿名称" v-model="search.hname"></el-input>
            </el-form-item>
            <el-form-item label="所在城市">
                <el-input placeholder="请输入城市名称" v-model="search.hcity"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button class="submit" :loading="loading" @click="onSearch">查询</el-button>
                <el-button class="submit" @click="onReset">重置</el-button>
            </el-form-item>
        </el-form>
        <div class="table" v-loading="loading">
            <el-table :data="homestay">
                <el-table-column prop="hid" label="ID" width="100"></el-table-column>
                <el-table-column prop="cname" label="所属分类"></el-table-column>
                <el-table-column prop="hname" label="民宿名称"></el-table-column>
                <el-table-column prop="hprice" label="民宿价格"></el-table-column>
                <el-table-column  label="所在地">
                    <template slot-scope="scope">
                        <span>{{ scope.row.hprovince }}-{{scope.row.hcity}}-{{scope.row.harea}}</span>
                    </template>
                </el-table-column>
                <el-table-column  label="标签" prop="htag">
                    <template slot-scope="scope">
                        <el-button size="mini" round class="htag" v-for="(item, index) in scope.row.htag.split(/,|，/)" :key="index">{{item}}</el-button>
                    </template>
                </el-table-column>
                <el-table-column  label="状态">
                    <template slot-scope="scope">
                        {{scope.row.hstatus==1?'可预订':'不可预订'}}
                    </template>
                </el-table-column>
                <!-- <el-table-column  label="评分" prop="hrank"></el-table-column> -->
                <el-table-column label="注册时间" prop="htime">
                    <template slot-scope="scope">
                        {{scope.row.htime | formatTime('/')}}
                    </template>
                </el-table-column>
                <el-table-column label="操作">
                     <template slot-scope="scope">
                        <router-link class="operating" :to="{name: 'editHouse', params: {hid: scope.row.hid}}"><el-button size="medium" type="warning">变更</el-button></router-link>
                        <el-button size="medium" style="margin-left: 10px;" @click="onDelete(scope.row.hid)" type="danger">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>
        </div>
        <el-pagination class="pagination" background layout="total, prev, pager, next" :total="count" :page-size="pagination.limit" @current-change="onCurrentChange"></el-pagination>
    </div>
</template>

<script>
import {categoryIndex} from '@/http/category';
import {homestayIndex, homestayDelete} from '@/http/homestay';

export default {
    props: {
    },
    data () {
        return {
            loading: false,
            homestay: [],
            pagination: {
                limit: 8,
                page: 1
            },
            count: 0,
            search: {
                cid: '',
                hname: '',
                hcity: '',
            },
            categories: [],
        }
    },
    created () {},
    mounted () {
        this.initHomestay();
        this.initCategory();
    },
    watch: {},
    computed: {},
    methods: {
        // 初始化数据
        initHomestay() {

            this.loading = true;

            homestayIndex({ params: Object.assign(this.search, this.pagination) }).then(res => {

                this.homestay = res.data;

                this.count = res.count;

                this.loading = false;

            }).catch(err => {

                console.log(err);

                this.loading = false;

            })

        },

        // 分页
        onCurrentChange(val) {

            this.pagination.page = val;

            this.initHomestay();

        },

        // 搜索
        onSearch() {

            this.pagination.page = 1;

            this.initHomestay();

        },

        // 初始化分类
        initCategory() {

            categoryIndex().then(res => {

                this.categories = res.data

            }).catch(err => {

                console.log(err);

            })

        },

        // 重置查询条件
        onReset() {

            this.search.cid = '';
            this.search.hname = '';
            this.search.hcity = '';

            this.initHomestay();

        },

        onDelete(hid) {
            
            homestayDelete(hid).then(res => {

                this.$notify({
                    type: res.status,
                    message: res.msg,
                    title: '消息',
                });

                this.initHomestay();

            }).catch(err => {

                console.log(err);

            })

        }

    },
    components: {},
}
</script>
<style scoped>
.htag {
    margin-left: 0 !important;
}

</style>