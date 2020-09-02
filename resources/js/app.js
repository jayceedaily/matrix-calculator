import Vue from 'vue';
import Axios from 'axios';

import App from './views/App';

window.axios = Axios;

const app = new Vue({
    el: '#app',
    components: {App},

});
