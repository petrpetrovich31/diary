<template>
    <swiper ref="swiper" :options="swiperOptions">
        <div class="swiper-button-prev" slot="button-prev" @click="prev()"></div>
        <div class="swiper-button-next" slot="button-next" @click="next()"></div>
        <swiper-slide v-for="(city, index) in cities" :key="index" class="col-md-4 city-item">
            <h2>{{ city.name }}</h2>
            <img :src="'https://petr-petrovich.ru/' + city.main_image">
            <p>{{ city.description }}</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </swiper-slide>
    </swiper>
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
            speed: 1000,
            loop: true,
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
            axios.get('https://petr-petrovich.ru' + '/api/cities', {
                params: {
                    limit: 5
                }
            })
            .then(response => {
                this.cities = response.data.data;
                console.log(this.cities);
            })
            .catch(function (error) {
                console.log(error);
            })
        },
    }
});
</script>
