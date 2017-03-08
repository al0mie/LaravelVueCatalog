<template>
    <div v-cloak>
        <div class="panel-block panel-default">
            <div class="columns">
                <div class="column text-center">
                    <img
                        :src="product.avatar"
                        :alt="product.name"
                        :title="product.name"
                        class="img-thumbnail img-responsive image-preview">
                </div>

                <div class="column">
                    <div class="panel">
                        <p>
                            <label>Name:</label>
                            {{ product.name }}
                        </p>
                    </div>
                    <p>
                        <label>Description:</label>
                        {{ product.description }}
                    </p>

                </div>
            </div>
        </div>
        <div class="has-text-centered">
            <router-link class="button is-primary is-large" :to="{ name: 'products-index'}">Back</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            this.$http.get('/api' + this.$route.path)
                .then(response => {
                    this.product = response.data;

                    if(! this.product.avatar) {
                        this.product.avatar = 'default.png';
                    }

                    this.product.avatar = '/storage/avatars/' + this.product.avatar;
                })
                .catch(response => {
                    this.alert = {
                        show: true,
                        type: 'danger',
                        title: 'Error',
                        message: response.statusText
                    };
                });
        },
        data() {
            return {
                product: {},
                alert: {
                    show: false,
                    type: null,
                    title: null,
                    message: null
                }
            };
        }
    }
</script>
