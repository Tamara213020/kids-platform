<script setup>
import { ref } from "vue";
import Draggable from "vuedraggable";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    challenge: Object,
});

const userSolution = ref([...props.challenge.challenge_code_parts.sort(() => Math.random() - 0.5)]);

const form = useForm({
    solution: userSolution,
});

const checkSolution = () => {
    form.post(route("challenges.submit", props.challenge.id));
};
</script>

<template>
    <AppLayout :title="challenge.description">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Code Challenge
            </h2>
        </template>

        <div class="my-10 max-w-2xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg text-center">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200 mb-4">Reorder the code blocks correctly</h3>

            <Draggable v-model="form.solution" group="code" item-key="id" class="space-y-2">
                <template #item="{ element }">
                    <div
                        class="p-3 text-left whitespace-pre-wrap bg-gray-700 text-white font-mono rounded-lg shadow-md cursor-pointer hover:bg-gray-600 transition"
                    >
                        {{ element.code }}
                    </div>
                </template>
            </Draggable>

            <button
                @click="checkSolution"
                class="mt-6 px-6 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition text-lg"
            >
                Submit Answer
            </button>
        </div>
    </AppLayout>
</template>
