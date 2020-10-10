<template>
    <div style="font-family: PingFang SC Bold">
        <!-- 头部及轮播图开始 -->
        <header>
            <div class="banner" v-if="homestay">
                <van-swipe class="swiper" :autoplay="3000" indicator-color="white">
                    <van-swipe-item v-for="(image, index) in homestay.hbanner" :key="index">
                        <van-image :src="image" />
                    </van-swipe-item>
                </van-swipe>
            </div>
            <div class="header-con">
                <div class="back" @click="back">
                    <van-image :src="icon.back" />
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
                <section class="clearfix topic" v-if="homestay">
                    <div class="title float-left">
                        <p>{{homestay.hname}}</p>
                    </div>
                    <div class="rank float-left">
                        <div class="num">{{homestay.hrank.toFixed(1)}}</div>
                        <div class="dots clearfix">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="subscript float-left">
                            <van-image :src="icon.corner"/>
                        </div>
                    </div>
                    <div class="tag">
                        <span class="tag-item" v-for="(item, index) in homestay.htag" :key="index">{{item}}</span>
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
                    <router-link to="/">
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
                        <div class="right-arrow">
                            <van-image :src="icon.arrow_right" />
                        </div>
                    </router-link>
                </section>
                <section class="discount arrow-box clearfix">
                    <router-link to="/;">
                        <van-image :src="icon.ticket" class="float-left ticket"></van-image>
                        <div class="float-left">新手立减 · 今日特价 · 连住优惠</div>
                        <div class="right-arrow float-right">
                            <van-image :src="icon.arrow_right" />
                        </div>
                    </router-link>
                </section>
                <section class="allowance arrow-box clearfix">
                    <router-link to="/">
                        <van-image :src="icon.red_bag" class="float-left red-bag"></van-image>
                        <div class="allowance-tag float-left">九折优惠</div>
                        <div class="allowance-tag float-left">满100减5</div>
                        <div class="right-arrow right-arrow-red">
                            <van-image :src="icon.arrow_right_red" />
                        </div>
                        <div class="link float-right">去领取</div>
                    </router-link>
                </section>
                <section class="tabs" v-if="homestay">
                    <van-tabs v-model="active">
                        <van-tab title="详情">
                            <div :class="{'desc': true, 'show-more-desc': moreFlag}" v-html="homestay.hdetail">
                            </div>
                            <div class="more">
                                <span class="theme" @click="viewMore">{{moreFlag?'查看更多':'收起'}}</span>
                            </div>
                            <section class="highlight">
                                <div class="tab-title">房屋<span class="color-mark">亮点</span></div>
                                <div class="highlight-items">
                                    <div class="highlight-item">
                                        <div class="hightlight-item-img">
                                            <van-image :src="icon.towel"></van-image>
                                        </div>
                                        <div class="hight-light-item-title">洗漱用品齐全</div>
                                        <div class="hight-light-item-desc">提供牙刷、毛巾、卫生纸香皂等</div>
                                    </div>
                                    <div class="highlight-item">
                                        <div class="hightlight-item-img">
                                            <van-image :src="icon.comment_red"></van-image>
                                        </div>
                                        <div class="hight-light-item-title">住客好评</div>
                                        <div class="hight-light-item-desc">干净整洁</div>
                                    </div>
                                    <div class="highlight-item">
                                        <div class="hightlight-item-img">
                                            <van-image :src="icon.attractions"></van-image>
                                        </div>
                                        <div class="hight-light-item-title">附近有景点</div>
                                        <div class="hight-light-item-desc">近解放路步行街等10个景点</div>
                                    </div>
                                </div>
                            </section>
                            <section class="owner">
                                <div class="tab-title">房东<span class="color-mark">介绍</span></div>
                                <div class="owner-card">
                                    <div class="avatar">
                                        <van-image :src="avatar"></van-image>
                                    </div>
                                    <div class="owner-name">七色可乐</div>
                                    <div class="owner-tags theme">
                                        <span class="owner-tag">个人房东</span>
                                        <span class="owner-tag">超赞房东</span>
                                        <span class="owner-tag">实名验证</span>
                                    </div>
                                    <div class="owner-info">
                                        <span class="praise info">
                                            <span>好评率</span>
                                            <span class="praise-percentage">91%</span>
                                        </span>
                                        <span class="split-y"></span>
                                        <span class="response info">
                                            <span>回复率</span>
                                            <span class="response-percentage">100%</span>
                                        </span>
                                    </div>
                                    <div class="split-x"></div>
                                    <div class="owner-desc">它安静于此，等待与你擦肩。很高兴在这里遇见未来的每一个租客，本人一直从事互联网服务...</div>
                                    <div class="owner-link">
                                        <router-link to="/;">查看房东主页</router-link>
                                    </div>
                                </div>
                            </section>
                            <section class="location">
                                <div class="tab-title">房屋<span class="color-mark">位置</span></div>
                                <div class="map">
                                    <van-image :src="map"></van-image>
                                </div>
                            </section>
                        </van-tab>
                        <van-tab title="评价">
                            <section class="reviews">
                                <div class="tab-title">房客<span class="color-mark">点评</span></div>
                                <div class="score-info clearfix">
                                    <span class="score float-left">{{ score_info.score.toFixed(1) }}</span>
                                    <div class="stars float-left">
                                        <span class="theme">超赞</span>
                                        <div class="clearfix star-container">
                                            <div class="star float-left" v-for="item in score_info.stars" :key="item">
                                                <van-image :src="icon.star"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-count float-left"><span>{{ score_info.commentsNum }}</span>条评论</div>
                                    <div class="aspects float-left">
                                        <div class="health float-left">
                                            卫生
                                            <span class="aspects-score"> {{ score_info.health_score.toFixed(1) }} </span>
                                        </div>
                                        <div class="traffic float-left">
                                            交通
                                            <span class="aspects-score"> {{ score_info.traffic_score.toFixed(1) }} </span>
                                        </div>
                                        <div class="service float-left">
                                            服务
                                            <span class="aspects-score"> {{ score_info.service_score.toFixed(1) }} </span>
                                        </div>
                                        <div class="decoration float-left">
                                            装修
                                            <span class="aspects-score"> {{ score_info.decoration_score.toFixed(1) }} </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-panel">
                                    <div class="user">
                                        <div class="avatar">
                                            <van-image :src="comments[0].avatar"></van-image>
                                        </div>
                                        <div class="user-info">
                                            <span class="user-name"> {{ comments[0].userName }} </span>
                                            <span class="user-rank">
                                                <van-image :src="comments[0].userRank"/>
                                            </span>
                                            <div class="check-in-time"> {{ comments[0].checkInTime }} <span>入住</span> </div>
                                            <div class="user-score">
                                                <div class="aspects-score"> {{ comments[0].score.toFixed(1) }} </div>
                                                <div class="clearfix star-container">
                                                    <div class="star float-left" v-for="item in comments[0].score" :key="item">
                                                        <van-image :src="icon.star"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="comment-detail"> {{ comments[0].comment }} </p>
                                </div>
                            </section>
                            <section class="load-more">
                                <div class="dot-container">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </section>
                            <section class="service-facility">
                                <div class="tab-title">服务<span class="color-mark">设施</span></div>
                                <div class="service-items">
                                    <div class="basic service-item">
                                        <div class="service-item-img">
                                            <van-image :src="icon.radio"></van-image>
                                        </div>
                                        <div class="service-item-title">基础设施</div>
                                        <div class="service-item-detail">
                                            <ul>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    无线网络
                                                </li>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    部分空调
                                                </li>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    洗衣机
                                                </li>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    电视
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bath-room service-item">
                                        <div class="service-item-img">
                                            <van-image :src="icon.bath"></van-image>
                                        </div>
                                        <div class="service-item-title">卫浴设施</div>
                                        <div class="service-item-detail">
                                            <ul>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    全天热水
                                                </li>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    洗浴用品
                                                </li>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    毛巾
                                                </li>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    牙具
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="kitchen service-item">
                                        <div class="service-item-img">
                                            <van-image :src="icon.pot_2"></van-image>
                                        </div>
                                        <div class="service-item-title">厨房设施</div>
                                        <div class="service-item-detail">
                                            <ul>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    烹饪厨具
                                                </li>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    电磁炉
                                                </li>
                                                <li>
                                                    <van-image :src="icon.tick"></van-image>
                                                    厨具
                                                </li>
                                                <li>
                                                    <van-image :src="icon.error"></van-image>
                                                    调料
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="load-more">
                                <div class="dot-container">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </section>
                        </van-tab>
                        <van-tab title="须知">
                            <div class="order-notice">
                                <div class="tab-title">预定<span class="color-mark">须知</span></div>
                                <div class="notie-container">
                                    <div class="notice-item">
                                        <span class="notice-title">在线押金</span>    
                                        <span class="notice-des">200元 离店后原路退回</span>    
                                    </div>
                                    <div class="notice-item">
                                        <span class="notice-title">清洁费</span>    
                                        <span class="notice-des">您将免费享受房东提供的客房清洁服务</span>    
                                    </div>
                                    <div class="notice-item">
                                        <span class="notice-title">发票说明</span>    
                                        <span class="notice-des"><router-link class="theme" to="/">民宿开具发票，点击进入发票说明页
                                        <van-image :src="icon.arrow_right_red"></van-image>
                                        </router-link></span>    
                                    </div>
                                    <div class="notice-item">
                                        <span class="notice-title">退订规则</span>    
                                        <span class="notice-des">
                                            <span>提前一天退订将退还您全部费用取消订单或者提前离店（需联系客服）将收取未住房费的50%</span>
                                        </span>    
                                    </div>
                                </div>
                            </div>
                            <div class="check-in-notice">
                                <div class="tab-title">入住<span class="color-mark">须知</span></div>
                                <div class="notie-container">
                                    <div class="notice-item">
                                        <span class="notice-title">入住时间</span>    
                                        <span class="notice-des">15:00后入住 12:00前退房</span>    
                                    </div>
                                    <div class="notice-item">
                                        <span class="notice-title">接待时间</span>    
                                        <span class="notice-des">00:00-24:00</span>    
                                    </div>
                                    <div class="notice-item">
                                        <span class="notice-title">卫生打扫</span>    
                                        <span class="notice-des">一客一扫</span>    
                                    </div>
                                    <div class="notice-item">
                                        <span class="notice-title">房东要求</span>    
                                        <span class="notice-des">
                                            <span>请把这里当成自己的家就好</span>
                                        </span>    
                                    </div>
                                </div>
                            </div>
                        </van-tab>
                        <van-tab title="推荐">
                            <div class="tab-title">房屋<span class="color-mark">推荐</span></div>
                            <div class="recommend" v-if="recommend.length">
                                <div class="recommend-item" v-for="(item, index) in recommend" :key="index">
                                    <basic-item :item="item"></basic-item>
                                </div>
                            </div>
                        </van-tab>
                    </van-tabs>
                </section>
            </div>
        </main>
        <!-- 主体部分结束 -->
        <!-- 底部开始 -->
        <footer v-if="homestay">
            <div class="contact">
                <router-link to="/">
                    <van-image :src="icon.contact"/>
                    <div>联系房东</div>
                </router-link>
            </div>
            <div class="collect">
                <div>
                    <i :class="{'iconfont': true, 'icon-heart': true, 'collected': isCollection}"></i>
                </div>
                <div>1.1k收藏</div>
            </div>
            <div class="price">
                <van-image :src="icon.price"/>
                <span>{{homestay.hprice}}</span>
            </div>
            <router-link to="/">
                <div class="order-btn">立即预定</div>
            </router-link>
        </footer>
        <!-- 底部结束 -->
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
import arrow_right_red from '@/assets/img/arrow-right-red.png';
// 
import ticket from '@/assets/img/ticket.png';
// 红包
import red_bag from '@/assets/img/red-bag.png';
// 毛巾
import towel from '@/assets/img/towel.png';
// 好评
import comment_red from '@/assets/img/comment-red.png';
// 景点
import attractions from '@/assets/img/attractions.png';
// 房东头像
import owner_avatar from '@/assets/img/owner-avatar.png';
// 地图
import map from '@/assets/img/map.png';
// 星
import star from '@/assets/img/star.png';
import star_dim from '@/assets/img/star-dim.png';
// v1
import rank_1 from '@/assets/img/rank-1.png';
// 用户头像
import user_avatar from '@/assets/img/user-avatar.png';
// 收藏
import favorites from '@/assets/img/favorites.png';
// ￥
import price from '@/assets/img/price.png';
// 联系
import contact from '@/assets/img/contact.png';
// 收音机
import radio from '@/assets/img/radio.png';
// 卫浴
import bath from '@/assets/img/bath.png';
// 锅
import pot_2 from '@/assets/img/pot-2.png';
// 对勾
import tick from '@/assets/img/tick.png';
// ×
import error from '@/assets/img/error.png';
// 喜欢
import like from '@/assets/img/like.png';

