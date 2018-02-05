require('./bootstrap');

Vue.component('newRoom', require('./components/NewRoom.vue'));
Vue.component('myPage', require('./components/MyPage.vue'));
Vue.component('search', require('./components/Search.vue'));

const newRoom = new Vue({
    el: '#new-room'
});

const myPage = new Vue({
    el: '#my-page'
});

const searcg = new Vue({
    el: '#search'
});
