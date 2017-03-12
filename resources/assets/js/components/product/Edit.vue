<template>
    <div class="panel panel-default" v-cloak>
        <div class="panel-body">
            <legend>Edit product</legend>

            <crud-form v-on:submitted="submit" :product="product"></crud-form>

            <back-button> </back-button>

        </div>
    </div>

</template>

<script>
    import router from '../../routes'

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

                        router.push({ name: 'products' + '-show', params: {'productId':  this.productId }});

                    }).catch(response => {
                        let errors = response.body;

                        this.$emit('formErrors', errors);
                    });
            }
        }
    }
</script>
