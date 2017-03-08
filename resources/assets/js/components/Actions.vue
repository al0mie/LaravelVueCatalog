<template>
    <div class="btn-group-vertical" role="group" aria-label="Actions" v-cloak>
        <button
            type="button"
            class="button is-primary"
            title="Show"
            @click="showData(rowData)">
            <span> Detail </span>
        </button>

        <button
            type="button"
            class="button is-warning"
            title="Edit"
            @click="editData(rowData)">
            <span> Edit </span>
        </button>

        <button
            type="button"
            class="button is-danger"
            title="Delete"
            @click="deleteData(rowData)">
            <span> Delete</span>
        </button>
    </div>
</template>

<script>
    import bus from '../Bus.js'
    export default {
        props: {
            rowData: {
                type: Object,
                required: true
            }
        },
        methods: {
            showData(rowData) {
                console.log($('table').html());
                bus.$emit('showData', rowData);
            },
            editData(rowData) {
                bus.$emit('editData', rowData);
            },
            deleteData(rowData) {
                bus.$emit('deleteData', rowData);
            }
        }
    }
</script>
