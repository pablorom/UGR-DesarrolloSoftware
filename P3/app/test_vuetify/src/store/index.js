import Vue from 'vue'
import Vuex from 'vuex'
import router from '@/router/index.js'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    isLogged: false,
    user: {
      name: 'defaultUser@domain.com',
      email: 'user',
    }
  },

  mutations: {
    login(state, user) {
      state.isLogged = true;
      state.user.name = user.nombre;
      state.user.email = user.correo;
    },

    logout(state) {
      state.isLogged = false;
    }
  },

  actions: {
    login(context, user) {
      context.commit('login', user);
      router.replace('/');
    },

    logout(context) {
      context.commit('logout');
      router.replace('/login');
    }
  },

  getters: {
    isLogged: (state) => {
      return state.isLogged;
    },
    userName: (state) => {
      return state.user.name;
    },
    userEmail: (state) => {
      return state.user.email;
    }
  }
})
