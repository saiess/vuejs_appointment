<template>
  <div id="form">
    <form method="">
      <label for="">First name</label>
      <input type="text" name="registernom" v-model="nom" /><br>

      <label for="">Last name</label>
      <input type="text" name="registerprenom" v-model="prenom" />

      <label for="">Email</label>
      <input type="email" name="registeremail" v-model="email" />

      <label for="">Phone</label>
      <input type="number" name="registerphone" v-model="phone" />

      <label for="">Age</label>
      <input type="number" name="registerage" v-model="age" min="10" />

      <input @click.prevent="registerF" type="submit" id="send" />
    </form>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        nom: "",
        prenom: "",
        email: "",
        phone: "",
        age: "",
      };
    },
    methods: {
      async registerF() {
        var raw = JSON.stringify({
          first_name: this.nom,
          last_name: this.prenom,
          email: this.email,
          phone: this.phone,
          age: this.age,
        });

        var requestOptions = {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: raw,
          redirect: "follow",
        };

        await fetch(
          "http://online_appointment_project.test/register/add",
          requestOptions
        )
          .then((response) => response.json())
          .then(function(result) {
            localStorage.setItem("ref", result.msg);
            location.replace("/affichage");
          })
          .catch((error) => console.log("error", error));
      },
    },
  };
</script>

<style></style>
