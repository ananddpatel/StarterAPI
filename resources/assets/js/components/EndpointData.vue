<template>
	<div v-show="endpoint" class="data col-md-12 panel">
		<div v-show="endpoint.search(/\{id\}/) >= 0" class="input-group col-lg-12">
			<span class="input-group-addon"><strong>int</strong> Id:</span>
			<input type="text" class="form-control" v-model="resourceId">
			<span class="input-group-btn">
				<button class="btn btn-success" @click="callApi(resourceId)" type="button">Go!</button>
			</span>
		</div>
		<pre>{{jsonData}}</pre>
	</div>
</template>

<script>
export default {
	data() {
		return {
			endpoint: '',
			jsonData: '',
			resourceId: null,
		}
	},
	computed: {
		cleanedEndpoint() {
			return this.cleanEndpoint('1')
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
		callApi(id = null) {
			var app = this
			if (id) {
				axios.get(this.cleanEndpoint(this.resourceId))
					.then(res => app.jsonData = res.data)
					.catch(err => app.jsonData = err.response.data)
			} else {
				axios.get(this.cleanedEndpoint).then(res => app.jsonData = res.data)
			}
		},
		cleanEndpoint(id) {
			return this.endpoint.replace(/\{id\}/, id)
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
pre {
    white-space: pre-wrap;
    max-height: 600px;
}

.input-group {
	margin-bottom: 10px;
}

.panel {
	padding-top: 10px;
	padding-bottom: 10px
}

</style>