<template>
    <div class="outer">
        <div class="top"></div>
        <div class="addHouseForm">
            <el-form :model="house" :rules="rules" ref="addHouseForm" v-if="house">
                <h1>变更民宿</h1>
                <el-form-item label="民宿名称" class="name" prop="hname">
                    <el-input v-model="house.hname" placeholder="请输入民宿名称"></el-input>
                </el-form-item>
                <el-form-item label="所属分类" class="classification" prop="cid">
                    <el-select v-model="house.cid" placeholder="请选择民宿所属分类">
                        <el-option v-for="item in categories" :key="item.cid" :label="item.cname" :value="item.cid"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="民宿描述" class="desc" prop="hdesc">
                    <el-input placeholder="请输入民宿描述" type="textarea" rows="4" v-model="house.hdesc"></el-input>
                </el-form-item>
                <el-form-item label="标签" class="tag" prop="htag">
                    <el-input placeholder="请输入民宿标签" v-model="house.htag"></el-input>
                </el-form-item>
                <el-form-item label="评分" class="rank" prop="hrank">
                    <el-input placeholder="请输入民宿评分" v-model="house.hrank"></el-input>
                </el-form-item>
                <el-form-item label="价格" class="price" prop="hprice">
                    <el-input placeholder="请输入民宿价格" v-model="house.hprice"></el-input>
                </el-form-item>
                <el-form-item label="所属省份" class="province" prop="hprovince">
                    <el-select placeholder="请选择民宿所属省份" v-model="house.hprovince"  @input="provinceChange">
                        <el-option v-for="(item, index) in province" :key="index" :value="item" :label="item"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="所属城市" class="city" prop="hcity">
                    <el-select placeholder="请选择民宿所属城市" v-model="house.hcity" @input="cityChange">
                        <el-option v-for="(city, index) in cityList" :key="index" :value="city" :label="city"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="所属城市区域" class="area" prop="harea">
                    <el-select placeholder="请选择民宿所属城市区域" v-model="house.harea">
                        <el-option v-for="(item, index) in areaList" :key="index" :label="item" :value="item"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="详细地址" class="addr" prop="haddr">
                    <el-input placeholder="请输入民宿详细地址" v-model="house.haddr"></el-input>
                </el-form-item>
                <el-form-item label="缩略图" class="thumb">
                    <el-upload :action="uploadurl" :show-file-list="false" :on-success="handleThumbSuccess" class="thumb-uploader" name="img">
                        <img :src="house.hthumb" v-if="house.hthumb" class="thumb-img">
                        <i class="el-icon-plus thumb-uploader-icon"></i>
                    </el-upload>
                </el-form-item>
                <el-form-item label="轮播图" class="banner"></el-form-item>
                    <!-- <el-upload :auto-upload="false" list-type="picture-card" :on-preview="handlePictureCardPreview" :on-remove="handleRemove">
                        <i class="el-icon-plus"></i>
                    </el-upload> -->
                <el-form-item label="民宿详情" prop="hdetail" class="detail">
                   <rich-text @rich-change="setField" field="hdetail"></rich-text>
                </el-form-item>
                <el-form-item label="入住须知" class="notice" prop="hnotice">
                   <rich-text @rich-change="setField" field="hnotice"></rich-text>
                </el-form-item>
                <el-form-item class="submit-button">
                    <el-button :loading="loading" class="submit" @click="onSubmit">提交</el-button>
                </el-form-item>
            </el-form>
            <!-- <el-dialog visible="dialog"></el-dialog> -->
        </div>
    </div>
</template>

<script>

import base from '@/lib/base';
import {homestayRead} from '@/http/homestay';
import RichText from '@/components/rich-text/RichText';
import city from '@/lib/city';
import {categoryIndex} from '@/http/category';

export default {
    props: {
    },
    data () {
        return {
            loading: false,
            hid: '',
            house: null,
            rules: {},
            province: [],
            categories: [],
            uploadurl: base.URL + '/admin/Upload/index',
        }
    },
    created () {},
    mounted () {
        this.initHomestay(this.$route.params.hid);
        this.setProvince();
        this.initCategory();
    },
    watch: {},
    computed: {
        // 动态更新城市列表
        cityList() {

            let currentProvince = city.find(value => value.name == this.house.hprovince);

            let cities = [];

            if(currentProvince) {

                cities = currentProvince.city.map(value => value.name);
                
            }

            return cities;
            
        },

        // 动态更新区域列表
        areaList() {

            let cities = city.find(value => value.name == this.house.hprovince);

            let areas = [];

            if(cities) {

                let currentCity = cities.city.find(value => value.name == this.house.hcity);

                if(currentCity) {

                    areas = currentCity.area;

                }

            }
            
            return areas;

        }
    },
    methods: {
        initHomestay(hid) {

            homestayRead(hid).then(res => {

                this.house = res.data;

            }).catch(err => {

                console.log(err);

            });

        },

        // 
        setProvince() {

            this.province = city.map(value => value.name);

        },

        provinceChange() {

            this.house.hcity = '';
            this.house.harea = '';

        },

        cityChange() {
            this.house.harea = '';
        },

        initCategory() {

            categoryIndex().then(res => {

                this.categories = res.data;

            }).catch(err => {

                console.log(err);

            })

        },

        handleThumbSuccess() {

        },

        setField(field, html) {

            this.house[field] = html;

        },

        onSubmit() {



        }
    },
    components: {
        RichText,
    },
}
</script>
<style scoped>
    h1 {
        margin: 30px 0 10px 0;
        text-align: center;
    }
</style>