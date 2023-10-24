<template>
  <div>
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
  props: ['name', 'age', 'weight', 'type', 'breed']
}
</script>

<style scoped>
div {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;

  border: 1px solid black;
  padding: 25px;
}

h2 {
  font-size: 18px;
  font-weight: 400;
}
</style>
