<template>
    <div class="fixed inset-0 z-50 flex items-center justify-center px-5 bg-gray-800 bg-opacity-75 md:px-0">
        <div class="flex flex-col items-center p-6 space-y-2 text-center bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-2xl font-bold">Success!</h2>
            <img src="@/assets/images/icons/success.png" class="w-16 h-16">
            <p class="mb-4">{{ message }}</p>
            <PrimaryButton @click="$emit('close')">
                Close
            </PrimaryButton>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    message: {
        type: String,
        required: true,
    },
});
</script>
