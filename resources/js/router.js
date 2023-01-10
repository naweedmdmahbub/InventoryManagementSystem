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
      // component: OrderForm,
      name: 'OrderForm',
      meta: { noCache: true },
  },
  {
      path: '/orders/create',
      component: () => import('./components/Orders/Create.vue'),
      // component: OrderCreate,
      name: 'OrderCreate',
      meta: { noCache: true },
  },
  {
      path: '/orders/edit/:id',
      component: () => import('./components/Orders/Edit.vue'),
      // component: OrderEdit,
      name: 'OrderEdit',
      meta: { noCache: true },
  },
  {
      path: '/orders/view/:id',
      component: () => import('./components/Orders/View.vue'),
      // component: OrderView,
      name: 'OrderView',
      meta: { noCache: true },
  }
]


const router = new VueRouter({
    routes, // short for `routes: routes`,
    hashbang: false,
    mode: 'history'
})

export default router