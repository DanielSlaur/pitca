<script>

import Navbar from "@/components/Navbar.vue";
import OrderCard from "@/components/OrderCard.vue";
import PizzaItemOrder from "@/components/PizzaItemOrder.vue";
import {defineComponent} from "vue";
import {mapStores} from "pinia";
import {useCartStore} from "@/store/index.js";

export default defineComponent({
    name: "OrderPage",
    components:{Navbar, OrderCard, PizzaItemOrder},
    props:{
    },
    computed: {
        ...mapStores(useCartStore)
    },

    methods:{
    }
})
</script>

<template>
    <header>
        <Navbar></Navbar>
    </header>
    <div class="flex flex-column justify-around mt-10">
        <div>
            <OrderCard>
                <div class="w-50">
                    <h1 class="font-bold text-xl">Заказ</h1>
                    <PInput>Имя</PInput>
                    <PInput>Номер телефона</PInput>
                    <PInput>Адрес</PInput>
                </div>
            </OrderCard>
            <OrderCard class="mt-5 bg-gray-200">
                <span class="font-semibold">Способ оплаты</span>
            </OrderCard>
        </div>
        <OrderCard>
            <span class="font-light">Состав заказа</span>
            <div>
                <PizzaItemOrder v-for="pizza in cartStore.pizzas" :pizza="pizza"></PizzaItemOrder>
            </div>
        </OrderCard>
    </div>
</template>

<style scoped>

</style>
