<template>
    <div class="character-quiz">
        <h2>{{ title }}</h2>
        <div v-if="loading" class="loading">Loading...</div>
        <div v-if="!loading">
            <div v-for="(question, index) in questions" :key="index" class="question">
                <h3>{{ question.text }}</h3>
                <div v-for="(option, i) in question.options" :key="i" class="option">
                    <label>
                        <input
                            type="radio"
                            :name="'question-' + index"
                            :value="i"
                            v-model="answers[index]"
                        />
                        {{ option }}
                    </label>
                </div>
            </div>
            <button @click="submitAnswers" class="submit-button">Submit</button>
        </div>
        <div v-if="result" class="result">
            <h2>Result: {{ result }}</h2>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: "Character Quiz",
            questions: [],
            answers: [],
            loading: true,
            result: null,
        };
    },
    created() {
        this.fetchQuestions();
    },
    methods: {
        async fetchQuestions() {
            try {
                const response = await fetch("https://imdibil.ru/api/test/questions/1");
                const data = await response.json();
                this.questions = data.map((q) => ({
                    text: q.text,
                    options: q.options,
                }));
                this.answers = new Array(this.questions.length).fill(null);
                this.loading = false;
            } catch (error) {
                console.error("Error fetching questions:", error);
                this.loading = false;
            }
        },
        async submitAnswers() {
            const payload = {
                answers: this.answers,
            };
            try {
                const response = await fetch("https://imdibil.ru/api/test/validate/1", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(payload),
                });
                const resultData = await response.json();
                this.result = resultData.result;
            } catch (error) {
                console.error("Error submitting answers:", error);
            }
        },
    },
};
</script>

<style scoped>
.character-quiz {
    max-width: 600px;
    margin: 0 auto;
}
.loading {
    text-align: center;
}
.question {
    margin-bottom: 20px;
}
.option {
    margin-left: 20px;
}
.submit-button {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
}
.result {
    text-align: center;
    margin-top: 30px;
}
</style>
