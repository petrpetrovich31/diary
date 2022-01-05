<template>
    <section class="container main-section">
        <div class="title-page">
            <h2>Посещённые города</h2>
        </div>
        <div class="page-list-items">
            <div class="col-lg-4 col-sm-6 col-xs-12" v-for="(city, index) in cities">
                <div class="list-item">
                    <div class="img">
                        <img :src="city.main_image">
                    </div>
                    <div class="descr">
                        <div class="title">{{ city.name }}</div>
                        <div class="bottom">
                            <div class="date">{{ city.year }} г.</div>
                            <div class="btn"><a :href="'city/' + city.id">Подробнее</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="ts">
import Vue from 'vue';

export default Vue.extend({
    data: () => ({
        cities: [],
    }),
    mounted() {
        this.loadCyties();
    },
    methods: {
        loadCyties() {
            form.submit('get', 'https://petr-petrovich.ru' + '/api/cities')
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
