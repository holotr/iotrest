<style scoped>
</style>

<template>

    <div class="wrapper-md">

        <h1>当前传感器数据 #{{this.sensorid}}</h1>
        <hr>

        <div class="row">

            <div class="list-group list-group-lg list-group-sp">
                <template v-for="item of items">
                    <div class="col-md-6 connected">
                        <sl-sensor-detail-item :item="item"></sl-sensor-detail-item>
                    </div>
                </template>
                <template>
                  <div class="col-md-12 connected">
                    <paginate v-if="meta.pagination"
                      :page-count="meta.pagination.total_pages"
                      :pagination="meta.pagination.current_page"
                      :click-handler="fetchData"
                      :prev-text="'上一页'"
                      :next-text="'下一页'"
                      :container-class="'pagination'"
                      :page-class="'page-item'">
                    </paginate>
                  </div>
                </template>
            </div>

        </div>

    </div>

</template>

<script>
    export default{
        props: ['sensorid'],
        data(){
            return {
//                msg: 'hello vue',
                items: [],
            }
        },

        computed: {},
        components: {
            'sl-sensor-detail-item': require('./SensorDetailGroupItem.vue'),
        },
        mounted(){
            console.log('Component Ready.');
            this.fetchData(1);
        },
        watch: {},
        events: {},
        methods: {
            fetchData(pageNum){

                this.$api.get('/sensors/' + this.sensorid + '/record', {
                    params: {
                          //include: 'record'
                          orderBy: 'record_id',
                          sortedBy:'desc',
                          page:pageNum
                    }
                })
                    .then((response => {
                        console.log(response);
                        console.log(pageNum);
                        this.items = response.data.data;
                        this.meta = response.data.meta;
                    }).bind(this))
                    .catch((error => {
                        console.error(error);
                    }).bind(this));

            }
        },
    }
</script>
