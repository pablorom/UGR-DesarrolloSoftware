<template>

    <v-sheet flat class="ma-8">

        <v-text-field
            label="Deja un comentario"
            hint="Opcional. Máx 250"
            type="text"
            v-model="comentario"
            counter
            filled
            clearable
        ></v-text-field>

        <div class="text-center pb-4">
            <v-rating v-model="rating"></v-rating>
        </div>
        
        <v-btn block @click="enviar()">Enviar</v-btn>

    </v-sheet>

</template>

<script>
export default {
    data: () => ({
      rating: 3,
      comentario: ''
    }),

    methods: {
        enviar() {
            this.$emit('enviar-comentario', [this.comentario, this.rating]);
        }
    }
}
</script>