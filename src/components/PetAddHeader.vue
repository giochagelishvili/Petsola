<template>
  <h1>Pet Add</h1>

  <div>
    <ButtonComponent text="Save" />
    <RouterLink to="/">
      <ButtonComponent text="Cancel" />
    </RouterLink>
  </div>
</template>

<script>
import ButtonComponent from './ButtonComponent.vue'
export default {
  name: 'PetAddHeader',
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
