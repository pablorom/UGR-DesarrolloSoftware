<template>
    <v-col>
      <v-card class="elevation-12">
        
        <v-toolbar color="secondary" dark flat>
          <v-toolbar-title>Nuevo registro</v-toolbar-title>
        </v-toolbar>

        <v-card-text>
            
            <v-text-field label="Nombre" v-model="nombre" type="text"/>

            <v-text-field label="Correo" v-model="email" type="text"/>

            <v-text-field label="Contraseña" v-model="pass" type="password"/>

            <v-text-field label="Confirmar contraseña" v-model="re_pass" type="password"/>

        </v-card-text>

        <v-card-actions>
          <v-btn color="secondary" block @click="registrar()">Enviar</v-btn>
        </v-card-actions>

      </v-card>
    </v-col>
</template>

<script>

import { RepositoryFactory } from './../requests/RepositoryFactory'
const UserRepository = RepositoryFactory.get('users')

export default {
    name: "FormularioRegistro",
    
    data: () => ({
        nombre: '',
        pass: '',
        re_pass: '',
        email: '',
    }),

    methods: {
        registrar() {
            console.log("Nombre: " + this.nombre + " Pass: " + this.pass);
            
            // this.$store.dispatch('registrar');
        }
    }
}
</script>