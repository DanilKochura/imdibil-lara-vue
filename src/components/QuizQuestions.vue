<template>
    <div class="wrapper">
        <!-- welcome page -->
        <div v-show="!startQuiz" class="landingPage">
            <div class="landingPage-contents">
                <div class="landingPage-img">
                    <img :src="quiz.image" alt="icon"  style="height: 100%"/>
                </div>
                <div class="landingPage-text">
                    <h1>Фильм по кадру</h1>
                    <p class="text-center text-secondary" v-text="quiz.title"></p>
                    <div v-show="!loaded">
                        <p class="text-center text-danger" >загружаем вопросы</p>
                        <i class="fi fi-circle-spin fi-spin"></i>
                    </div>
                    <p v-text="quiz.text">
                    </p>
                    <button @click="handleStartQuiz()" :disabled="!loaded" class="btn btn-warning">Готов</button>
                </div>
            </div>
        </div>

        <!-- start quiz page -->
        <div class="question_container" v-show="startQuiz">
            <div class="question-contents row">
                <div class="col-12">
                    <p class="question" v-show="questions[currentQuestion - 1].question.text !== ''">
                        {{ questions[currentQuestion - 1].question.text }}
                    </p>
                </div>

                <div class="col-md-8">
                    <div style="margin: 10px">
                        <img :src="questions[currentQuestion - 1].question.image" alt="" class="img-fluid rounded-3">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="align-items-center row px-3">

                        <div class="col-3 col-sm-6">
                            <div :class="countDown < 10 ? 'warning pulse-danger' : 'count-down'">
                                {{ countDown }}
                            </div>
                        </div>
                        <div class="col-9 col-sm-6">
                            <div class="row justify-content-evenly">
                                <div class="col-3" v-for="i in this.quiz.errors" v-bind:key="i">
                                    <i :class="'fi-heart-full fi fs-4 '+ (errors >= i ? 'text-danger ' : '') + (errors === i-1 ? ' animate-bouncein' : '')"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="options-container">
                        <button
                            class=""
                            type="button"
                            v-for="(item, index) in options"
                            :key="index"
                            :disabled="disabled"
                            @click="correctAnswer(item.isCorrect, item.answer, $event)"
                        >
                            {{ item.answer }}
                        </button>
                    </div>
                </div>
                <!--        <div class="col-12">-->
                <!--          <div class="btn">-->
                <!--            <button-->
                <!--                class="next-btn"-->
                <!--                v-show="currentQuestion < questions.length"-->
                <!--                @click="handleNextQuestion()"-->
                <!--            >-->
                <!--              Next-->
                <!--            </button>-->
                <!--            <button-->
                <!--                class="submit-btn"-->
                <!--                v-show="currentQuestion === questions.length"-->
                <!--                @click="displayResult()"-->
                <!--            >-->
                <!--              Submit-->
                <!--            </button>-->
                <!--          </div>-->
                <!--        </div>-->
            </div>
        </div>

        <!-- display result -->
        <TotalPoints
            v-show="showResult"
            :totalPoints="points"
            :totalQuestions="questions.length"
            :medals="medals"
        />
    </div>
</template>

<script>
import TotalPoints from "./TotalPoints.vue";
import QuestionData from "../assets/questionData.json";
import {shuffle} from 'lodash';
import axios from "axios";

export default {
    name: "QuizApp",
    props: ["totalPoints", "totalQuestions", "countDownTimerFn", "auth", "quiz"],
    data() {
        return {
            currentQuestion: 1,
            points: null,
            answersArray: [],
            arr: null,
            countDown: this.quiz.time,
            timer: null,
            startQuiz: false,
            showResult: false,
            questions: QuestionData,
            options: shuffle(QuestionData[0].options),
            errors: this.quiz.errors,
            loaded: false,
            disabled: false,
            medals: {
                gold: false,
                silver: false,
                bronze: false
            }
        };
    },
    async mounted() {
        const response = await axios("https://bot.imdibil.ru/api/quiz/"+this.quiz.alias)
        const decodedData = atob(response.data);

        // Преобразуем обратно в JSON объект
        this.questions = JSON.parse(decodedData)
        this.options = shuffle(this.questions[0].options)
        this.countDown = this.quiz.time
        this.loaded = true
    },

    methods: {
        handleStartQuiz() {
            this.startQuiz = true;
            this.countDownTimer();
        },

        correctAnswer(isCorrect, answer, event) {
            this.disabled = true
            if (isCorrect) {
                this.answersArray.push(answer);
                this.arr = new Set(this.answersArray);
                if (event)
                {
                    event.target.blur()
                    event.target.classList.add("bg-success")
                }
            } else
            {
                if (event)
                {
                    event.target.blur()
                    event.target.classList.add("bg-danger")
                }
                this.errors--
            }
            if(this.errors === 0)
            {
                this.displayResult()
            }
            setTimeout(() => {
                if (event)
                {
                    event.target.className = ""
                }
                this.disabled = false
                this.handleNextQuestion()
            }, 1000)
        },

        countDownTimer() {
            if (this.countDown > 0) {
                this.timer = setTimeout(() => {
                    this.countDown--;
                    this.countDownTimer();
                }, 1000);
            } else if (this.countDown === 0) {
                if (this.currentQuestion === this.questions.length) {
                    this.displayResult();
                } else {
                    this.correctAnswer(false, this.questions[this.currentQuestion].options[0])
                }
            }
        },

        handleNextQuestion() {
            clearTimeout(this.timer);
            if(this.currentQuestion === this.questions.length)
            {
                this.displayResult()
                return
            }
            this.options = this.questions[this.currentQuestion].options;
            this.options = shuffle(this.options);
            this.currentQuestion += 1;
            if(this.quiz.sum === 1)
            {
                this.countDown = this.countDown + this.quiz.time > 60 ? 60 : this.countDown + this.quiz.time
            } else
            {
                this.countDown = this.quiz.time
            }
            this.countDownTimer();
        },

        displayResult() {
            this.countDown = 1;
            this.points = this.answersArray.length;
            if (this.auth)
            {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                axios.post('/quiz/save-progress', {
                        _token: token,
                        points: this.points,
                        quiz_id: this.quiz.id,
                        total: this.questions.length
                    }
                ).then( response => {
                    this.medals = response.data.medals
                }).catch(function (error) {
                    console.error(error)
                })
            }
            this.showResult = true;

        },
    },

    components: {
        TotalPoints,
    },
};
</script>

<style scoped>
@import "../assets/quizQuestionStyle.css";
</style>
