import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";

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

  {
    path: "/updating/:id",
    name: "Update",
    component: () => import("../views/Updating.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default router;
