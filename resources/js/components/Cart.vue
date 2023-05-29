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
        }
    }
})
</script>

<template>
    <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" v-if="cartStore.visible">
        <!--
          Background backdrop, show/hide based on slide-over state.

          Entering: "ease-in-out duration-500"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-500"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-black bg-opacity-30 transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
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

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                                            <li v-for="pizza in pizzas">
                                                <pizza-item-cart :pizza="pizza"></pizza-item-cart>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Итого</p>
                                    <p>{{ cartStore.priceTotal }}  ₽</p>
                                </div>
                                <div class="mt-6 flex justify-center">
                                    <p-button>Оформить заказ</p-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
