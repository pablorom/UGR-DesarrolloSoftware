import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Entidad from '../views/Entidad.vue'
import Valorable from '../views/Valorable.vue'
import store from '@/store/index.js'

Vue.use(VueRouter)

  const routes = [
    {
      path: "/",
      name: "Home",
      component: Home,
      beforeEnter: (to, from, next) => {
        !store.getters.isLogged ? next("/login") : next();
      },
    },
    {
      path: "/login",
      name: "Login",
      component: Login,
    },
    {
      path: "/entidades/:id",
      name: "Entidad",
      component: Entidad,
      props: true
    },
    {
      path: "/entidades/:entidadID/valorables/:id",
      name: "Valorable",
      component: Valorable,
      props: true
    },
    { path: '*', redirect: '/' }
  ];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
