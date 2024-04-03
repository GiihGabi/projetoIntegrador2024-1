import './assets/main.css'
import 'primevue/resources/themes/aura-light-green/theme.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import PrimeVue from 'primevue/config';
// import Button from "primevue/button"



const app = createApp(App)

app.use(router)

//PrimeVue Components & Configs
app.use(PrimeVue);
// app.component('Button', Button);


app.mount('#app')
