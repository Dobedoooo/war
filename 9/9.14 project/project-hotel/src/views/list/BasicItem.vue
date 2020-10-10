<template>
    <div class="recommend-item" v-if="item">
        <router-link :to="{name: 'detail', query: {hid: item.hid}}">
            <div class="recommend-item-img">
                <van-image :src="item.hthumb"></van-image>
                <div class="like">
                    <van-image :src="icon.like"></van-image>
                </div>
            </div>
            <div class="recommend-item-title">
                {{ item.hname }}
            </div>
            <div class="recommend-item-area">
                {{ item.hcity }}·{{ item.harea }}
            </div>
            <div class="recommend-item-star">
                <div class="recommend-star-container clear-fix">
                    <div class="recommend-star float-left" v-for="i in Math.round(item.hrank)" :key="i + Date.now() + Math.random()">
                        <van-image :src="icon.star"></van-image>
                    </div>
                    <div class="recommend-star float-left" v-for="j in (5 - Math.round(item.hrank))" :key="j + Date.now() + Math.random()">
                        <van-image :src="icon.star_dim"></van-image>
                    </div>
                </div>
            </div>
            <div class="recommend-item-price">
                <span class="rmb">RMB</span>
                <span class="recommend-price theme">{{item.hprice}}</span>
                <span class="each-night">每晚</span>
            </div>
        </router-link>
    </div>
</template>

<script>

import star from '@/assets/img/star.png';
import star_dim from '@/assets/img/star-dim.png';
import like from '@/assets/img/like.png';


export default {
    props: ['item'],
    data () {
        return {
            icon: {
                like, star, star_dim,
            }
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
a:link, a:visited, a:active {
    color: rgba(0, 0, 0, .8);
}

.recommend-item {
    position: relative;
    width: 3.04rem;
    margin-bottom: .55rem;
}

.rmb {
    font-size: .2rem;
    color: rgba(245, 76, 72, .9);
    font-family: SanFrancisco Display Bold;
}

.recommend-item-img {
    width: 3.03rem;
    height: 2.28rem;
    border-radius: .08rem;
    overflow: hidden;
}

.recommend-item-title {
    font-size: .32rem;
    font-family: PingFang SC Bold;
    font-weight: bold;
    color: rgba(45, 53, 68, .8);
    margin: .22rem 0 .19rem;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    line-height: 1;
}

.like {
    position: absolute;
    top: .23rem;
    right: .23rem;
    width: .26rem;
    height: .26rem;
}

.recommend-item-area {
    font-size: .2rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .6);
    margin-bottom: .15rem;
    line-height: 1;
}

.recommend-item-star {
    margin-bottom: .16rem;
}

.recommend-star {
    width: 0.24rem;
    height: 0.24rem;
}

.recommend-item-price {
    margin-bottom: .46rem;
    line-height: 1;
}

.recommend-price {
    font-size: .34rem;
    font-family: SanFrancisco Display Bold;
    margin: 0 .24rem 0;
}

.each-night {
    font-size: .2rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .6);
}
</style>