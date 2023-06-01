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
        },
        descreaseAmount(){
            this.cartStore.decreaseCount(this.pizza)
        },
        increaseAmount(){
            this.cartStore.addToCart(this.pizza)
        }
    }
})
</script>

<template>
    <div class="flex mb-5">
        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
            <img :src="pizza.thumbnail" alt="pizziNetu" class="h-full w-full object-cover object-center">
        </div>

        <div class="ml-4 flex flex-1 flex-col">
            <div>
                <div class="flex justify-between text-base font-medium text-gray-900">
                    <h3>
                        <span >{{pizza.title}}</span>
                    </h3>
                    <span class="ml-4">{{pizza.price * pizza.count}} ₽</span>
                </div>
                <p class="mt-1 text-sm text-gray-500">{{ pizza.description }}</p>
            </div>
            <div class="flex flex-1 items-end justify-between text-sm">
                <p class="text-gray-500">Количество: {{pizza.count}}</p>
                <div class="flex justify-between">
                    <button class="rounded-full bg-gray-300 py-1 px-4" @click="descreaseAmount">-</button>
                    <button class="rounded-full text-sm bg-gray-300 py-1 px-4" @click="increaseAmount">+</button>
                </div>
                <div class="flex">
                    <button type="button" class="font-medium text-orange-500 hover:text-indigo-500" @click="deleteFromCart()">Удалить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
