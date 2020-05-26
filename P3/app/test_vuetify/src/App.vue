<template>
  <v-app>
    
    <Navegacion v-show="isLogged()"/>

    <v-content>
      <v-container fluid>
        <v-row align="center" justify="center">
        <v-fade-transition mode="out-in">
          <router-view></router-view>
        </v-fade-transition>
        </v-row>
      </v-container>
    </v-content>

    <v-footer app>
      <span>&copy; 2020</span>
    </v-footer>
  </v-app>
</template>

<script>
import Navegacion from '@/components/NavigationDrawerComponent.vue'

  export default {
    name: 'App',

    components: {
      Navegacion,
    },

    data: () => ({
    }),

    created () {
      this.$vuetify.theme.dark = true
    },

    methods: {
      isLogged() {
        return this.$store.getters.isLogged;
      }
    }
  }
</script>