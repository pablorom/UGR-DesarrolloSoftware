<template>

  <div>
    <span v-for="entidad in entidades" :key="entidad.ID">
      <v-card 
        class="my-8"
        raised
        :to='`entidades/${entidad.ID}`'
        link
        :loading="cargando"
      >
        <v-img
          class="white--text align-center"
          height="200px"
          :src="entidad.imagen"
        >
          <v-card-title v-text="entidad.titulo"></v-card-title>
          <v-card-subtitle>Puntación media: </v-card-subtitle>
        </v-img>

      </v-card>
    </span>
  </div>
</template>

<script>

import { RepositoryFactory } from './../requests/RepositoryFactory'
const EntidadesRepository = RepositoryFactory.get('entidades')

export default {
  name: 'lista-entidades',
  
  data: () => ({
    cargando: false,
    entidades: []
  }),

  created() {
    this.cargar()
  },

  methods: {
    async cargar() {
      this.cargando = true;
      const { data } = await EntidadesRepository.get();
      console.log(data);
      this.cargando = false;
      this.entidades = data;
    },
  }
}

</script>