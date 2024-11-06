<!-- resources/js/components/CharacterQuizApp.vue -->
<template>
    <div id="character-quiz-app">
        <header>
            <h1>Character Quiz</h1>
        </header>
        <CharacterQuiz />
    </div>
</template>

<script>
import CharacterQuiz from './CharacterQuiz.vue';

export default {
    components: {
        CharacterQuiz,
    },
};
</script>

<style scoped>
#character-quiz-app {
    max-width: 800px;
    margin: 0 auto;
}
</style>
