<template>
  <div>
    <h1 v-text="encabezado"></h1>
    <LoginForm/>
    <RegistroForm/>
  </div>
</template>

<script>
import LoginForm from '@/components/LoginForm.vue'
import RegistroForm from '@/components/RegistroForm.vue'

export default {
    components: {
        LoginForm,
        RegistroForm
    },

    data: () => ({
        texto: "Bienvenido a ",
        compañia: "VALÓRALO TODO",
    }),

    computed: {
        encabezado () {
            return this.texto + this.compañia;
        }
    }
}
</script>