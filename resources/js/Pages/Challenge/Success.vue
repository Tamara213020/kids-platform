<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import {inject} from "vue";

const route = inject('route')
</script>

<template>
    <AppLayout :title="'Success'">
        <template #header>
            <h2 class="font-semibold text-xl text-green-800 leading-tight">Success!</h2>
        </template>

        <div class="my-10 max-w-2xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg text-center">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200 mb-4">Congratulations! Your solution is correct.</h3>
            <Link :href="route('challenges.index')" class="mt-6 px-6 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition text-lg">
                Go back to the challenges
            </Link>
        </div>
    </AppLayout>
</template>
