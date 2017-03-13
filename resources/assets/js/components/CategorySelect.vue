<template>
    <div>
        <label class="label" for="category_id">
            Category
        </label>
        <p class="control">
            <span class="select">
                <select v-model="selected" name="category_id" @change="categoryChanged">
                    <option v-for="option in options" v-bind:value="option.id" id="category_id">
                        {{ option.name }}
                    </option>
                </select>
             </span>
        </p>
    </div>
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