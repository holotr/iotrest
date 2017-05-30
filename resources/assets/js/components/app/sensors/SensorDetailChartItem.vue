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
  import { Line } from 'vue-chartjs'
    export default Line.extend({
      props: {
          chartData: {
            type: Array | Object,
            required: false
          },
          chartLabels: {
            type: Array,
            required: true
          }
        },
      data () {
          return {
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  },
                  gridLines: {
                    display: true
                  }
                }],
                xAxes: [ {
                  gridLines: {
                    display: false
                  }
                }]
              },
              legend: {
                display: false
              },
              responsive: true,
              maintainAspectRatio: false
            }
          }
        },
    mounted () {
      this.renderChart({
        labels: this.chartLabels,
        datasets: [
          {
            label: 'record',
            borderColor: '#249EBF',
            pointBackgroundColor: 'white',
            borderWidth: 1,
            pointBorderColor: '#249EBF',
            backgroundColor: 'transparent',
            data: this.chartData
          }
        ]
      }, this.options)
    }
    })
</script>
