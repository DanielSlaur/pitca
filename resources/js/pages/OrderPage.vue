<script>

import Navbar from "@/components/Navbar.vue";
import OrderCard from "@/components/OrderCard.vue";
import PizzaItemOrder from "@/components/PizzaItemOrder.vue";
import {defineComponent} from "vue";
import {mapStores} from "pinia";
import {useCartStore} from "@/store/index.js";
import PButton from "@/components/PButton.vue";
import PRadio from "@/components/PRadio.vue";
import axios from 'axios'

export default defineComponent({
    name: "OrderPage",
    components:{PRadio, PButton, Navbar, OrderCard, PizzaItemOrder},
    props:{
    },
    data: ()=>{
        return {
            userData: {
                name: '',
                phone: '',
                address: ''
            },
            paymentMethod: {
                cash: 'cash',
                card: 'card',
                choosed: ''
            },
            modal:{
                visible: false,
                text: "Ваш заказ успешно создан! \r\nОжидайте доставки, приятного аппетита! :)"
            },
            warning:{
                visible: false,
                text: "Заполните все поля!"
            }
        }
    },
    computed: {
        ...mapStores(useCartStore)
    },

    methods:{
        goToCart(){
            this.$router.push('/')
            this.cartStore.openCart()
        },
        makeOrder(){
            console.log(this.userData, this.paymentMethod)
            axios.post('/api/orders', {...this.userData, paymentMethod: this.paymentMethod.choosed, totalPrice: this.cartStore.priceTotal, pizzasIds: this.cartStore.pizzas.map(el=> el.id)}, {
                headers:{
                    "Content-type": "application/json"
                }
            }).then(res=>{
                if(res.data.status){
                    this.modal.visible = true
                }else{
                    this.warning.visible = true
                }
                console.log(res)
            })
        },

        closeModal(){
            this.modal.visible = false
            this.$router.push('/')
            this.clearCart()
        },

        clearCart(){
            this.cartStore.clearCart()
        },

        closeWarning(){
            this.warning.visible = false
        }
    }
})
</script>

<template>
    <Navbar></Navbar>
    <div class="flex justify-around mt-10">
        <div  class="w-1/3">
            <OrderCard >
                <div>
                    <h1 class="font-bold text-xl">Заказ</h1>
                    <PInput v-model="userData.name">Имя</PInput>
                    <PInput v-model="userData.phone">Номер телефона</PInput>
                    <PInput v-model="userData.address">Адрес</PInput>
                </div>
            </OrderCard>
            <OrderCard class="mt-5 bg-gray-200">
                <span class="font-semibold">Способ оплаты</span>
                <div class="mt-5">
                    <PRadio v-model="paymentMethod.choosed" :value="paymentMethod.cash">Наличными курьеру</PRadio>
                    <PRadio v-model="paymentMethod.choosed" :value="paymentMethod.card">Картой курьеру</PRadio>
                </div>
            </OrderCard>
            <div class="flex mt-10">
                <PButton class="mr-5 bg-gray-300" @click="goToCart">В корзину</PButton>
                <PButton @click="makeOrder">Оформить заказ</PButton>
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
    <PModal :visible="modal.visible" @close="closeModal">
        {{ modal.text }}
    </PModal>
    <PModal :visible="warning.visible" @close="closeWarning">
        {{ warning.text }}
    </PModal>
</template>

<style scoped>

</style>
