import { createApp } from 'vue'
import './style.css'
import './js/hambager'
import router from './router'
import store from './store'
import App from './App.vue'

createApp(App)
    .use(router)
    .use(store)
    .mount('#app')