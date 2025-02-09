<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Courses
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="course in courses" :key="course.id" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                        <img :src="course.image_url" alt="Course image" class="w-full h-48 object-cover" />
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">{{ course.title }}</h3>
                            <p class="text-gray-700 dark:text-gray-300 mt-2">{{ course.description }}</p>
                            <a :href="`/courses/${course.slug}`" class="inline-block mt-4 text-blue-500">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    courses: {
        type: Array,
        default: () => []
    }
});
</script>
