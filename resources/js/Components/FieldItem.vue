<template>
    <div
        data-aos="fade-up"
        data-aos-offset="200"
        data-aos-delay="50"
        data-aos-duration="1000"
        data-aos-easing="ease-in-out"
        data-aos-mirror="true"
        data-aos-once="false"
        data-aos-anchor-placement="top-center"
    >
        <div class="flex flex-col p-6 space-y-3 bg-white rounded-md shadow-lg">
            <span class="text-5xl font-bold text-primary-dark">{{number}}.</span>
            <h3 class="text-2xl font-semibold text-primary-dark"> {{title}}</h3>
            <p class="text-lg text-primary-dark">{{description}}</p>
            <img :src="image" alt="Frontend Web Development" class="w-full rounded-md">
            <Button :to="route('apply')" text="Apply Now" additional-classes="bg-primary text-white w-1/2"/>
        </div>
    </div>
</template>

<script setup>

import Button from "@/Components/Button.vue";
defineProps({
    number: String,
    title: String,
    description: String,
    image: Object,
})

</script>

<style scoped>

</style>
