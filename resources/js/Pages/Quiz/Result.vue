<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    courseQuiz: {
        type: Object,
        default: null,
    },
    result: {
        type: Number,
        default: 0,
    },
});
</script>

<template>
    <AppLayout :title="courseQuiz.title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ courseQuiz.title }}
            </h2>
        </template>

        <div class="my-10 max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg text-center">
            <p class="text-gray-700 dark:text-gray-300 text-lg">{{ courseQuiz.description }}</p>

            <div class="mt-8">
                <div class="inline-block px-6 py-4 rounded-lg shadow-lg"
                     :class="{
                        'bg-green-500 text-white': result >= 80,
                        'bg-yellow-500 text-white': result >= 50 && result < 80,
                        'bg-red-500 text-white': result < 50
                    }">
                    <h3 class="text-2xl font-bold">Your Score</h3>
                    <p class="text-4xl font-extrabold mt-2">{{ result }}%</p>
                    <p class="mt-2 text-lg">
                        <span v-if="result >= 80">🎉 Excellent! Keep up the great work!</span>
                        <span v-else-if="result >= 50">😊 Good job! A little more practice and you'll ace it!</span>
                        <span v-else>😢 Don't worry! Keep practicing and you'll improve!</span>
                    </p>
                </div>
            </div>

            <div class="mt-8">
                <Link :href="route('courses.show', courseQuiz.course_id)"
                      class="px-6 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 text-lg">
                    ← Back to Course
                </Link>
            </div>
        </div>
    </AppLayout>
</template>
