<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "PizzaItemCart",
    props:{
        pizza:{
            type: Object
        }
    }
})
</script>

<template>
    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
        <img src="https://cdn.dodostatic.net/static/Img/Products/d7bbbc4c74af442e8b9b3ea2faf3c941_146x146.png" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
    </div>

    <div class="ml-4 flex flex-1 flex-col">
        <div>
            <div class="flex justify-between text-base font-medium text-gray-900">
                <h3>
                    <a href="#">Throwback Hip Bag</a>
                </h3>
                <p class="ml-4">$90.00</p>
            </div>
            <p class="mt-1 text-sm text-gray-500">Salmon</p>
        </div>
        <div class="flex flex-1 items-end justify-between text-sm">
            <p class="text-gray-500">Qty 1</p>

            <div class="flex">
                <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
