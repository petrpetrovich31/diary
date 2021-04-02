<template>
    <section class="container main-section">
        <h2>Посещённые города</h2>
        <swiper ref="swiper" :options="swiperOptions" class="container">
            <div class="swiper-button-prev" slot="button-prev" @click="prev()"></div>
            <div class="swiper-button-next" slot="button-next" @click="next()"></div>
            <swiper-slide v-for="(city, index) in cities" :key="index" class="col-md-4 city-item">
                <h2 class="text-center">{{ city.name }}</h2>
                <img :src="city.main_image">
                <p class="w-100-p text-right">{{ city.year }} г.</p>
            </swiper-slide>
        </swiper>
    </section>
</template>

<script lang="ts">
import Vue from 'vue';

import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper';

export default Vue.extend({
    components: { Swiper, SwiperSlide },
    directives: {
        swiper: directive
    },
    data: () => ({
        swiperOptions: {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            slidesPerView: 3,
            speed: 2000,
            loop: true,
            effect: 'coverflow',
            autoplay: {
                delay: 5000,
            },
        },
        cities: [],
    }),
    mounted() {
        this.loadCyties();
    },
    methods: {
        prev() {
            this.$refs.swiper.$swiper.slidePrev();
        },
        next() {
            this.$refs.swiper.$swiper.slideNext();
        },
        loadCyties() {
            form.submit('get', '/api/cities', {limit: 5})
            .then(response => {
                this.cities = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
    }
});
</script>
