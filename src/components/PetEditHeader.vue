<template>
  <h1>Pet Edit</h1>

  <div>
    <ButtonComponent form="petEditForm" text="Update" />
    <RouterLink to="/">
      <ButtonComponent text="Cancel" />
    </RouterLink>
  </div>
</template>

<script>
import ButtonComponent from './ButtonComponent.vue'

export default {
  name: 'PetEditHeader',
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
