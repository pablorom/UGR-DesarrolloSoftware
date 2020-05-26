<template>
  <div>
    <!-- <pre> {{$data}} </pre> -->
    <v-card 
      class="ma-8"
      raised
      :loading="cargando"
      width="60em"
    >
      <v-img
        class="white--text align-center"
        height="20em"
        :src="entidad.imagen"
      >
        <v-card-title v-text="entidad.titulo"></v-card-title>
        <v-card-subtitle>Puntación media: </v-card-subtitle>
        <v-card-actions class="ml-4">
          <v-btn dark outlined>
            <v-icon left>mdi-pencil</v-icon> Editar
          </v-btn>
        </v-card-actions>

      </v-img>

      <!-- Valorables -->
      <span class="d-flex">
        <v-row dense>
        <v-col cols="6" v-for="objeto in valorables" :key="objeto.ID">
          <v-card 
            class="ma-8"
            raised
            link :to='`${entidad.ID}/valorables/${objeto.ID}`'
            :loading="cargando"
            color="secondary"
          >
            <v-img
              class="white--text align-center"
              height="8em"
              :src="objeto.imagen"
            />
            <v-card-title v-text="objeto.titulo"/>
            <v-card-subtitle>Puntación media: </v-card-subtitle>
          </v-card>
        </v-col>
        </v-row>
      </span>
    
    </v-card>

    <!-- Ventana para nuevo valorable -->
    <v-row justify="center">
      <v-dialog v-model="dialog" persistent max-width="500">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark v-on="on">Añadir</v-btn>
        </template>
        <v-card>
          <v-card-title class="headline">Añadir nuevo valorable</v-card-title>
          <v-card-text>
            <v-form>
              <v-text-field
                label="Titulo..."
                type="text"
                v-model="form.titulo"
              />
              <v-text-field
                label="URL de imagen (opcional)"
                type="text"
                v-model="form.imagen"
              />
              <v-text-field
                label="Información extra (opcional)"
                type="text"
                v-model="form.extra"
              />
            </v-form>
          </v-card-text>
          <v-card-actions >
            <v-btn class="ms-12" width="150px" text @click="dialog = false">Cancelar</v-btn>
            <v-btn class="ms-12" width="150px" text @click="dialog = false">Añadir</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>

  </div>
</template>

<script>

import { RepositoryFactory } from './../requests/RepositoryFactory'
const EntidadesRepository = RepositoryFactory.get('entidades')

export default {
  name: 'Entidad',

  props: {
    id: String
  },

  data: () => ({
    cargando: false,
    entidad: {},
    valorables: [],
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
      const { data } = await EntidadesRepository.getEntidad(this.id);
      this.entidad = data[0];
      this.cargarValorables();
      this.cargando = false;
    },
    async cargarValorables() {
      const { data } = await EntidadesRepository.getValorables(this.id);
      console.log(data)
      this.valorables = data;
    },

  }
}

</script>
