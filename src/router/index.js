import { createRouter, createWebHistory } from 'vue-router'
import PetListView from '../views/PetListView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'PetListView',
      component: PetListView
    },
    {
      path: '/petadd',
      name: 'petadd',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/PetAddView.vue')
    }
  ]
})

export default router
