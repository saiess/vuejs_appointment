<template>
  <div id="containerL">
    <label for="">Reference</label>
    <input type="text" />
    <Button to="/affichage" title="Login" />
  </div>
</template>

<script>
  import Button from "../components/button.vue";
  export default {
    components: {
      Button,
    },
  };
</script>

<style></style>
