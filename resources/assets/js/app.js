
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//vue 路由
import VueRouter  from 'vue-router'
import routes from './routes.js';

//element组件
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-default/index.css';

//语言包
import VueI18n from 'vue-i18n';
import locales from './language';

//vuex
import store from './vuex/store.js';

import App from './App.vue';

Vue.use(ElementUI);
Vue.use(VueI18n);
Vue.use(VueRouter);

//语言包配置
Vue.config.language=window.Language;
const i18n = new VueI18n({
    locale: Vue.config.language,
    messages: locales
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

//公用组件
Vue.component('v-searchTable', require('./components/common/SearchTable.vue'));
Vue.component('v-tableButtonDialog', require('./components/common/TableButtonDialog.vue'));


//路由
const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    linkActiveClass: 'active',
    routes: routes
});

new Vue({
    router,
    i18n,
    store,
    render: h => h(App)
}).$mount('#app');
