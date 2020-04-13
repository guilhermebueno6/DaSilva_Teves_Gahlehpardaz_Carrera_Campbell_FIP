import Vue from 'vue';
import Router from 'vue-router';
import Home from '../views/Home.vue';
import Admin from '../views/Admin.vue';
import Login from '../components/Login.vue';
import Dashboard from '../components/Dashboard.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/Admin',
      name: 'admin',
      component: Admin,
      children: [
        {
          path: 'Login',
          name: 'login',
          component: Login
        },
        {
          path: 'Dashboard',
          name: 'dashboard',
          component: Dashboard
        }
      ]
    }
  ]
});