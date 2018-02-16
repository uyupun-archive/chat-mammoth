require('./bootstrap');

Vue.component('newRoom', require('./pages/NewRoom.vue'));
Vue.component('myCreate', require('./pages/mypage/Create.vue'));
Vue.component('myFavorite', require('./pages/mypage/Favorite.vue'));
Vue.component('search', require('./pages/Search.vue'));
Vue.component('create', require('./pages/Create.vue'));
Vue.component('keyboard', require('./pages/room/Keyboard.vue'));
Vue.component('photo', require('./pages/room/Photo.vue'));
Vue.component('gif', require('./pages/room/Gif.vue'));
Vue.component('handWrite', require('./pages/room/HandWrite.vue'));

const app = new Vue({
    el: '#app'
});