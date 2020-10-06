<template>
    <div class="outer">
        <div class="top"></div>
        <div class="addHouseForm">
            <el-form :model="house" :rules="rules" ref="addHouseForm" >
                <h1>添加民宿</h1>
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
                <div class="thumb">
                    <label>缩略图</label>
                    <div slot="tip" class="tip">只能上传jpg/png/webp文件，且不超过200kb</div>
                    <el-upload :action="uploadurl" class="thumb-uploader" :show-file-list="false" :on-success="handleThumbSuccess" :before-upload="handleThumbBeforeUpload">
                        <div class="thumb-img-container" v-if="house.hthumb">
                            <img :src="IMGURL + house.hthumb" v-if="house.hthumb" class="thumb-img">
                        </div>
                        <i v-else class="el-icon-plus thumb-uploader-icon"></i>
                    </el-upload>
                </div>
                
                <div class="banner">
                    <label>轮播图</label>
                    <div slot="tip" class="tip">只能上传三张jpg/png/webp文件，且不超过200kb</div>
                    <el-upload :action="uploadurl" class="thumb-uploader" list-type="picture-card" :on-success="handleBannerSuccess" :before-upload="handleThumbBeforeUpload" multiple :limit="3" :on-remove="handleBannerRemove" :on-preview="handleBannerPreview">
                        <i class="el-icon-plus"></i>
                    </el-upload>
                </div>
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
        </div>
        <el-dialog :visible.sync="bannerPreviewVisible" style="z-index: 9999999999999;">
            <img width="100%" :src="bannerPreviewPath" alt="1">
        </el-dialog>
    </div>
    
</template>

<script>

import base from '@/lib/base'
import instance from '@/http/http';
import RichText from '@/components/rich-text/RichText';
import city from '@/lib/city';

export default {
    name: 'add',
    components: {
        RichText,
    },
    props: {
    },
    data () {
        return {
            uploadurl: base.URL + '/admin/Upload/index',
            dialog: false,
            house: {
                hprovince: '',
                hname: '',
                hdesc: '',
                hthumb: '',
                hprice: '',
                hcity: '',
                harea: '',
                haddr: '',
                htag: '',
                hbanner: '',
                hrank: '',
                hdetail: '',
                hnotice: '',
                htime: '',
                hstatus: '',
                cid: '',
            },
            categories: [],
            rules: {
                hid: [
                    { required: true, message: '请输入该字段' }
                ],
                hname: [
                    { required: true, message: '请输入该字段' }
                ],
                hdesc: [
                    { required: true, message: '请输入该字段' }
                ],
                hthumb: [
                    { required: true, message: '请输入该字段' }
                ],
                hprice: [
                    { required: true, message: '请输入该字段' }
                ],
                hcity: [
                    { required: true, message: '请输入该字段' }
                ],
                harea: [
                    { required: true, message: '请输入该字段' }
                ],
                haddr: [
                    { required: true, message: '请输入该字段' }
                ],
                htag: [
                    { required: true, message: '请输入该字段' }
                ],
                hbanner: [
                    { required: true, message: '请输入该字段' }
                ],
                hrank: [
                    { required: true, message: '请输入该字段' }
                ],
                hdetail: [
                    { required: true, message: '请输入该字段' }
                ],
                hnotice: [
                    { required: true, message: '请输入该字段' }
                ],
                htime: [
                    { required: true, message: '请输入该字段' }
                ],
                hstatus: [
                    { required: true, message: '请输入该字段' }
                ],
                cid: [
                    { required: true, message: '请输入该字段' }
                ],
            },
            loading: false,
            province: [],
            IMGURL: base.IMGURL,
            bannerArr: [],
            bannerPreviewVisible: false,
            bannerPreviewPath: '',
        }
    },
    created () {},
    mounted () {
        this.initCategory();
        this.setProvince();
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
        initCategory() {

            instance.get('/admin/category/getCname').then(res => {

                this.categories = res.data;

            }).catch(err => {

                console.log(err);

            })

        },

        onSubmit() {    

            this.$refs['addHouseForm'].validate(valid => {

                if(valid) {

                    this.loading = true;

                    instance.post('/admin/Homestay', this.house).then(res => {

                        this.$notify({
                            'title': '消息',
                            'type': res.status,
                            message: res.msg,
                        })

                        this.loading = false;

                    }).catch(err => {

                        console.log(err);

                    })

                } else {

                    this.loading = false;

                }

            })

        },

        // 上传缩略图成功
        handleThumbSuccess(res) {
            
            if(res.code === 200) {

                this.house.hthumb = res.imgpath;

                this.$notify({
                    type: res.status,
                    title: '消息',
                    message: res.msg
                })

            }

        },

        // 上传轮播图
        handleBannerSuccess(res) {

            if(res.code == 200) {

                this.$notify({
                    type: res.status,
                    title: '消息',
                    message: res.msg
                });

                this.bannerArr.push(res.imgpath);

                this.house.hbanner = this.bannerArr.join(',');

            }

        },

        // 删除轮播图
        handleBannerRemove(file) {

            let url = file.response.imgpath;

            this.bannerArr = this.bannerArr.filter(el => el!=url);

            this.house.hbanner = this.bannerArr.join(',');

        },

        // 预览轮播图
        handleBannerPreview(file) {

            this.bannerPreviewPath = this.IMGURL + file.response.imgpath;

            this.bannerPreviewVisible = true;

        },

        //
        handleThumbBeforeUpload(file) {

            let {size, type} = file;

            let maxSize = 200 * 1024;
            let typeArr = ['image/jpg', 'image/png', 'image/jpeg', 'image/webp'];

            let sizeFlag = false, typeFlag = false;

            sizeFlag = size < maxSize;
            typeFlag = typeArr.some(el => el == type);

            if(!sizeFlag) {

                this.$notify({
                    type: 'error',
                    title: '错误',
                    message: '上传图片大小不能超过200kb'
                })

            }

            if(!typeFlag) {

                this.$notify({
                    type: 'error',
                    title: '错误',
                    message: '上传图片格式只能为jpg,jpeg,png,webp'
                })

            }

            return typeFlag && sizeFlag;
        },

        // 父子组件通信
        setField(field, html) {

            this.house[field] = html;

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
        }

    },
}
</script>

