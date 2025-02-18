<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import {Link} from "@inertiajs/vue3";
import {inject} from "vue";

const route = inject('route')

defineProps({
    course: {
        type: Object,
        default: null,
    }
});
</script>

<template>
    <AppLayout :title="course.title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ course.title }}
            </h2>
        </template>

        <div class="my-10 max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <img :src="course.image_url" alt="Course Image" class="w-full h-64 object-cover rounded-lg mb-4">
            <p class="text-gray-700 dark:text-gray-300">{{ course.description }}</p>

            <h3 class="mt-6 text-lg font-semibold text-gray-900 dark:text-gray-200">Лекции</h3>
            <ul class="mt-2">
                <li v-for="lecture in course.lectures" :key="lecture.id"
                    class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg mb-2">
                    <Link :href="route('courses.lectures.show', [course, lecture])">
                        <h4 class="text-md font-bold text-gray-800 dark:text-gray-100">{{ lecture.title }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ lecture.description }}</p>
                    </Link>
                </li>
            </ul>

            <h3 class="mt-6 text-lg font-semibold text-gray-900 dark:text-gray-200">Квизови</h3>
            <ul class="mt-2">
                <li v-for="courseQuiz in course.course_quizzes" :key="courseQuiz.id"
                    class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg mb-2">
                    <Link :href="route('courses.course-quizzes.show', [course, courseQuiz])">
                        <h4 class="text-md font-bold text-gray-800 dark:text-gray-100">{{ courseQuiz.goal }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Минимален број на поени: {{ courseQuiz.min_points }}</p>
                    </Link>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
