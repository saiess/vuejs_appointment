<template>
  <div id="containerL">
    <label for="">Reference</label>
    <input type="text" v-model="reference" name="" />
    <input
      type="submit"
      v-on:click.prevent="log"
      id="sends"
      class="btn"
      value="Login"
    />
    <!-- <Btn to="/affichage" title="Login" /> -->
  </div>
</template>

<script>
  // import Button from "../components/button.vue";
  export default {
    // components: {
    //   Btn: Button,
    // },

    data() {
      return {
        reference: "",
      };
    },

    methods: {
      async log() {
        fetch(
          "http://online_appointment_project.test/Login/index/" +
            this.reference,
          {
            method: "GET",
            headers: {
              "Content-Type": "application/json",
            },
          }
        )
          .then((res) => {
            return res.json();
          })

          .then((res) => {
            // console.log(res)
            if (res.success == "reference found") {
              localStorage.setItem("ref", this.reference);
              this.$router.push("/affichage");
            } else {
              alert("wrong reference");
            }
          });
      },
    },
  };
</script>

<style></style>
