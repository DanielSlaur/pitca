<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "OrderCard"
})
</script>

<template>
    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow  ">
        <slot></slot>
    </div>
</template>

<style scoped>

</style>
