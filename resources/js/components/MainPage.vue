<script>
import PButton from "@/components/PButton.vue";
import PitcaItem from "@/components/PitcaItem.vue";
import {ref} from "vue";
import Cart from "@/components/Cart.vue";
import { useCartStore } from '../store'
import {mapStores} from "pinia";
import Navbar from "@/components/Navbar.vue";
import axios from 'axios'

export default {
    components: {Navbar, Cart, PitcaItem, PButton},
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
    <header>
        <Navbar>
            <p-button class="flex items-center" @click="openCart()">Корзина <span v-if="cartStore.count > 0" class="withItems"></span> <span v-if="cartStore.count > 0" class="ml-2 mr-2">{{cartStore.count}} </span></p-button>
        </Navbar>
    </header>
    <div class=" flex  flex-wrap justify-between items-center mx-auto max-w-screen-xl mt-5">
        <pitca-item v-for="pizza in pizzas" :pizza="pizza"></pitca-item>
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
