<template>
    <GuestLayout>
        <Head title="Our Fields" />
        <AnimatedContent>
            <OurFields />
        </AnimatedContent>
    </GuestLayout>
</template>

<script setup>

import AnimatedContent from "@/Components/AnimatedContent.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {Head} from "@inertiajs/vue3";

import {usePage} from "@inertiajs/vue3";
import OurFields from "@/Components/Sections/OurFields.vue";

console.log(usePage().url)
</script>

<style scoped>

</style>