import {apiDetail} from '@/http/api';
import base from '@/lib/base';

import BasicItem from '../list/BasicItem';

export default {
    name: 'detail',
    props: {
    },
    data () {
        return {
            active: 0,
            moreFlag: true,
            images: [
                banner,
                banner,
                banner,
                banner,
            ],
            icon: {
                back, comment, share, corner, cfg_1, cfg_2, cfg_3, cfg_4, cfg_5, arrow_right, ticket, arrow_right_red, red_bag, towel, comment_red, attractions, star, favorites, price, contact, radio, bath, pot_2, tick, error, like, star_dim
            },
            avatar: owner_avatar,
            map: map,
            score_info: {
                score: 4.9,
                stars: 5,
                commentsNum: 245,
                health_score: 5.0,
                traffic_score: 5.0,
                service_score: 5.0,
                decoration_score: 5.0,
            },
            comments: [
                {
                    avatar: user_avatar,
                    userName: '桃***小姐',
                    userRank: rank_1,
                    checkInTime: '2019.12.13',
                    score: 5,
                    comment: '如果你喜欢上海，喜欢格调，选它没错了，老板人很好房间干净，离迪士尼很近，可以跟着班车去，房东很好离开洒家发asdsa'
                }
            ],
            recommend: [],
            homestay: null,
        }
    },
    created () {},
    mounted () {

        let hid = this.$route.query.hid;

        this.initHome(hid);
    },
    watch: {
        '$route.query'() {

            this.initHome(this.$route.query.hid);

            window.scrollTo(0, 0);

            this.active = 0;

        }
    },
    computed: {
        isCollection() {

            return this.$store.getters.isCollection(this.homestay.hid);

        }
    },
    methods: {
        // 初始化
        initHome(hid) {

            apiDetail(hid).then(res => {

                let homestay = res.data.homeStay;

                // 为图片补全路径
                homestay.hbanner = homestay.hbanner.split(',').map(el => base.IMGURL + el);

                // 分割标签
                homestay.htag = homestay.htag.split(/[,|，]/);

                this.homestay = homestay;

                let recommend = res.data.recommend;

                // 为图片补全路径
                recommend = recommend.map(el => {

                    el.hthumb = base.IMGURL + el.hthumb;

                    return el;

                })

                this.recommend = recommend;

            }).catch(err => {

                console.log(err);

            })

        },

        // 查看更多
        viewMore() {

            this.moreFlag = !this.moreFlag;

        },

        back() {

            this.$router.back();

        },

        // collect() {

        //     let collection = this.$store.getters.getCollection();

        // }

    },
    components: {
        BasicItem
    },
}
</script>

