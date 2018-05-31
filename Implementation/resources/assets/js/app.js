import Glide from '@glidejs/glide';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Glide = Glide;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('comic-list', require('./components/ComicList.vue'));
Vue.component('character-list', require('./components/CharacterList.vue'));
Vue.component('events-list', require('./components/EventList'));
//
const app = new Vue({
    el: '#vue-app'
});

require('./home-slider');
require('./fixed');
