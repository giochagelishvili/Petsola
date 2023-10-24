<template>
  <header>
    <PetListHeader @deletePets="deletePets" />
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
      @toggleCheckbox="updateSelectedArray"
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
      pets: [],
      selectedPets: []
    }
  },
  methods: {
    // Select all from "pets" table and display information on the main page
    // Particularly in "PetContainer" component
    async getAllPets() {
      try {
        const response = await axios.post('http://localhost/Petsola/controller/PetController.php', {
          action: 'getAllPets'
        })
        this.pets = response.data
        // Log the error into the console
      } catch (error) {
        console.error('Error:', error)
      }
    },
    // Send post request to "PetController", pass selected pets ids
    // Refresh the page if pets were successfully deleted from the database
    async deletePets() {
      try {
        const response = await axios.post('http://localhost/Petsola/controller/PetController.php', {
          action: 'deletePets',
          selectedPets: this.selectedPets
        })

        if (response.data === true) {
          this.$router.go()
        }
        // Log the error into the console
      } catch (error) {
        console.error('Error:', error)
      }
    },
    // Add pet ID to selectedPets array
    // Delete pet ID from selectedPets array if it already exists in it
    updateSelectedArray(pet_id) {
      if (this.selectedPets.includes(pet_id)) {
        // Delete pet_id if it already exists in the array
        const index = this.selectedPets.indexOf(pet_id)
        if (index !== -1) {
          this.selectedPets.splice(index, 1)
        }
        // Else add pet_id to the array
      } else {
        this.selectedPets.push(pet_id)
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
