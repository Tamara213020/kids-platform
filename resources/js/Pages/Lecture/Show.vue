<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Link} from "@inertiajs/vue3";
import {inject} from "vue";

const route = inject('route')

defineProps({
    course: {
        type: Object,
        default: null,
    },
    lecture: {
        type: Object,
        default: null,
    }
});
</script>

<template>
    <AppLayout :title="lecture.title">
        <template #header>
            <div class="relative">
                <img :src="course.image_url" alt="Course Image" class="w-full h-64 object-cover rounded-lg mb-4">
                <h2 class="absolute inset-0 flex items-center justify-center text-3xl font-bold text-white bg-black bg-opacity-50 rounded-lg">
                    {{ course.title }} - Lecture
                </h2>
            </div>
        </template>

        <div class="max-w-3xl mx-auto mt-8 p-6 bg-white dark:bg-gray-900 shadow-lg rounded-lg">
            <h3 class="text-3xl font-extrabold text-gray-900 dark:text-gray-100 mb-4 text-center">
                {{ lecture.title }}
            </h3>

            <p v-html="lecture.description" class="text-lg text-gray-700 dark:text-gray-300 text-center italic"></p>

            <div class="mt-8 text-center">
                <Link :href="route('courses.show', course)" class="text-indigo-500 hover:underline text-lg">
                    ← Назад кон курсот
                </Link>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
/* Ensure a soft shadow and smooth layout */
</style>
