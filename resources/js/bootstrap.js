import _ from "lodash";
window._ = _;

import "bootstrap";

// axios
//     .get("http://127.0.0.1:8000/publications.json")
//     .then((response) => {
//         publications = response;
//     })
//     .catch((error) => {
//         console.log(error);
//     });

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
