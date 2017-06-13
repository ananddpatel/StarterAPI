<template>
    <div class="panel panel-default" @click="endpointSelected">
        <div  class="input-group">
            <span class="input-group-addon method">{{method}}</span>
            <a type="text" @click="selectEndpoint" class="form-control endpoint" :class="{'selected': selected}">{{endpoint}}</a>
        </div>
    </div>
</template>

<script>

export default {
	props: ['method', 'endpoint', 'max'],
	data() {
		return {
			selected: false
		}
	},
	methods: {
		endpointSelected() {
			Event.emit('display', [this.endpoint])
		},
		selectEndpoint() {
			var app = this
			app.$parent.$parent.$children
				.forEach(function(tab) {
					tab.$children.forEach(ep => ep.selected = (ep.method == app.method && ep.endpoint == app.endpoint))
				})
		},
		unselect() {
			this.selected = false
		}
	}
}

</script>

<style scoped>
	#tabs .selected {
		background-color: #65d6db;
	}
</style>