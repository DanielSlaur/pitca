<script>
import PButton from "@/components/PButton.vue";
import PitcaItem from "@/components/PitcaItem.vue";
import PCart from "@/components/PCart.vue";
import { useCartStore } from '../store/index.js'
import {mapStores} from "pinia";
import Navbar from "@/components/Navbar.vue";
import axios from 'axios'

export default {
    components: {Navbar, PCart, PitcaItem, PButton},
    data(){
        return{
            pizzas: [],
            // pizzasCount: this.
        }
    },
    mounted() {
        console.log('Welcome to Main Page!.')
        this.loadPizzas()
    },
    computed: {
        ...mapStores(useCartStore)
    },

    methods:{
        loadPizzas(){
            axios.get('/api/pizzas').then((response)=>{
                console.log(response)
                this.pizzas = response.data
            })
        },
        openCart(){
            this.cartStore.openCart()
        }
    }
}

</script>

<template>
    <Navbar>
        <PButton class="flex items-center" @click="openCart()">Корзина <span v-if="cartStore.count > 0" class="withItems"></span> <span v-if="cartStore.count > 0" class="ml-2 mr-2">{{cartStore.count}} </span></PButton>
    </Navbar>
    <div class=" flex flex-wrap justify-start items-center mx-auto max-w-screen-xl mt-5 gap-2 mb-5">

        <transition-group  enter-from-class="opacity-0"
                     enter-active-class="transition duration-300">
            <PitcaItem v-for="pizza in pizzas" :pizza="pizza" :key="pizza.id"></PitcaItem>
        </transition-group>
        <PCart></PCart>
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
    .gridable::after {
        content: "";
        flex: auto;
    }
</style>
