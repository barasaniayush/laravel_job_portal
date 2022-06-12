require('./bootstrap');

import { createApp } from 'vue';
import ApplyComponent from './components/ApplyComponent.vue';
import FavouriteComponent from './components/FavouriteComponent.vue';
const app = createApp({});
app.component('home',ApplyComponent);
app.component('favourite', FavouriteComponent);
app.mount('#app');


