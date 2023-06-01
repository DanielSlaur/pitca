<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "PRadio",
    props:['modelValue', 'value'],
    emits: ['update:modelValue'],

    computed: {
        isChecked() {
            return this.modelValue === this.value
        }
    }
})
</script>

<template>
    <div class="flex items-center mb-4">
        <input id="default-radio-1" type="radio" :checked="isChecked" :value="value" @input="$emit('update:modelValue', $event.target.value)" name="default-radio" class="w-4 h-4 text-orange-600 bg-gray-100 border-orange-300 ring-offset-1 focus:ring-orange-200 active:ring-orange-500 focus:ring-2 ">
        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            <slot></slot>
        </label>
    </div>
</template>

<style scoped>

</style>
