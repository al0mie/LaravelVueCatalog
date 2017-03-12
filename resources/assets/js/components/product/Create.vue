<template>
    <div class="panel panel-default" v-cloak>
        <div class="panel-body">
            <legend>Create product</legend>

            <crud-form-product :product="product" v-on:submitted="submit"></crud-form-product>

            <back-button> </back-button>
        </div>
    </div>
</template>

<script>
    import router from '../../routes';

    export default {
        data() {
            return {
                url: '/api/products',
                product: {
                    avatar: '',
                    name: '',
                    description: ''
                }
            }
        },
        events: {
            'submitted'(product) {
                this.submit(product);
            }
        },
        methods: {
            submit(formData) {
                this.$http.post(this.url, formData)
                    .then(response => {
                        let alert = {
                            show: true,
                            type: 'success',
                            title: 'Success',
                            message: 'Product successfully created.'
                        };

                        this.$emit('showAlert', alert);
                        this.resetForm();
                    }).catch(response => {
                        let errors = response.body;

                        this.$emit('formErrors', errors);
                    });
                    router.push({ name: 'products-index'});
            },
            resetForm() {
                this.product = {
                    avatar: '',
                    name: '',
                    description: ''
                }
            }
        }
    }
</script>
