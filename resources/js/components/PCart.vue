<script>

import PButton from "@/components/PButton.vue";
import PizzaItemCart from "@/components/PizzaItemCart.vue";
import {defineComponent} from "vue";
import {mapStores} from "pinia";
import {useCartStore} from'../store'

export default defineComponent({
    name: "Cart",
    components:{ PButton, PizzaItemCart },
    props:{
        pizza:{
            type: Object
        }
    },
    data(){
        return{

        }
    },
    computed: {
        ...mapStores(useCartStore)
    },

    methods:{
        closeCart(){
            this.cartStore.closeCart()
        },
        goToOrder(){
            this.$router.push('/order')
            this.cartStore.closeCart()
        }
    }
})
</script>

<template>
    <transition
        enter-from-class="opacity-0"
        leave-to-class="opacity-0"
        enter-active-class="transition duration-300"
        leave-active-class="transition duration-300">
        <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" v-if="cartStore.visible">
            <div class="fixed inset-0 bg-black bg-opacity-30 transition-opacity"></div>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <div class="pointer-events-auto w-screen max-w-md">
                            <div class="flex h-full flex-col bg-white shadow-xl">
                                <div class="overflow-hidden px-4 py-6 sm:px-6 flex flex-col min-h-0" :class="{'flex-1': cartStore.pizzas.length > 0}">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Корзина</h2>
                                        <div class="ml-3 flex h-7 items-center">
                                            <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500" @click="closeCart()">
                                                <span class="sr-only">Close panel</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mt-8 pr-5 overflow-y-auto overflow-x-hidden">
                                        <div class="flow-root">
                                            <transition-group
                                                enter-from-class="translate-x-[150%] opacity-0"
                                                leave-to-class="translate-x-[150%] opacity-0"
                                                enter-active-class="transition duration-300"
                                                leave-active-class="transition duration-300">
                                                <pizza-item-cart v-for="pizza in cartStore.pizzas" :pizza="pizza" :key="pizza.id"></pizza-item-cart>
                                            </transition-group>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="cartStore.pizzas.length > 0" class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <p>Итого</p>
                                        <p>{{ cartStore.priceTotal }} ₽</p>
                                    </div>
                                    <div class="mt-6 flex justify-center">
                                        <p-button @click="goToOrder()">Оформить заказ</p-button>
                                    </div>
                                </div>
                                <transition enter-from-class="opacity-0"
                                            enter-active-class="transition duration-10000">
                                    <div v-if="cartStore.pizzas.length === 0" class="flex flex-col m-10 p-25">
                                            <img src="../../images/emptyCart.png">
                                            <div class="font-semibold text-slate-700 text-l mt-5 text-center">
                                                В Вашей корзине пусто :(
                                                <br>
                                                Возвращайтесь сюда, когда добавите что-нибудь вкусненькое &#128523;
                                            </div>
                                    </div>
                                </transition>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<style scoped>

</style>
