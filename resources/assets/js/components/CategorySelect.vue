<template>
    <select v-model="selected" name="category_id" @change="categoryChanged">
        <option v-for="option in options" v-bind:value="option.id">
            {{ option.name }}
        </option>
    </select>
</template>

<script>
    export default {
        props: {
            selectedValue: {
              type: Number
            }
        },
        created() {
            this.$http.get('/api/categoryList')
                .then(response => {
                    this.options = response.data;
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
        methods: {
            categoryChanged() {
                this.$emit('update-category', this.selected);
            }
        },
        data() {
            return {
                options: [],
                selected: null
            }
        }
    }
</script>