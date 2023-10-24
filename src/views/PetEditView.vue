<template>
  <header>
    <PetEditHeader />
  </header>
  <main></main>
</template>

<script>
import PetEditHeader from '../components/PetEditHeader.vue'
export default {
  name: 'PetEditVue',
  components: { PetEditHeader },
  data() {
    return {
      petId: this.$route.query.id
    }
  },
  methods: {}
}
</script>
