<template>
    <div>

        <ul id="demo">
            <list
                    class="item"
                    :categories="categories"
                   >
            </list>
        </ul>


    </div>

</template>


<script>
    export default {
        created() {
            this.$http.get('/api/categories')
                    .then(response => {
                this.categories = response.data;

        })
            .catch(response => {
                    let alert = {
                        show: true,
                        type: 'danger',
                        title: 'Error',
                        message: response.statusText
                    };

            this.$emit('showAlert', alert);
        });
        },
        data() {
            return {
                url: '/api/categories/',
                categories: {}
            }
        },
    }
</script>