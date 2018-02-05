require('./bootstrap');

Vue.component('favorite', require('./components/Favorite.vue'));

const favorite = new Vue({
    el: '.favorite'
});
