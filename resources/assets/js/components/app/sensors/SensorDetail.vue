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

            this.fetchData();
        },
        watch: {},
        events: {},
        methods: {
            fetchData(){

                this.$api.get('/sensors/' + this.sensorid + '/record', {
                    params: {
//                        include: ''
                    }
                })
                    .then((response => {
                        console.log(response);
                        this.items = response.data.data;
                    }).bind(this))
                    .catch((error => {
                        console.error(error);
                    }).bind(this));

            }
        },
    }
</script>
