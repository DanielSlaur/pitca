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
            return state.pizzas.map(p=>p.price * p.count).reduce((accumulator, current)=> accumulator + current, 0)
        }
    },
    actions: {
        addToCart(payload) {
            let finded = this.pizzas.find(el=>el.id === payload.id)
            if(finded === undefined){
                payload.count = 1
                this.pizzas.push(payload)
            }else {
                finded.count++
            }
        },

        deleteFromCart(payload){
            this.pizzas = this.pizzas.filter(el=> el.id !== payload.id)
        },


        decreaseCount(payload){
            let finded = this.pizzas.find(el=>el.id === payload.id)
            finded.count--
            if(finded.count === 0){
                this.deleteFromCart(payload)
            }
        },

        openCart(){
            this.visible = true
        },

        closeCart(){
            this.visible = false
        }
    },
})
