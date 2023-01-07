import "./bootstrap";
import { createApp } from "vue";

const app = createApp({});

import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import Publications from "./components/Publications.vue";

app.component("header-component", Header);
app.component("footer-component", Footer);
app.component("publications-component", Publications);

app.mount("#app");
