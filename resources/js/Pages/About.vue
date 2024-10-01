<template>
    <GuestLayout>
        <Head title="About" />
        <AnimatedContent>
            <GetStarted about="At Traitz Tech, we're passionate about using technology as a bridge to build stronger communities. We're a creative studio brimming with problem-solvers who believe in crafting innovative tech solutions to address the challenges faced by our communities. From developing helpful apps to designing user -friendly platforms, we're here to empower people and create a more connected future, together." />
            <Partners />
            <OurFields />
        </AnimatedContent>
    </GuestLayout>
</template>

<script setup>

import AnimatedContent from "@/Components/AnimatedContent.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {Head} from "@inertiajs/vue3";

import {usePage} from "@inertiajs/vue3";
import GetStarted from "@/Components/Sections/Home/GetStarted.vue";
import Partners from "@/Components/Sections/Home/Partners.vue";
import OurFields from "@/Components/Sections/OurFields.vue";

console.log(usePage().url)
</script>

<style scoped>

</style>