<style>

.van-image {
    vertical-align: middle;
}

.banner .van-image {
    width: 100%;
}

.van-swipe__indicators {
    bottom: 1.5rem !important;   
}

.back .van-image {
    height: .21rem;
    width: .12rem;
    margin-top: .12rem;
}

.share .van-image {
    width: .41rem;
}

.comment .van-image {
    width: .36rem;
    margin-left: .32rem;
}

.subscript .van-image {
    vertical-align: top;
}

.config-item .van-image {
    width: 0.22rem;
    margin-right: .07rem;
}

.duration .right-arrow {
    position: absolute;
    top: .49rem;
    right: 0;
}

/* 标签开始 */
.van-tab {
    width: 1.34rem;
    height: .64rem;
    color: rgba(0, 0, 0, .8) !important;
    font-size: .26rem !important;
    font-family: PingFang SC Bold;
    z-index: 1;
    transition: .2s;
}

.van-tab--active {
    color: #fff !important;
    position: relative;
}

.van-tabs__line {
    width: 1.34rem !important;
    height: .64rem !important;
    border-radius: .32rem !important;
    background-color: #eb666b !important;
    z-index: 0 !important;
    top: 0;
    box-shadow: 0 .05rem .2rem 0 rgba(219, 110, 111, 0.5);
}

