<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { inject } from "vue";

const route = inject("route");

const props = defineProps({
    courseQuiz: {
        type: Object,
        default: null,
    },
});

const form = useForm({
    answers: [],
});

const selectAnswer = (questionId, answerId) => {
    const index = form.answers.findIndex(a => a.question_id === questionId);

    if (index !== -1) {
        form.answers[index].answer_id = answerId;
    } else {
        form.answers.push({question_id: questionId, answer_id: answerId});
    }
};

const submitAnswers = () => {
    form.post(route("courses.course-quizzes.submit", [props.courseQuiz.course_id, props.courseQuiz.id]), {
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout :title="courseQuiz.title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ courseQuiz.title }}
            </h2>
        </template>

        <div class="my-10 max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <p class="text-gray-700 dark:text-gray-300">{{ courseQuiz.description }}</p>

            <h3 class="mt-6 text-lg font-semibold text-gray-900 dark:text-gray-200">Questions</h3>
            <ul class="mt-2">
                <li v-for="question in courseQuiz.course_quiz_questions" :key="question.id"
                    class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg mb-4">
                    <h4 class="text-md font-bold text-gray-800 dark:text-gray-100">{{ question.question }}</h4>
                    <ul class="mt-2">
                        <li v-for="answer in question.course_quiz_question_answers" :key="answer.id"
                            class="pl-4 text-gray-600 dark:text-gray-300">
                            <label class="flex items-center space-x-2">
                                <input type="radio" :name="'question_' + question.id" :value="answer.id"
                                       @change="selectAnswer(question.id, answer.id)"
                                       :checked="form.answers.some(a => a.question_id === question.id && a.answer_id === answer.id)"
                                       class="form-radio text-indigo-600 dark:text-indigo-400">
                                <span>{{ answer.answer }}</span>
                            </label>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="mt-6">
                <button @click="submitAnswers"
                        class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">
                    Submit Answers
                </button>
            </div>

            <div class="mt-6">
                <Link :href="route('courses.show', courseQuiz.course_id)"
                      class="text-indigo-500 hover:underline text-lg">
                    ← Back to Course
                </Link>
            </div>
        </div>
    </AppLayout>
</template>
