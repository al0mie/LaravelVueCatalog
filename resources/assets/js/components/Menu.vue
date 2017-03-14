<template lang="html">
    <nav class="nav has-shadow">
        <div class="container">
            <div class="nav-left">
                <router-link class="nav-item" :to="{ name: 'index'}">
                    <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
                </router-link>

                <router-link class="nav-item is-tab" :to="{ name: 'index'}">
                    <i class="fa fa-home"></i> Home
                </router-link>
                <router-link class="nav-item is-tab" :to="{ name: 'products-index'}">
                    <i class="fa fa-table"></i> Products
                </router-link>
                <router-link class="nav-item is-tab" :to="{ name: 'categories-index'}">
                    <i class="fa fa-table"></i> Categories
                </router-link>
            </div>

        </div>
    </nav>
</template>
<script>
    export default {
        name: 'navbar'
    }
</script>