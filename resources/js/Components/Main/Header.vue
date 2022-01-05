<template>
    <header class="header">
        <div class="header-top">
            <div class="wrap">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-3 display-inline">
                        <h3 class="main-title">
                            <router-link to="/">Petr Perovich</router-link>
                        </h3>
                    </div>
                    <div class="col-lg-6 col-9 display-inline">
                        <ul class="menu">
<!--                            <li>
                                <router-link to="/city" v-bind:class="{active: isCitiesRoute}" >Города</router-link>
                            </li>
                            <li><a href="#">Заведения</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "Header",
    data: () => ({
        currentRoute: '/',
        isCitiesRoute: false,
    }),
    watch: {
        $route (to, from){
            this.changeActiveRoute()
        }
    },
    methods: {
        changeActiveRoute() {
            this.currentRoute = this.$router.history.current.path
            this.isCitiesRoute = this.currentRoute === '/city'
        }
    }
}
</script>
