<template>
  <div id="form">
    <form method="">
      <label for="">First name</label>
      <input type="text" name="registernom" v-model="nom" />

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
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        myHeaders.append("Cookie", "PHPSESSID=f8dpdhfvffict0768ol4jhmlp4");

        var raw = JSON.stringify({
          first_name: this.nom,
          last_name: this.prenom,
          email: this.email,
          phone: this.phone,
          age: this.age,
        });

        var requestOptions = {
          method: "POST",
          headers: myHeaders,
          body: raw,
          redirect: "follow",
        };

        await fetch(
          "http://online_appointment_project.test/register/add",
          requestOptions
        )
          .then((response) => response.text())
          .then(function(result) {
            console.log(result);
            location.replace("/affichage");
          })
          .catch((error) => console.log("error", error));
      },
      // async registerF() {
      //   fetch("http://online_appointment_project.test/Register/add", {
      //     method: "POST",
      //     headers: {
      //       "Content-Type": "application/json",
      //     },
      //     body: JSON.stringify({
      //       first_name: this.nom,
      //       last_name: this.prenom,
      //       email: this.email,
      //       phone: this.phone,
      //       age: this.age,
      //     }),
      //   })
      //     .then((res) => {
      //       return res.json();
      //       // this.$router.push({ path: '/liste' })
      //     })
      //     .then((res) => {
      //       this.reference=res;
      //       this.$router.push("/affichage");
      //     })
      //     .catch(function(err) {
      //       console.log(err);
      //     });
      // },
    },
  };
</script>

<style></style>
