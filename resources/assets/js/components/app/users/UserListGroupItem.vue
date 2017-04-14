<style scoped>
</style>

<template>
    <a :href="link" class="list-group-item clearfix">
        <span class="pull-left thumb-sm avatar m-r">
            <v-gravatar :email="item.email" />
        </span>
        <span class="clear">
            <span class="block">{{ item.name }}</span>
            <span class="block">{{ $t('user.joinin') }} : {{ item.created_at}}</span>
            <div class="line pull-in"></div>
            <span class="block text-xs">{{ $t('api.respond') }} : </span>
            <pre class="block text-xs">{{ item }}</pre>
        </span>
    </a>
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
            userId(){
                return this.item.user_id;
            },
            link(){
                return "/users/" + this.userId;
            },
        },
        watch: {},
        events: {},
        methods: {},
    }
</script>
