<template>
    <div ref="richText"></div>
</template>

<script>

import E from 'wangeditor';

export default {
    props: {
        field: {
            type: String
        }
    },
    data () {
        return {
        }
    },
    created () {},
    mounted () {
        this.initRichText();
    },
    watch: {},
    computed: {},
    methods: {
        initRichText() {

            let editor = new E(this.$refs.richText);

            // 上传图片到服务器
            editor.customConfig.uploadImgServer = '/upload';
            // 自定义filename(formdata.append(name, file))的第一个参数 
            editor.customConfig.uploadFileName = 'fn';

            // 监听变化 绑定数据
            editor.customConfig.onchange = html => {
                
                // this.house.hdetail = html;
                this.$emit('rich-change', this.field, html);

            }

            //
            let that = this;
            editor.customConfig.uploadImgHooks = {
                customInsert: (insertImg, result) => {
                    insertImg(that.ImgURL + result.imgpath)
                }
            }

            editor.create();

        }
    },
    components: {},
}
</script>
<style scoped>
    div {
        width: 100%;
        float: left;
    }
</style>