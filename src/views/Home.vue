<template>
  <div id="container">
    <h1>Make An Appointment</h1>
    <div class="F-view">
      <myBtn to="/register" title="New User" />
      <myBtn to="/reference" title="Reference" />
    </div>
  </div>
</template>

<script>
  // @ is an alias to /src
  import Button from "../components/button.vue";
  export default {
    name: "Home",
    components: {
      myBtn: Button,
    },
  };
</script>
