import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import ProfileComponent from './components/ProfileComponent.vue';

const app = createApp({});

app.component('profile-component', ProfileComponent);

app.mount('#app');