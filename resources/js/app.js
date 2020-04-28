require('./bootstrap');

import axios from 'axios'
import Vue from 'vue'

import ChartContainer from "./components/ChartContainer";

var app = new Vue({
    el: "#app",
    components: {
    	ChartContainer
    },
    data: {
    	available_dates: null,
    	available_types: null
    },
    mounted() {
    	let that = this

    	axios.get('/inputs').then(res => {
    		that.available_dates = res.data.available_dates
    		that.available_types = res.data.available_types
    	})
    }
});
