<template>

<v-col>
    <v-card class="elevation-12">
    
    <v-toolbar color="secondary" dark flat>
        <v-toolbar-title>Iniciar sesión</v-toolbar-title>
    </v-toolbar>
    
    <v-card-text>
        <v-text-field label="Nombre de usuario" v-model="nombre" type="text"/>

        <v-text-field label="Contraseña" v-model="password" type="password"/>
    </v-card-text>
    
    <v-card-actions>
        <v-btn color="secondary" block @click="login()">Enviar</v-btn>
    </v-card-actions>

    </v-card>
</v-col>
    
</template>

<script>

import { RepositoryFactory } from './../requests/RepositoryFactory'
const UserRepository = RepositoryFactory.get('usuarios')

export default {
    name: "FormularioInicio",

    data: () => ({
        nombre: '',
        password: '',
        usuario: {}
    }),
    
    methods: {
        async login() {
            const { data } = await UserRepository.get(this.nombre)
            this.usuario = data[0];
            console.log(JSON.stringify(this.usuario))

            if (this.usuario !== undefined) {
                if (this.password == this.usuario.contraseña)
                    this.$store.dispatch('login', this.usuario)
                else
                    alert('Wrong password');
            }
            else
                alert('Wrong username');
        }
    }
}
</script>