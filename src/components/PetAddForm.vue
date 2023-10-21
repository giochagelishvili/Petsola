<template>
  <form id="petAddForm">
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
      <select name="petType" id="petType"></select>
    </div>
  </form>
</template>

<script>
export default {
  name: 'PetAddForm'
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
  width: 300px;
}

label {
  width: 100px;
}

input {
  flex: 1;
  padding-inline: 10px;
  padding-block: 3.5px;
}
</style>
