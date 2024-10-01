<template>
    <AnimatedContent animation-type="zoom" delay=100 >
        <div class="flex flex-col space-y-3 bg-white shadow-lg rounded-md p-6">
            <span class="text-5xl text-primary-dark font-bold">{{number}}.</span>
            <h3 class="text-2xl text-primary-dark font-semibold"> {{title}}</h3>
            <p class="text-lg text-primary-dark">{{description}}</p>
            <img :src="image" alt="Frontend Web Development" class="w-full rounded-md">
            <Button :to="route('apply')" text="Apply Now" additional-classes="bg-primary text-white w-1/2"/>
        </div>
    </AnimatedContent>
</template>

<script setup>

import Button from "@/Components/Button.vue";
import AnimatedContent from "@/Components/AnimatedContent.vue";

defineProps({
    number: String,
    title: String,
    description: String,
    image: Object,
})

</script>

<style scoped>

</style>
