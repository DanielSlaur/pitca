<script>
import {defineComponent} from 'vue'
import PButton from "@/components/PButton.vue";
import { mapStores } from 'pinia'
import { useCartStore } from '../store'
export default defineComponent({
    name: "PitcaItem",
    props:{
        pizza:{
            type: Object,
            // required: true
            default:{
                title: 'test',
                price: 400,
                count: 0
            }
        }
    },
    components: {PButton},
    data(){
        return {

        }
    },
    computed: {
        ...mapStores(useCartStore),

        inCart(){
            return this.cartStore.pizzas.some(el=>el.id === this.pizza.id)
        },

        count(){
            if(this.inCart){
                let pizzaCart = this.cartStore.pizzas.find(el=>el.id === this.pizza.id)
                return pizzaCart.count
            }
            return false

        }
    },
    mounted(){
    },
    methods:{
        addToCart(){
            this.cartStore.addToCart(this.pizza)
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

    <div>
        <img
            :src="pizza.thumbnail"
            alt="pizziNetu"

        />
        <h4 class="text-lg font-semibold">{{ pizza.title }}</h4>
        <div class="text-gray-500">{{ pizza.description}}</div>
        <div >
            <div >от {{ pizza.price }} ₽</div>
            <div >
                <svg
                    fill="none"
                    height="12"
                    viewBox="0 0 12 12"
                    width="12"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M10.8 4.8H7.2V1.2C7.2 0.5373 6.6627 0 6 0C5.3373 0 4.8 0.5373 4.8 1.2V4.8H1.2C0.5373 4.8 0 5.3373 0 6C0 6.6627 0.5373 7.2 1.2 7.2H4.8V10.8C4.8 11.4627 5.3373 12 6 12C6.6627 12 7.2 11.4627 7.2 10.8V7.2H10.8C11.4627 7.2 12 6.6627 12 6C12 5.3373 11.4627 4.8 10.8 4.8Z"
                        fill="white"
                    />
                </svg>
                <div class="flex justify-between items-center">
                    <PButton :disabled="inCart" class="hover:bg-orange-300 " @click="addToCart"> {{ inCart ? 'Добавлено' : 'Добавить' }}</PButton>

                    <transition  enter-from-class="opacity-0"
                                 enter-active-class="transition duration-300">
                        <div v-if="inCart" class="flex justify-between items-center ">
                            <span class="text-xs mr-2" >Количество: {{ count }}</span>
                            <div class="flex ">
                                <button class="rounded-full bg-gray-300 py-1 px-4 hover:bg-gray-200 transition" @click="descreaseAmount">-</button>
                                <button class="rounded-full text-sm bg-gray-300 py-1 px-4 hover:bg-gray-200 transition" @click="increaseAmount">+</button>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