.van-tab__text::before {
    content: "";
    width: .09rem !important;
    height: .09rem !important;
    background-color: #fff;
    position: absolute;
    border-radius: .09rem;
    top: .27rem;
    left: .35rem;
}

.van-tab__pane {
    margin-bottom: 1.3rem !important;
}

.star .van-image {
    vertical-align: top;
}
/* 标签结束 */

.map .van-image {
    width: 100%;
}

.notice-des .van-image {
    height: .21rem;
    width: 0.12rem;
    position: absolute;
    right: 0;
    top: .12rem;
}

.contact .van-image, .collect .van-image {
    width: 100%;
    margin-bottom: .12rem;
}
.contact img, .collect img {
    width: .36rem;
    margin: auto;
}
.price img {
    margin-right: .08rem;
    margin-top: .08rem;
    width: 0.12rem;
    height: 0.15rem;
}

.user-rank img {
    width: 0.3rem;
}

.right-arrow .van-image {
    width: 0.12rem;
    height: .21rem;
}

.hightlight-item-img .van-image:first-of-type {
    width: .74rem;
    height: .66rem;
}

.hightlight-item-img .van-image:nth-of-type(2) {
    width: .63rem;
    height: .66rem;
}

.hightlight-item-img .van-image:nth-of-type(3) {
    width: .77rem;
    height: .66rem;
}

