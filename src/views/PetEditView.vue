<template>
  <header>
    <PetEditHeader />
  </header>
  <main>
    <PetEditForm :petId="petId" />
  </main>
</template>

<script>
import PetEditHeader from '../components/PetEditHeader.vue'
import PetEditForm from '../components/PetEditForm.vue'

export default {
  name: 'PetEditVue',
  components: { PetEditHeader, PetEditForm },
  data() {
    return {
      petId: this.$route.query.id
    }
  },
  methods: {}
}
</script>
