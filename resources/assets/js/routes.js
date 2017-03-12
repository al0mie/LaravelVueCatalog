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
            path: '/products/create',
            name: 'products-create',
            component: require('./components/product/Create.vue')
        },

        {
            path: '/products/:productId',
            name: 'products-show',
            component: require('./components/product/Show.vue')
        },

        {
            path: '/products/edit/:productId',
            name: 'products-edit',
            component: require('./components/product/Edit.vue')
        },

        {
            path: '/categories',
            name: 'categories-index',
            component: require('./components/category/Index.vue')
        },

        {
            path: '/categories/create',
            name: 'categories-create',
            component: require('./components/category/Create.vue')
        },

        {
            path: '/categories/:productId',
            name: 'categories-show',
            component: require('./components/category/Show.vue')
        },

        {
            path: '/categories/edit/:productId',
            name: 'categories-edit',
            component: require('./components/category/Edit.vue')
        }
    ]
});

export default router;