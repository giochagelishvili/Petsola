<template>
  <header>
    <PetAddHeader />
  </header>
  <main>
    <PetAddForm />
  </main>
</template>

<script>
import PetAddHeader from '../components/PetAddHeader.vue'
import PetAddForm from '../components/PetAddForm.vue'

export default {
  name: 'PetAddView',
  components: { PetAddHeader, PetAddForm }
}
</script>
