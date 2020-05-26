<template>
<v-container>
    
    <v-row>
      <v-col cols="12">
        <v-card
          class="mx-auto"
          outlined
        >
          <v-row>
            <v-col cols="6">
              <v-text-field
                id="nuevo_comentario"
                label="Valoracion del usuario (opcional 250 caracteres)"
                name="nuevo_comentario"
                type="text"
              ></v-text-field>
            </v-col>
            <v-col cols="6">
              <v-card-text>Puntuación (estrellas)</v-card-text>
              <v-card-actions>
                <v-btn color="primary" text>Valorar</v-btn>
              </v-card-actions>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-card
          class="mx-auto"
          outlined
        >
          <v-list-item three-line>
            <v-list-item-content>
              <div class="overline mb-4">Usuario #1:</div>
              <v-list-item-title class="headline mb-1">Puntuacion</v-list-item-title>
              <v-list-item-subtitle>Comentario del usuario respecto al objeto valorable</v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-avatar
              tile
              size="80"
              color="grey"
            ></v-list-item-avatar>
          </v-list-item>
        </v-card>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-card
          class="mx-auto"
          outlined
        >
          <v-list-item three-line>
            <v-list-item-content>
              <div class="overline mb-4">Usuario #2:</div>
              <v-list-item-title class="headline mb-1">Puntuacion</v-list-item-title>
              <v-list-item-subtitle>Comentario del usuario respecto al objeto valorable 2</v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-avatar
              tile
              size="80"
              color="grey"
            ></v-list-item-avatar>
          </v-list-item>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  export default {
    data () {
      return {
        dialog: false,
      }
    },
  }
</script>