.service-item-detail .van-image {
    width: 0.21rem;
    height: .21rem;
}

.service-item-img img {
    width: 0.65rem;
}
</style>

<style scoped>
.float-left {
    float: left;
}
.float-right {
    float: right;
}
* {
    box-sizing: border-box;
}
div {
    line-height: 1;
    /* overflow-x: hidden; */
}

.clear-fix::before,
.clear-fix::after {
    content: "";
    display: table;
    clear: both;
}

/* 头部开始 */
header {
    /* width: 100%; */
    height: 4.58rem;
    /* overflow: hidden; */
}

/* 1rem =50px */
.header-con {
    width: 6.38rem;
    position: absolute;
    top: 1.14rem;
    left: .56rem;
    z-index: 9999;
    line-height: 0;
}

.back {
    float: left;
}

.share, .comment {
    float: right;
}
/* 头部结束 */

/* 主体开始 */
main {
    border-top-left-radius: .08rem;
    border-top-right-radius: .08rem;
    position: relative;
    background-color: #fff;
}

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
    width: 4.8rem;
}

.title p {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
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

.tag {
    color: #fff;
    font-size: .2rem;
    position: absolute;
    top: 1.19rem;
}

.tag-item {
    display: inline-block;
    line-height: 0.38rem;
    padding: 0 .17rem 0 .1rem;
    border-top-right-radius: .19rem;
    border-bottom-right-radius: .19rem;
    border-top-left-radius: .04rem;
    border-bottom-left-radius: .04rem;
    margin-right: .4rem;
}

.tag-item:nth-child(even) {
    background-color: #eb666b;
}

.tag-item:nth-child(odd) {
    background-color: #f9aa00;
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

.duration {
    margin-top: .48rem;
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

.arrow-box a:active, .arrow-box a:visited, .arrow-box a:link {
    color: #000;
}

.discount {
    margin-top: .54rem;
}

.discount .right-arrow {
    position: absolute;
    top: .07rem;
    right: 0;
}

.discount a{
    font-size: .26rem;
    color: rgba(0, 0, 0, .65) !important;
}

.discount .ticket {
    width: 0.39rem;
    margin-right: .24rem;
}

.allowance {
    margin-top: .37rem;
    line-height: 1;
}

.allowance .allowance-tag, .link {
    color: #eb666b;
    font-size: .2rem;
}

.allowance .allowance-tag {
    border-radius: .08rem;
    border: 2px solid #fdeff0;
    padding: .07rem;
    margin-right: .4rem;
}

.allowance .red-bag {
    width: 0.32rem;
    margin-left: .04rem;
    margin-right: .26rem;
}

.link {
    line-height: .39rem;
    margin-right: .2rem;
}

.right-arrow-red {
    position: absolute;
    right: 0;
}

.tabs {
    margin-top: .72rem;
}

/* 标签页1开始 */
.desc, .more span {
    font-size: .26rem;
    color: rgba(0, 0, 0, .5);
    line-height: .42rem;
    font-family: PingFang SC Bold;
}

.desc {
    margin-top: .25rem;
}

.show-more-desc {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
}

.more {
    margin-top: .1rem;
}

.tab-title {
    font-size: .36rem;
    color: rgba(0, 0, 0, .9);
    font-family: PingFang SC Bold;
    margin-top: .6rem;
}

.color-mark {
    color: #dc6e6f !important;
}

.highlight-items {
    display: flex;
    justify-content: space-between;
    text-align: center;
    margin-top: .36rem;
}

.highlight-item {
    width: 33%;
}

.hightlight-item-img {
    margin: auto;
    height: 1.1rem;
    width: 1.1rem;
    border-radius: 1.1rem;
    background-color: rgba(235, 102, 107, .1);
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: .16rem;
}

.hight-light-item-title {
    font-size: .26rem;
    color: rgba(0, 0, 0, .9);
    font-family: PingFang SC Bold;
    margin-bottom: .2rem;
}

.hight-light-item-desc {
    font-size: .2rem;
    color: rgba(0, 0, 0, .4);
    font-family: PingFang SC Bold;
    line-height: 0.28rem;
}

.owner-card {
    margin-top: .94rem;
    width: 100%;
    border-radius: .08rem;
    box-shadow: 0 .05rem .15rem 0px rgba(242, 242, 242, 0.75);
    position: relative;
    padding: .32rem .35rem;
}

.owner-name {
    color: rgba(0, 0, 0, .9);
    font-size: .26rem;
    font-family: PingFang SC Bold;
    margin-bottom: .24rem;
}

.owner-tags {
    margin-bottom: .23rem;
}

.owner-tag {
    padding: .04rem .14rem;
    border-radius: 1rem;
    background-color: rgba(235, 102, 107, .1);
    font-size: .2rem;
    font-family: PingFang SC Bold;
    margin-right: .3rem;
}

.info span {
    color: rgba(0, 0, 0, .4);
    font-family: PingFang SC Bold;
    font-size: .2rem;
    margin-right: .32rem;
}

.praise-percentage, .response-percentage {
    color: rgba(0, 0, 0, .6);
    font-family: PingFang SC Bold;
    font-size: .22rem;
    margin-right: .32rem;
}

.split-y {
    height: .21rem;
    width: .02rem;
    background-color: rgba(0, 0, 0, .03);
    margin-right: .32rem;
}

.split-x {
    height: 0.02rem;
    width: 100%;
    background-color: rgba(0, 0, 0, .03);
    margin-top: .07rem;
    margin-bottom: .24rem;
}

.owner-desc {
    font-size: .26rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .5);
    line-height: 0.32rem;
}

.owner-link {
    font-size: .26rem;
    margin-top: .24rem;
}

.owner-link a {
    color: #eb666b;
}

.avatar {
    width: 0.8rem;
    height: .8rem;
    border-radius: .4rem;
    box-shadow: 0 0 0 .1rem rgba(0, 0, 0, .03);
    border: .01rem solid #fff;
    overflow: hidden;
    position: absolute;
    top: -0.4rem;
    right: .65rem;
    background-color: #ececec;
}

.map {
    margin-top: .48rem;
}

/* 标签页1结束 */

/* 标签页2开始 */
.score-info {
    margin-top: .48rem;
}

.score {
    font-size: .62rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .9);
}

.stars {
    margin-left: .23rem;
}

.stars span {
    font-size: .2rem;
    font-family: PingFang SC Bold;
    line-height: 1;
}

.star {
    width: 0.22rem;
}

.star-container {
    height: .22rem;
}

.comment-count {
    font-size: .2rem;
    color: rgba(0, 0, 0, .5);
    font-family: PingFang SC Bold;
    margin-left: .32rem;
    margin-top: .4rem;
}

.aspects {
    width: 100%;
    margin-top: .2rem;
    color: rgba(0, 0, 0, .4);
    font-size: .2rem;
    font-family: PingFang SC Bold
}

.aspects-score {
    font-size: .24rem;
}

.aspects > div {
    margin-right: .47rem;
}

.aspects-score {
    margin-left: .15rem;
}

.user {
    position: relative;
    width: 100%;
    margin-top: .4rem;
}

.user-info {
    padding-left: 1.05rem;
}

.comment-panel {
    margin-top: .7rem;
}

.user .avatar {
    top: 0;
    left: 0;
    padding-top: .1rem;
    padding-left: .1rem;
}

.user-name {
    font-size: .26rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .6);
    line-height: .32rem;
}

