<template>
    <AnimatedContent animationType="zoom" delay=200>
        <div class="flex flex-col md:flex-row space-x-5 px-5 md:px-40 justify-between">
            <div class="flex flex-col space-y-4 md:w-1/2 py-9 md:py-24">
                <h2 class="md:text-7xl text-5xl font-semibold text-primary-dark">
                    Join Traitz Tech Internship Program
                </h2>
                <p class="text-gray-900 text-md md:text-sm">
                    Traitz Tech offers a comprehensive internship program designed to provide hands-on experience and professional development opportunities. Apply now to kickstart your career with us.
                </p>
                <div class="flex space-x-4 items-center">
                    <Button to="/apply" text="Apply Now" additional-classes="bg-primary font-semibold text-secondary" />
                    <Link href="/" class="flex space-x-2 items-center">
                        <img alt="Play" src="@/assets/images/play-button.png" class="w-8 h-8">
                        <p class="text-primary-dark underline">Learn More About Us</p>
                    </Link>
                </div>
            </div>
            <img alt="" class="md:w-1/2" src="@/assets/images/woman.webp">
        </div>
    </AnimatedContent>
</template>

<script setup>
import AnimatedContent from "@/Components/AnimatedContent.vue";
import { Link } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";
</script>

<style scoped>

</style>
