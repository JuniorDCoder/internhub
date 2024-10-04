<template>
    <div>
        <div @click="toggleAnalytics" class="flex items-center cursor-pointer">
            <i :class="['fas', showAnalytics ? 'fa-chevron-down' : 'fa-chevron-right', 'text-blue-500', 'mr-2']"></i>
            <span class="text-blue-500">{{ showAnalytics ? 'Hide Analytics' : 'Show Analytics' }}</span>
        </div>
        <transition name="fade">
            <div v-if="showAnalytics" class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold mb-2">Total Users</h4>
                    <p class="text-3xl font-bold text-gray-900">{{ analytics.totalUsers }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold mb-2">Total Internships</h4>
                    <p class="text-3xl font-bold text-gray-900">{{ analytics.totalInternships }}</p>
                </div>
                <div v-for="specialty in analytics.specialties" :key="specialty.id" class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold mb-2">{{ specialty.name }}</h4>
                    <p class="text-3xl font-bold text-gray-900">{{ specialty.internships_count }}</p>
                </div>
            </div>
        </transition>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    analytics: {
        type: Object,
        required: true,
    },
});

const showAnalytics = ref(false);

const toggleAnalytics = () => {
    showAnalytics.value = !showAnalytics.value;
};
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    opacity: 0;
}
</style>
