import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia'
import App from "@/App.vue";
import MainPage from "@/components/MainPage.vue";
import { createRouter, createWebHistory } from 'vue-router'

const pinia = createPinia()
const app = createApp(App);


//импорт компонентов
Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});

const routes = [
    { path: '/', component: MainPage },
    // { path: '/about', component: About },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

app.use(pinia)
app.use(router)
app.mount('#app');
