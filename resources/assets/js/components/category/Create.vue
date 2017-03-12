<template>
    <div class="panel panel-default" v-cloak>
        <div class="panel-body">
            <legend>Create category</legend>

            <crud-form-category :category="category" v-on:submitted="submit"></crud-form-category>

            <back-button> </back-button>
        </div>
    </div>
</template>

<script>
    import router from '../../routes';

    export default {
        data() {
            return {
                url: '/api/categories',
                category: {
                    name: ''
                }
            }
        },
        events: {
            'submitted'(category) {
                this.submit(category);
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
                            message: 'Category successfully created.'
                        };
                        this.$emit('showAlert', alert);
                        this.resetForm();
                    }).catch(response => {
                        let errors = response.body;
                        this.$emit('formErrors', errors);
                    });
                    router.push({ name: 'categories-index'});
            },
            resetForm() {
                this.category = {
                    name: ''
                }
            }
        }
    }
</script>
