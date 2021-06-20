import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/reference",
    name: "reference",
    component: () => import("../views/Reference.vue"),
  },
  {
    path: "/register",
    name: "Register",
    component: () => import("../views/Register.vue"),
  },

  {
    path: "/affichage",
    name: "Affichage",
    component: () => import("../views/Affichage.vue"),
  },

  {
    path: "/appointment",
    name: "Appointment",
    component: () => import("../views/Appointment.vue"),
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
