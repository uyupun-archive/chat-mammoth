require('./bootstrap');

Vue.component('newRoom', require('./components/NewRoom.vue'));
Vue.component('myPage', require('./components/MyPage.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('create', require('./components/Create.vue'));
Vue.component('handWrite', require('./components/HandWrite.vue'));

const app = new Vue({
    el: '#app'
});