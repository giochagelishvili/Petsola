<template>
  <div>
    <input type="checkbox" name="pet_id" :value="id" />
    <h2>Name: {{ name }}</h2>
    <h2>Age: {{ age }}</h2>
    <h2>Weight: {{ weight }}(KG)</h2>
    <h2>Type: {{ type }}</h2>
    <h2>Breed: {{ breed }}</h2>
  </div>
</template>

<script>
export default {
  name: 'PetContainer',
  props: ['id', 'name', 'age', 'weight', 'type', 'breed']
}
</script>

<style scoped>
div {
  position: relative;

  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;

  border: 1px solid black;
  padding: 25px;
}

input {
  position: absolute;
  top: 20px;
  left: 20px;
}

h2 {
  font-size: 18px;
  font-weight: 400;
}
</style>
