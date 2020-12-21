import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

const baseURL = 'https://agentefacil.com/';

axios.defaults.baseURL = baseURL;
 
Vue.use(VueAxios, axios)