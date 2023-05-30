import MainPage from "@/components/MainPage.vue";
import OrderPage from "@/components/OrderPage.vue";
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    { path: '/', component: MainPage },
    { path: '/order', component: OrderPage },
]

export const router = createRouter({
    history: createWebHistory(),
    routes,
})