.check-in-time {
    font-size: .24rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .4);
}

.check-in-time span {
    font-size: .2rem;
}

.user-score {
    position: absolute;
    top: 0;
    right: 0;
}

.user .aspects-score {
    text-align: right;
    line-height: .23rem;
    color: rgba(0, 0, 0, .4);
    font-family: PingFang SC Bold;
}

.comment-detail {
    margin-top: .32rem;
    font-size: .26rem;
    color: rgba(0, 0, 0, .5);
    font-family: PingFang SC Bold;
    line-height: .32rem;
    overflow : hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.load-more {
    margin: .4rem auto .4rem;
    width: 3.59rem;
    height: 0.7rem;
    background-color: rgba(35, 39, 44, .03);
    border-radius: .08rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.dot-container {
    width: 0.62rem;
    height: .1rem;
    display: flex;
    justify-content: space-between;
}

.dot-container span {
    width: 0.1rem;
    height: 0.1rem;
    border-radius: .1rem;
    background-color: rgba(223, 128, 129, .6);
}

.dot-container span:nth-child(2) {
    background-color: rgba(223, 128, 129, .9);
}

.service-items {
    display: flex;
    justify-content: space-between;
    margin-top: .3rem;
}

.service-item {
    width: 1.2rem;
}

.service-item-img {
    width: 1rem;
    height: 1rem;
    border-radius: .5rem;
    background-color: #fdeff0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.service-item-title {
    font-size: .26rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .8);
    margin: .22rem auto .16rem;
}

.service-item-detail {
    font-size: .2rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .4);
    line-height: 0.34rem;
}
/* 标签页2结束 */

