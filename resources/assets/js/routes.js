import VueRouter from 'vue-router'

var router = new VueRouter({

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
            path: '/products/create',
            name: 'products-create',
            component: require('./components/product/Create.vue')
        },

        {
            path: '/products/show/:productId',
            name: 'products-show',
            component: require('./components/product/Show.vue')
        },

        {
            path: '/products/edit/:productId',
            name: 'products-edit',
            component: require('./components/product/Edit.vue')
        }
    ]
});

export default router;