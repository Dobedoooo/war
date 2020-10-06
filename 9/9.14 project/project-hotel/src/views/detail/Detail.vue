<template>
    <div class="">
        <!-- 头部及轮播图开始 -->
        <header>
            <div class="banner" v-if="homestay">
                <van-swipe class="swiper" :autoplay="3000" indicator-color="white">
                    <van-swipe-item v-for="(image, index) in homestay.hbanner" :key="index">
                        <router-link to="/">
                            <van-image :src="image" />
                        </router-link>
                    </van-swipe-item>
                </van-swipe>
            </div>
            <div class="header-con">
                <div class="back">
                    <router-link to="/">
                        <van-image :src="icon.back" />
                    </router-link>
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
                    <div class="title">
                        <span>{{homestay.hname}}</span>
                    </div>
                    <div class="rank">
                        <div class="num">{{homestay.hrank.toFixed(1)}}</div>
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
                    <van-tabs>
                        <van-tab title="详情">
                            <div class="desc" v-html="homestay.hdetail">
                            </div>
                            <div class="more">
                                <router-link to="/" class="theme">查看更多</router-link>
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
                                    <router-link to="/">
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
                                                <div class="recommend-star float-left" v-for="(star,index) in item.hrank" :key="index">
                                                    <van-image :src="icon.star"></van-image>
                                                </div>
                                                <div class="recommend-star float-left" v-for="(star,index) in (5 - item.hrank)" :key="index">
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
                            </div>
                        </van-tab>
                    </van-tabs>
                </section>
            </div>
        </main>
        <!-- 主体部分结束 -->
        <!-- 底部开始 -->
        <footer v-if="homestay">
            <div class="contact float-left">
                <router-link to="/">
                    <van-image :src="icon.contact"/>
                    <div>联系房东</div>
                </router-link>
            </div>
            <div class="collect float-left">
                <router-link to="/">
                    <van-image :src="icon.favorites"/>
                    <div>1.1k收藏</div>
                </router-link>
            </div>
            <div class="price float-left">
                <van-image :src="icon.price"/>
                <span>{{homestay.hprice}}</span>
            </div>
            <router-link to="/">
                <div class="order-btn float-left">立即预定</div>
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

export default {
    name: 'detail',
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
    watch: {},
    computed: {},
    methods: {
        initHome(hid) {

            apiDetail(hid).then(res => {

                let homestay = res.data.homeStay;

                homestay.hbanner = homestay.hbanner.split(',').map(el => base.IMGURL + el);

                this.homestay = homestay;

                let recommend = res.data.recommend;

                recommend = recommend.map(el => {

                    el.hthumb = base.IMGURL + el.hthumb;

                    return el;

                })

                this.recommend = recommend;

            }).catch(err => {

                console.log(err);

            })

        }

    },
    components: {},
}
</script>

<style scoped>
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
@import '../../style/detail.css';

</style>