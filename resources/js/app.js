import './bootstrap';

import Vue from 'vue'
import {createApp, defineAsyncComponent} from 'vue/dist/vue.esm-bundler.js';


// window.Vue = vue;

// import App from './components/App.vue';
// import VueRouter from 'vue-router';
// import VueAxios from 'vue-axios';
// import axios from 'axios';
// import {routes} from './router';

// Vue.use(VueRouter);
// Vue.use(VueAxios, axios);

// const router = new VueRouter({
//     mode: 'history',
//     routes: routes
// });

// const app = new Vue({
//     el: '#app',
//     router: router,
//     render: h => h(App),
// });

import router from './routes'

// import { createApp } from 'vue';
// import linker from './components/App.vue';

// const app = createApp({
//     components:{
//         linker,
//     }
// });
// app.mount('#app');

const app = new vue({
    router,
}).$mount('#app')



