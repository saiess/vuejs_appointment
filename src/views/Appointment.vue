<template>
  <div id="appointmentcontainer">
    <label for="" class="labelapp">Date:</label>
    <input  class="inputapp" type="date" />
    <label for="" class="labelapp">Hour:</label>
    <input class="inputapp" type="time" />
    <label for="" class="labelapp">Text:</label>
    <textarea class="textapp" id="" cols="30" rows="10"></textarea>
    <Button to="/affichage" title="Save" />
  </div>
</template>

<script>
import Button from "../components/button.vue";
export default {
  name: "Appointement",
  components: {
    Button,
  },
};
</script>

<style>
</style>