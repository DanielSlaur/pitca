<script>

import Navbar from "@/components/Navbar.vue";
import OrderCard from "@/components/OrderCard.vue";
import PizzaItemOrder from "@/components/PizzaItemOrder.vue";
import {defineComponent} from "vue";
import {mapStores} from "pinia";
import {useCartStore} from "@/store/index.js";
import PButton from "@/components/PButton.vue";

export default defineComponent({
    name: "OrderPage",
    components:{PButton, Navbar, OrderCard, PizzaItemOrder},
    props:{
    },
    computed: {
        ...mapStores(useCartStore)
    },

    methods:{
        goToCart(){
            this.$router.push('/')
            this.cartStore.openCart()
        }
    }
})
</script>

<template>
    <Navbar></Navbar>
    <div class="flex flex-column justify-around mt-10">
        <div  class="w-1/3">
            <OrderCard >
                <div>
                    <h1 class="font-bold text-xl">Заказ</h1>
                    <PInput>Имя</PInput>
                    <PInput>Номер телефона</PInput>
                    <PInput>Адрес</PInput>
                </div>
            </OrderCard>
            <OrderCard class="mt-5 bg-gray-200">
                <span class="font-semibold">Способ оплаты</span>
            </OrderCard>
            <div class="flex mt-10">
                <PButton class="mr-5 bg-gray-300" @click="goToCart">В корзину</PButton>
                <PButton>Оформить заказ</PButton>
            </div>
        </div>
        <OrderCard class="w-1/2 flex flex-col">
            <span class="font-semibold">Состав заказа</span>
            <div class="flex-1">
                <PizzaItemOrder v-for="pizza in cartStore.pizzas" :pizza="pizza"></PizzaItemOrder>
            </div>
            <hr>
            <div class="mt-5 flex justify-between">
                <span>Сумма заказа</span>
                <span class="font-semibold">{{ cartStore.priceTotal}} ₽</span>
            </div>
        </OrderCard>
    </div>
</template>

<style scoped>

</style>
