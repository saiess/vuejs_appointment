<template>
  <form action="" method="post" id="appointmentcontainer">
    <label for="" class="labelapp">Date:</label>
    <input
      class="inputapp"
      :min="getTodayDate"
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

    <input
      type="button"
      @click="appoint()"
      id="sends"
      class="btn"
      value="Save"
    />
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
      async appoint() {
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        myHeaders.append("Cookie", "PHPSESSID=f8dpdhfvffict0768ol4jhmlp4");

        var raw = JSON.stringify({
          date: this.date,
          time: this.time,
          consultation: this.consultation,
          reference_id: localStorage.getItem("ref"),
        });

        var requestOptions = {
          method: "POST",
          headers: myHeaders,
          body: raw,
          redirect: "follow",
        };

        await fetch(
          "http://online_appointment_project.test/Appointment/add",
          requestOptions
        )
          .then((response) => response.text())
          .then(function(result) {
            console.log(result);
            location.replace("/affichage");
          })
          .catch((error) => console.log("error", error));
      },
    },

    computed: {
      getTodayDate() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, "0");
        var mm = String(today.getMonth() + 1).padStart(2, "0");
        var yyyy = today.getFullYear();
        today = yyyy + "-" + mm + "-" + dd;
        return today;
      },
    },
  };
</script>

<style></style>
