<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "PCard"
})
</script>

<template>
    <div class="block max-w-xl p-6  border border-gray-200 rounded-lg shadow  ">
        <slot></slot>
    </div>
</template>

<style scoped>

</style>
