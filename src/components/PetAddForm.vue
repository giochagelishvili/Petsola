<template>
  <form id="petAddForm" method="post" @submit.prevent="savePet">
    <div>
      <label for="petName">Pet Name</label>
      <input required type="text" name="petName" id="petName" />
    </div>
    <div>
      <label for="petAge">Pet Age</label>
      <input required min="0" max="50" type="number" name="petAge" id="petAge" />
    </div>
    <div>
      <label for="petWeight">Pet Weight</label>
      <input required min="0" max="300" type="number" name="petWeight" id="petWeight" />
    </div>
    <div>
      <label for="petType">Pet Type</label>
      <select required name="petType" id="petType" @change="getPetBreeds">
        <option selected disabled>Select</option>
        <option
          v-for="petType in petTypes"
          :value="petType.pet_type_name"
          :key="petType.pet_type_id"
        >
          {{ petType.pet_type_name }}
        </option>
      </select>
    </div>
    <div v-if="petBreeds.length != 0">
      <label for="petBreed">Pet Breed</label>
      <select required name="petBreed" id="petBreed">
        <option v-for="petBreed in petBreeds" :key="petBreed.breed_id" :value="petBreed.breed">
          {{ petBreed.breed }}
        </option>
      </select>
    </div>
  </form>
</template>

<script>
import axios, { formToJSON } from 'axios'

export default {
  name: 'PetAddForm',
  data() {
    return {
      petTypes: [],
      petBreeds: []
    }
  },
  methods: {
    async getPetTypes() {
      try {
        const response = await axios.post('http://localhost/Petsola/controller/PetController.php', {
          action: 'getPetTypes'
        })

        this.petTypes = response.data
        // Log the error into the console
      } catch (error) {
        console.error('Error:', error)
      }
    },
    async getPetBreeds(event) {
      const petType = event.target.value
      try {
        const response = await axios.post('http://localhost/Petsola/controller/PetController.php', {
          action: 'getPetBreeds',
          petType: petType
        })
        this.petBreeds = response.data
        // Log the error into the console
      } catch (error) {
        console.error('Error:', error)
      }
    },
    async savePet(event) {
      const formData = formToJSON(event.target)
      // this.formData = []
      // this.formData.push(event.target.elements.petName.value)
      // this.formData.push(event.target.elements.petAge.value)
      // this.formData.push(event.target.elements.petWeight.value)
      // this.formData.push(event.target.elements.petType.value)
      // this.formData.push(event.target.elements.petBreed.value)

      try {
        const response = await axios.post('http://localhost/Petsola/controller/PetController.php', {
          action: 'savePet',
          formData: formData
        })

        console.log(response.data)
        // Log the error into the console
      } catch (error) {
        console.error('Error:', error)
      }
    }
  },
  mounted() {
    this.getPetTypes()
  }
}
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  align-items: start;
  gap: 10px;
}

div {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  width: 320px;
}

label {
  width: 100px;
}

input,
select {
  font-size: 16px;
  flex: 1;
  padding-inline: 10px;
  padding-block: 3.5px;
}
</style>
