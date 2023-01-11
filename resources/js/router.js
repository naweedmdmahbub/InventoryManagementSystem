import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


const routes = [
  {
      path: '/orders',
      component: () => import('./components/Orders/List.vue'),
      name: 'OrderList',
      meta: { noCache: true },
  },
  {
      path: '/orders/form',
      component: () => import('./components/Orders/Form.vue'),
      name: 'OrderForm',
      meta: { noCache: true },
  },
  {
      path: '/orders/create',
      component: () => import('./components/Orders/Create.vue'),
      name: 'OrderCreate',
      meta: { noCache: true },
  },
  {
      path: '/orders/edit/:id',
      component: () => import('./components/Orders/Edit.vue'),
      name: 'OrderEdit',
      meta: { noCache: true },
  },
  {
      path: '/orders/view/:id',
      component: () => import('./components/Orders/View.vue'),
      name: 'OrderView',
      meta: { noCache: true },
  },
  {
      path: '/manpowers',
      component: () => import('./components/Manpowers/List.vue'),
      name: 'ManpowerList',
      meta: { noCache: true },
  },
]


const router = new VueRouter({
    routes, // short for `routes: routes`,
    mode: 'history'
})

export default router