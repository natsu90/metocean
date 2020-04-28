<template>
  <div class="small">
  	<select v-model="selectedDate">
  		<option v-for="date in availableDates" :value="date">{{ date }}</option>
  	</select>
  	<select v-model="selectedType">
  		<option v-for="(name, index) in availableTypes" :value="index">{{ name }}</option>
  	</select>
    <button @click="fillData()" :disabled="!selectedDate || !selectedType">GO</button>
    <line-chart :chart-data="datacollection"></line-chart>
  </div>
</template>

<script>
import LineChart from "./LineChart";

export default {
  components: {
    LineChart
  },
  props: ['availableDates', 'availableTypes'],
  data() {
    return {
      datacollection: null,
      selectedDate: null,
      selectedType: null
    };
  },
  mounted() {
    //
  },
  methods: {
    fillData() {

    	let data = {
	        labels: [],
	        datasets: [
	          {
	            label: "Data",
	            backgroundColor: "#f87979",
	            data: []
	          }
	        ]
	    }, that = this;

    	axios.get('/date/'+ this.selectedDate + '/type/' + this.selectedType)
	    	.then((res) => {
	    		console.log(res)

	    		res.data.forEach((item) => {
	    			data.labels.push(item.time)
	    			data.datasets[0].data.push(parseFloat(item.value))
	    		})

      			that.datacollection = data
	    	})
    }
  }
};
</script>

<style>
.small {
  max-width: 600px;
  margin: 0 auto;
}
</style>