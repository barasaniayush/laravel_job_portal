require('./bootstrap');

import { createApp } from 'vue';
import ApplyComponent from './components/ApplyComponent.vue';
const app = createApp({});
app.component('home',ApplyComponent);
app.mount('#app');


