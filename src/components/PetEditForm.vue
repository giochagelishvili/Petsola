<template>
  <form id="petEditForm" method="post" @submit.prevent="updatePet">
    <div>
      <label for="petName">Pet Name</label>
      <input type="text" name="petName" id="petName" />
    </div>
    <div>
      <label for="petAge">Pet Age</label>
      <input min="0" max="50" type="number" name="petAge" id="petAge" />
    </div>
    <div>
      <label for="petWeight">Pet Weight</label>
      <input min="0" max="300" type="number" name="petWeight" id="petWeight" />
    </div>
    <div>
      <label for="petType">Pet Type</label>
      <select name="petType" id="petType" @change="getPetBreeds">
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
      petBreeds: [],
      errors: []
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
    async updatePet(event) {
      const formData = formToJSON(event.target)

      try {
        const response = await axios.post('http://localhost/Petsola/controller/PetController.php', {
          action: 'updatePet',
          formData: formData
        })

        if (response.data) {
          this.errors = response.data
        } else {
          this.$router.push('/')
        }
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

ul {
  display: flex;
  flex-direction: column;
  gap: 15px;
  width: 320px;

  padding: 30px;
  margin-top: 20px;

  border: 1px solid red;
  border-radius: 5px;
  color: red;
}
</style>
