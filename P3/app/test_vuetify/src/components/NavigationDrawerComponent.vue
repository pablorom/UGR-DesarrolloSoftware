<template>

  <span>
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped
    >
      <v-list dense>
      
        <v-list-item link @click="irA('/')">
            <v-list-item-icon>
              <v-icon>mdi-home</v-icon>
            </v-list-item-icon>
          <v-list-item-title>Inicio</v-list-item-title>
        </v-list-item>

      </v-list>
      <!-- Opciones de usuario -->
      <v-list dense>

        <v-list-item link @click="crearPlataforma()">
          <v-list-item-icon>
            <v-icon>mdi-plus</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Crear plataforma</v-list-item-title>
        </v-list-item>
        
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
            <v-list-item-title>Perfil</v-list-item-title>
        </v-list-item>

        <v-list-item link @click="logout()">
          <v-list-item-icon>
            <v-icon>mdi-account-off</v-icon>
          </v-list-item-icon>
            <v-list-item-title>Cerrar sesion</v-list-item-title>
        </v-list-item>
      
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-account-remove</v-icon>
          </v-list-item-icon>
            <v-list-item-title>Eliminar mi cuenta</v-list-item-title>
        </v-list-item>

      </v-list>

      <!-- Opciones de administrador -->
      <v-list dense>
          
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-account-plus</v-icon>
          </v-list-item-icon>
            <v-list-item-title>Añadir administradores</v-list-item-title>
        </v-list-item>

        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-account-remove</v-icon>
          </v-list-item-icon>
            <v-list-item-title>Eliminar administradores</v-list-item-title>
        </v-list-item>
      
      </v-list>

      <!-- Opciones de superadmin -->
      <v-list dense>

        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-delete</v-icon>
          </v-list-item-icon>
            <v-list-item-title>Eliminar plataforma</v-list-item-title>
        </v-list-item>

      </v-list>

    </v-navigation-drawer>

    <v-app-bar app clipped-left>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Valóralo todo!</v-toolbar-title>
    </v-app-bar>

  </span>

</template>

<script>
import router from '@/router/index.js'
import Dialog from './DialogComponent'

export default {
  name: 'Drawer',

  components: {
    Dialog
  },

  data: () => ({
      drawer: false,
      opciones_usuario: [
          {
            texto: "Inicio",
            accion: "irA('/')",
            icono: "mdi-home"
          },
          {
            texto: "Crear plataforma",
            accion: "crearPlataforma()",
            icono: "mdi-plus"
          },
          {
            texto: "Perfil",
            accion: 'editarPerfil()',
            icono: "mdi-account"
          },
          {
            texto: "Cerrar sesión",
            accion: "logout()",
            icono: "mdi-account-off"
          },
          {
            texto: "Eliminar mi cuenta",
            accion: "eliminarCuenta()",
            icono: "mdi-account-remove"
          },
      ]
  }),

  methods: {
    // Opciones de usuario
    irA(ruta) {
      if (this.$route.path !== ruta)
        router.push(ruta);
    },
    crearPlataforma() {
      // TODO
      console.log("Crear plataforma");
    },
    editarPerfil() {
      // TODO
      console.log("Editar perfil");
    },
    logout() {
      console.log("Logout");
      this.$store.dispatch('logout');
    },
    eliminarCuenta() {
      // TODO
      console.log("Eliminar cuenta");
    },
  }
}
</script>