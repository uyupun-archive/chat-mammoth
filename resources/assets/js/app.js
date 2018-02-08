require('./bootstrap');

Vue.component('newRoom', require('./components/NewRoom.vue'));
Vue.component('myPage', require('./components/MyPage.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('create', require('./components/Create.vue'));

const app = new Vue({
    el: '#app'
});