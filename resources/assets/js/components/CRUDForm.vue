<template>
<div>
    <form @submit.prevent="submit" novalidate v-cloak>
        <div class="row">
            <div class="col-md-6 text-center">
                <image-input :image-src="imageSrc"></image-input>

                <div class="mrg-top-1em text-danger" v-for="error of errors['avatar']">
                    {{ error }}
                </div>
            </div>

            <div class="col-md-6">
                <div
                    class="form-group"
                    :class="{ 'has-error': errors['name'] }">
                    <label class="control-label" for="name">
                        Name
                    </label>

                    <input
                        v-model="product.name"
                        type="text"
                        class="input"
                        id="name"
                        placeholder="Name...">

                    <span class="help-block" v-for="error of errors['name']">
                        {{ error }}
                    </span>
                </div>

                <div
                    class="form-group"
                    :class="{ 'has-error': errors['description'] }">
                    <label class="control-label" for="description">
                        Description
                    </label>

                    <textarea
                        v-model="product.description"
                        class="textarea"
                        id="description"
                        placeholder="Description...">

                    </textarea>

                    <span class="help-block" v-for="error of errors['description']">
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
            product: {
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
        computed: {
            imageSrc() {
                if(this.product.avatar instanceof File === false) {
                    if(this.product.avatar !== undefined) {
                        let avatar = this.product.avatar;

                        if(! avatar) {
                            avatar = 'default.png';
                        }

                        return '/storage/avatars/' + avatar;
                    }
                }
            }
        },
        methods: {
            submit() {
                let formData = new FormData();

                if (this.product.avatar instanceof File) {
                    formData.set('avatar', this.product.avatar);
                }

                formData.set('name', this.product.name);
                formData.set('description', this.product.description);

                this.$emit('submitted', formData);
            }
        },
        events: {
            'avatarUpdated'(imageFile) {
                this.product.avatar = imageFile;
            },
            'formErrors'(errors) {
                this.product = errors;
            },
            'showAlert'(alert) {
                this.alert = alert;

                this.$emit('notify', this.alert);

                this.errors = {};
            }
        }
    }
</script>
