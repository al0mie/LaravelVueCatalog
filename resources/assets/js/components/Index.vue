<template>
    <div>
        <ul id="demo">
            <item-list
                class="item"
                :model="model"
                   >
            </item-list>
        </ul>
        <product-index :category="1"> </product-index>
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
                        name: 'My Tree',
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

            bus.$on('filterCatalog', (category_id) => {
                alert(this.category_idd++);
            });
        },

        computed: {
            category(category_id) {
                return category_id;
            },
        },

        data() {
            return {
                url: 'categoriesTree',
                model: {},
                category_idd: 0
            }
        }
    }
</script>