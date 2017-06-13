<template>
	<div v-show="endpoint" class="data col-md-12">
		<h3>{{endpoint}}</h3>
		<pre>{{jsonData}}</pre>
		
	</div>
</template>

<script>
export default {
	data() {
		return {
			endpoint: '',
			jsonData: ''
		}
	},
	created() {
		var app = this
		Event.listen('display', function(payload) {
			app.endpoint = payload[0]
			app.callApi()
		})
		// Event.listen('apiCalled', () => app.callApi())
	},
	methods: {
		callApi() {
			var app = this
			axios.get('people/3').then(res => app.jsonData = res.data)
		}
	}
}
</script>

<style scoped>

.data {
	background-color: white;
	margin-top: 20px;
	color: #494949;
}

pre{
    white-space: pre-wrap;
    max-height: 600px;
}

</style>