<template>
    <GuestLayout>
        <Head title="Fees" />
        <div
            data-aos="fade-up"
            data-aos-offset="100"
            data-aos-delay="50"
            data-aos-duration="100"
            data-aos-easing="ease-in-out"
            data-aos-mirror="true"
            data-aos-once="false"
            data-aos-anchor-placement="top-center"
        >

        </div>
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
