import Home from './views/Home.vue';
import { createRouter, createWebHistory } from 'vue-router';
const customPath = '/oao/public'
const routes = [
  {
    path: `${customPath}/home`,
    component: Home,
    name:'home',
  },
];

const router = createRouter({
  routes, // short for `routes: routes`
  history: createWebHistory(),
})

export default router;