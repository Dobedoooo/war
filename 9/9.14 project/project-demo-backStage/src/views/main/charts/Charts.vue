<template>
    <div class="">
        <div class="component component-1">
            <ve-line :data="chartData"></ve-line>
        </div>
    </div>
</template>

<script>
import VeLine from 'v-charts/lib/line.common.js';

export default {
    name: 'charts', 
    props: {
    },
    data: () => {
        return {
            chartData: {
                columns: ['日期', '访问用户', '下单用户', '下单率'],
                rows: [
                    { '日期': '1/1', '访问用户': 1393, '下单用户': 1093, '下单率': 0.32 },
                    { '日期': '1/2', '访问用户': 3530, '下单用户': 3230, '下单率': 0.26 },
                    { '日期': '1/3', '访问用户': 2923, '下单用户': 2623, '下单率': 0.76 },
                    { '日期': '1/4', '访问用户': 1723, '下单用户': 1423, '下单率': 0.49 },
                    { '日期': '1/5', '访问用户': 3792, '下单用户': 3492, '下单率': 0.323 },
                    { '日期': '1/6', '访问用户': 4593, '下单用户': 4293, '下单率': 0.78 }
                ]
            }
        }
    },
    created () {},
    mounted () {},
    watch: {},
    computed: {},
    methods: {},
    components: {
        VeLine,
    },
}
</script>
<style scoped>
.component {
    background-color: #fff;
    border-radius: 40px;
    transition: box-shadow .2s;
    box-shadow: 0 0 10px 0 rgba(0,0,0,.2);
    padding: 30px 30px 0;
    width: 500px;
}

.component:hover {
    box-shadow: 0 0 10px 0 rgba(0,0,0,.3);
}
</style>