<style>
.el-upload::before,
.el-upload::after,
.thumb-uploader::before,
.thumb-uploader::after {
    content: "";
    display: table;
    clear: both;
}
.el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .thumb-uploader .el-upload:hover {
    border-color: #409EFF;
  }
  .thumb-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
  }
  .thumb-img-container {
    width: 178px;
    height: 178px;
  }
  .thumb-img {
      width: 100%;
    display: block;
  }
  .thumb-uploader-icon{
    display: flex !important;
    align-items: center;
    justify-content: center;
  }

    .outer {
        width: 100%;
        height: 100%;
    }

    .top {
        backdrop-filter: blur(1px);
        height: 40px;
        position: fixed;
        width: 100%;
        top: 60px;
        z-index: 1;
        border-top-left-radius: 30px;
    }

    .addHouseForm {
        border-radius: 20px;
        width: 80%;
        margin: auto;
        margin-top: 40px;
        margin-bottom: 40px;
        box-shadow: 0 0 10px 0 rgba(0,0,0,.2);
        background-color: #fff;
        box-sizing: border-box;
        padding: 20px 50px;
        transition: all .3s;
    }

    .addHouseForm:hover {
        box-shadow: 0 0 10px 0 rgba(0,0,0,.3);
    }

    .addHouseForm::before,
    .addHouseForm::after {
        content: "";
        display: table;
        clear: both;
    }

    .name, .rank, .price {
        width: 47%;
        float: left;
    }

    .rank, .name {
        margin-right: 6%;
    }

    .classification, .province, .city, .area {
        float: left;
        width: 47%;
    }

    .desc, .tag, .addr, .thumb, .banner, .detail, .notice, .submit-button {
        float: left;
        width: 100%;
    }
    .city {
        margin-left: 6%;
    }

    .el-select {
        width: 100%;
    }
    
    .thumb, .banner {
        font-size: 14px;
        color: #606266;
        line-height: 40px;
    }

    .tip {
        color: #999;
    }
</style>

<style scoped>

    h1 {
        margin: 30px 0 10px 0;
        text-align: center;
    }

</style>