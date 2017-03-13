<template>
    <div>
        <div class="column is-half">
            <img
                class="image is-128x128"
                :src="imageSrc"
                :alt="imageName"
                :title="imageName">
        </div>
        <p class="control">
            <input @change="preview($event)" name="image" type="file" accept="image/*">
        </p>
    </div>
</template>

<script>
    export default {
        props: {
            imageSrc: {
                type: String,
                default: '/storage/avatars/default.png'
            }
        },
        data() {
            return {
                imageName: null
            }
        },
        methods: {
            preview(event) {
                let input = event.target;
                let files = input.files;

                if (files && files[0]) {
                    if(files[0].type.match('image.*')) {
                        let reader = new FileReader();

                        reader.onload = (e) => {
                            this.imageSrc = e.target.result;
                            this.imageName = files[0].name;
                        };

                        reader.readAsDataURL(files[0]);

                        this.$emit('avatarUpdated', files[0]);
                    }
                }
            }
        }
    }
</script>
