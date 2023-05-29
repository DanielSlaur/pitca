import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia'
import { router } from './routes'
import App from "@/App.vue";

const pinia = createPinia()
const app = createApp(App);


//импорт компонентов
Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});


app.use(pinia)
app.use(router)
app.mount('#app');
