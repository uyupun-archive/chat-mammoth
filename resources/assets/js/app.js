require('./bootstrap');

Vue.component('newRoom', require('./components/NewRoom.vue'));
Vue.component('myCreate', require('./components/mypage/Create.vue'));
Vue.component('myFavorite', require('./components/mypage/Favorite.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('create', require('./components/Create.vue'));
Vue.component('keyboard', require('./components/room/Keyboard.vue'));
Vue.component('photo', require('./components/room/Photo.vue'));
Vue.component('handWrite', require('./components/room/HandWrite.vue'));

const app = new Vue({
    el: '#app'
});