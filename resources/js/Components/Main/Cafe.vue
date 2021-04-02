<template>
    <section class="container main-section">
        <h2>Посещённые заведения</h2>
        <swiper ref="swiper" :options="swiperOptions">
            <swiper-slide v-for="(place, index) in places" :key="index" class="col-md-4 city-item">
                <h2 class="text-center">{{ place.name }}</h2>
                <a :href="`/places/${place.id}`">
                    <img :src="place.main_image">
                </a>
                <p class="w-100-p text-right">{{ place.year }} г.</p>
            </swiper-slide>
        </swiper>
    </section>
</template>

<script>
import Vue from 'vue';

import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper';

export default Vue.extend({
    components: { Swiper, SwiperSlide },
    directives: {
        swiper: directive
    },
    data: () => ({
        swiperOptions: {
            slidesPerView: 3,
            speed: 3000,
            loop: true,
            autoplay: {
                delay: 7000,
            },
        },
        places: [],
    }),
    mounted() {
        this.loadPlaces();
    },
    methods: {
        prev() {
            this.$refs.swiper.$swiper.slidePrev();
        },
        next() {
            this.$refs.swiper.$swiper.slideNext();
        },
        loadPlaces() {
            form.submit('get', '/api/places', {limit: 5})
            .then(response => {
                this.places = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
    }
});
</script>

