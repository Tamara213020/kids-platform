<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {defineProps, inject} from "vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    challenges: {
        type: Array,
        default: () => [],
    },
});

const route = inject('route')
</script>

<template>
    <AppLayout title="Challenges">
        <template #header>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                Challenges
            </h2>
        </template>

        <div class="max-w-3xl mx-auto mt-6 p-6 bg-white dark:bg-gray-900 shadow-lg rounded-lg">
            <ul class="space-y-4">
                <Link :href="route('challenges.show', challenge)"
                    v-for="challenge in challenges"
                    :key="challenge.id"
                    class="p-4 bg-blue-500 text-white rounded-lg shadow-md flex justify-between items-center"
                >
                    <div>
                        <p class="text-lg font-semibold">⭐ {{ challenge.points }} Points</p>
                        <p class="text-sm">{{ challenge.description }}</p>
                    </div>
                </Link>
            </ul>
        </div>
    </AppLayout>
</template>

<style scoped>
/* Consistent styling */
</style>
