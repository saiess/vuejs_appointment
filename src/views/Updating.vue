<template>
  <form action="" method="post" id="appointmentcontainer">
    <label for="" class="labelapp">Date:</label>
    <input
      class="inputapp"
      :min="getTodayDate()"
      type="date"
      name="datename"
      v-model="date"
    />

    <label for="" class="labelapp">Hour:</label>
    <input class="inputapp" type="time" name="hourname" v-model="time" />

    <label for="" class="labelapp">Text:</label>
    <textarea
      class="textapp"
      id=""
      cols="30"
      rows="10"
      name="textname"
      v-model="consultation"
    ></textarea>

    <input type="button" @click="appoint" id="sends" class="btn" value="Save" />
    <!-- <Button to="/affichage" title="Save" /> -->
  </form>
</template>

<script>
  // import Button from "../components/button.vue";
  // import Form from '../components/form.vue';
  export default {
    name: "Appointement",
    // components: {
    //   Button,
    //   // Form,
    // },

    data() {
      return {
        date: "",
        time: "",
        consultation: "",
        reference_id: "",
      };
    },

    methods: {
      getTodayDate() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, "0");
        var mm = String(today.getMonth() + 1).padStart(2, "0");
        var yyyy = today.getFullYear();
        today = yyyy + "-" + mm + "-" + dd;
        return today;
      },

      async appoint() {

        var raw = JSON.stringify({
          id: this.$route.params.id,
          date: this.date,
          time: this.time,
          consultation: this.consultation,
          reference_id: localStorage.getItem("ref")
        });

        var requestOptions = {
          method: "POST",
          headers:{
            "Content-Type": "application/json"
          },
          body: raw,
          redirect: "follow",
        };

        fetch(
          "http://online_appointment_project.test/appointment/update",
          requestOptions
        )
          .then((response) => response.text())
          .then(() => this.$router.push("/affichage"))
          .catch((error) => console.log("error", error));
      },

      async getsingle() {
        const response = await fetch(
          "http://online_appointment_project.test/appointment/getSingle",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              id: this.$route.params.id,
            }),
          }
        );

        const res = await response.json();

        this.date = res[0].date_app;
        this.time = res[0].time_app;
        this.consultation = res[0].consultation;
      },
    },
    mounted() {
      this.getsingle();
    },
  };
</script>

<style></style>
