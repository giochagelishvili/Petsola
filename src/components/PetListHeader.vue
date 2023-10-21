<template>
  <h1>Pet List</h1>

  <div>
    <ButtonComponent text="Add" />
    <ButtonComponent text="Delete" />
  </div>
</template>

<script>
import ButtonComponent from './ButtonComponent.vue'
export default {
  name: 'PetListHeader',
  components: { ButtonComponent }
}
</script>

<style scoped>
div {
  display: flex;
  align-items: center;
  gap: 20px;
}
</style>
