<template>
  <header>
    <PetListHeader />
  </header>
  <main>
    <PetContainer
      v-for="pet in pets"
      :key="pet.pet_id"
      :id="pet.pet_id"
      :name="pet.pet_name"
      :age="pet.pet_age"
      :weight="pet.pet_weight"
      :type="pet.pet_type"
      :breed="pet.pet_breed"
    />
  </main>
</template>

<script>
import PetListHeader from '../components/PetListHeader.vue'
import PetContainer from '../components/PetContainer.vue'
import axios from 'axios'

export default {
  name: 'PetListView',
  components: { PetListHeader, PetContainer },
  data() {
    return {
      pets: []
    }
  },
  methods: {
    async getAllPets() {
      try {
        const response = await axios.post('http://localhost/Petsola/controller/PetController.php', {
          action: 'getAllPets'
        })

        this.pets = response.data
        console.log(this.pets)
        // Log the error into the console
      } catch (error) {
        console.error('Error:', error)
      }
    }
  },
  mounted() {
    this.getAllPets()
  }
}
</script>

<style scoped>
main {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  gap: 20px;
  padding: 20px;
}
</style>
