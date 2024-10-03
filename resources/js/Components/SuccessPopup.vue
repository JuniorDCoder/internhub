<template>
    <div class="fixed inset-0 flex items-center md:px-0 px-5 justify-center bg-gray-800 bg-opacity-75 z-50">
        <div class="bg-white p-6 flex flex-col items-center space-y-2 rounded-lg shadow-lg text-center">
            <h2 class="text-2xl font-bold mb-4">Success!</h2>
            <img src="@/assets/images/icons/success.png" class="w-16 h-16">
            <p class="mb-4">The internship status has been updated successfully. The intern will be notified.</p>
            <PrimaryButton @click="$emit('close')">
                Close
            </PrimaryButton>
        </div>
    </div>
</template>
<script setup lang="ts">
import PrimaryButton from "@/Components/PrimaryButton.vue";
</script>
