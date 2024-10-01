<template>
    <Link :href="to" class="px-3 py-2 rounded-md text-center shadow-md hover:bg-blue-700 transition duration-300" :class="additionalClasses">
        <p class="text-center">{{ text }}</p>
    </Link>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
defineProps({
    text: String,
    additionalClasses: String,
    to: {
        type: String,
        required: true,
    },
})
</script>

<style scoped>

</style>
