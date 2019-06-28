/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//tinymce
import tinymce from 'vue-tinymce-editor'
Vue.component('tinymce', tinymce);

//fileupload
import FileUpload from 'v-file-upload'
Vue.use(FileUpload);

//sweetalert
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
window.Swal = Swal;
//toaster
window.Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false,
})
//vue datatable
// import Vuetable from 'vuetable-2/src/components/Vuetable'
// Vue.component('Vuetable', Vuetable);

//vuetify
import Vuetify from 'vuetify'
Vue.use(Vuetify)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('dashboard', require('./components/pages/dashboard.vue').default);
Vue.component('category', require('./components/pages/category/category.vue').default);
Vue.component('category-form', require('./components/pages/category/categoryform.vue').default);
Vue.component('setting-component', require('./components/pages/setting/setting.vue').default);


Vue.component('author', require('./components/pages/author/author.vue').default);
Vue.component('author-form', require('./components/pages/author/authorcreate.vue').default);


Vue.component('language', require('./components/pages/language/language.vue').default);
Vue.component('language-form', require('./components/pages/language/languageform.vue').default);

Vue.component('publisher', require('./components/pages/publisher/publisher.vue').default);
Vue.component('publisher-form', require('./components/pages/publisher/create.vue').default);

Vue.component('product', require('./components/pages/product/product.vue').default);
Vue.component('product-form', require('./components/pages/product/create.vue').default);
Vue.component('blog', require('./components/pages/blog/blog.vue').default);
Vue.component('blog-form', require('./components/pages/blog/blogcreate.vue').default);

// Vue.component('media', require('./components/pages/media/media.vue').default);
// Vue.component('media-form', require('./components/pages/media/mediaform.vue').default);


Vue.component('sidebar-menu', require('./components/sidebarmenu.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//  Swal.fire(
//   'Cancelled!',
//   'The request has been cancelled.',
//   'success'
// )
const app = new Vue({
    el: '#app',
});
