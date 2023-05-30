<script>
import {defineComponent} from 'vue'
import {mapStores} from "pinia";
import {useCartStore} from "@/store/index.js";

export default defineComponent({
    name: "PizzaItemCart",
    props:{
        pizza:{
            type: Object
        }
    },
    computed: {
        ...mapStores(useCartStore)
    },

    methods:{
        deleteFromCart(){
            console.log('here')
            this.cartStore.deleteFromCart(this.pizza)
        }
    }
})
</script>

<template>
    <div class="flex mb-5">
        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
            <img src="https://cdn.dodostatic.net/static/Img/Products/d7bbbc4c74af442e8b9b3ea2faf3c941_146x146.png" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
        </div>

        <div class="ml-4 flex flex-1 flex-col">
            <div>
                <div class="flex justify-between text-base font-medium text-gray-900">
                    <h3>
                        <a href="#">{{pizza.title}}</a>
                    </h3>
                    <p class="ml-4">{{pizza.price}} ₽</p>
                </div>
<!--                <p class="mt-1 text-sm text-gray-500">Salmon</p>-->
            </div>
            <div class="flex flex-1 items-end justify-between text-sm">
                <p class="text-gray-500">Количество: {{pizza.count}}</p>

                <div class="flex">
                    <button type="button" class="font-medium text-orange-500 hover:text-indigo-500" @click="deleteFromCart()">Удалить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
