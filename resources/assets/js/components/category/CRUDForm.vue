<template>
<div>
    <form @submit.prevent="submit" novalidate v-cloak>
        <div class="panel">
            <category-select v-on:update-category="updateCategory"> </category-select>
            <div>
                <div
                    :class="{ 'has-error': errors['name'] }">
                    <label class="label" for="name">
                        Name
                    </label>
                    <p>
                        <input
                            v-model="category.name"
                            type="text"
                            class="input"
                            id="name"
                            placeholder="Name...">
                    </p>
                    <span class="help-block" v-for="error of errors['name']">
                        {{ error }}
                    </span>
                </div>
            </div>
        </div>

        <button class="button is-large is-info is-fullwidth">
            Save
        </button>
    </form>
</div>
</template>

<script>
    export default {
        props: {
            category: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                alert: {
                    show: false,
                    type: null,
                    title: null,
                    message: null
                },
                errors: {}
            }
        },

        methods: {
            updateCategory(categoryId) {
                this.parentId = categoryId;
            },

            submit() {
                let formData = new FormData();

                formData.set('name', this.category.name);

                if (this.parentId) {
                    formData.set('category_id', this.parentId);
                }

                this.$emit('submitted', formData);
            }
        },
        events: {
            'formErrors'(errors) {
                this.errors = errors;
            },
            'showAlert'(alert) {
                this.alert = alert;

                this.$emit('notify', this.alert);

                this.errors = {};
            }
        }
    }
</script>
