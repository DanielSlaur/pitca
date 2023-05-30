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
            count: 0
        }
    },
    computed: {
        ...mapStores(useCartStore)
    },
    mounted(){
    },
    methods:{
        addToCart(){
            this.cartStore.addToCart(this.pizza)
        }
    }

})
</script>

<template>

    <div>
        <img
            :src="pizza.thumbnail"
            alt="Pizza"

        />
        <h4 >{{ pizza.title }}</h4>
        <div>{{ pizza.description}}</div>
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
                <p-button class="hover:bg-orange-300 " @click="addToCart">Добавить</p-button>
                <i v-if="count">{{ count }}</i>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
