<template>
  <h1>Pet List</h1>

  <div>
    <RouterLink to="petadd">
      <ButtonComponent text="Add" />
    </RouterLink>
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
