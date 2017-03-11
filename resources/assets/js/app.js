/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');
//
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */
import Vue from 'vue';
import router from './routes';
import navbar from './components/Menu';

require('./packages');
require('./components');


new Vue({
    template: `
      <div>
        <navbar />
        <section class="section">
          <div class="container is-fluid">
            <router-view></router-view>
          </div>
        </section>
      </div>
      `,
    router,
    components: {
        navbar
    }
}).$mount('#app');