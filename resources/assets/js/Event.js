window.Event = {
	vue: new Vue(),
	emit: function(event, data = null) {
		this.vue.$emit(event, data)
	},
	listen: function(event, callback) {
		this.vue.$on(event, callback)
	},
}