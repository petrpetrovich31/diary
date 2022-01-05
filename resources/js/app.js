require('./bootstrap');

import City from "./Components/Main/City";
import CityList from "./Components/City/List";
import Form from "./Models/Form";
import Vue from 'vue'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
Vue.use(VueAwesomeSwiper)

window.Vue = require('vue');
window.form = new Form();

Vue.component('main-header', require('./Components/Main/Header').default);
Vue.component('city-section', require('./Components/Main/City').default);
Vue.component('cafe-section', require('./Components/Main/Cafe').default);
Vue.component('city-list', require('./Components/City/List').default);
Vue.component('city-item', require('./Components/City/Item').default);

const routes = [
    { path: '/', component: City },
    { path: '/city', component: CityList }
]

const router = new VueRouter({
    routes
})

const app = new Vue({
    router
}).$mount('#app')
