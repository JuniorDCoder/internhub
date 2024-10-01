<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Hero from "@/Components/Sections/Home/Hero.vue";
import Partners from "@/Components/Sections/Home/Partners.vue";
import GetStarted from "@/Components/Sections/Home/GetStarted.vue";
import OurFields from "@/Components/Sections/OurFields.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

</script>

<template>
    <GuestLayout>
        <Head title="Welcome" />
        <Hero />
        <Partners />
        <GetStarted />
        <OurFields />
    </GuestLayout>

</template>
