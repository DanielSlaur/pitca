<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "Input",
    props:['modelValue'],
    emits: ['update:modelValue'],
})
</script>

<template>
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-black md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                <slot></slot>
            </label>
        </div>
        <div class="md:w-2/3">
            <input class="appearance-none border border-gray-300 focus:outline-none focus:border-gray-300 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:ring-orange-500" id="inline-full-name" type="text" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" placeholder="">
        </div>
    </div>
</template>

<style scoped>

</style>
