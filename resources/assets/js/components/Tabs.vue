<template>
	<div>
        <nav class="nav nav-pills">
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

<style scoped>
    .nav-pills {
        margin-bottom: 20px;
        text-align:center;
    }
    
    .nav-pills>li.active>a {
        background-color: #00ADB5;   
    }

    li>a {
        color: #00ADB5;
    }

    .nav>li>a:focus {
        background-color: #EEEEEE;
        color: #00ADB5;
    }

    .nav-pills > li {
        float:none;
        display:inline-block;
    }

</style>