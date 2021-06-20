<template>
  <div id="affichecontainer">
    <div class="ref">
      <label for="" class="labelref">Reference:</label>
      <input type="text" id="inputref" value="11123HGHJ" disabled />
      <Button class="btnref" to="/appointment" title="+" />
    </div>

    <table class="table">
      <tr>
        <th>Date</th>
        <th>Hour</th>
        <th>Consultation</th>
        <th>Action</th>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </div>
</template>

<script>
import Button from "../components/button.vue";
export default {
  name: "Affichage",
  components: {
    Button,
  },
};
</script>

<style></style>
