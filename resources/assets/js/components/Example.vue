<template>
    <div>
        <h1>{{count}}</h1>
        <button @click="inc" class="btn btn-success btn-sm">Add 1</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                count: 0
            }
        },
        methods: {
            inc() {
                this.count +=1
            }
        }
    }
</script>


