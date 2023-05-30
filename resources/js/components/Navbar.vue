<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "Navbar"
})
</script>

<template>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 border-b">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <router-link to="/" class="flex items-center">
                <img src="../../images/logo.png" class="mr-3 h-6 sm:h-9" alt="Pitca Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Pitca</span>
            </router-link>
            <div class="flex items-center lg:order-2">
                <slot></slot>
            </div>
        </div>
    </nav>
</template>

<style scoped>

</style>
