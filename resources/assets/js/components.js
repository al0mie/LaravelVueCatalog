const Vuetable = require('vuetable-2/src/components/Vuetable.vue');
const VuetablePagination = require('vuetable-2/src/components/VuetablePagination.vue');
const VuetablePaginationDropdown = require('vuetable-2/src/components/VuetablePaginationDropdown.vue');


const VuestrapDatepicker = require('vue-strap').datepicker;
const VuestrapAlert = require('vue-strap').alert;

const Avatar = require('./components/Avatar.vue');
const Actions = require('./components/Actions.vue');
const Notify = require('./components/Notify.vue');
const ImageInput = require('./components/ImageInput.vue');
const CRUDFormProduct = require('./components/product/CRUDFormProduct.vue');
const ItemList = require('./components/ItemList.vue');
const ProductIndex = require('./components/product/Index.vue');
const BackButton = require('./components/BackButton.vue');
const CRUDFormCategory = require('./components/category/CRUDForm.vue');
const CategorySelect = require('./components/CategorySelect.vue');

// define the item component
Vue.component('crud-form-category', CRUDFormCategory);
Vue.component('crud-form-product', CRUDFormProduct);

Vue.component('category-select', CategorySelect);
Vue.component('item-list', ItemList);
Vue.component('product-index', ProductIndex);
Vue.component('back-button', BackButton);

Vue.component('vuetable', Vuetable);
Vue.component('vuetable-pagination', VuetablePagination);
Vue.component('vuetable-pagination-dropdown', VuetablePaginationDropdown);


Vue.component('datepicker', VuestrapDatepicker);
Vue.component('alert', VuestrapAlert);

Vue.component('avatar', Avatar);
Vue.component('actions', Actions);
Vue.component('notify', Notify);
Vue.component('image-input', ImageInput);