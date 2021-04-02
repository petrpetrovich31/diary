require('./bootstrap');

import Vue from 'vue'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import Form from "./Models/Form";

Vue.use(VueAwesomeSwiper)

window.Vue = require('vue');
window.form = new Form();

Vue.component('city-section', require('./Components/Main/City').default);
Vue.component('cafe-section', require('./Components/Main/Cafe').default);
Vue.component('city-list', require('./Components/City/List').default);
Vue.component('city-item', require('./Components/City/Item').default);

const app = new Vue({
    el: '#app',
})
