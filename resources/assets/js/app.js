require('./bootstrap');

Vue.component('newRoom', require('./components/NewRoom.vue'));
Vue.component('myPage', require('./components/MyPage.vue'));

const newRoom = new Vue({
    el: '.new-room'
});

const myPage = new Vue({
    el: '.my-page'
});
