<style scoped>
</style>

<template>
    <div class="panel panel-default" draggable="true">
      <div class="panel-heading">
         <span class="label bg-info">{{ item.sensor_id }}</span> {{ item.name }}
      </div>
      <div class="panel-body">
        <article class="media">
          <div class="media-body">
            <a :href="link">
            <span class="block text-xs">类型 : {{ item.type }}</span>
            <span class="block text-xs">描述 : {{ item.extra }}</span>
            </a>
            <div class="line pull-in"></div>
            <span class="block text-xs">API 应答 : </span>
            <pre class="block text-xs">{{ item }}</pre>
            <div class="line pull-in"></div>
            <a :href="link">
            <em class="text-xs text-danger">点击查看更多详情</em>
            </a>
          </div>
        </article>
      </div>
    </div>
</template>

<script>
    export default{
        props: ['item'],
        data(){
            return {
//                msg: 'hello vue'
            }
        },
        computed: {
            sensorId(){
                return this.item.sensor_id;
            },
            link(){
                return "/sensors/" + this.sensorId;
            },
        },
        watch: {},
        events: {},
        methods: {},
    }
</script>
