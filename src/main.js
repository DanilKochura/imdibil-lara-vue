import {createApp} from 'vue'
import App from './App.vue'
const appdiv = document.getElementById('app')
const metacsrf =  document.querySelector('meta[name="csrf-token"]')
let auth = false;
if(metacsrf)
{
    window.localStorage.setItem("csrf", metacsrf.getAttribute("content"))
    auth = true
}
createApp(App, {
    quiz: JSON.parse(appdiv.getAttribute('v-quiz')),
    auth: auth
}).mount('#app')
