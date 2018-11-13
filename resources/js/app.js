


require('./bootstrap');

window.Vue = require('vue');


import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
{
    path: '/clientes',
    component: require('./components/Clientes.vue'),
    meta: {title: 'Clientes'}
},
{
    path: '/administracion/companias',
    component: require('./components/administracion/companias/Companias.vue'),
    meta: {title: 'Compañias'}
},
{
    path: '/administracion/companias/create',
    component: require('./components/administracion/companias/Create.vue'),
    meta: {title: 'Compañias'}
},
{
    path: '/administracion/companias/:nombre/edit',
    component: require('./components/administracion/companias/Edit.vue'),
    meta: {title: 'Compañias'}
},
{
    path: '/administracion/organizadores',
    component: require('./components/administracion/Organizadores.vue'),
    meta: {title: 'Organizadores'}
},
{
    path: '/administracion/productores',
    component: require('./components/administracion/Productores.vue'),
    meta: {title: 'Productores'}
},
{
    path: '/polizas/automotor',
    component: require('./components/polizas/Automotor.vue'),
    meta: {title: 'Polizas Automotor'}
},


]

// router.beforeEach((to, from, next) => {
//     document.title = to.meta.title(to)
//     next()
//   })

 
const router = new VueRouter({
  mode: 'history',
  routes
});

const app = new Vue({
    el: '#app',
    router
});
