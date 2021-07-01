<template>
  <div id="affichecontainer">
    <div class="ref">
      <label for="" class="labelref">Reference:</label>
      <input
        type="text"
        id="inputref"
        name="refinput"
        :value="reference_id"
        disabled
      />
      <Button class="btnref" to="/appointment" title="+" />
    </div>

    <table class="table">
      <tr>
        <th>Date</th>
        <th>Hour</th>
        <th>Consultation</th>
        <th>Action</th>
      </tr>
      <tr v-for="content in affichage_content" :key="content.id_meeting">
        <td>{{ content.date_app }}</td>
        <td>{{ formatTime(content.time_app) }}</td>
        <td>{{ content.consultation }}</td>
        <td>
          <button @click="remove(content.id_meeting)">
            <i class="fas fa-trash"></i>
          </button>
          <button @click="modify(content.id_meeting)">
            <i class="fas fa-pen"></i>
          </button>
        </td>
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

    data() {
      return {
        affichage_content: [],
        // id_meeting: "",
        // date: "",
        // time: "",
        // consultation: "",
        // reference_id: "",
      };
    },
    methods: {
      // async show() {
      //   fetch(
      //     "http://online_appointment_project.test/appointment/index/" +
      //       this.reference_id
      //   )
      //     .then((res) => res.json())
      //     .then((data) => (this.affichage_content = data))
      //     .catch((err) => console.log(err.message));
      // },
      async read() {
        let resp = await fetch(
          "http://online_appointment_project.test/appointment/read",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              reference_id: this.reference_id,
            }),
          }
        );

        this.affichage_content = await resp.json();
        console.log(this.affichage_content);
      },
      formatTime(timeString = "") {
        const date = new Date();

        const timeArray = timeString.split(":").map((elm) => parseInt(elm));

        date.setHours(...timeArray);

        return date.toLocaleTimeString("fr", {
          hour: "2-digit",
          minute: "2-digit",
        });
      },

      // delete an appointment row
      remove(id) {
        fetch("http://online_appointment_project.test/appointment/delete/" + id)
          .then((response) => response.text())
          .then(() => {
            this.read();
          })
          .catch((error) => console.log("error", error));
      },

      // update an appointment row

      async modify(id) {
        this.$router.push({ path: `/updating/${id}` });
      },
    },

    computed: {
      reference_id() {
        return localStorage.getItem("ref") ? localStorage.getItem("ref") : "";
      },
    },
    mounted() {
      this.read();
    },
  };
</script>

<style></style>
