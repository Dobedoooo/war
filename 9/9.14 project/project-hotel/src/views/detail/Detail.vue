<template>
    <div class="">
        <!-- 头部及轮播图开始 -->
        <header>
            <div class="banner">
                <van-swipe class="swiper" :autoplay="3000" indicator-color="white">
                    <van-swipe-item v-for="(image, index) in images" :key="index">
                        <a href="javascript:;">
                            <van-image :src="image" />
                        </a>
                    </van-swipe-item>
                </van-swipe>
            </div>
            <div class="header-con">
                <div class="back">
                    <a href="javascript:;">
                        <van-image :src="icon.back" />
                    </a>
                </div>
                <div class="comment">
                    <van-image :src="icon.comment"/>
                </div>
                <div class="share">
                    <van-image :src="icon.share" />
                </div>
            </div>
        </header>
        <!-- 头部及轮播图结束 -->
        <!-- 主体部分开始 -->
        <main>
            <div class="container clearfix">
                <section class="clearfix topic">
                    <div class="title">
                        <span>初见 温馨 醉美民宿</span>
                    </div>
                    <div class="rank">
                        <div class="num">4.9</div>
                        <div class="dots clearfix">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="subscript">
                            <van-image :src="icon.corner"/>
                        </div>
                    </div>
                    <div class="tag">
                        <span class="tag-1">无接触入住</span><span class="tag-2">已消毒</span>
                    </div>
                </section>
                <section class="config">
                    <div class="config-item">
                        <van-image :src="icon.cfg_1"></van-image>
                        <span>整套酒店式公寓</span>
                    </div>
                    <div class="config-item">
                        <van-image :src="icon.cfg_2"></van-image>
                        <span>一室一厅</span>
                    </div>
                    <div class="config-item">
                        <van-image :src="icon.cfg_3"></van-image>
                        <span>一厨一卫</span>
                    </div>
                    <div class="config-item">
                        <van-image :src="icon.cfg_4"></van-image>
                        <span>配备齐全</span>
                    </div>
                    <div class="config-item">
                        <van-image :src="icon.cfg_5"></van-image>
                        <span>宜住两人</span>
                    </div>
                </section>
                <section class="duration arrow-box clear-fix">
                    <div class="in float-left">
                        <div class="action">入住</div>
                        <div class="date">5.17
                            <span class="week highlight">SUN</span>
                        </div>
                    </div>
                    <div class="time float-left">
                        <div class="count">共2晚</div>
                        <div class="underline">
                            <div class="right-line float-right"></div>
                        </div>
                    </div>
                    <div class="out float-left">
                        <div class="action">离店</div>
                        <div class="date">5.19
                            <span class="week">TUES</span>
                        </div>
                    </div>
                    <div class="right-arrow float-right">
                        <van-image :src="icon.arrow_right" />
                    </div>
                </section>
                <section class="discount arrow-box"></section>
                <section class="allowance arrow-box"></section>
            </div>
        </main>
        <!-- 主体部分结束 -->
    </div>
</template>

<script>
// 轮播图
import banner from '@/assets/img/banner.png';
// 返回按钮
import back from '@/assets/img/back.png';
// 分享按钮
import share from '@/assets/img/share.png';
// 聊天按钮
import comment from '@/assets/img/comment.png';
// 超赞角标
import corner from '@/assets/img/corner.png';
// 配置面板图标
import cfg_1 from '@/assets/img/house.png'
import cfg_2 from '@/assets/img/bed.png'
import cfg_3 from '@/assets/img/pot.png'
import cfg_4 from '@/assets/img/sofa.png'
import cfg_5 from '@/assets/img/man.png'
// 右箭头
import arrow_right from '@/assets/img/arrow-right.png';

export default {
    props: {
    },
    data () {
        return {
            images: [
                banner,
                banner,
                banner,
                banner,
            ],
            icon: {
                back, comment, share, corner, cfg_1, cfg_2, cfg_3, cfg_4, cfg_5, arrow_right
            }
        }
    },
    created () {},
    mounted () {
        console.log(back);
        console.log(comment);
    },
    watch: {},
    computed: {},
    methods: {},
    components: {},
}
</script>

<style>
.float-left {
    float: left;
}
.float-right {
    float: right;
}
* {
    box-sizing: border-box;
}
body {
    line-height: 1;
}

.van-image {
    vertical-align: middle;
}

/* 苹方粗体 */
@font-face {
    font-family: "PingFang SC Bold";
    src: url('../../assets/font/PINGFANG BOLD.TTF');
}

