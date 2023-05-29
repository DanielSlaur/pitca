<script>
import PButton from "@/components/PButton.vue";
import PitcaItem from "@/components/PitcaItem.vue";
import {ref} from "vue";
import Cart from "@/components/Cart.vue";
import { useCartStore } from '../store'
import {mapStores} from "pinia";

export default {
    components: {Cart, PitcaItem, PButton},
    data(){
        return{
            pizzas: [1, 2 , 3, 4],
            // pizzasCount: this.
        }
    },
    mounted() {
        console.log('Welcome to Main Page!.')
    },
    computed: {
        ...mapStores(useCartStore)
    },

    methods:{
        openCart(){
            this.cartStore.openCart()
        }
    }
}

</script>

<template>
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 border-b">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="https://flowbite.com" class="flex items-center">
                    <img src="../../images/logo.png" class="mr-3 h-6 sm:h-9" alt="Pitca Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Pitca</span>
                </a>
                <div class="flex items-center lg:order-2">
                   <p-button class="flex items-center" @click="openCart()">Корзина <span v-if="cartStore.count > 0" class="withItems"></span> <span v-if="cartStore.count > 0" class="ml-2 mr-2">{{cartStore.count}} </span></p-button>
                </div>
            </div>
        </nav>
    </header>
    <div class=" flex  flex-wrap justify-between items-center mx-auto max-w-screen-xl mt-5">
        <pitca-item v-for="pizza in pizzas"></pitca-item>
        <cart></cart>
    </div>
</template>

<style scoped>
    .withItems{
        height: 24px;
        width: 1px;
        margin: 0px 12px;
        background: rgb(255, 255, 255);
        opacity: 0.4;
    }
</style>
