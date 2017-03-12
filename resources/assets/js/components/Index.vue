<template>
    <div class="columns">
        <ul id="categoriesTree" class="tree column is-half">
            <item-list
                class="item"
                :model="model"
                   >
            </item-list>
        </ul>
        <product-index :category="category"  class="column is-half"> </product-index>
    </div>
</template>


<script>
    import bus from '../Bus';

    export default {

        props: {
            category_id: Number
        },

        created() {
            this.$http.get('/api/categoriesTree')
                .then(response => {
                    this.model = {
                        name: 'Catalog',
                        children: response.data
                    };
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

                bus.$on('contact-refresh', (category_id) => {
                   if (category_id) {
                       this.category = category_id;
                   }
                });
        },

        data() {
            return {
                url: 'categoriesTree',
                model: {},
                category: this.category_id
            }
        }
    }
</script>