<template>
    <div class="wrap" v-if="city">
        <div class="title-page">
            <h2>{{ city.name }}</h2>
        </div>
        <div class="page-list-items">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="list-item">
                    <div class="description">
                        {{ city.description}}
                    </div>
                </div>
                <div class="list-item comment-item" v-if="city.comment">
                    <h2>Куда сходить</h2>
                    <div class="comment">
                        {{ city.comment}}
                    </div>
                </div>
                <div class="images-slider" v-if="city.images">
                    <swiper ref="swiper" :options="swiperOptions" class="container">
                        <div class="swiper-button-prev" slot="button-prev" @click="prev()"></div>
                        <div class="swiper-button-next" slot="button-next" @click="next()"></div>
                        <swiper-slide v-for="(image, index) in city.images" :key="index" class="col-sm-10 col-md-4 city-item">
                            <img :src="image">
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
        </div>
    </div>
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
        city: null,
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
    }),
    mounted() {
        this.loadCyties();
    },
    methods: {
        loadCyties() {
            form.submit('get', `https://petr-petrovich.ru/api/cities/${this.$attrs.id}`)
                .then(response => {
                    this.city = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        prev() {
            this.$refs.swiper.$swiper.slidePrev();
        },
        next() {
            this.$refs.swiper.$swiper.slideNext();
        },
    }
});
</script>
