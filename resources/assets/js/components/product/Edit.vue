<template>
    <div class="panel panel-default" v-cloak>
        <div class="panel-body">
            <legend>Edit product</legend>

            <crud-form v-on:submitted="submit" :product="product"></crud-form>

            <router-link class="button is-large is-primary is-fullwidth has-text-centered" :to="{ name: 'products-index'}">Back</router-link>

        </div>
    </div>

</template>

<script>
    export default {
        created() {
            this.$http.get('/api/products/' + this.productId)
                .then(response => {
                    this.product = response.data;
                })
                .catch(response => {
                    let alert = {
                        show: true,
                        type: 'danger',
                        title: 'Error',
                        message: response.statusText
                    };
                });
        },
        data() {
            return {
                productId: this.$route.params.productId,
                url: '/api/products/',
                product: {}
            }
        },
        events: {
            'submitted'(product) {
                this.submit(product);
            }
        },
        methods: {
            submit(formData) {
                formData.set('_method', 'PUT');
                let url = this.url + this.productId;
                this.$http.post(url, formData)
                    .then(response => {
                        let alert = {
                            show: true,
                            type: 'success',
                            title: 'Success',
                            message: 'Product successfully updated.'
                        };

                        this.$on('showAlert', alert);
                    }).catch(response => {
                        let errors = response.body;

                        this.$on('formErrors', errors);
                    });
            }
        }
    }
</script>
