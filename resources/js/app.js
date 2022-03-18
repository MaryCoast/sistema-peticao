import Vue from 'vue';
import vuetify from './plugins/vuetify';

Vue.component('app',require('./components/App.vue').default)
Vue.component('peticao-page', require('./components/peticao/PeticaoPage').default);

export default new Vue({
    el:"#app",
    vuetify,
});
