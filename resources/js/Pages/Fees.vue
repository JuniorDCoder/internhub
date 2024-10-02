<template>
    <GuestLayout>
        <Head title="Fees" />
        <AnimatedContent animation-type="zoom" delay=200>

        </AnimatedContent>
    </GuestLayout>
</template>

<script setup>

import AnimatedContent from "@/Components/AnimatedContent.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {Head} from "@inertiajs/vue3";

import {usePage} from "@inertiajs/vue3";

console.log(usePage().url)
</script>

<style scoped>

</style>
