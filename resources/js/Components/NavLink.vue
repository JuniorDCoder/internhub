<template>
    <Link :href="to" class="nav-link" :class="isActive ? 'text-primary font-semibold' : ''">{{ text }}</Link>
</template>

<script setup>
import { computed } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';

const props = defineProps({
    to: {
        type: String,
        required: true,
    },
    text: {
        type: String,
        required: true,
    },
    isActive: {
        type: Boolean,
        required: true,
    },
});

</script>

<style scoped>

</style>
