import MainPage from "@/pages/MainPage.vue";
import OrderPage from "@/pages/OrderPage.vue";
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    { path: '/', component: MainPage },
    { path: '/order', component: OrderPage },
]

export const router = createRouter({
    history: createWebHistory(),
    routes,
})
