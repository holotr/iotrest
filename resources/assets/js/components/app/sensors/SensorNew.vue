<style scoped>
</style>

<template>

    <div class="wrapper-md">

        <div class="row">
          <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading font-bold">{{ $t('sensor.new') }}</div>
              <div class="panel-body">
                <form @submit.prevent="submitSensorForm" role="form">
                  <div class="form-group">
                    <label>{{ $t('sensor.name') }}</label>
                    <input type="text" class="form-control" v-model="sensorForm.name" :placeholder="$t('sensor.entername')" required>
                  </div>
                  <div class="form-group">
                    <label>UUID</label>
                    <input type="text" class="form-control" v-model="sensorForm.uuid" placeholder="UUID" required>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('sensor.type') }}</label>
                    <select class="form-control m-b" v-model="sensorForm.type">
                      <option value="脉搏传感器">{{ $t('sensor.types.pulse') }}</option>
                      <option value="心率传感器">{{ $t('sensor.types.heartrate') }}</option>
                      <option value="体温传感器">{{ $t('sensor.types.bodytemp') }}</option>
                      <option value="血氧传感器">{{ $t('sensor.types.bloodo2') }}</option>
                      <option value="倾角传感器">{{ $t('sensor.types.dip') }}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('sensor.description') }}</label>
                    <textarea class="form-control" v-model="sensorForm.extra" rows="5" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">{{ $t('save') }}</button>
                </form>
              </div>
              <div class="panel-footer">
                <span class="block text-xs">{{ $t('api.respond') }} : </span>
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
