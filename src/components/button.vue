<template>
  <router-link :to="to" class="btn">{{ title }}</router-link>
</template>

<script>
  export default {
    name: "Button",
    props: {
      title: String,
      to: String,
    },
  };
</script>

<style></style>
