<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <nav class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px">
            <li v-for="link in links" :key="link.url" :class="{ 'ml-2': link.url }">
                <Link
                    v-if="link.url"
                    :href="link.url"
                    :class="['px-3 py-2 leading-tight border border-gray-300 hover:bg-gray-100 hover:text-gray-700', { 'bg-gray-800 text-white': link.active }]"
                    v-html="link.label"
                ></Link>
                <span v-else :class="['px-3 py-2 leading-tight border border-gray-300', { 'bg-gray-800 text-white': link.active }]" v-html="link.label"></span>
            </li>
        </ul>
    </nav>
</template>
