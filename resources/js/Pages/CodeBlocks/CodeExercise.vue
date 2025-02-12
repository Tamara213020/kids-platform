<script setup>
import { ref } from "vue";
import Draggable from "vuedraggable";

const items = ref([
    { id: 1, name: "Item 1" },
    { id: 2, name: "Item 2" },
    { id: 3, name: "Item 3" },
    { id: 4, name: "Item 4" },
]);

const onEnd = (event) => {
    console.log(items.value)
};
</script>

<template>
    <div class="max-w-md mx-auto p-4 bg-white shadow-lg rounded-lg">
        <h2 class="text-xl font-bold mb-4">Sortable List</h2>

        <Draggable
            v-model="items"
            group="items"
            item-key="id"
            @end="onEnd"
            class="space-y-2"
        >
            <template #item="{ element }">
                <div
                    class="p-3 bg-blue-500 text-white rounded-lg shadow cursor-pointer"
                >
                    {{ element.name }}
                </div>
            </template>
        </Draggable>
    </div>
</template>

<style scoped>
/* Just some styling for clarity */
</style>
