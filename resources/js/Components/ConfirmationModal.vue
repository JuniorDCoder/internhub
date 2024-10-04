<template>
    <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center md:px-0 px-5 bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <h3 class="text-xl font-semibold mb-4">{{ title }}</h3>
            <p class="mb-6">{{ message }}</p>
            <div class="flex justify-end space-x-4">
                <SecondaryButton @click="onCancel">Cancel</SecondaryButton>
                <PrimaryButton @click="onConfirm">Confirm</PrimaryButton>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
    show: {
        type: Boolean,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    message: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(['confirm', 'cancel']);

const onConfirm = () => {
    emit('confirm');
};

const onCancel = () => {
    emit('cancel');
};
</script>

<style scoped>
/* Add any additional styling if needed */
</style>