/* sanfrancisco粗体 */
@font-face {
    font-family: "SanFrancisco Display Bold";
    src: url(../../assets/font/SANFRANCISCODISPLAY-BOLD-4.TTF);
}
/* sanfrancisco light */
@font-face {
    font-family: "SanFrancisco Display Light";
    src: url(../../assets/font/SANFRANCISCODISPLAY-LIGHT-6.TTF);
}

.clear-fix::before,
.clear-fix::after {
    content: "";
    display: table;
    clear: both;
}
</style>

<style scoped>



/* 头部开始 */
header {
    /* width: 100%; */
    height: 4.58rem;
    overflow: hidden;
}

.banner .van-image {
    width: 100%;
}

/* 1rem =50px */
.header-con {
    width: 6.38rem;
    position: fixed;
    top: 1.14rem;
    left: .56rem;
    z-index: 9999;
    line-height: 0;
}

.back {
    float: left;
}

.back .van-image {
    height: .21rem;
    width: .12rem;
    margin-top: .12rem;
}

.share, .comment {
    float: right;
}

.share .van-image {
    width: .41rem;
}

.comment .van-image {
    width: .36rem;
    margin-left: .32rem;
}
/* 头部结束 */

/* 主体开始 */
.container {
    width: 6.38rem;
    margin: auto;
}

.topic {
    position: relative;
}

.title {
    font-size: .4rem;
    font-family: PingFang SC Bold;
    margin-top: .49rem;
    float: left;
}

.rank {
    width: .97rem;
    height: .97rem;
    border-radius: .1rem;
    box-shadow: 0 .06rem .15rem 0px rgba(0, 0, 0, .2);
    float: right;
    margin-top: .6rem;
    text-align: center;
    position: relative;
}

.rank .num {
    font-size: .4009rem;
    font-family: SanFrancisco Display Bold;
    width: 100%;
    margin-top: 0.15rem;
}

.dots {
    line-height: 0;
    height: auto;
    padding-left: .34rem;
    margin-top: .16rem;
}

.dots span {
    float: left;
    margin-right: .06rem;
    width: 0.06rem;
    height: 0.06rem;
    background-color: #eb666b;
    border-radius: 50%;
}

.subscript {
    position: absolute;
    top: -.12rem;
    right: 0;
    width: .58rem;
    height: 0.22rem;
    background-size: 100%;
}

.subscript .van-image {
    vertical-align: top;
}

.tag {
    color: #fff;
    font-size: .2rem;
    position: absolute;
    top: 1.19rem;
}

.tag-1, .tag-2 {
    display: inline-block;
    line-height: 0.38rem;
    padding: 0 .17rem 0 .1rem;
    /* line-height: 1; */
    border-top-right-radius: .19rem;
    border-bottom-right-radius: .19rem;
    border-top-left-radius: .04rem;
    border-bottom-left-radius: .04rem;
}

.tag-1 {
    background-color: #f9aa00;
    margin-right: .4rem;
}

.tag-2 {
    background-color: #eb666b;
}

.config {
    margin-top: .4rem;
    padding-left: .23rem;
    width: 100%;
    height: 1.14rem;
    background-color: rgba(246, 246, 246, .4);
    border-radius: .03rem;
    line-height: 1;
    color: rgba(0, 0, 0, .4);
    flex-wrap: wrap;
}

.config-item {
    float: left;
    margin-top: .25rem;
    width: 1.98rem !important;
    font-size: .2rem;
    font-family: PingFang SC Bold;
    height: .23rem;
}

.config-item .van-image {
    width: 0.22rem;
    margin-right: .07rem;
}

.duration {
    margin-top: .48rem;
}

.in {

}

.date {
    font-family: SanFrancisco Display Light;
    font-size: .52rem;
    margin-top: .24rem;
}

.action {
    font-size: .2rem;
    color: rgba(0, 0, 0, .35);
}

.week {
    font-family: SanFrancisco Display Bold;
    font-size: .26rem;
}

.week.highlight {
    color: #f8606a !important;
}

.time {
    margin: .36rem .78rem 0;
    width: 1.12rem;
    text-align: center;
}

.underline {
    width: 100%;
    height: 0.04rem;
    background-color: rgba(235, 102, 107, .3);
    border-radius: .02rem;
    margin-top: .14rem;
}

.right-line {
    width: 0.22rem;
    height: 100%;
    background-color: rgba(235, 102, 107, .6);
}

.count {
    font-family: PingFang SC Bold;
    font-size: .26rem;
    color: rgba(0, 0, 0, .35);
}

.arrow-box {
    width: 100%;
    position: relative;
}

.right-arrow .van-image {
    width: 0.12rem;
    height: .21rem;
    position: absolute;
    top: .49rem;
}
</style>