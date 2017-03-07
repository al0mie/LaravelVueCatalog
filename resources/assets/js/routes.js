import VueRouter from 'vue-router'

var router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'index',
            component: require('./components/Index.vue')
        },

        {
            path: '/products',
            name: 'products-index',
            component: require('./components/product/Index.vue')
        },

        {
            path: 'products/create',
            name: 'create',
            component: require('./components/product/Create.vue')
        },

        {
            path: 'products/show/:productId',
            name: 'show',
            component: require('./components/product/Show.vue')
        },

        {
            path: 'products/edit/:productId',
            name: 'edit',
            component: require('./components/product/Edit.vue')
        }
    ]
});

export default router;