require('./bootstrap');

import Vue from 'vue';
import Unicon from 'vue-unicons/dist/vue-unicons-vue2.umd'
import { uniAngleDown } from 'vue-unicons/dist/icons'

Unicon.add([uniAngleDown])
Vue.use(Unicon, {
    height: 42,
    width: 42
})

import App from './vue/App.vue';

const app = new Vue({
    el: '#app',
    components: { App }
});
