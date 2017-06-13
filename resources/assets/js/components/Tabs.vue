<template>
	<div>
        <nav class="nav nav-tabs">
            <li v-for="tab in tabs" :class="{'active': tab.isSelected}">
                <a @click="selectTab(tab)">{{tab.name}}</a>
            </li>
        </nav>
        <div class="tab-detail">
            <slot></slot>   
        </div>
    </div>
</template>

<script>
export default {
	data() {
        return {
            tabs: []
        }
    },
    created() {
        this.tabs = this.$children
    },
    methods: {
        selectTab(currentTab) {
            this.tabs.forEach(tab => tab.isSelected = tab.name == currentTab.name)
        }
    }
}
</script>