/* 标签页3开始 */

.notie-container {
    margin-top: .45rem;
}

.notice-title {
    width: 1.08rem;
    font-size: .26rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .7);
    margin-right: .18rem;
    line-height: .48rem;
    display: inline-block;
    vertical-align: top;
}

.notice-des {
    width: 5.12rem;
    font-size: .26rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .4);
    display: inline-block;
    line-height: .48rem;
}

.notice-des a {
    display: block;
    position: relative;
}

/* 标签页3结束 */

/* 标签页4开始 */
.recommend {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: .48rem;
}

.recommend-item {
    position: relative;
}

.rmb {
    font-size: .2rem;
    color: rgba(245, 76, 72, .9);
    font-family: SanFrancisco Display Bold;
}

.like {
    position: absolute;
    top: .23rem;
    right: .23rem;
    width: .26rem;
    height: .26rem;
}

.each-night {
    font-size: .2rem;
    font-family: PingFang SC Bold;
    color: rgba(0, 0, 0, .6);
}
/* 标签页4结束 */

/* 底部开始 */
footer {
    width: 100%;
    padding: 0 .56rem;
    background-color: #fff;
    position: fixed;
    z-index: 9999;
    bottom: 0;
    height: 1.2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.collect > div:first-child {
    margin-bottom: .16rem;
    display: flex;
    justify-content: center;
}

.collect .iconfont {
    font-size: .34rem;
    color: rgba(0, 0, 0, .4);
}

.collect .iconfont.collected {
    color: #eb666b;
}

.contact, .collect {
    font-size: .2rem;
    font-family: PingFang SC Bold;
}

.contact a, .collect div {
    color: rgba(0, 0, 0, .6);
    display: block;
}

.price {
    color: #eb666b;
    font-size: .48rem;
    font-family: SanFrancisco Display Bold;
}

/* .price {
    display: flex;
    align-items: flex-end;
} */

.order-btn {
    width: 2.04rem;
    height: .7rem;
    background-color: #eb666b;
    box-shadow: 0 .06rem .15rem 0 rgba(219, 92, 97, .5);
    border-radius: .08rem;
    font-size: .32rem;
    font-family: PingFang SC Bold;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
}
/* 底部结束 */
</style>