<template>
    <div v-cloak>
        <div class="panel-block panel-default">
            <div class="columns">
                <div class="column">
                    <div class="panel">
                        <p>
                            <label>Name:</label>
                            {{ category.name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <back-button> </back-button>
    </div>
</template>

<script>
    export default {
        created() {
            this.$http.get('/api' + this.$route.path)
                .then(response => {
                    this.category = response.data;
                })
                .catch(response => {
                    this.alert = {
                        show: true,
                        type: 'danger',
                        title: 'Error',
                        message: response.statusText
                    };
                });
        },
        data() {
            return {
                category: {},
                alert: {
                    show: false,
                    type: null,
                    title: null,
                    message: null
                }
            };
        },
    }
</script>

<style>
    label {
        font-weight: bold;
    }
</style>