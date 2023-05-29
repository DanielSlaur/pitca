import { defineStore } from 'pinia'

export const useCartStore = defineStore('cart', {
    state: () => {
        return {
            pizzas: [],
            visible: false
        }
    },
    getters: {
        count(state) {
            return state.pizzas.length
        },

        isVisible(state){
            return state.visible
        },

        priceTotal(state){
            return state.pizzas.map(p=>p.price).reduce((accumulator, current)=> accumulator + current, 0)
        }
    },
    actions: {
        addToCart(payload) {
            this.pizzas.push(payload)
        },

        deleteFromCart(payload){
            this.pizzas.slice(payload)
        },

        openCart(){
            this.visible = true
        },

        closeCart(){
            this.visible = false
        }
    },
})
