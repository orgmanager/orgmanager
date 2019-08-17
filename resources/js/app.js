import Vue from 'vue'
import swal from 'sweetalert'

window.swal = swal

Vue.component('password-panel', () => import('./components/PasswordPanel.vue' /* webpackChunkName: "password-panel" */ ))

new Vue({
    el: '#app'
})
