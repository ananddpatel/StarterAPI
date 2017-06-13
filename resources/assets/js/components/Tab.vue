<template>
	<div v-show="isSelected">
        <slot></slot>
        <slot name="dataa"></slot>
    </div>
</template>

<script>
export default {
	props: {
        name: {required: true},
        selected: {default: false}
    },
    data() {
        return {
            isSelected: false,
            displayPanel: []
        }
    },
    mounted() {
        this.isSelected = this.selected
    }
}
</script>