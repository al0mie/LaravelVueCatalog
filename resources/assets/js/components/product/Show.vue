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

                    <p>
                        <label>Category:</label>
                        {{ category.id}}
                    </p>

                </div>
            </div>
        </div>
        <back-button> </back-button>
    </div>
</template>

<script>
    export default {
        created() {
            this.$http.get('/api' + this.$route.path)
                .then(response => {
                    this.product = response.data;
                    this.category = this.product.category;
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
                category: {},
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

<style>
    label {
        font-weight: bold;
    }
</style>