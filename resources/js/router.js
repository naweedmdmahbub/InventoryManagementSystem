import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// import OrderList from './components/Orders/List.vue'
// import OrderForm from './components/Orders/Form.vue'
// import OrderCreate from './components/Orders/Create.vue'
// import OrderEdit from './components/Orders/Edit.vue'

const routes = [
  {
      path: '/orders',
      component: () => import('./components/Orders/List.vue'),
      name: 'OrderList',
  },
  {
      path: '/orders/form',
      component: () => import('./components/Orders/Form.vue'),
      // component: OrderForm,
      name: 'OrderForm',
  },
  {
      path: '/orders/create',
      component: () => import('./components/Orders/Create.vue'),
      // component: OrderCreate,
      name: 'OrderCreate',
  },
  {
      path: '/orders/edit',
      component: () => import('./components/Orders/Edit.vue'),
      // component: OrderEdit,
      name: 'OrderEdit',
  }
]


const router = new VueRouter({
    routes, // short for `routes: routes`,
    hashbang: false,
    mode: 'history'
})

export default router