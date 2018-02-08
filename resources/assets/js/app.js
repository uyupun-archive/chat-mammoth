require('./bootstrap');

Vue.component('newRoom', require('./components/NewRoom.vue'));
Vue.component('myPage', require('./components/MyPage.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('create', require('./components/Create.vue'));

const newRoom = new Vue({
    el: '#new-room'
});

const myPage = new Vue({
    el: '#my-page'
});

const search = new Vue({
    el: '#search'
});

const create = new Vue({
    el: '#create'
});