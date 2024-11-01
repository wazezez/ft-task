import { createApp } from 'vue';
import App from './components/App.vue';
import store from "./store.js";


window.addEventListener('load', function () {
    if(!document.getElementById('app')) {
        return;
    }

    const app = createApp(App);
    app.use(store).mount('#app');
});
