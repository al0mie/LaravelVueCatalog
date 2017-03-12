<template>
    <div class="panel panel-default" v-cloak>
        <div class="panel-body">
            <legend>Edit category</legend>

            <crud-form-category v-on:submitted="submit" :category="category"></crud-form-category>

            <back-button> </back-button>

        </div>
    </div>

</template>

<script>
    import router from '../../routes';

    export default {
        created() {
            this.$http.get('/api/categories/' + this.$route.params.id)
                .then(response => {
                    this.category = response.data;
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
                categoryId: this.$route.params.id,
                url: '/api/categories/',
                category: {}
            }
        },
        events: {
            'submitted'(category) {
                this.submit(category);
            }
        },
        methods: {
            submit(formData) {
                formData.set('_method', 'PUT');
                let url = this.url + this.categoryId;
                this.$http.post(url, formData)
                    .then(response => {
                        let alert = {
                            show: true,
                            type: 'success',
                            title: 'Success',
                            message: 'Category successfully updated.'
                        };

                        router.push({ name: 'categories-show', params: {'categoryId':  this.categoryId }});

                    }).catch(response => {
                        let errors = response.body;

                        this.$emit('formErrors', errors);
                    });
            }
        }
    }
</script>
