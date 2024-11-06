import { createApp } from 'vue';
import QuizApp from './components/QuizApp.vue';
import CharacterQuizApp from './components/CharacterQuizApp.vue';

const appdiv = document.getElementById('app');
const metacsrf = document.querySelector('meta[name="csrf-token"]');
let auth = false;

if (metacsrf) {
    window.localStorage.setItem("csrf", metacsrf.getAttribute("content"));
    auth = true;
}

// Определяем, какой компонент монтировать
if (appdiv) {
    // Проверяем, есть ли атрибут v-quiz
    if (appdiv.hasAttribute('v-quiz')) {
        createApp(QuizApp, {
            quiz: JSON.parse(appdiv.getAttribute('v-quiz')),
            auth: auth
        }).mount('#app');
    }

    // Проверяем, есть ли атрибут v-test для монтирования CharacterQuizApp
    if (appdiv.hasAttribute('v-test')) {
        createApp(CharacterQuizApp, {
            auth: auth
        }).mount('#app');
    }
}
