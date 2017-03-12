<template>
    <div>
        <router-link class="button is-primary" :to="{ name: 'products-create'}">Create</router-link>
        <div class="table-responsive" v-cloak>
            <vuetable ref="vuetable"
                    :api-url="url"
                    :pagination-path="paginationPath"
                    :per-page="perPage"
                    :fields="fields"
                    :data-resource="resource"
                    :class="classes"
                    :sort-order="sortOrder"
                    :table-class="tableClass"
                    :ascending-icon="ascendingIcon"
                    :descending-icon="descendingIcon"
                    :append-params="appendParams"
                    v-on:refresh-table="refreshTable"
            ></vuetable>
        </div>
    </div>
</template>

<script>
    import bus from '../../Bus.js'
    export default {
        props: {
            category: Number
        },
        watch:{
            'category': {
                handler:function() {
                    this.refreshTable();
                }
            }
        },
        data(){
            let url = '/api/products';
            return {
                url: url,
                resource: 'products',
                paginationPath: '',
                search: '',
                perPage: 10,
                fields: [
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
                        dataClass: 'text-center',

                    },

                    {
                        title: 'Actions',
                        name: '__component:actions',
                        titleClass: 'text-center col-sm-1',
                        dataClass: 'text-center',

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
                alert: {
                    show: false,
                    type: null,
                    title: null,
                    message: null
                }
            }
        },
        methods: {
            refreshTable() {
                if (this.category) {
                    this.url = '/api/products?category_id=' + this.category;
                }
                this.$refs.vuetable.reload();

                this.$nextTick(function () {
                    if (this.category) {
                        this.url = '/api/products?category_id=' + this.category;
                    }
                    this.$refs.vuetable.reload();
                });
            }
        },
        events: {
            'showData'(rowData) {
                router.push({ name: 'index'});
            },
            'editData'(rowData) {
                this.$route.router.go({ name: 'edit', params: { productId: rowData.id } })
            },
            'deleteData'(rowData) {
                swal({
                    title: 'Confirmation',
                    text: 'Are you sure you want to delete this?',
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    showLoaderOnConfirm: true
                }).then(() => {
                    swal.disableButtons();
                    console.log(rowData);

                    let formData = new FormData();

                    formData.set('_method', 'DELETE');

                    let url = this.url + '/' + rowData.id;

                    Vue.http.post(url, formData)
                        .then(response => {
                            swal('Success', 'Your data has been deleted.', 'success');
                            $('table').trigger('vuetable:refresh');
                        }).catch(response => {
                                swal('Error', 'Failed to delete your data.', 'error');
                            });
                    })

                },
            }
        }
</script>
