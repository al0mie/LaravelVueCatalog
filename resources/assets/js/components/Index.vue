<template>
    <div class="table-responsive" v-cloak>
        <vuetable
                :api-url="url"
                :pagination-path="paginationPath"
                :per-page="perPage"
                :fields="fields"
                :class="classes"
                :sort-order="sortOrder"
                :table-class="tableClass"
                :ascending-icon="ascendingIcon"
                :descending-icon="descendingIcon"
                :append-params="appendParams"
                :wrapper-class="wrapperClass"
                :table-wrapper="tableWrapper"
                :pagination-component="paginationComponent"
        ></vuetable>
    </div>

</template>

<script>
    import bus from '../Bus.js'
    export default {
        data() {
            return {
                url: '/api/products',
                paginationPath: '',
                search: '',
                perPage: 10,
                fields: [
                    {
                        name: '__checkbox',
                        titleClass: 'text-center col-sm-1',
                        dataClass: 'text-center'
                    },
                    {
                        title: 'Index',
                        name: '__sequence',
                        titleClass: 'text-center col-sm-1',
                        dataClass: 'text-center'
                    },
                    {
                        title: 'Avatar',
                        name: '__component:avatar',
                        titleClass: 'text-center col-sm-2',
                        dataClass: 'text-center'
                    },
                    {
                        title: 'Name',
                        name: 'name',
                        sortField: 'name',
                        titleClass: 'text-center col-sm-3',
                        dataClass: 'text-center'
                    },
                    {
                        title: 'Description',
                        name: 'description',
                        sortField: 'description',
                        titleClass: 'text-center col-sm-3',
                        dataClass: 'text-center'
                    },

                    {
                        title: 'Actions',
                        name: '__component:actions',
                        titleClass: 'text-center col-sm-1',
                        dataClass: 'text-center'
                    }

                ],
                sortOrder: [
                    {
                        field: 'name',
                        direction: 'asc'
                    }
                ],
                tableClass: 'table is-bordered table-hover',
                classes: 'table is-bordered table-hover',
                ascendingIcon: 'glyphicon glyphicon-menu-up pull-right',
                descendingIcon: 'glyphicon glyphicon-menu-down pull-right',
                appendParams: {},
                wrapperClass: 'vuetable-wrapper ',
                tableWrapper: '.vuetable-wrapper',
                paginationComponent: 'bootstrap-pagination',
                alert: {
                    show: false,
                    type: null,
                    title: null,
                    message: null
                }
            }
        },

        events:
        {
            'showData'(rowData) {
                this.$route.router.go({ name: 'show', params: { productId: rowData.id } })
            },
            'editData'(rowData) {
                this.$route.router.go({ name: 'edit', params: { productId: rowData.id } })
            },
            'deleteData'(rowData) {
                swal({
                    title: 'Confirmation',
                    text: 'Are you sure you want to delete this data?',
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    showLoaderOnConfirm: true
                }).then(() => {
                    swal.disableButtons();

                    let formData = new FormData();

                    formData.set('_method', 'DELETE');

                    let url = this.url + '/' + rowData.id;

                    Vue.http.post(url, formData)
                        .then(response => {
                            swal(
                                'Success',
                                'Your data has been deleted.',
                                'success'
                            );

                            this.$broadcast('vuetable:refresh');
                        }).catch(response => {
                            swal(
                                    'Error',
                                    'Failed to delete your data.',
                                    'error'
                            );
                        });
                })
            },
        }
    }
</script>
