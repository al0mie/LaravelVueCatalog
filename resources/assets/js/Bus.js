import Vue from 'vue';

let bus = new Vue();

bus.$on('inc', function(num){
    alert(num);
});

export default bus;