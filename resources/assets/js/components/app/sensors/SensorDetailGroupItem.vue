<style scoped>
</style>

<template>
    <div class="panel panel-default" draggable="true">
      <div class="panel-heading">
         <span class="label bg-info">{{ item.record_id }}</span>
      </div>
      <div class="panel-body">
        <article class="media">
          <div class="media-body">
            <span class="block text-xs">数据 : {{ item.record }}</span>
            <span class="block text-xs">时间 : {{ item.created_at }}</span>
            <div class="line pull-in"></div>
            <span class="block text-xs">API 应答 : </span>
            <pre class="block text-xs">{{ item }}</pre>
            <div class="line pull-in"></div>
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
        watch: {},
        events: {},
        methods: {},
    }
</script>
