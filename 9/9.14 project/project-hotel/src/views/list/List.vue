<template>
    <div class="container">
        <header>
            <section class="search-box">
                <div class="back-icon">
                    <van-image :src="icon.back_red"></van-image>
                </div>
                <div class="input-box">
                    <span>北京</span>
                    <input type="text" placeholder="关键词 景点">
                    <div class="voice-icon">
                        <van-image :src="icon.voice"></van-image>
                    </div>
                </div>
                <div class="locate-icon">
                    <van-image :src="icon.locate"></van-image>
                </div>
            </section>
            <section class="filter">
                <div v-for="item in filterItems" :key="item.index">
                    <div :class="{'filter-item': true, 'active': activeField === item.field}" @click="active(item.field)">
                        <span>{{item.name}}</span>
                        <i :class="[item.icon]"></i>
                    </div>
                </div>
                
            </section>
        </header>
        <main>
            <van-pull-refresh v-model="refreshing" @refresh="onRefresh" success-text="刷新成功">
                <van-list v-model="isLoading" :finished="isFinished" @load="onLoad" :immediate-check="false" finished-text="没有更多了">
                    <div class="recommend" v-if="homeList.length">
                        <div v-for="home in homeList" :key="home.index">
                            <basic-item :item="home"></basic-item>
                        </div>
                    </div>
                    <!-- <van-loading v-else/> -->
                </van-list>
            </van-pull-refresh>
        </main>
    </div>
</template>

<script>

// 语音图标
import voice from '@/assets/img/voice.png';
// 返回图标-红
import back_red from '@/assets/img/back-red.png';
// 定位箭头
import locate from '@/assets/img/locate.png';

// 列表项
import BasicItem from './BasicItem';
import base from '@/lib/base';
import {apiList} from '@/http/api';
import {Toast} from 'vant';
import 'vant/lib/toast/style'

export default {
    name: 'list',
    props: {
    },
    data () {
        return {
            filterItems: [
                {name: '综合', icon: 'iconfont icon-triangle-left', field: 'hid'},
                {name: '评分', icon: 'iconfont icon-triangle-left', field: 'hrank'},
                {name: '时间', icon: 'iconfont icon-triangle-left', field: 'htime'},
                {name: '筛选', icon: 'iconfont icon-triangle-left', field: 'filter', type: 'desc'},
            ],
            icon: {
                voice, back_red, locate
            },
            refreshing: false,
            isLoading: false,
            isFinished: false,
            homeList: [],
            paginate: {
                page: 0,
                limit: 8
            },
            // 综合hid 评分hrank 时间htime 时间type
            order: {
                field: 'hid',
                type: 'asc',
            },
            total: 0,
            activeField: 'hid'
        }
    },
    created () {},
    mounted () {
        this.onLoad();
    },
    watch: {},
    computed: {},
    methods: {

        active(itemField) {

            this.activeField = itemField;

            if(itemField != 'filter') {

                this.order.field = itemField;

            } else {
                
                if(this.filterItems[3].type == 'desc') {

                    this.order.type = 'desc';

                    this.filterItems[3].type = 'asc';

                    this.filterItems[3].name = '降序';

                } else {

                    this.order.type = 'asc';

                    this.filterItems[3].type = 'desc';

                    this.filterItems[3].name = '升序';
                }
            }

            this.onRefresh();

        },
        onLoad() {

            this.paginate.page++;

            let params = Object.assign({}, this.paginate, this.order);

            apiList(params).then(res => {

                if(res.items) {

                    !this.total && (this.total = res.total);

                    let items = res.items.map(el => {

                        el.hthumb = base.IMGURL + el.hthumb;

                        return el;

                    })

                    // 数组拼接
                    this.homeList.push(...items);

                    if(this.homeList.length >= this.total) {

                        this.isFinished = true;

                    }

                } else {

                    Toast({
                        message: '暂无数据'
                    })

                }

                this.isLoading = false;

                this.refreshing = false;

            }).catch(err => {

                console.log(err);

            });

        },
        onRefresh() {
            
            this.paginate.page = 0;

            this.homeList = [];

            this.isFinished = false;

            this.onLoad();

            this.isLoading = true;
            
        }
    },
    components: {
        BasicItem
    },
}
</script>

<style>

.container > header .van-image, .container > main .van-image {
    display: block;
}

</style>

<style src="../../style/list.css" scoped>
</style>