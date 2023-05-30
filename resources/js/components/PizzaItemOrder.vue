<script>
import {defineComponent} from 'vue'
import {mapStores} from "pinia";
import {useCartStore} from "@/store/index.js";

export default defineComponent({
    name: "PizzaItemOrder",
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
    <div class="flex mb-5 ">

        <div class="ml-4 flex flex-1 flex-col">
            <div>
                <div class="flex justify-between text-base font-medium text-gray-900">
                    <h3>
                        <span >{{pizza.title}}</span>
                    </h3>
                    <p class="ml-4">{{pizza.price}} ₽</p>
                </div>
                <p class="mt-1 text-sm text-gray-500">{{ pizza.description }}</p>
            </div>
            <div class="flex flex-1 items-end justify-between text-sm">
                <p class="text-gray-500">Количество: {{pizza.count}}</p>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
