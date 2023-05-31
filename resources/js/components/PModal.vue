<script>
import {defineComponent} from 'vue'
import PButton from "@/components/PButton.vue";

export default defineComponent({
    name: "PModal",
    components: {PButton},
    props:['visible'],
})
</script>

<template>
    <transition
        enter-from-class="opacity-0"
        leave-to-class="opacity-0"
        enter-active-class="transition duration-300"
        leave-active-class="transition duration-300">
        <div v-if="visible" class="relative z-10">
        <div class="fixed inset-0 bg-black bg-opacity-30 transition-opacity" />
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4  flex flex-col min-w-[20%]">
                        <div class="flex flex-col ">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <div class="mt-2">
                                    <p class="text-l font-semibold ">
                                        <slot></slot>
                                    </p>
                                </div>
                            </div>
                            <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <PButton class="w-20" @click="$emit('close')"> ОК </PButton>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<style scoped>

</style>
