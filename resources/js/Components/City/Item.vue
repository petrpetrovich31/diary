<template>
    <div class="wrap">
        <div class="title-page">
            <h2>{{ city.name }}</h2>
        </div>
        <div class="page-list-items">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="list-item">
                    <div class="img">
                        <img :src="city.main_image">
                    </div>
                    <div class="descr">
                        <div class="title">{{ city.name }}</div>
                        <div class="bottom">
                            <div class="date">{{ city.year }} г.</div>
                            <div class="btn">Подробнее</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import Vue from 'vue';

export default Vue.extend({
    data: () => ({
        city: null,
    }),
    mounted() {
        this.loadCyties();
    },
    methods: {
        loadCyties() {
            form.submit('get', 'https://petr-petrovich.ru' + '/api/cities/1')
                .then(response => {
                    this.city = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    }
});
</script>
