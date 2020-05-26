<template>
  <div>
    
    <v-card 
      class="ma-8"
      raised
      :loading="cargando"
      width="60em"
    >
      <v-img
        class="white--text align-end"
        height="20em"
        :src="valorable.imagen"
      >
        <v-card-actions class="ml-4">
          <v-btn width="110px">
            <v-icon left>mdi-pencil</v-icon> Editar
          </v-btn>
          <v-btn width="110px">
            <v-icon left>mdi-delete</v-icon> Borrar
          </v-btn>
        </v-card-actions>

      </v-img>
        <v-card-title v-text="valorable.titulo"></v-card-title>
        <v-card-subtitle>Puntación media: </v-card-subtitle>
        <v-card-text class="text-wrap" >{{valorable.descripcion}}</v-card-text>
    </v-card>

   
    <formulario @enviar-comentario="comentar"/>

    <v-divider/>

    <v-card
        class="ma-8 text-center"
        raised
        :loading="cargando"
        width="60em"
        v-for="comentario in comentarios" :key="comentario.fecha"
    >
        <v-card-title>
            <v-icon large left>mdi-account</v-icon>
            <span class="title font-weight-light">{{ comentario.Usuariosnombre }}</span>
        </v-card-title>
        <v-divider class="mb-6"/>
        <!-- <v-card-title color="secondary" v-text="comentario.Usuariosnombre"/> -->
        <h4 v-text="comentario.comentario"/>
        <v-rating :value="comentario.puntuacion" readonly/>
        <v-card-text v-text="comentario.fecha"/>
    </v-card>

  </div>
</template>

<script>

import formulario from '@/components/ComentarioForm'
import { RepositoryFactory } from './../requests/RepositoryFactory'
const EntidadesRepository = RepositoryFactory.get('entidades')

export default {
  name: 'valorable',

  components: {
    formulario,
  },

  props: [
    'entidadID', 'id',
  ],

  data: () => ({
    cargando: false,
    valorable: {},
    comentarios: [],
    dialog: false,
    form: {
      titulo: '',
      imagen: '',
      extra: ''
    }
  }),

  created() {
    this.cargar()
  },

  methods: {
    async cargar() {
      this.cargando = true;
      const { data } = await EntidadesRepository.getValorable(this.entidadID, this.id);
      this.valorable = data;
      this.cargarComentarios();
      this.cargando = false;
    },
    async cargarComentarios() {
      const { data } = await EntidadesRepository.getComentarios(this.entidadID, this.id);
      console.log(data)
      this.comentarios = data;
    },
    comentar(valoracion) {
        var datos = {
            comentario: valoracion[0],
            puntuacion: valoracion[1],
            valorablesEntidadesId: this.entidadID,
            valorablesId: this.id,
            usuariosNombre: this.$store.getters.userName,
        }
        console.log(datos);
        EntidadesRepository.enviarComentario(this.entidadID, this.id, datos)
    }
  }
}

</script>