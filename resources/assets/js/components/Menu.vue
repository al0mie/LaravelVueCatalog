<template lang="html">
    <nav class="nav has-shadow">
        <div class="container">
            <div class="nav-left">
                <a class="nav-item">
                    <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
                </a>
                <router-link class="nav-item is-tab" to="/">
                    <i class="fa fa-dashboard"></i> Home
                </router-link>
                <router-link class="nav-item is-tab" to="/products">
                    <i class="fa fa-dashboard"></i> Products
                </router-link>
                <router-link class="nav-item is-tab" to="/categories">
                    <i class="fa fa-dashboard"></i> Categories
                </router-link>
            </div>
            <span class="nav-toggle">
              <span></span>
              <span></span>
              <span></span>
            </span>
        </div>
    </nav>
</template>
<script>
    export default {
        name: 'navbar'
    }
</script>