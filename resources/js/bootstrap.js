import axios from "axios";

window.axios = axios;

window.axios.defauils.headers.common['X-Request-with'] = 'XMLHttpRequest';
