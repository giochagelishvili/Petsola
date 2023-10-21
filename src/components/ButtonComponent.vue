<template>
  <button :id="id">{{ text }}</button>
</template>

<script>
export default {
  name: 'ButtonComponent',
  props: ['id', 'text']
}
</script>

<style scoped>
button {
  font-size: 18px;
  padding-inline: 10px;
  padding-block: 5px;

  background: none;
  border-width: 1px;

  cursor: pointer;
  transition: 0.2s;
}

button:hover {
  box-shadow: 2px 2px 5px 0px rgba(0, 0, 0, 0.4);
  -webkit-box-shadow: 2px 2px 5px 0px rgba(0, 0, 0, 0.4);
  -moz-box-shadow: 2px 2px 5px 0px rgba(0, 0, 0, 0.4);
}
</style>
