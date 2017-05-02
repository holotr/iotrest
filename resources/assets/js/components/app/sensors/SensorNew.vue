<style scoped>
</style>

<template>

    <div class="wrapper-md">

        <div class="row">
          <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading font-bold">新建传感器</div>
              <div class="panel-body">
                <form @submit.prevent="submitSensorForm" role="form">
                  <div class="form-group">
                    <label>名称</label>
                    <input type="text" class="form-control" v-model="sensorForm.name" placeholder="请输入传感器名称" required>
                  </div>
                  <div class="form-group">
                    <label>UUID</label>
                    <input type="text" class="form-control" v-model="sensorForm.uuid" placeholder="UUID" required>
                  </div>
                  <div class="form-group">
                    <label>脉搏传感器</label>
                    <select class="form-control m-b" v-model="sensorForm.type">
                      <option value="脉搏传感器">脉搏传感器</option>
                      <option value="心率传感器">心率传感器</option>
                      <option value="体温传感器">体温传感器</option>
                      <option value="血氧传感器">血氧传感器</option>
                      <option value="倾角传感器">倾角传感器</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>描述</label>
                    <textarea class="form-control" v-model="sensorForm.extra" rows="5" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">保存</button>
                </form>
              </div>
              <div class="panel-footer">
                <span class="block text-xs">API 应答 : </span>
                <pre class="block text-xs">{{ sensorForm }}</pre>
              </div>
            </div>
        </div>

      </div>
    </div>

</template>

<script>
    export default{
        //props: ['header'],
        data(){
            return {
                  sensorForm: {
                    name: '',
                    uuid: '',
                    type: '脉搏传感器',
                    extra: '',
                  },
            }
        },
        components: {},
        methods: {
            submitSensorForm(){
              console.log('submitSensorForm Ready.');
              this.$api.post('/sensors', this.sensorForm)
              .then(function (response) {
                console.log(response);
                window.location.href = '/sensors/'+response.data.data.sensor_id;
              })
              .catch(function (error) {
                console.log(error);
              });
            },
        },
    }
</script>
