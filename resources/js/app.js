import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia'

const pinia = createPinia()
const app = createApp({});


//импорт компонентов
Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});

app.use(pinia)
app.mount('#app');
