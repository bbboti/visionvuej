require('./bootstrap');

window.Vue = require('vue');


import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [{
        path: '/clientes',
        component: require('./components/Clientes.vue'),
        meta: {
            title: 'Clientes'
        }
    },
    {
        path: '/administracion/companias',
        component: require('./components/administracion/companias/Companias.vue'),
        meta: {
            title: 'Compañias'
        }
    },
    {
        path: '/administracion/companias/create',
        component: require('./components/administracion/companias/Create.vue'),
        meta: {
            title: 'Compañias'
        }
    },
    {
        path: '/administracion/companias/:nombre/edit',
        component: require('./components/administracion/companias/Edit.vue'),
        meta: {
            title: 'Compañias'
        }
    },
    {
        path: '/administracion/organizadores',
        component: require('./components/administracion/Organizadores.vue'),
        meta: {
            title: 'Organizadores'
        }
    },
    {
        path: '/administracion/productores',
        component: require('./components/administracion/Productores.vue'),
        meta: {
            title: 'Productores'
        }
    },
    {
        path: '/polizas/automotor',
        component: require('./components/polizas/Automotor.vue'),
        meta: {
            title: 'Polizas Automotor'
        }
    },
    {
        path: '/polizas/create',
        component: require('./components/polizas/Create.vue'),
        meta: {
            title: 'Polizas Automotor'
        }
    },
    {
        path: '/polizas/automotor/:numero_solicitud/edit',
        component: require('./components/polizas/Edit.vue'),
        meta: {
            title: 'Polizas Automotor'
        }
    },


]
import addMonths from 'date-fns/add_months';
Vue.use(addMonths);

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

import PrettyCheckbox from 'pretty-checkbox-vue';
Vue.use(PrettyCheckbox);

import VueProgressBar from 'vue-progressbar';
const options = {
    color: '#B536DA',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
      speed: '0.6s',
      opacity: '0.6s',
      termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
  };
  
Vue.use(VueProgressBar, options);

import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect);


import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 6000
});
window.toast = toast;

const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    router
});
